<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\LeadershipSection;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class LeadershipSectionController extends Controller
{
    public function getLeadership(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = LeadershipSection::query();
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
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading');
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

        $leaders = $query->paginate($perPage);

        $pageTypes = PageTypes::all();

        $totalLeader = $leaders->total();

        $leaders->appends($request->query());

        return view('backend.layouts.content.leadership.leadership', compact('leaders', 'sort', 'search', 'pageTypes', 'totalLeader'));
    }

    public function showLeadership(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = LeadershipSection::query();
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
                $query->orderBy('heading')->orderBy('title')->orderBy('sub_heading');
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

        $leaders = $query->paginate($perPage);
        $totalLeader = $leaders->total();
        $leaders->appends($request->query());

        return view('backend.layouts.content.leadership.leadership', compact('leaders', 'sort', 'search', 'totalLeader', 'pageTypes'));
    }

    public function newLeadership()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.leadership.newLeadership', compact('types'));
    }

    public function storeLeadership(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $leader = new LeadershipSection();
            $leader->fill($validateData);

            $leader->save();

            return redirect()->route('admin.get-leadership')->with('success', 'Leadership Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added Our Company",  $th->getMessage());
        }
    }

    public function editLeadership($id)
    {
        $leader = LeadershipSection::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.leadership.editLeadership', compact('leader', 'types'));
    }

    public function updateLeadership(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $leader = LeadershipSection::findOrFail($id);
            $leader->fill($validateData);
            $leader->save();

            return redirect()->route('admin.get-leadership')->with('success', 'Leadership Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Leadership " . $th->getMessage());
        }
    }

    public function deleteLeadership($id)
    {
        try {
            $leader = LeadershipSection::findOrFail($id);
            $leader->delete();

            return redirect()->route('admin.get-leadership')->with('success', 'Leadership Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Leadership " . $th->getMessage());
        }
    }
}
