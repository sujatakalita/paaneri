<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MegaMenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Adminauth\LoginController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\AttachmentController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductSpecificationController;
use App\Http\Controllers\Admin\SpecificationOptionController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login');

Route::post('/', [LoginController::class, 'login'])->name('admin.login.post');

Route::middleware(['admin'])->group(function () {

    Route::get('/home', function () {
        return redirect('/dashboard');
    });
});

Route::post('/password/email', [App\Http\Controllers\Adminauth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password-email');

Route::get('/password/reset', [App\Http\Controllers\Adminauth\ForgotPasswordController::class, 'adminShowLinkRequestForm'])->name('admin.password-request');
Route::post('/password/reset', [App\Http\Controllers\Adminauth\ResetPasswordController::class, 'reset'])->name('admin.password-update');

Route::get('/password/reset/{token}', [App\Http\Controllers\Adminauth\ResetPasswordController::class, 'adminShowResetForm'])->name('admin.password-reset');



Route::get('/logout', '\App\Http\Controllers\Adminauth\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'admin'], function () {

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['prefix' => 'change-password'], function () {
    Route::get('/', [Admin\ChangePasswordController::class, 'index'])->name('admin.change-password');
    Route::post('/credentials', [Admin\ChangePasswordController::class, 'store'])->name('admin.change-password.post');
});

Route::prefix("/reviews")->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('admin.review');
    Route::get('/approve/{id}', [ReviewController::class, 'approve'])->name('admin.approve');
});

Route::group(['prefix' => 'home-page-banner'], function () {
    Route::get('/', [HeroController::class, 'index'])->name('admin.home-page-banner');

    Route::get('/create', [HeroController::class, 'create'])->name('admin.home-page-banner.create');

    Route::post('/store', [HeroController::class, 'store'])->name('admin.home-page-banner.post');
    
    Route::get('/show/{id}', [HeroController::class, 'show'])->name('admin.home-page-banner.show');

    Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('admin.home-page-banner.edit');

    Route::patch('/update/{id}', [HeroController::class, 'update'])->name('admin.home-page-banner.update');

    Route::get('/delete/{id}', [HeroController::class, 'destroy'])->name('admin.home-page-banner.delete');

});


// ***************************************

// all category route
Route::prefix("/category")->group(function () {
    Route::get('/', [CategoryController::class,'index'])->name('admin.category');
    Route::post('/create', [CategoryController::class,'store'])->name('admin.create.category');
    Route::get('/filter/{all_megamenu}', [CategoryController::class, 'filterData'])->name('admin.filter');
    Route::get('/subfilter/{all_categories}', [CategoryController::class, 'SubcategoryFilter'])->name('admin.SubcategoryFilter');
    Route::post('/delete', [CategoryController::class, 'delete']);
    Route::get('/getOne/{id}', [CategoryController::class,'getOne']);
    Route::post('/update', [CategoryController::class, 'edit'])->name('admin.update.category');
});
//mega menu
Route::prefix("/mega-menu")->group(function () {
    Route::get('/', [MegaMenuController::class, 'index'])->name('admin.megamenu');
    Route::post('/create', [MegaMenuController::class, 'store'])->name('admin.create.megamenu');
    Route::post('/delete', [MegaMenuController::class, 'delete']);
    Route::get('/getOne/{id}', [MegaMenuController::class,'getOne']);
    Route::post('/update', [MegaMenuController::class, 'edit'])->name('admin.update.megamenu');
});
Route::prefix("/sub-category")->group(function () {
    Route::get('/', [SubCategoryController::class, 'index'])->name('admin.subcategory');
    Route::post('/create', [SubCategoryController::class, 'store'])->name('admin.create.subcategory');
    Route::post('/delete', [SubCategoryController::class, 'delete']);
    Route::post('/getCategory/{id}', [SubCategoryController::class, 'getCategory']);
    Route::get('/getOne/{id}', [SubCategoryController::class,'getOne']);
    Route::post('/update', [SubCategoryController::class, 'edit'])->name('admin.update.subcategory');
});
Route::prefix("/product")->group(function () {
    Route::get('/', [ProductController::class, 'create'])->name('admin.addproduct');
    Route::post('/create', [ProductController::class, 'store'])->name('admin.create.product');
    Route::get('/all', [ProductController::class, 'index'])->name('admin.product.index');
    Route::post('/getColors/{id}', [ColorController::class, 'getProductColors']);
    Route::post('/saveColors', [ColorController::class, 'saveColor']);
    Route::post('/deleteColorCode', [ColorController::class, 'deleteColor']);
    Route::post('/getAttachment/{id}', [AttachmentController::class, 'getProductAttachment']);
    Route::post('/store', [AttachmentController::class, 'storeProductAttachment'])->name('admin.store.attachment');
    Route::post('/getProductSize/{id}', [SizeController::class, 'getSize']);
    Route::post('/saveProductSize', [SizeController::class, 'saveSize']);
    Route::post('/getSpecification/{id}', [ProductSpecificationController::class, 'getProductSpecification']);
    Route::post('/saveProductSpecification', [ProductSpecificationController::class, 'saveSpecification']);
    Route::post('/getSpecificationOption/{ids}/{product_id}', [SpecificationOptionController::class, 'getProductSpecificationOption']);
    Route::post('/deleteMeasurmentOption', [SpecificationOptionController::class, 'deleteProductMeasurmentOption']);
    Route::post('/saveProductSpecificationOption', [SpecificationOptionController::class, 'saveSpecificationOption']);
});
Route::prefix("/order")->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('admin.order');
});














}); //end of middleware admin

}); //end of prefix admin
