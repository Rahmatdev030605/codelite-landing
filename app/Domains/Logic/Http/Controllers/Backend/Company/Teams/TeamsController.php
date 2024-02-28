<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company\Teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    public function getTeams()
    {

        return view('backend.layouts.company.teams.teams');
    }


    public function getTeam(Request $request)
{
    $query = Team::query();
    $sort = $request->input('sort');
    $search = $request->input('search');
    $publicImg = 'img/team/';
    $teams = $query->paginate(6);

    foreach ($teams as $team) {
        $imagePathPublic = public_path("img/team/" . basename($team->profile_img));
        $imagePathStorage = storage_path("app/public/image/team/" . basename($team->profile_img));

        if (file_exists($imagePathPublic)) {
            $team->profile_im = asset("img/team/" . basename($team->profile_img));
        } elseif (file_exists($imagePathStorage)) {
            $team->profile_img = asset("storage/image/team/" . basename($team->profile_img));
        } else {
            $team->profile_img = asset("img/default/default-no-image.jpg");
        }
    }

    return view('backend.layouts.company.teams.team', compact('teams', 'sort', 'search'));
}

public function showTeam(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort');
    $defaultImagePath = 'img/team/';

    $query = Team::query();

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    switch ($sort) {
        case 'ascending':
            $query->orderBy('name');
            break;
        case 'descending':
            $query->orderByDesc('name');
            break;
        case 'newest':
            $query->latest();
            break;
        case 'oldest':
            $query->oldest();
            break;
        default:
            $query->orderBy('name');
            break;
    }

    $teams = $query->paginate(6);

    foreach ($teams as $team) {
        $imagePathPublic = public_path("img/team/" . basename($team->profile_img));
        $imagePathStorage = storage_path("app/public/image/team/" . basename($team->profile_img));

        if (file_exists($imagePathPublic)) {
            $team->profile_img = asset("img/team/" . basename($team->profile_img));
        } elseif (file_exists($imagePathStorage)) {
            $team->profile_img = asset("storage/image/team/" . basename($team->profile_img));
        } else {
            $team->profile_img = asset("img/default/default-no-image.jpg");
        }
    }

    return view('backend.layouts.company.teams.team', compact('teams', 'sort', 'search', 'defaultImagePath'));
}



    public function newTeam()
    {
        return view('backend.layouts.company.teams.newTeam');
    }

    public function storeTeam(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable|string|max:255',
                'age' => 'nullable|string|max:255',
                'job' => 'nullable|string|max:255',
                'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'link_linkedin' => 'nullable|string',
                'link_instagram' => 'nullable|string',
                'link_twitter' => 'nullable|string',
                'email' => 'nullable|string',
                'box_message_heading' => 'nullable|string|max:255',
                'box_message_desc' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $team = new Team();
            $team->fill($validatedData);

            if ($request->hasFile('profile_img')) {
                $imagePath = $request->file('profile_img')->store('public/image/team');
                $team->profile_img = str_replace('public/', '', $imagePath);
            }

            $team->save();

            return redirect()->route('admin.get-team')->with('success', 'Team Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Added Team: ' . $th->getMessage());
        }
    }


    public function editTeam($id)
    {
        $team = Team::findOrFail($id);
        $storageImg = 'storage/image/team/';
        $publicImg = 'img/team/';

        if (Storage::exists($storageImg . basename($team->image))) {
            $team->profile_img = asset($storageImg . basename($team->profile_img));
        } else {
            $team->profile_img = asset($publicImg . basename($team->profile_img));
        }

        return view('backend.layouts.company.teams.editTeam', compact('team'));
    }

    public function updateTeam(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'name' => 'nullable|string|max:255',
                'age' => 'nullable|string|max:255',
                'job' => 'nullable|string|max:255',
                'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
                'link_linkedin' => 'nullable|string',
                'link_instagram' => 'nullable|string',
                'link_twitter' => 'nullable|string',
                'email' => 'nullable|string',
                'box_message_heading' => 'nullable|string|max:255',
                'box_message_desc' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $team = Team::findOrFail($id);
            $team->fill($validateData);

            if ($request->hasFile('profile_img')) {
                $imagePath = $request->file('profile_img')->store('public/image/team');
                if ($team->profile_img) {
                    Storage::disk('public')->delete($team->profile_img);
                }
                $team->profile_img = str_replace('public/', '', $imagePath);
            }

            $team->save();

            return redirect()->route('admin.get-team')->with('success', 'Team Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Update Our Team: ' . $th->getMessage());
        }
    }

    public function deleteTeam($id)
    {
        try {
            $team = Team::findOrFail($id);

            if ($team->profile_img) {
                Storage::disk('public')->delete($team->profile_img);
            }

            $team->delete();

            return redirect()->route('admin.get-teams')->with('success', 'Team Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Our Team: ' . $e->getMessage());
        }
    }
}
