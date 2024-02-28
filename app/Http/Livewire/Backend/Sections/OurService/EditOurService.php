<?php

namespace App\Http\Livewire\Backend\Sections\OurService;

use App\Models\OurService;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditOurService extends Component
{
    use WithFileUploads;

    public $service;
    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $description;
    public $description_second;
    public $image;
    public $types;
    public $button_link;

    public function mount($id)
    {
        $service = OurService::findOrFail($id);

        $this->service = $service;
        $this->page_type_id = $service->page_type_id;
        $this->status = $service->status;
        $this->title = $service->title;
        $this->heading = $service->heading;
        $this->description = $service->description;
        $this->description_second = $service->description_second;
        $this->image = $service->image;
        $this->button_link = $service->button_link;

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

    public function edit()
    {
        $validatedData = $this->validate();

        try {
            $this->service->update($validatedData);

            if ($this->image) {
                $newImagePath = $this->image->store('ourService', 'public');

                if ($this->service->image) {
                    Storage::disk('public')->delete($this->service->image);
                }
                $this->service->image = $newImagePath;
            }

            $this->service->save();

            session()->flash('success', 'Our Service"' . $this->title . '" Updated Successfully');
            return redirect()->route('admin.get-our-service');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Failed to update Our Services : " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.sections.our-service.edit-our-service')->extends('backend.layouts.app');
    }
}
