<?php

use Illuminate\Support\Facades\Route;

//admin controller
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\admin\AdminAboutUsController;
use App\Http\Controllers\Admin\AdminInquiryController;

//public controller
use App\Http\Controllers\public\CatalogueController;
use App\Http\Controllers\public\InquiryController;
use App\Http\Controllers\public\AboutUsController;


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
})->lazy();

Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::prefix('contact-us')->group(function () {
    Route::get('/', [InquiryController::class, 'index'])->name('contact-us');
    Route::post('submit', [InquiryController::class, 'sendInquiry'])->name('send-inquiry');
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
        Route::prefix('about-us')->group(function () {
            Route::get('/', [WebSettingController::class, 'aboutUs'])->name('admin.aboutUs');
            Route::post('/save', [WebSettingController::class, 'updateAboutus'])->name('admin.aboutUs.update');
        });

        Route::get('categories', [ProductCategoryController::class, 'index'])->name('admin.productCategories');
        Route::prefix('categories')->group(function () {
            Route::post('create', [ProductCategoryController::class, 'store'])->name('admin.createProductcategory');
            Route::delete('destroy', [ProductCategoryController::class, 'destroy'])->name('admin.deleteProductCategories');
        });
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.createProduct');
            Route::post('/create/imgupload', [ProductController::class, 'uploadImage'])->name('admin.uploadImage');
            Route::post('/create/save', [ProductController::class, 'saveProduct'])->name('admin.saveProduct');
            Route::get('/{id}/edit', [ProductController::class, "editProduct"])->name('admin.editProduct');
            Route::delete('/delete', [ProductController::class, "destroy"])->name('admin.deleteProduct');
        });
        Route::prefix('inquiries')->group(function(){
            Route::get('/', [AdminInquiryController::class, 'index'])->name('admin.inquiry');
        });

    });
});
