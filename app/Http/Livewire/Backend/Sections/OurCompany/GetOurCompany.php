<?php

namespace App\Http\Livewire\Backend\Sections\OurCompany;

use App\Models\PageTypes;
use Livewire\Component;

class GetOurCompany extends Component
{

    public $page_types_id;
    public function mount()
    {
        $this->types = PageTypes::all();
    }
    public function render()
    {
        return view('livewire.backend.sections.our-company.get-our-company')->extends('backend.layouts.app');
    }
}
