<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\PageTypes;
use App\Models\ProjectsSection;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function getProject(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = ProjectsSection::query();
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

        $projects = $query->paginate($perPage);

        $pageTypes = PageTypes::all();
        $totalProject = $projects->total();
        $projects->appends($request->query());

        return view('backend.layouts.content.projects.projects', compact('projects', 'sort', 'search', 'pageTypes', 'totalProject'));
    }

    public function showProject(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = ProjectsSection::query();
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
                $query->orderByDesc('heading')->orderBy('title')->orderBy('sub_heading');
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

        $projects = $query->paginate($perPage);
        $totalProject = $projects->total();
        $projects->appends($request->query());

        return view('backend.layouts.content.projects.projects', compact('projects', 'sort', 'search', 'totalProject', 'pageTypes'));
    }
    public function newProject()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.projects.newProjects', compact('types'));
    }

    public function storeProject(Request $request)
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

            $project = new ProjectsSection();
            $project->fill($validateData);

            $project->save();

            return redirect()->route('admin.get-project-section')->with('success', 'Projects Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Added Projects",  $th->getMessage());
        }
    }

    public function editProject($id)
    {
        $project = ProjectsSection::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.projects.editProjects', compact('project', 'types'));
    }

    public function updateProject(Request $request, $id)
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

            $project = ProjectsSection::findOrFail($id);
            $project->fill($validateData);
            $project->save();

            return redirect()->route('admin.get-project-section')->with('success', 'Projects Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Update Projects " . $th->getMessage());
        }
    }

    public function deleteProject($id)
    {
        try {
            $project = ProjectsSection::findOrFail($id);
            $project->delete();

            return redirect()->route('admin.get-projects')->with('success', 'Projects Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Projects " . $th->getMessage());
        }
    }
}
