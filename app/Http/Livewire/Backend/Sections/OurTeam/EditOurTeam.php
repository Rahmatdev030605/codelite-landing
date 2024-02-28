<?php

namespace App\Http\Livewire\Backend\Sections\OurTeam;

use App\Models\OurTeam;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditOurTeam extends Component
{
    use WithFileUploads;

    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $description;
    public $image;
    public $types;
    public $button_link;
    public $team;

    public function mount($id)
    {
        $team = OurTeam::findOrFail($id);
        $this->team = $team;
        $this->page_type_id = $team->page_type_id;
        $this->status = $team->status;
        $this->title = $team->title;
        $this->heading = $team->heading;
        $this->description = $team->description;
        $this->image = $team->image;
        $this->button_link = $team->button_link;

        $this->types = PageTypes::all();
    }

    protected $rules = [
        'page_type_id' => 'nullable',
        'status' => 'nullable|boolean',
        'title' => 'nullable|string|max:255',
        'heading' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'button_link' => 'nullable|string',
    ];

    public function edit()
    {
        $validateData = $this->validate();

        try {
            $this->team->update($validateData);

            if ($this->image) {
                $newImagePath = $this->image->store('ourTeam', 'public');

                if ($this->team->image) {
                    Storage::disk('public')->delete($this->team->image);
                }
                $this->team->image = $newImagePath;
            }
            $this->team->save();

            session()->flash('success', 'Our Team "' . $this->title . '" Updated Successfully');
            return Redirect::route('admin.get-our-team');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Failed to update Our Team : " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.sections.our-team.edit-our-team')->extends('backend.layouts.app');
    }
}
