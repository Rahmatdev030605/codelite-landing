<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use App\Models\pageTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public function getOurTeam(Request $request)
    {
        $publicImg = 'img/default/';
        $sort = $request->input('sort');
        $search = $request->input('search');
        $query = OurTeam::query();
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
                $query->orderBy('heading')->orderBy('title')->orderBy('description');
                break;
            case 'descending':
                $query->orderByDesc('heading')->orderByDesc('title')->orderByDesc('description');
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

        $teams = $query->paginate($perPage);

        foreach ($teams as $team) {
            $imagePathStorage = 'public/image/ourTeam/' . basename($team->image);
            $imagePathPublic = public_path("img/ourTeam/" . basename($team->image));

            if (Storage::exists($imagePathStorage)) {
                $team->image = asset('storage/image/ourTeam/' . basename($team->image));
            } elseif (file_exists($imagePathPublic)) {
                $team->image = asset("img/ourTeam/" . basename($team->image));
            } else {
                $team->image = asset('storage/image/default-no-image.jpg');
            }
        }

        $pageTypes = pageTypes::all();
        $totalTeam = $teams->total();
        $teams->appends($request->query());

        return view('backend.layouts.content.ourTeam.ourTeam', compact('teams', 'sort', 'search', 'totalTeam', 'pageTypes'));
    }


    public function showOurTeam(Request $request)
    {

        $search = $request->input('search');
        $sort = $request->input('sort');
        $publicImg = 'img/default/';
        $query = OurTeam::query();
        $perPage = $request->query('perPage', 10);
        $pageTypes = PageTypes::all();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
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

        $teams = $query->paginate($perPage);

        foreach ($teams as $team) {
            $imagePathStorage = 'public/image/ourTeam/' . basename($team->image);
            $imagePathPublic = public_path("img/ourTeam/" . basename($team->image));

            if (Storage::exists($imagePathStorage)) {
                $team->image = asset('storage/image/ourTeam/' . basename($team->image));
            } elseif (file_exists($imagePathPublic)) {
                $team->image = asset("img/ourTeam/" . basename($team->image));
            } else {
                $team->image = asset('storage/image/default-no-image.jpg');
            }
        }

        $totalTeam = $teams->total();
        $teams->appends($request->query());

        return view('backend.layouts.content.ourTeam.ourTeam', compact('teams', 'sort', 'search', 'totalTeam', 'pageTypes'));
    }

    public function newOurTeam()
    {
        $types = pageTypes::all();
        return view('backend.layouts.content.ourTeam.newOurTeam', compact('types'));
    }

    public function storeOurTeam(Request $request)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);


            $team = new OurTeam();
            $team->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourTeam');
                $team->image = str_replace('public/', '', $imagePath);
            }

            $team->save();

            return redirect()->route('admin.get-our-team')->with('success', 'Our Team Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Added Our Team',  $th->getMessage());
        }
    }

    public function editOurTeam($id)
    {
        $team = OurTeam::findOrFail($id);
        $types = pageTypes::all();

        if ($team) {
            if (Storage::exists('public/image/ourTeam/' . basename($team->image))) {
                $team->image = asset("storage/image/ourTeam/" . basename($team->image));
            } elseif (Storage::exists('app/public/image/ourTeam/' . basename($team->image))) {
                $team->image = asset("storage/image/ourTeam/" . basename($team->image));
            } elseif (file_exists(public_path("img/ourTeam/" . basename($team->image)))) {
                $team->image = asset("img/ourTeam/" . basename($team->image));
            }
        }

        return view('backend.layouts.content.ourTeam.editOurTeam', compact('team', 'types'));
    }


    public function updateOurTeam(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'page_type_id' => 'nullable',
                'status' => 'nullable|in:active,not active',
                'title' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'button_link' => 'nullable|string',
            ]);

            $team = OurTeam::findOrFail($id);
            $team->fill($validateData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image/ourTeam');
                if ($team->image) {
                    Storage::disk('public')->delete($team->image);
                }
                $team->image = str_replace('public/', '', $imagePath);
            }

            $team->save();

            return redirect()->route('admin.get-our-team')->with('success', 'Our Team Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Update Our Team: ' . $th->getMessage());
        }
    }

    public function deleteOurTeam($id)
    {
        try {
            $team = OurTeam::findOrFail($id);

            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }

            $team->delete();

            return redirect()->route('admin.get-our-team')->with('success', 'Our Team deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Our Team: ' . $e->getMessage());
        }
    }
}
