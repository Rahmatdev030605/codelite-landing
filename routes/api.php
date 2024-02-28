<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// Route API Pages

use App\Domains\Logic\Http\Controllers\Backend\API\APIController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function () {
    Route::get('home', [APIController::class, 'getHomeData'])->name('home');
    Route::get('hero/{id}', [APIController::class, 'getHeroDataById'])->name('get-hero-id');
    Route::get('hero', [APIController::class, 'getAllHeroData'])->name('get-hero-all');

    Route::get('hero/{page_type}/{id}', [APIController::class, 'getHeroDataByPageType'])->name('get-hero-page-type');
});


//example : http://192.168.0.1/admin/api/home
// php artisan serve --host 26.63.56.195 --port 8000
