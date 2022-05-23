<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\MegaMenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix("admin")->group(function () {
    Route::get('/', function () {
        return view('auth.admin.login');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
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
});
