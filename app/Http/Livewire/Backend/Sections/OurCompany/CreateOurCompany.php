<?php

namespace App\Http\Livewire\Backend\Sections\OurCompany;

use App\Models\OurCompany;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOurCompany extends Component
{
    use WithFileUploads;

    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $sub_heading;
    public $desc;
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
        'sub_heading' => 'nullable|string',
        'desc' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'button_link' => 'nullable|string',
    ];

    public function save()
    {
        try {
            $validatedData = $this->validate();

            $company = OurCompany::create($validatedData);

            if ($this->image) {
                $imagePath = $this->image->store('ourCompany', 'public');
                $company->image = $imagePath;
            }

            $company->save();

            session()->flash('success', 'Our "' .$this->title . '" Company Added Successfully');
            return Redirect::route('admin.get-our-company');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Our Company: ' . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.backend.sections.our-company.create-our-company')->extends('backend.layouts.app');
    }
}
