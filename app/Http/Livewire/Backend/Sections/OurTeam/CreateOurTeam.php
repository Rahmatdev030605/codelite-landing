<?php

namespace App\Http\Livewire\Backend\Sections\OurTeam;

use App\Models\OurTeam;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOurTeam extends Component
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

    public function mount()
    {
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

    public function save()
    {
        try {
            $validateData = $this->validate();

            $team = OurTeam::create($validateData);

            if ($this->image) {
                $imagePath = $this->image->store('ourTeam', 'public');
                $team->image = $imagePath;
            }

            $team->save();

            session()->flash('success', 'Our "' . $this->title . '" Team Added Successfully');
            return Redirect::route('admin.get-our-team');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Our Team: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.sections.our-team.create-our-team')->extends('backend.layouts.app');
    }
}
