<?php

namespace App\Http\Livewire\Backend\Sections\OurModel;

use App\Models\PageTypes;
use Livewire\Component;

class GetOurModel extends Component
{
    public $page_type_id;
    public function mount()
    {
        $this->types = PageTypes::all();
    }
    public function render()
    {
        return view('livewire.backend.sections.our-model.get-our-model')->extends('backend.layouts.app');
    }
}
