<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Consulting;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class ConsultingController extends Controller
{
    public function getConsulting(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = Consulting::query();
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

        $consulting = $query->paginate($perPage);
        $pageTypes = PageTypes::all();
        $totalConsult = $consulting->total();
        $consulting->appends($request->query());

        return view('backend.layouts.content.consulting.consulting', compact('consulting', 'sort', 'search', 'pageTypes', 'totalConsult'));
    }

    public function showConsulting(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = Consulting::query();
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

        $consulting = $query->paginate($perPage);
        $totalConsult = $consulting->total();
        $consulting->appends($request->query());

        return view('backend.layouts.content.consulting.consulting', compact('consulting', 'sort', 'search', 'pageTypes', 'totalConsult'));
    }

    public function newConsulting()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.consulting.newConsulting', compact('types'));
    }

    public function storeConsulting(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'page_type_id' => 'nullable',
            ]);

            $consult = new Consulting();
            $consult->fill($validatedData);
            $consult->save();

            return redirect()->route('admin.get-consulting')->with('success', 'Consulting Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Consulting: ' . $th->getMessage());
        }
    }

    public function editConsulting($id)
    {
        $consult = Consulting::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.consulting.editConsulting', compact('consult', 'types'));
    }

    public function updateConsulting(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'page_type_id' => 'nullable',
            ]);

            $consult = Consulting::findOrFail($id);
            $consult->fill($validatedData);
            $consult->save();

            return redirect()->route('admin.get-consulting')->with('success', 'Consulting Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Update Consulting: ' . $th->getMessage());
        }
    }

    public function deleteConsulting($id)
    {
        try {
            $consult = Consulting::findOrFail($id);
            $consult->delete();

            return redirect()->route('admin.get-consulting')->with('success', 'Consulting Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Consulting " . $th->getMessage());
        }
    }
}
