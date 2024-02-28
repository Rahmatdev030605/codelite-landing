<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\AboutUsForm;
use App\Models\BlogForm;
use App\Models\CareerForm;
use App\Models\Jobs;
use App\Models\PartnersForm;
use App\Models\TeamForm;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //section pages
    public function getFormAboutUs()
    {
        $about = AboutUsForm::first();
        $publicImg = 'img/company/';

        if ($about) {
            $about->our_company_image = $publicImg . basename($about->our_company_image);
        }
        return view('backend.layouts.pages.company.about', compact('about'));
    }

    public function editAboutUs(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'company_bef_title' => 'string|max:255',
                'company_title' => 'string|max:255',
                'company_desc' => 'string',
                'our_company_bef_title' => 'string|max:255',
                'our_company_title' => 'string|max:255',
                'our_company_sub' => 'string',
                'our_company_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'our_company_desc' => 'string',
                'service_bef_title' => 'string|max:255',
                'service_title' => 'string|max:255',
                'service_desc' => 'string',
                'our_team_bef_title' => 'string|max:255',
                'our_team_title' => 'string|max:255',
                'our_team_desc' => 'string',
                'our_service_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'our_service_title' => 'string|max:255',
                'our_service_desc_frs' => 'string',
                'our_service_desc_sec' => 'string',
                'team_title' => 'string|max:255',
                'team_desc' => 'string',
            ]);

            $DBAbout = AboutUsForm::findOrFail($id);

            if ($request->hasFile('our_company_image')) {
                $aboutUsImage = $request->file('our_company_image');
                if ($aboutUsImage->isValid()) {
                    $aboutUsImageName = $aboutUsImage->getClientOriginalName();
                    $aboutUsImage->move('img/company', $aboutUsImageName);
                    $aboutUsImagePath = '/img/company/' . $aboutUsImageName;
                    $validateData['our_company_image'] = url($aboutUsImagePath);

                    if (!empty($DBAbout->our_company_image)) {
                        $oldImagePath = public_path('img/company/') . basename($DBAbout->our_company_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }
            if ($request->hasFile('our_service_image')) {
                $aboutUsImage = $request->file('our_service_image');
                if ($aboutUsImage->isValid()) {
                    $aboutUsImageName = $aboutUsImage->getClientOriginalName();
                    $aboutUsImage->move('img/company', $aboutUsImageName);
                    $aboutUsImagePath = '/img/company/' . $aboutUsImageName;
                    $validateData['our_service_image'] = url($aboutUsImagePath);

                    if (!empty($DBAbout->our_service_image)) {
                        $oldImagePath = public_path('img/company/') . basename($DBAbout->our_service_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }

            $DBAbout->update($validateData);

            return redirect()->route('admin.company')->with('success', 'About Us updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update About Us: ' . $e->getMessage());
        }
    }




    public function getJobForm()
    {
        return view('backend.layouts.company.jobs.addJobs');
    }


    public function getJobs(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = Jobs::query();

        if ($search) {
            $query->where('job_name', 'like', '%' . $search . '%');
        }

        switch ($sort) {
            case 'ascending':
                $query->orderBy('job_name');
                break;
            case 'descending':
                $query->orderByDesc('job_name');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->orderBy('job_name');
                break;
        }

        $jobs = $query->paginate(9);

        return view('backend.layouts.company.jobs.jobs', compact('jobs', 'sort'));
    }

    public function getBlog()
    {
        return view('backend.layouts.blog.blog');
    }

    public function getPartner()
    {
        return view('backend.layouts.company.partner');
    }

    public function getPartnerForm()
    {
        $partner = PartnersForm::first();
        $publicImg = 'img/company/';

        if ($partner) {
            $partner->our_partner_image = $publicImg . basename($partner->our_partner_image);
            $partner->partners_trust_image = $publicImg . basename($partner->partners_trust_image);
        }
        return view('backend.layouts.pages.company.partner', compact('partner'));
    }

    public function editPartnerForm(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'partner_bef_title' => 'string|max:255',
                'partner_title' => 'string|max:255',
                'partner_desc' => 'string',
                'our_partner_bef_title' => 'string|max:255',
                'our_partner_title' => 'string|max:255',
                'our_partner_sub' => 'string',
                'our_partner_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'our_partner_desc' => 'string',
                'partners_trusted_bef_title' => 'string|max:255',
                'partners_trusted_title' => 'string|max:255',
                'partners_trusted_desc' => 'string',
                'partners_trust_title' => 'string|max:255',
                'partners_trust_desc_firs' => 'string',
                'partners_trust_desc_secn' => 'string',
                'partners_trust_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'team_title' => 'string|max:255',
                'team_desc' => 'string',
            ]);
            $DBPartner = PartnersForm::findOrFail($id);

            if ($request->hasFile('our_partner_image')) {
                $partnerImage = $request->file('our_partner_image');
                if ($partnerImage->isValid()) {
                    $partnerImageName = $partnerImage->getClientOriginalName();
                    $partnerImage->move('img/company', $partnerImageName);
                    $partnerImagePath = '/img/company/' . $partnerImageName;
                    $validateData['our_partner_image'] = url($partnerImagePath);

                    if (!empty($DBPartner->our_partner_image)) {
                        $oldImagePath = public_path('img/company/') . basename($DBPartner->our_partner_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }
            if ($request->hasFile('partners_trust_image')) {
                $partnerImage = $request->file('partners_trust_image');
                if ($partnerImage->isValid()) {
                    $partnerImageName = $partnerImage->getClientOriginalName();
                    $partnerImage->move('img/company', $partnerImageName);
                    $partnerImagePath = '/img/company/' . $partnerImageName;
                    $validateData['partners_trust_image'] = url($partnerImagePath);

                    if (!empty($DBPartner->partners_trust_image)) {
                        $oldImagePath = public_path('img/company/') . basename($DBPartner->partners_trust_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }
            $DBPartner->update($validateData);

            return redirect()->route('admin.company')->with('success', 'Partner updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Partner: ' . $e->getMessage());
        }
    }

    public function getTeamForm()
    {
        $team = TeamForm::first();
        return view('backend.layouts.pages.company.team', compact('team'));
    }

    public function editTeamForm(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'team_bef_title' => 'string|max:255',
                'team_title' => 'string|max:255',
                'team_desc' => 'string',
                'leadership_bef_title' => 'string|max:255',
                'leadership_title' => 'string|max:255',
                'leadership_desc' => 'string',
                'features_bef_title' => 'string|max:255',
                'features_title' => 'string|max:255',
                'feature_desc' => 'string',
                'our_team_bef_title' => 'string|max:255',
                'our_team_title' => 'string|max:255',
                'our_team_desc' => 'string',
            ]);

            $DBTeam = TeamForm::findOrFail($id);
            $DBTeam->update($validateData);

            return redirect()->route('admin.company')->with('success', 'Team updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Team: ' . $e->getMessage());
        }
    }

    public function getBlogForm()
    {
        $blog = BlogForm::first();

        return view('backend.layouts.pages.company.blog', compact('blog'));
    }

    public function editBlogForm(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'blog_bef_title' => 'string|max:255',
                'blog_bef_title' => 'string|max:255',
                'blog_desc' => 'string',
                'featured_product_bef_title' => 'string|max:255',
                'featured_product_title' => 'string|max:255',
            ]);

            $DBBlog = BlogForm::findOrFail($id);
            $DBBlog->update($validateData);

            return redirect()->route('admin.company')->with('success', 'Blog updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Blog: ' . $e->getMessage());
        }
    }

    public function getCareerForm()
    {
        $career = CareerForm::first();
        $publicImg = 'img/company/';

        if ($career) {
            $career->our_team_image = $publicImg . basename($career->our_team_image);
        }
        return view('backend.layouts.pages.company.career', compact('career'));
    }

    public function editCareerForm(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'career_bef_title' => 'string|max:255',
                'career_title' => 'string|max:255',
                'career_desc' => 'string',
                'our_team_image' => 'image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
                'our_team_desc' => 'string',
                'service_bef_title' => 'string|max:255',
                'service_title' => 'string|max:255',
                'service_desc' => 'string',
                'job_bef_title' => 'string|max:255',
                'job_title' => 'string|max:255',
                'our_services_title' => 'string|max:255',
                'our_desc_first' => 'string',
                'our_desc_second' => 'string',
            ]);

            $DBCareer = CareerForm::findOrFail($id);

            if ($request->hasFile('our_team_image')) {
                $careerImage = $request->file('our_team_image');
                if ($careerImage->isValid()) {
                    $careerImageName = $careerImage->getClientOriginalName();
                    $careerImage->move('img/company', $careerImageName);
                    $careerImagePath = '/img/company/' . $careerImageName;
                    $validateData['our_team_image'] = url($careerImagePath);

                    if (!empty($DBCareer->our_team_image)) {
                        $oldImagePath = public_path('img/company/') . basename($DBCareer->our_team_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid hero image file');
                }
            }
            // dd($validateData);
            $DBCareer->update($validateData);
            return redirect()->route('admin.company')->with('success', 'Career updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Blog: ' . $e->getMessage());
        }
    }


    public function getCertificate()
    {
        return view('backend.layouts.about.certificate');
    }

    public function getProduct()
    {
        return view('backend.layouts.company.product.product');
    }

    public function getCareer()
    {
        return view('backend.layouts.company.career.careers');
    }
}
