<?php

namespace App\Http\Livewire\Backend\Sections\OurCompany;

use App\Models\OurCompany;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditOurCompany extends Component
{
    use WithFileUploads;

    public $company;
    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $sub_heading;
    public $desc;
    public $image;
    public $types;
    public $button_link;

    public function mount($id)
    {
        $company = OurCompany::findOrFail($id);

        $this->company = $company;
        $this->page_type_id = $company->page_type_id;
        $this->status = $company->status;
        $this->title = $company->title;
        $this->heading = $company->heading;
        $this->sub_heading = $company->sub_heading;
        $this->desc = $company->desc;
        $this->image = $company->image;
        $this->button_link = $company->button_link;

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

    public function edit()
    {
        $validatedData = $this->validate();

        try {
            $this->company->update($validatedData);

            if ($this->image) {
                $newImagePath = $this->image->store('ourCompany', 'public');

                if ($this->company->image) {
                    Storage::disk('public')->delete($this->company->image);
                }
                $this->company->image = $newImagePath;
            }
            $this->company->save();

            session()->flash('success', 'Our Company"' . $this->title . '" Updated Successfully');
            return Redirect::route('admin.get-our-company');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Failed to update Our Company : " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.sections.our-company.edit-our-company')->extends('backend.layouts.app');
    }
}
