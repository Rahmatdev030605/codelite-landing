<?php

namespace App\Http\Livewire\Backend\Sections\OurModel;

use App\Models\OurModel;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOurModel extends Component
{
    use WithFileUploads;
    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $sub_heading;
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
        'button_link' => 'nullable|string',
    ];

    public function save()
    {
        try {
            $validatedData = $this->validate();

            $model = OurModel::create($validatedData);

            $model->save();
            session()->flash('success', 'Our "' . $this->title . '" Model Added Successfully');
            return Redirect::route('admin.get-our-model');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to Add Our Model: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.sections.our-model.create-our-model')->extends('backend.layouts.app');
    }
}
