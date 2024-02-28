<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\LetsStarted;
use App\Models\PageTypes;
use Illuminate\Http\Request;

class LetsStartedController extends Controller
{
    public function getLets(Request $request)
    {
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = LetsStarted::query();
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

        $started = $query->paginate($perPage);
        $pageTypes = PageTypes::all();
        $totalStart = $started->total();
        $started->appends($request->query());

        return view('backend.layouts.content.letsStarted.started', compact('started', 'sort', 'search', 'pageTypes', 'totalStart'));
    }

    public function showLets(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $query = LetsStarted::query();
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

        $started = $query->paginate($perPage);
        $totalStart = $started->total();
        $started->appends($request->query());

        return view('backend.layouts.content.letsStarted.started', compact('started', 'sort', 'search', 'pageTypes', 'totalStart'));
    }

    public function newLets()
    {
        $types = PageTypes::all();
        return view('backend.layouts.content.letsStarted.newStarted', compact('types'));
    }

    public function storeLets(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $start = new LetsStarted();
            $start->fill($validatedData);
            $start->save();

            return redirect()->route('admin.get-started')->with('success', 'Lets Get Started Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Lets Get Started ' . $th->getMessage());
        }
    }

    public function editLets($id)
    {
        $start = LetsStarted::findOrFail($id);
        $types = PageTypes::all();

        return view('backend.layouts.content.letsStarted.editStarted', compact('start', 'types'));
    }

    public function updateLets(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'heading' => 'nullable|string|max:255',
                'sub_heading' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $start = LetsStarted::findOrFail($id);
            $start->fill($validatedData);
            $start->save();

            return redirect()->route('admin.get-started')->with('success', 'Lets Get Started updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Get lets started Updated: ' . $th->getMessage());
        }
    }

    public function deleteLets($id)
    {
        try {
            $start = LetsStarted::findOrFail($id);
            $start->delete();

            return redirect()->route('admin.get-started')->with('success', 'Lets Get Started deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with("error', 'Failed to Delete Lets get Started " . $th->getMessage());
        }
    }
}
