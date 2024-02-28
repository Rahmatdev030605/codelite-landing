<?php

namespace App\Http\Livewire\Backend\Sections\OurModel;

use App\Models\OurModel;
use App\Models\PageTypes;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditOurModel extends Component
{
    use WithFileUploads;

    public $page_type_id;
    public $status;
    public $title;
    public $heading;
    public $sub_heading;
    public $types;
    public $button_link;
    public $model;

    public function mount($id)
    {
        $model = OurModel::findOrFail($id);
        $this->model = $model;
        $this->page_type_id = $model->page_type_id;
        $this->status = $model->status;
        $this->title = $model->title;
        $this->heading = $model->heading;
        $this->sub_heading = $model->sub_heading;
        $this->button_link = $model->button_link;

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

    public function edit()
    {
        $validatedData = $this->validate();
        try {
            $this->model->update($validatedData);
            $this->model->save();
            session()->flash('success', 'Our Model "' . $this->title . '" Updated Successfully');
            return Redirect::route('admin.get-our-model');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Failed to update Our Model : " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.sections.our-model.edit-our-model')->extends('backend.layouts.app');
    }
}
