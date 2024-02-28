<?php

namespace App\Http\Livewire\Backend\Sections\Hero;

use App\Models\PageTypes;
use Livewire\Component;

class GetHero extends Component
{
    public $page_types_id;
    public function mount()
    {
        $this->types = PageTypes::all();
    }
    public function render()
    {
        return view('livewire.backend.sections.hero.get-hero')->extends('backend.layouts.app');
    }
}
