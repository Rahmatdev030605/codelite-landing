<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company\Medsos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Medsos\Medsos;
use Illuminate\Support\Facades\Storage;

class MedsosController extends Controller
{

    public function getMedsos(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $publicImg = 'img/medsos/';
    
        $query = Medsos::query();
        if ($search) {
            $query->where('medsos_name', 'like', '%' . $search . '%');
        }
    
        switch ($sort) {
            case 'ascending':
                $query->orderBy('medsos_name');
                break;
            case 'descending':
                $query->orderByDesc('medsos_name');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('medsos_name');
                break;
        }
    
        $medsos = $query->paginate(10);
    
        foreach ($medsos as $medsosData) {
            $imagePathPublic = public_path("img/medsos/" . basename($medsosData['medsos_image']));
            $imagePathStorage = storage_path("app/public/medsos_image/" . basename($medsosData['medsos_image']));
        
            if (file_exists($imagePathPublic)) {
                $medsosData['medsos_image'] = asset("img/medsos/" . basename($medsosData['medsos_image']));
            } elseif (file_exists($imagePathStorage)) {
                $medsosData['medsos_image'] = asset("storage/medsos_image/" . basename($medsosData['medsos_image']));
            } else {
                $medsosData['medsos_image'] = asset("img/medsos/calendar.png");
            }
        }
    
        return view('backend.layouts.company.medsos.medsos', compact('medsos', 'sort'));
    }

    

    public function storeMedsos(Request $request)
    {
        $request->validate([
            'medsos_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'medsos_name' => 'required|max:255',
        ]);
    
        $medsos = new Medsos;
    
        if ($request->hasFile('medsos_image')) {
            $imagePath = $request->file('medsos_image')->store('public/medsos_image');
            $medsos->medsos_image = str_replace('public/', '', $imagePath);
        }
    
        $medsos->medsos_name = $request->input('medsos_name');
        $medsos->save();
    
        return redirect()->route('admin.medsos')->with('success', 'Media Sosial created successfully');
    }
    

    public function show(Request $request)
    {
        //
    }

    public function updateMedsos(Request $request, $id)
    {
        $request->validate([
            'medsos_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'medsos_name' => 'max:255',
        ]);

        $medsos = Medsos::find($id);

        if (!$medsos) {
            return redirect()->route('admin.medsos')->with('error', 'Media Sosial not found');
        }

        if ($request->hasFile('medsos_image')) {
            $imagePath = $request->file('medsos_image')->store('medsos_image', 'public');
            
            if ($medsos->medsos_image) {
                Storage::disk('public')->delete($medsos->medsos_image);
            }

            $medsos->medsos_image = $imagePath;
        }

        $medsos->medsos_name = $request->input('medsos_name');
        $medsos->save();

        return redirect()->route('admin.medsos')->with('success', 'Media Sosial updated successfully');
    }

    public function destroyMedsos($id)
{
    
        $medsos = Medsos::findOrFail($id);
        if ($medsos->medsos_image) {
            Storage::disk('public')->delete($medsos->medsos_image);
        }
        $medsos->delete();

        return redirect()->route('admin.medsos')->with('success', 'Media Sosial deleted successfully');
}
}