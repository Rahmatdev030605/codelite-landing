<?php

namespace App\Domains\Logic\Http\Requests\Frontend;

/**
 * Class LocaleController.
 */
class LocaleController
{
    /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change($locale)
    {
        app()->setLocale($locale);

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
