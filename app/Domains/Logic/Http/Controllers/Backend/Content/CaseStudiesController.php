<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\CaseStudies;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class CaseStudiesController extends Controller
{
    public function getCase(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = CaseStudies::query();
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
                $query->orderBy('heading')->orderBy('title');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title');
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

        $cases = $query->paginate($perPage);

        $pageTypes = PageTypes::all();

        $totalCase = $cases->total();

        $cases->appends($request->query());

        return view('backend.layouts.content.caseStudies.case', compact('cases', 'totalCase', 'sort', 'search', 'pageTypes'));
    }

    public function showCase(Request $request)
    {

        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = CaseStudies::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
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
                $query->orderBy('heading')->orderBy('title');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title');
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

        $cases = $query->paginate($perPage);
        $totalCase = $cases->total();
        $cases->appends($request->query());

        return view('backend.layouts.content.caseStudies.case', compact('cases', 'totalCase', 'sort', 'search', 'pageTypes'));
    }

    public function newCase()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.caseStudies.newCase', compact('types'));
    }

    public function storeCase(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'button_link_1' => 'nullable|string',
                'button_link_2' => 'nullable|string',
                'button_link_3' => 'nullable|string',
                'button_link_4' => 'nullable|string',
                'button_link_5' => 'nullable|string',
            ]);

            $case = new CaseStudies();
            $case->fill($validatedData);
            $case->save();

            return redirect()->route('admin.get-case-studies')->with('success', 'Case Studies Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Failed to Add Case Studies Product: " . $th->getMessage());
        }
    }

    public function editCase($id)
    {
        $case = CaseStudies::findOrFail($id);
        $types = PageTypes::all();
        return view('backend.layouts.content.caseStudies.editCase', compact('case', 'types'));
    }

    public function updateCase(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'button_link_1' => 'nullable|string',
                'button_link_2' => 'nullable|string',
                'button_link_3' => 'nullable|string',
                'button_link_4' => 'nullable|string',
                'button_link_5' => 'nullable|string',
            ]);

            $case = CaseStudies::findOrFail($id);
            $case->fill($validateData);
            $case->save();

            return redirect()->route('admin.get-case-studies')->with('success', 'Case Studies Updated Successfully');
        }catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Case Studies " . $th->getMessage());
        }
    }

    public function deleteCase($id)
    {
        try {
            $case = CaseStudies::findOrFail($id);
            $case->delete();

            return redirect()->route('admin.get-case-studies')->with('success', 'Case Studies Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Case Studies " . $th->getMessage());
        }
    }
}
