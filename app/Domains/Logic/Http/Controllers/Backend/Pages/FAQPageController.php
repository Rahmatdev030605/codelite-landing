<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Pages;

use App\Domains\Logic\Http\Requests\Frontend\Controller;
use App\Models\FaqForm;
use Illuminate\Http\Request;

class FAQPageController extends Controller
{
    public function getFAQForm()
    {
        $faq = FaqForm::first();

        return view('backend.layouts.pages.faq.faq', compact('faq'));
    }

    public function editFaqForm(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'faq_bef_title' => 'string|max:255',
                'faq_title' => 'string|max:255',
                'faq_desc' => 'string',
                'faq_section_bef_title' => 'string|max:255',
                'faq_section_title' => 'string|max:255',
                'our_services_title' => 'string|max:255',
                'our_services_desc_frs' => 'string',
                'our_services_desc_sec' => 'string',
            ]);

            $DBFaq = FaqForm::findOrFail($id);
            $DBFaq->update($validateData);

            return redirect()->route('admin.dashboard')->with('success', 'FAQ updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update FAQ ' . $e->getMessage());
        }
    }
}
