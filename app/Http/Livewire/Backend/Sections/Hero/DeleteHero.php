<?php

namespace App\Http\Livewire\Backend\Sections\Hero;

use App\Models\Hero;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Storage;

class DeleteHero extends Component
{

    public function delete($id)
    {
        try {
            $hero = Hero::findOrFail($id);
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $hero->delete();

            session()->flash('success', 'Hero has been deleted successfully.');
            return Redirect::route('admin.get-hero');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Hero: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.hero.delete-hero');
    }
}
