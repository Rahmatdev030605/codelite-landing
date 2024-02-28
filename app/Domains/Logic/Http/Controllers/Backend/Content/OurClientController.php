<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;

class OurClientController extends Controller
{
    public function getOurClient()
    {
        return view('backend.layouts.content.ourClient.ourClient');
    }

    public function editOurClient()
    {
        return view('backend.layouts.content.ourClient.editOurClient');
    }

    public function newOurClient()
    {
        return view('backend.layouts.content.ourClient.newOurClient');
    }
}
