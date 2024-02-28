<?php

namespace App\Http\Livewire\Backend\Sections\OurService;

use App\Models\PageTypes;
use Livewire\Component;

class GetOurService extends Component
{

    public $page_type_id;

    public function  mount()
    {
        $this->types = PageTypes::all();
    }
    public function render()
    {
        return view('livewire.backend.sections.our-service.get-our-service')->extends('backend.layouts.app');
    }
}
