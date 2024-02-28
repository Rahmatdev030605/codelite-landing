<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\HomeBusinessConsulting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getHomeITservice()
    {
        $homes = Home::first();
        $publicImg = 'img/home/';

        if ($homes) {
            $homes->hero_image = $publicImg . basename($homes->hero_image);
            $homes->hero_sub_image = $publicImg . basename($homes->hero_sub_image);
        }
        return view('backend.layouts.pages.home.ITservice.home', compact('homes'));
    }

    public function getHomeBusinessConsulting()
    {
        $homes = HomeBusinessConsulting::first();

        return view('backend.layouts.pages.home.businessConsulting.home', compact('homes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editHome(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'hero_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'hero_sub_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'hero_bef_title' => 'string|max:255',
                'hero_title' => 'string|max:255',
                'hero_desc' => 'string',
                'our_mdl_bef_title' => 'string|max:255',
                'our_mdl_title' => 'string|max:255',
                'our_mdl_sub_title' => 'string|max:255',
                'product_bef_title' => 'string|max:255',
                'product_title' => 'string|max:255',
                'consult_client_bef_title' => 'string|max:255',
                'consult_client_title' => 'string|max:255',
                'consult_client_desc' => 'string',
                'project_bef_title' => 'string|max:255',
                'project_title' => 'string|max:255',
                'project_desc' => 'string',
                'article_bef_title' => 'string|max:255',
                'article_title' => 'string|max:255',
                'article_desc' => 'string',
                'service_bef_title' => 'string|max:255',
                'service_title' => 'string|max:255',
                'service_desc' => 'string|max:255',
            ]);

            $home = Home::findOrFail($id);

            if ($request->hasFile('hero_image')) {
                $heroImage = $request->file('hero_image');
                if ($heroImage->isValid()) {
                    $heroImageName = $heroImage->getClientOriginalName();
                    $heroImage->move('img/home', $heroImageName);
                    $validatedData['hero_image'] = '/img/home/' . $heroImageName;
                    // Hapus file lama jika ada
                    if (!empty($home->hero_image)) {
                        $oldImagePath = public_path($home->hero_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }

            if ($request->hasFile('hero_sub_image')) {
                $heroSubImage = $request->file('hero_sub_image');
                if ($heroSubImage->isValid()) {
                    $heroSubImageName = $heroSubImage->getClientOriginalName();
                    $heroSubImage->move('img/home', $heroSubImageName);
                    $validatedData['hero_sub_image'] = '/img/home/' . $heroSubImageName;
                    if (!empty($home->hero_sub_image)) {
                        $oldImagePath = public_path($home->hero_sub_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero sub image file');
                }
            }

            $home->update($validatedData);
            return redirect()->route('admin.home')->with('success', 'Home IT service updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Home Page');
        }
    }


    public function editHomeBusinessConsulting(Request $request, $id)
    {
        try {
            $validateDate = $request->validate([
                'hero_bef_title' => 'string|max:255',
                'hero_title' => 'string|max:255',
                'hero_desc' => 'string',
                'client_companies' => 'string|max:255',
                'our_service_bef_title' => 'string|max:255',
                'our_service_title' => 'string|max:255',
                'our_service_desc' => 'string',
                'company    _spec_bef_title' => 'string|max:255',
                'company_spec_title' => 'string|max:255',
                'consult_client_bef_title' => 'string|max:255',
                'consult_client_title' => 'string|max:255',
                'news_bef_title' => 'string|max:255',
                'news_title' => 'string|max:255',
                'news_desc' => 'string',
                'portfolio_bef_title' => 'string|max:255',
                'portfolio_title' => 'string|max:255',
                'portfolio_desc' => 'string',
                'our_team_bef_title' => 'string|max:255',
                'our_team_title' => 'string|max:255',
                'our_team_desc' => 'string',
                'testimonial_bef_title' => 'string|max:255',
                'testimonial_title' => 'string|max:255',
                'testimonial_desc' => 'string',
                'contact_bef_title' => 'string|max:255',
                'contact_title' => 'string|max:255',
                'contact_desc' => 'string',
            ]);

            $DBHome = HomeBusinessConsulting::findOrFail($id);
            $DBHome->update($validateDate);
            // dd($validateDate);

            return redirect()->route('admin.home')->with('success', 'Home Business Consulting updated Successfully');
            dd($validateDate);
        } catch (\Exception $e) {
            $errorMessage =  $e->getMessage();
            $errorTrace =  $e->getTraceAsString();
            return redirect()->back()->with('error', 'Failed to update Home Page' . $errorMessage . ' Jejak Panggilan: ' . $errorTrace);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
