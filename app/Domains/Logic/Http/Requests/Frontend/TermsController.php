<?php

namespace App\Domains\Logic\Http\Requests\Frontend;

/**
 * Class TermsController.
 */
class TermsController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.pages.terms');
    }
}
