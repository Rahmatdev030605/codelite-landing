<?php

namespace App\Http\Livewire\Backend\Sections\OurService;

use App\Models\OurService;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOurService extends Component
{

    use WithFileUploads;

    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $description;
    public $description_second;
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
        'description_second' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'button_link' => 'nullable|string',
    ];

    public function save()
    {
        try {
            $validatedData = $this->validate();

            $service = OurService::create($validatedData);

            if ($this->image) {
                $imagePath = $this->image->store('ourService', 'public');
                $this->service->image = $imagePath;
            }

            $service->save();

            session()->flash('success', 'Our "' .$this->title . '" Service Added Successfully');
            return Redirect::route('admin.get-our-service');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Our Service: ' . $th->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.backend.sections.our-service.create-our-service')->extends('backend.layouts.app');
    }
}
