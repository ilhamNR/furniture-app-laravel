<?php

use Illuminate\Support\Facades\Route;
//admin controller
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LandingPageController;

//public controller
use App\Http\Controllers\public\CatalogueController;
use App\Http\Controllers\public\InquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public.landing');
});

Route::get('about-us', function () {
    return view('public.about');
});

Route::prefix('contact-us')->group(function () {
    Route::get('/', [InquiryController::class, 'index'])->name('contact-us');
});
Route::get('catalogue/{slug}', [CatalogueController::class, 'index'])->name('catalogue');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('landing-page', [LandingPageController::class, 'index'])->name('admin.landingPage');
        Route::get('about-us', [WebSettingController::class, 'aboutUs'])->name('admin.aboutUs');
        Route::get('categories', [ProductCategoryController::class, 'index'])->name('admin.productCategories');
        Route::prefix('categories')->group(function () {
            Route::post('create', [ProductCategoryController::class, 'store'])->name('admin.createProductcategory');
            Route::delete('destroy', [ProductCategoryController::class, 'destroy'])->name('admin.deleteProductCategories');
        });
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    });
});
