<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LandingPageController;

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
Route::get('contact-us', function () {
    return view('public.contact');
});
Route::get('catalogue', function () {
    return view('public.catalogue');
});

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
        });
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    });
});
