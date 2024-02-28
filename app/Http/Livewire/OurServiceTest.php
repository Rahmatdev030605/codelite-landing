<?php

namespace App\Http\Livewire;

use App\Models\OurService;
use App\Models\PageType;
use App\Models\pageTypes;
use Livewire\Component;
use Livewire\WithFileUploads;

class OurServiceTest extends Component
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

    public function mount()
    {
        $this->types = pageTypes::all();
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
        $validatedData = $this->validate();

        try {
            $service = OurService::create($validatedData);

            if ($this->image) {
                $imagePath = $this->image->store('public/image/ourServices');
                $service->image = str_replace('public/', '', $imagePath);
                $service->save();
            }

            session()->flash('success', 'Our Service Added Successfully');
            return redirect()->route('admin.get-our-service');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Our Service: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.our-service-test')->extends('backend.layouts.app');
    }
}

