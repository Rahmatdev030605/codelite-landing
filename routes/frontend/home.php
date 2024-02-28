<?php

use App\Domains\Logic\Http\Requests\Frontend\HomeController;
use App\Domains\Logic\Http\Requests\Frontend\TermsController;
use App\Http\Controllers\CobaController;
use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

// View untuk kepentingan Layouting

//Header
Route::view('/business-consulting', 'frontend.pages.businessConsulting')->name('businessConsulting');
Route::view('/company', 'frontend.pages.company')->name('company');
Route::view('/about', 'frontend.pages.about')->name('about');
Route::view('/partners', 'frontend.pages.partners')->name('partners');
Route::view('/careers', 'frontend.pages.careers')->name('careers');
Route::view('/events', 'frontend.pages.events')->name('events');
Route::view('/team', 'frontend.pages.team')->name('team');
Route::view('/blog', 'frontend.pages.blog')->name('blog');
Route::view('/overview', 'frontend.pages.overview')->name('overview');
Route::view('/pricing', 'frontend.pages.pricing')->name('pricing');
Route::view('/features', 'frontend.pages.features')->name('features');
Route::view('/case-studies', 'frontend.pages.caseStudies')->name('caseStudies');
Route::view('/new-releases', 'frontend.pages.newReleases')->name('newReleases');
Route::view('/solutions', 'frontend.pages.solutions')->name('solutions');
Route::view('/case-studie-single', 'frontend.pages.caseStudieSingle')->name('caseStudieSingle');
Route::view('/portfolio', 'frontend.pages.portfolio')->name('portfolio');
Route::view('/detail-portfolio', 'frontend.pages.detailPortfolio')->name('detailPortfolio');
Route::view('/faq', 'frontend.pages.faq')->name('faq');
Route::view('/contact', 'frontend.pages.contact')->name('contact');
Route::view('/service', 'frontend.pages.service')->name('service');
Route::view('/service-detail', 'frontend.pages.serviceDetail')->name('serviceDetail');
Route::view('/our-field', 'frontend.pages.ourField')->name('ourField');
// Route::view('/coba', 'frontend.pages.coba',)->name('coba');
// Route::get('/coba', [CobaController::class, 'getUsers'])->name('coba');
Route::view('/how-we-do-detail', 'frontend.pages.howWeDoDetail')->name('howWeDoDetail');
// Route::view('/coba-api', 'frontend.pages.coba',)->name('cobaApi');
Route::get('/getCoba', [CobaController::class, 'getCoba'])->name('getCoba');

//Home Page
Route::view('/contact', 'frontend.pages.contact')->name('contact');
Route::view('/how-we-do', 'frontend.pages.howWeDo')->name('howWeDo');
Route::view('/blog-detail', 'frontend.pages.blogDetail')->name('blogDetail');

//Event Page
Route::view('/event-detail', 'frontend.pages.eventDetail')->name('eventDetail');

//Blog Page
Route::view('/blog-detail', 'frontend.pages.blogDetail')->name('blogDetail');

//Portfolio Page
Route::view('/detail-portfolio', 'frontend.pages.detailPortfolio')->name('detailPortfolio');
