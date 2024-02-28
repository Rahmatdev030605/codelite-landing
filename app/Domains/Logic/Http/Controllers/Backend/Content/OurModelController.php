<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\OurModel;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class OurModelController extends Controller
{
    public function getOurModel(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = OurModel::query();
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
                $query->orderBy('heading')->orderBy('title')->orderByDesc('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('sub_heading');
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
        $pageTypes = PageTypes::all();
        $totalOur = $ours->total();
        $ours->appends($request->query());

        return view('backend.layouts.content.ourModel.ourModel', compact('ours', 'sort', 'search', 'pageTypes', 'totalOur'));
    }

    public function showOurModel(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = OurModel::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

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

        $pageTypes = PageTypes::all();
        $totalOur = $ours->total();
        $ours->appends($request->query());
        $ours = $query->paginate($perPage);

        return view('backend.layouts.content.ourModel.ourModel', compact('ours', 'sort', 'search', 'pageTypes', 'totalOur'));
    }

    public function newOurModel()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.ourModel.newOurModel', compact('types'));
    }

    public function storeOurModel(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
                'page_type_id' => 'nullable',
            ]);

            $our = new OurModel();
            $our->fill($validateData);
            $our->save();

            return redirect()->route('admin.get-our-model')->with('success', 'Our Model Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added Our Model",  $th->getMessage());
        }
    }

    public function editOurModel($id)
    {

        $our = OurModel::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.ourModel.editOurModel', compact('our', 'types'));
    }

    public function updateOurModel(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $our = OurModel::findOrFail($id);
            $our->fill($validateData);
            $our->save();

            return redirect()->route('admin.get-our-model')->with('success', 'Our Model Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Our Model " . $th->getMessage());
        }
    }

    public function deleteOurModel($id)
    {
        try {
            $our = OurModel::findOrFail($id);
            $our->delete();

            return redirect()->route('admin.get-our-model')->with('success', 'Our Model Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Our Model " . $th->getMessage());
        }
    }
}
