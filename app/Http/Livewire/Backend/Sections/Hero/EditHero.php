<?php

namespace App\Http\Livewire\Backend\Sections\Hero;

use App\Models\Hero;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditHero extends Component
{
    use WithFileUploads;
    public $hero;
    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $description;
    public $highlight_1;
    public $highlight_2;
    public $highlight_3;
    public $image;
    public $sub_image;
    public $types;
    public $button_link_1;
    public $button_link_2;

    public function mount($id)
    {
        $this->hero = Hero::findOrFail($id);

        $this->page_type_id = $this->hero->page_type_id;
        $this->status = $this->hero->status;
        $this->title = $this->hero->title;
        $this->heading = $this->hero->heading;
        $this->description = $this->hero->description;
        $this->highlight_1 = $this->hero->highlight_1;
        $this->highlight_2 = $this->hero->highlight_2;
        $this->highlight_3 = $this->hero->highlight_3;
        $this->image = $this->hero->image;
        $this->sub_image = $this->hero->sub_image;
        $this->button_link_1 = $this->hero->button_link_1;
        $this->button_link_2 = $this->hero->button_link_2;

        $this->types = PageTypes::all();
    }

    protected $rules = [
        'page_type_id' => 'nullable',
        'status' => 'nullable|boolean',
        'title' => 'nullable|string|max:255',
        'heading' => 'nullable|string|max:255',
        'highlight_1' => 'nullable|string|max:255',
        'highlight_2' => 'nullable|string|max:255',
        'highlight_3' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'sub_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'button_link_1' => 'nullable|string',
        'button_link_2' => 'nullable|string',
    ];

    public function edit()
    {
        $validatedData = $this->validate();

        try {
            $this->hero->update($validatedData);

            if ($this->image) {
                $newImagePath = $this->image->store('hero', 'public');

                if ($this->hero->image) {
                    Storage::disk('public')->delete($this->hero->image);
                }

                $this->hero->image = $newImagePath;
            }

            if ($this->sub_image) {
                $newSubImagePath = $this->sub_image->store('hero', 'public');

                if ($this->hero->sub_image) {
                    Storage::disk('public')->delete($this->hero->sub_image);
                }

                $this->hero->sub_image = $newSubImagePath;
            }

            $this->hero->save();

            session()->flash('success', 'Hero "' . $this->title . '"Updated Successfully');
            return Redirect::route('admin.get-hero');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Failed to update Hero : " . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.hero.edit-hero')->extends('backend.layouts.app');
    }
}
