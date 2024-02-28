<?php

namespace App\Http\Livewire\Backend\Sections\OurTeam;

use App\Models\PageTypes;
use Livewire\Component;

class GetOurTeam extends Component
{

    public $page_type_id;

    public function mount()
    {
        $this->types = PageTypes::all();
    }
    public function render()
    {
        return view('livewire.backend.sections.our-team.get-our-team')->extends('backend.layouts.app');
    }
}
