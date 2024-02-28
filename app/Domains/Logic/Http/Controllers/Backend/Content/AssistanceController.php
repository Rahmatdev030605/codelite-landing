<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Assistance;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function getAssistance(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = Assistance::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = $request->input('page_type_id');

        if ($pageTypes) {
            $query->where('page_type_id', $pageTypes);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Apply sorting
        switch ($sort) {
            case 'ascending':
                $query->orderBy('heading')->orderBy('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('sub_heading');
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

        $assistances = $query->paginate($perPage);
        $pageTypes = PageTypes::all();
        $totalAssistance = $assistances->total();
        $assistances->appends($request->query());


        return view('backend.layouts.content.assistance.assistance', compact('assistances', 'sort', 'search', 'pageTypes', 'totalAssistance'));
    }
    public function showAssistance(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = Assistance::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();


        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('sub_heading', 'like', '%' . $search . '%');
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
                $query->orderBy('heading')->orderBy('sub_heading');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderBy('sub_heading');
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

        $assistances = $query->paginate($perPage);
        $totalAssistance = $assistances->total();
        $assistances->appends($request->query());

        return view('backend.layouts.content.assistance.assistance', compact('assistances', 'sort', 'search', 'totalAssistance', 'pageTypes'));
    }
    public function newAssistance()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.assistance.newAssistance', compact('types'));
    }

    public function storeAssistance(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $assistance = new Assistance();
            $assistance->fill($validatedData);
            $assistance->save();

            return redirect()->route('admin.get-assistance')->with('success', 'Assistance Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Assistance: ' . $th->getMessage());
        }
    }


    public function editAssistance($id)
    {
        $assistance = Assistance::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.assistance.editAssistance', compact('assistance', 'types'));
    }

    public function updateAssistance(Request $request, $id)
    {
        try {
            // Validate request data
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $assistance = Assistance::findOrFail($id);

            $assistance->fill($validateData);

            $assistance->save();

            return redirect()->route('admin.get-assistance')->with('success', 'Assistance Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Update Assistance: ' . $th->getMessage());
        }
    }


    public function deleteAssistance($id)
    {
        try {
            $assistance = Assistance::findOrFail($id);
            $assistance->delete();

            return redirect()->route('admin.get-assistance')->with('success', 'Assistance Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Assistance " . $th->getMessage());
        }
    }
}
