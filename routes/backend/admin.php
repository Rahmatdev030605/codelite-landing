<?php

use App\Domains\Logic\Http\Controllers\Backend\Services\ServiceController;
use App\Domains\Logic\Http\Controllers\Backend\Company\Partner\PartnersController;
use App\Domains\Logic\Http\Controllers\Backend\Company\AboutUs\AboutUsController;
use App\Domains\Logic\Http\Controllers\Backend\Company\GeneralSetting\PageTypeController;
use App\Domains\Logic\Http\Controllers\Backend\Company\Medsos\MedsosController;
use App\Domains\Logic\Http\Controllers\Backend\Company\Product\ProductController;
use App\Domains\Logic\Http\Controllers\Backend\Company\Teams\TeamsController;
use App\Domains\Logic\Http\Controllers\Backend\Content\ArticleSectionController;
use App\Domains\Logic\Http\Controllers\Backend\Content\AssistanceController;
use App\Domains\Logic\Http\Controllers\Backend\Content\CaseStudiesController;
use App\Domains\Logic\Http\Controllers\Backend\Content\ConsultingController;
use App\Domains\Logic\Http\Controllers\Backend\Content\FeaturedProductController;
use App\Domains\Logic\Http\Controllers\Backend\Content\HeroController;
use App\Domains\Logic\Http\Controllers\Backend\Content\LeadershipSectionController;
use App\Domains\Logic\Http\Controllers\Backend\Content\LetsStartedController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurClientController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurCompanyController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurModelController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurPricingController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurServiceController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurTeamController;
use App\Domains\Logic\Http\Controllers\Backend\Content\OurTrueWordController;
use App\Domains\Logic\Http\Controllers\Backend\Content\ProjectsController;
use App\Domains\Logic\Http\Controllers\Backend\Content\WhatOfferingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Livewire\Backend\Sections\Hero\CreateHero;
use App\Http\Livewire\Backend\Sections\Hero\DeleteHero;
use App\Http\Livewire\Backend\Sections\Hero\EditHero;
use App\Http\Livewire\Backend\Sections\Hero\GetHero;
use App\Http\Livewire\Backend\Sections\OurCompany\CreateOurCompany;
use App\Http\Livewire\Backend\Sections\OurCompany\DeleteOurCompany;
use App\Http\Livewire\Backend\Sections\OurCompany\EditOurCompany;
use App\Http\Livewire\Backend\Sections\OurCompany\GetOurCompany;
use App\Http\Livewire\Backend\Sections\OurModel\CreateOurModel;
use App\Http\Livewire\Backend\Sections\OurModel\DeleteOurModel;
use App\Http\Livewire\Backend\Sections\OurModel\EditOurModel;
use App\Http\Livewire\Backend\Sections\OurModel\GetOurModel;
use App\Http\Livewire\Backend\Sections\OurService\CreateOurService;
use App\Http\Livewire\Backend\Sections\OurService\DeleteOurService;
use App\Http\Livewire\Backend\Sections\OurService\EditOurService;
use App\Http\Livewire\Backend\Sections\OurService\GetOurService;
use App\Http\Livewire\Backend\Sections\OurTeam\CreateOurTeam;
use App\Http\Livewire\Backend\Sections\OurTeam\DeleteOurTeam;
use App\Http\Livewire\Backend\Sections\OurTeam\EditOurTeam;
use App\Http\Livewire\Backend\Sections\OurTeam\GetOurTeam;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });


/************Content********** */

//hero


Route::get('our-client', [OurClientController::class, 'getOurClient'])
    ->name('get-our-client');
Route::get('our-client/edit', [OurClientController::class, 'editOurClient'])
    ->name('edit-our-client');
Route::get('our-client/new', [OurClientController::class, 'newOurClient'])
    ->name('new-our-client');

//our services


//What we're offering
Route::get('what-were-offering', [WhatOfferingController::class, 'getWhatOffering'])
    ->name('get-what-offering');
Route::get('what-were-offering/show', [WhatOfferingController::class, 'showWhatOffering'])
    ->name('show-what-offering');
Route::get('what-were-offering/edit/{id}', [WhatOfferingController::class, 'editWhatOffering'])
    ->name('edit-what-offering');
Route::put('what-were-offering/update/{id}', [WhatOfferingController::class, 'updateWhatOffering'])
    ->name('update-what-offering');
Route::get('what-were-offering/new', [WhatOfferingController::class, 'newWhatOffering'])
    ->name('new-what-offering');
Route::post('what-were-offering/store', [WhatOfferingController::class, 'storeWhatOffering'])
    ->name('store-what-offering');
Route::delete('what-were-offering/delete/{id}', [WhatOfferingController::class, 'storeWhatOffering'])
    ->name('delete-what-offering');


//leadership
Route::get('leadership', [LeadershipSectionController::class, 'getLeadership'])
    ->name('get-leadership');
Route::get('leadership/show', [LeadershipSectionController::class, 'showLeadership'])
    ->name('show-leadership');
Route::get('leadership/new', [LeadershipSectionController::class, 'newLeadership'])
    ->name('new-leadership');
Route::post('leadership/store', [LeadershipSectionController::class, 'storeLeadership'])
    ->name('store-leadership');
Route::get('leadership/edit/{id}', [LeadershipSectionController::class, 'editLeadership'])
    ->name('edit-leadership');
Route::put('leadership/update/{id}', [LeadershipSectionController::class, 'updateLeadership'])
    ->name('update-leadership');
Route::delete('leadership/delete/{id}', [LeadershipSectionController::class, 'deleteLeadership'])
    ->name('delete-leadership');

Route::get('assistance', [AssistanceController::class, 'getAssistance'])
    ->name('get-assistance');
Route::get('assistance/show', [AssistanceController::class, 'showAssistance'])
    ->name('show-assistance');
Route::get('assistance/new', [AssistanceController::class, 'newAssistance'])
    ->name('new-assistance');
Route::post('assistance/store', [AssistanceController::class, 'storeAssistance'])
    ->name('store-assistance');
Route::get('assistance/edit/{id}', [AssistanceController::class, 'editAssistance'])
    ->name('edit-assistance');
Route::put('assistance/update/{id}', [AssistanceController::class, 'updateAssistance'])
    ->name('update-assistance');
Route::delete('assistance/delete/{id}', [AssistanceController::class, 'editAssistance'])
    ->name('delete-assistance');

//our true
Route::get('our-true-word', [OurTrueWordController::class, 'getOurTrue'])
    ->name('get-our-true');
Route::get('our-true-word/show', [OurTrueWordController::class, 'showOurTrue'])
    ->name('show-our-true');
Route::get('our-true-word/new', [OurTrueWordController::class, 'newOurTrue'])
    ->name('new-our-true');
Route::post('our-true-word/store', [OurTrueWordController::class, 'storeOurTrue'])
    ->name('store-our-true');
Route::get('our-true-word/edit/{id}', [OurTrueWordController::class, 'editOurTrue'])
    ->name('edit-our-true');
Route::put('our-true-word/update/{id}', [OurTrueWordController::class, 'updateOurTrue'])
    ->name('update-our-true');
Route::delete('our-true-word/delete/{id}', [OurTrueWordController::class, 'deleteOurTrue'])
    ->name('delete-our-true');

//our pricing
Route::get('our-pricing', [OurPricingController::class, 'getOurPricing'])
    ->name('get-our-pricing');
Route::get('our-pricing/show', [OurPricingController::class, 'showOurPricing'])
    ->name('show-our-pricing');
Route::get('our-pricing/new', [OurPricingController::class, 'newOurPricing'])
    ->name('new-our-pricing');
Route::post('our-pricing/store', [OurPricingController::class, 'storeOurPricing'])
    ->name('store-our-pricing');
Route::get('our-pricing/edit/{id}', [OurPricingController::class, 'editOurPricing'])
    ->name('edit-our-pricing');
Route::put('our-pricing/update/{id}', [OurPricingController::class, 'updateOurPricing'])
    ->name('update-our-pricing');
Route::delete('our-pricing/delete/{id}', [OurPricingController::class, 'deleteOurPricing'])
    ->name('delete-our-pricing');



//projects
Route::get('projects', [ProjectsController::class, 'getProject'])
    ->name('get-project-section');
Route::get('projects/show', [ProjectsController::class, 'showProject'])
    ->name('show-project-section');
Route::get('projects/new', [ProjectsController::class, 'newProject'])
    ->name('new-project-section');
Route::post('projects/store', [ProjectsController::class, 'storeProject'])
    ->name('store-project-section');
Route::get('projects/edit/{id}', [ProjectsController::class, 'editProject'])
    ->name('edit-project-section');
Route::put('projects/update/{id}', [ProjectsController::class, 'updateProject'])
    ->name('update-project-section');
Route::delete('projects/delete/{id}', [ProjectsController::class, 'deleteProject'])
    ->name('delete-project-section');

//featured product
Route::get('featured-product', [FeaturedProductController::class, 'getFeatured'])
    ->name('get-featured-product');
Route::get('featured-product/show', [FeaturedProductController::class, 'showFeatured'])
    ->name('show-featured-product');
Route::get('featured-product/new', [FeaturedProductController::class, 'newFeatured'])
    ->name('new-featured-product');
Route::post('featured-product/store', [FeaturedProductController::class, 'storeFeatured'])
    ->name('store-featured-product');
Route::get('featured-product/edit/{id}', [FeaturedProductController::class, 'editFeatured'])
    ->name('edit-featured-product');
Route::put('featured-product/update/{id}', [FeaturedProductController::class, 'updateFeatured'])
    ->name('update-featured-product');
Route::delete('featured-product/delete/{id}', [FeaturedProductController::class, 'deleteFeatured'])
    ->name('delete-featured-product');

//case studies
Route::get('case-studies', [CaseStudiesController::class, 'getCase'])
    ->name('get-case-studies');
Route::get('case-studies/show', [CaseStudiesController::class, 'showCase'])
    ->name('show-case-studies');
Route::get('case-studies/new', [CaseStudiesController::class, 'newCase'])
    ->name('new-case-studies');
Route::post('case-studies/store', [CaseStudiesController::class, 'storeCase'])
    ->name('store-case-studies');
Route::get('case-studies/edit/{id}', [CaseStudiesController::class, 'editCase'])
    ->name('edit-case-studies');
Route::put('case-studies/update/{id}', [CaseStudiesController::class, 'updateCase'])
    ->name('update-case-studies');
Route::delete('case-studies/delete/{id}', [CaseStudiesController::class, 'deleteCase'])
    ->name('delete-case-studies');

//Consulting
Route::get('consulting-excellence', [ConsultingController::class, 'getConsulting'])
    ->name('get-consulting');
Route::get('consulting-excellence/show', [ConsultingController::class, 'showConsulting'])
    ->name('show-consulting');
Route::get('consulting-excellence/new', [ConsultingController::class, 'newConsulting'])
    ->name('new-consulting');
Route::post('consulting-excellence/store', [ConsultingController::class, 'storeConsulting'])
    ->name('store-consulting');
Route::get('consulting-excellence/edit/{id}', [ConsultingController::class, 'editConsulting'])
    ->name('edit-consulting');
Route::put('consulting-excellence/update/{id}', [ConsultingController::class, 'updateConsulting'])
    ->name('update-consulting');
Route::delete('consulting-excellence/delete/{id}', [ConsultingController::class, 'deleteConsulting'])
    ->name('delete-consulting');

//articles
Route::get('article', [ArticleSectionController::class, 'getArticles'])
    ->name('get-article-section');
Route::get('article/show', [ArticleSectionController::class, 'showArticles'])
    ->name('show-article-section');
Route::get('article/new', [ArticleSectionController::class, 'newArticles'])
    ->name('new-article-section');
Route::post('article/store', [ArticleSectionController::class, 'storeArticles'])
    ->name('store-article-section');
Route::get('article/edit/{id}', [ArticleSectionController::class, 'editArticles'])
    ->name('edit-article-section');
Route::put('article/update/{id}', [ArticleSectionController::class, 'updateArticles'])
    ->name('update-article-section');
Route::delete('article/delete/{id}', [ArticleSectionController::class, 'deleteArticles'])
    ->name('delete-article-section');

//lets get started
Route::get('lets-get-started', [LetsStartedController::class, 'getLets'])
    ->name('get-started');
Route::get('lets-get-started/show', [LetsStartedController::class, 'showLets'])
    ->name('show-started');
Route::get('lets-get-started/new', [LetsStartedController::class, 'newLets'])
    ->name('new-started');
Route::post('lets-get-started/store', [LetsStartedController::class, 'storeLets'])
    ->name('store-started');
Route::get('lets-get-started/edit/{id}', [LetsStartedController::class, 'editLets'])
    ->name('edit-started');
Route::put('lets-get-started/update/{id}', [LetsStartedController::class, 'updateLets'])
    ->name('update-started');
Route::delete('lets-get-started/delete/{id}', [LetsStartedController::class, 'deleteLets'])
    ->name('delete-started');
/************Content End********** */




/************COMPANY********** */
//TEAMS
Route::get('teams', [TeamsController::class, 'getTeams'])
    ->name('get-teams');
Route::get('teams/team', [TeamsController::class, 'getTeam'])
    ->name('get-team');
Route::get('teams/team/show', [TeamsController::class, 'showTeam'])
    ->name('show-team');
Route::get('teams/team/new', [TeamsController::class, 'newTeam'])
    ->name('new-team');
Route::post('teams/team/store', [TeamsController::class, 'storeTeam'])
    ->name('store-team');
Route::get('teams/team/edit/{id}', [TeamsController::class, 'editTeam'])
    ->name('edit-team');
Route::put('teams/team/update/{id}', [TeamsController::class, 'updateTeam'])
    ->name('update-team');
Route::delete('teams/team/delete/{id}', [TeamsController::class, 'deleteTeam'])
    ->name('delete-team');


//SERVICES
Route::get('service', [ServiceController::class, 'getService'])
    ->name('service');

Route::post('service', [ServiceController::class, 'store'])
    ->name('service-store');

Route::put('service/{id}', [ServiceController::class, 'update'])
    ->name('service-update-new');

Route::delete('service/{id}', [ServiceController::class, 'destroy'])
    ->name('service-destroy-new');

Route::get('show/service', [ServiceController::class, 'showService'])
    ->name('show-service');

//PARTNER DATA
Route::get('partnerVIew', [PartnersController::class, 'getPartnersView'])
    ->name('partnerView');

Route::get('partners', [PartnersController::class, 'getPartners'])
    ->name('partners');

Route::post('partners', [PartnersController::class, 'storePartners'])
    ->name('partner-store');


Route::delete('partners/{id}', [PartnersController::class, 'destroyPartners'])
    ->name('partner-destroy');

Route::get('show/partners', [PartnersController::class, 'showPartners'])
    ->name('show-partners');

Route::put('partners/{id}', [PartnersController::class, 'updatePartners'])
    ->name('partner-update');


//PARTNER LIST
Route::get('partnerList', [PartnersController::class, 'getPartnersList'])
    ->name('partnerList');

Route::post('partnerList', [PartnersController::class, 'storePartnersList'])
    ->name('partnerList-store');


Route::delete('partnersList/{id}', [PartnersController::class, 'destroyPartnersList'])
    ->name('partnerList-destroy');

Route::get('show/partnerList', [PartnersController::class, 'showPartnersList'])
    ->name('show-partnerList');

Route::put('partnerList/{id}', [PartnersController::class, 'updatePartnersList'])
    ->name('partnerList-update');


/************About US********** */

//CONTACT

Route::get('aboutVIew', [AboutUsController::class, 'getAboutUsView'])
    ->name('aboutView');

Route::get('contact', [AboutUsController::class, 'getContact'])
    ->name('contact');

Route::post('contact', [AboutUsController::class, 'storeContact'])
    ->name('contact-store');

Route::put('contact/{id}', [AboutUsController::class, 'updateContact'])
    ->name('contact-update');

Route::delete('contact/{id}', [AboutUsController::class, 'destroyContact'])
    ->name('contact-destroy');

/************About UD END********** */

/************Media Sosial********** */

Route::get('medsos', [MedsosController::class, 'getMedsos'])
    ->name('medsos');

Route::post('medsos', [MedsosController::class, 'storeMedsos'])
    ->name('medsos-store');

Route::put('medsos/{id}', [MedsosController::class, 'updateMedsos'])
    ->name('medsos-update');

Route::delete('medsos/{id}', [MedsosController::class, 'destroyMedsos'])
    ->name('medsos-destroy');

/************Media Sosial********** */

//PRODUCT DATA
Route::get('productView', [ProductController::class, 'getProductView'])
    ->name('productView');

Route::get('product', [ProductController::class, 'getProduct'])
    ->name('product');

Route::post('product', [ProductController::class, 'storeProduct'])
    ->name('product-store');


Route::delete('product/{id}', [ProductController::class, 'destroyProduct'])
    ->name('product-destroy');

Route::put('product/{id}', [ProductController::class, 'updateProduct'])
    ->name('product-update');


//PRODUCT LIST
Route::get('productCategory', [ProductController::class, 'getCategories'])
    ->name('productCategory');

Route::post('productCategory', [ProductController::class, 'storeCategories'])
    ->name('productCategory-store');

Route::delete('productCategory/{id}', [ProductController::class, 'destroyCategories'])
    ->name('productCategory-destroy');

Route::put('productCategory/{id}', [ProductController::class, 'updateCategories'])
    ->name('productCategory-update');

//general setting

Route::get('company/page-type-setting', [PageTypeController::class, 'getPageType'])
    ->name('get-page-type');
Route::get('company/page-type-setting/show', [PageTypeController::class, 'showPageType'])
    ->name('show-page-type');
Route::post('company/page-type-setting/store', [PageTypeController::class, 'storePageType'])
    ->name('store-page-type');
Route::put('company/page-type-setting/update/{id}', [PageTypeController::class, 'updatePageType'])
    ->name('update-page-type');
Route::delete('company/page-type-setting/delete/{id}', [PageTypeController::class, 'deletePageType'])
    ->name('delete-page-type');



//Livewire Route

//our services
Route::get('our-service', GetOurService::class)->name('get-our-service');
Route::get('our-service/new', CreateOurService::class)->name('new-our-service');
Route::get('our-service/{id}/edit', EditOurService::class)->name('edit-our-service');
Route::delete('our-service/{id}/delete', [DeleteOurService::class, 'delete'])->name('delete-our-service');

//hero
Route::get('hero', GetHero::class)->name('get-hero');
Route::get('hero/{id}/edit', EditHero::class)->name('edit-hero');
Route::get('hero/new', CreateHero::class)->name('new-hero');
Route::delete('hero/{id}/delete', [DeleteHero::class, 'delete'])->name('delete-hero');

//our team
Route::get('our-team', GetOurTeam::class)->name('get-our-team');
Route::get('our-team/new', CreateOurTeam::class)->name('new-our-team');
Route::get('our-team/{id}/edit', EditOurTeam::class)->name('edit-our-team');
Route::delete('our-team/{id}/delete', [DeleteOurTeam::class, 'delete'])->name('delete-our-team');

//our model
Route::get('our-model', GetOurModel::class)->name('get-our-model');
Route::get('our-model/new', CreateOurModel::class)->name('new-our-model');
Route::get('our-model/{id}/edit', EditOurModel::class)->name('edit-our-model');
Route::delete('our-model/delete/{id}', [DeleteOurModel::class, 'delete'])->name('delete-our-model');

//our company
Route::get('our-company', GetOurCompany::class)->name('get-our-company');
Route::get('our-company/new', CreateOurCompany::class)->name('new-our-company');
Route::get('our-company/{id}/edit', EditOurCompany::class)->name('edit-our-company');
Route::delete('our-company/{id}/delete', [DeleteOurCompany::class, 'delete'])->name('delete-our-company');
