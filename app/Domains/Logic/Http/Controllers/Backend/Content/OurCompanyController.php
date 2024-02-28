<?php


namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\OurCompany;
use App\Models\PageTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurCompanyController extends Controller
{
    public function getOurCompany(Request $request)
    {
        $publicImg = 'img/ourCompany/';
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = OurCompany::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = $request->input('page_type_id');

        if ($pageTypes) {
            $query->where('page_type_id', $pageTypes);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }


        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('title')->orderBy('description')->orderByDesc('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('description')->orderByDesc('sub_heading');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('heading');
                break;
        }

        $ours = $query->paginate($perPage);

        foreach ($ours as $our) {
            $imagePathPublic = public_path("img/ourCompany/" . basename($our->image));
            $imagePathStorage = storage_path("app/public/image/ourCompany/" . basename($our->image));

            if (file_exists($imagePathPublic)) {
                $our->image = asset("img/ourCompany/" . basename($our->image));
            } elseif (file_exists($imagePathStorage)) {
                $our->image = asset("storage/image/ourCompany/" . basename($our->image));
            } else {
                $our->image = asset("img/default/default-no-image.jpg");
            }
        }

        $pageTypes = PageTypes::all();
        $totalOur = $ours->total();
        $ours->appends($request->query());

        return view('backend.layouts.content.ourCompany.ourCompany', compact('ours', 'sort', 'search', 'pageTypes', 'totalOur'));
    }


    public function showOurCompany(Request $request)
    {
        $publicImg = 'img/ourCompany/';
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = OurCompany::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('desc', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        // Check if 'page_type_id' is provided and not empty
        if ($request->filled('page_type_id')) {
            $query->where('page_type_id', $request->input('page_type_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading');
                break;
            case 'descending':
                $query->orderByDesc('heading');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('heading');
                break;
        }

        $ours = $query->paginate($perPage);

        foreach ($ours as $our) {
            $imagePathPublic = public_path("img/ourCompany/" . basename($our->image));
            $imagePathStorage = storage_path("app/public/image/ourCompany/" . basename($our->image));

            if (file_exists($imagePathPublic)) {
                $our->image = asset("img/ourCompany/" . basename($our->image));
            } elseif (file_exists($imagePathStorage)) {
                $our->image = asset("storage/image/ourCompany/" . basename($our->image));
            } else {
                $our->image = asset("img/default/default-no-image.jpg");
            }
        }

        $totalOur = $ours->total();
        $ours->appends($request->query());

        return view('backend.layouts.content.ourCompany.ourCompany', compact('ours', 'sort', 'search', 'totalOur', 'pageTypes'));
    }

    public function newOurCompany()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.ourCompany.newOurCompany', compact('types'));
    }

    public function storeOurCompany(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'desc' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $our = new OurCompany();
            $our->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourCompany');
                $our->image = str_replace('public/', '', $imagePath);
            }

            $our->save();

            return redirect()->route('admin.get-our-company')->with('success', 'Our Company Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added Our Company",  $th->getMessage());
        }
    }

    public function editOurCompany($id)
    {
        $our = OurCompany::findOrFail($id);
        $types = PageTypes::all();

        if ($our) {
            if (Storage::exists('public/image/ourCompany/' . basename($our->image))) {
                $our->image = asset("storage/image/ourCompany/" . basename($our->image));
            } elseif (Storage::exists('app/public/image/ourCompany/' . basename($our->image))) {
                $our->image = asset("storage/image/ourCompany/" . basename($our->image));
            } elseif (file_exists(public_path("img/ourCompany/" . basename($our->image)))) {
                $our->image = asset("img/ourCompany/" . basename($our->image));
            }
        }

        return view('backend.layouts.content.ourCompany.editOurCompany', compact('our', 'types'));
    }


    public function updateOurCompany(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'desc' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $our = OurCompany::findOrFail($id);
            $our->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourCompany');
                if ($our->image) {
                    Storage::disk('public')->delete($our->image);
                    $our->image = str_replace('public/', '', $imagePath);
                }
            }

            $our->save();

            return redirect()->route('admin.get-our-company')->with('success', 'Our Company Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Our Company " . $th->getMessage());
        }
    }
    public function deleteOurCompany($id)
    {
        try {
            $our = OurCompany::findOrFail($id);
            if ($our->image) {
                Storage::disk('public')->delete($our->image);
            }

            $our->delete();

            return redirect()->route('admin.get-our-company')->with('success', 'Our Company Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Our Company " . $th->getMessage());
        }
    }
}
