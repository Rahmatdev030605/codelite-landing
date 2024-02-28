<?php

namespace App\Http\Livewire\Backend\Sections\OurTeam;

use App\Models\OurTeam;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteOurTeam extends Component
{
    public function delete($id)
    {
        try {
            $team = OurTeam::findOrFail($id);
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $team->delete();

            session()->flash('success', 'Our Team has been deleted successfully.');
            return Redirect::route('admin.get-our-team');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Our Team: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.our-team.delete-our-team');
    }
}
