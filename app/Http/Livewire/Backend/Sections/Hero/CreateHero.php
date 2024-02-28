<?php

namespace App\Http\Livewire\Backend\Sections\Hero;

use App\Models\Hero;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateHero extends Component
{

    use WithFileUploads;

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

    public function mount()
    {
        $this->types  = PageTypes::all();
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

    public function save()
    {
        try {
            $validatedData = $this->validate();

            $hero = Hero::create($validatedData);

            if ($this->image) {
                $imagePath = $this->image->store('hero', 'public');
                $hero->image = $imagePath;
            }

            if ($this->sub_image) {
                $subImagePath = $this->sub_image->store('hero', 'public');
                $hero->sub_image = $subImagePath;
            }

            $hero->save();

            session()->flash('success', 'Hero "' .$this->title . '" Added Successfully');
            return Redirect::route('admin.get-hero');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Hero: ' . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.hero.create-hero')->extends('backend.layouts.app');
    }
}
