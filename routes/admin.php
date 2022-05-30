<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\MegaMenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Adminauth\LoginController;
use App\Http\Controllers\Admin\ReviewController;
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
    Route::get('/', [Admin\ChangePasswordControlle::class, 'index'])->name('admin.change-password');

    Route::post('/credentials', [Admin\ChangePasswordController::class, 'store'])->name('admin.change-password.post');

});

Route::prefix("/reviews")->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('admin.review');
    Route::get('/approve/{id}', [ReviewController::class, 'approve'])->name('admin.approve');
});

// all category route
Route::prefix("/category")->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/create', [CategoryController::class, 'store'])->name('admin.create.category');
    Route::get('/filter/{all_categories}', [CategoryController::class, 'filterData'])->name('admin.filter');
});
//mega menu
Route::prefix("/mega-menu")->group(function () {
    Route::get('/', [MegaMenuController::class, 'index'])->name('admin.megamenu');
    Route::post('/create', [MegaMenuController::class, 'store'])->name('admin.create.megamenu');

});
Route::prefix("/sub-category")->group(function () {
    Route::get('/', [SubCategoryController::class, 'index'])->name('admin.subcategory');
    Route::post('/create', [SubCategoryController::class, 'store'])->name('admin.create.subcategory');
});
Route::prefix("/product")->group(function () {
    Route::get('/', [ProductController::class, 'create'])->name('admin.addproduct');
    Route::post('/create', [ProductController::class, 'store'])->name('admin.create.product');
    Route::get('/all', [ProductController::class, 'index'])->name('admin.product.index');
});
Route::prefix("/order")->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('admin.order');
});














}); //end of middleware admin

}); //end of prefix admin
