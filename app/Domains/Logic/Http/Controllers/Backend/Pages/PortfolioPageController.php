<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Pages;

use App\Domains\Logic\Http\Requests\Frontend\Controller;
use App\Models\EcommerceForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioPageController extends Controller
{
    public function getEcommerceForm()
    {
        $ecommerce = EcommerceForm::first();

        $publicImg = 'img/portfolio/';

        if ($ecommerce) {
            $ecommerce->portfolio_image = $publicImg . basename($ecommerce->portfolio_image);
        }
        return view('backend.layouts.pages.portfolio.ecommerce', compact('ecommerce'));
    }

    public function editEcommerceForm(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'portfolio_bef_title' => 'string|:max:255',
                'portfolio_title' => 'string|:max:255',
                'portfolio_desc' => 'string',
                'portfolio_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'project_bef_title' => 'string|:max:255',
                'project_title' => 'string|:max:255',
                'project_desc' => 'string',
            ]);

            $DBEcommerce = EcommerceForm::findOrFail($id);

            if ($request->hasFile('portfolio_image')) {
                $ecommerceImage = $request->file('portfolio_image');
                if ($ecommerceImage->isValid()) {
                    $ecommerceImageName = $ecommerceImage->getClientOriginalName();
                    $ecommerceImage->move('img/portfolio', $ecommerceImageName);
                    $ecommerceImagePath = '/img/portfolio/' . $ecommerceImageName;
                    $validateData['portfolio_image'] = url($ecommerceImagePath);

                    if (!empty($DBEcommerce->portfolio_image)) {
                        $oldImagePath = public_path('img/portfolio/') . basename($DBEcommerce->portfolio_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }

            $DBEcommerce->update($validateData);

            return redirect()->route('admin.portfolio-pages')->with('success', 'E-Commerce updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update E-Commerce: ' . $e->getMessage());
        }
    }

    public function getDevelopmentForm()
    {
        return view('backend.layouts.pages.portfolio.development');
    }
}
