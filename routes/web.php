<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix("/product")->group(function () {

    Route::any('/', [UserProductController::class, 'index'])->name('user.product');
    Route::get('/{product_slug}', [UserProductController::class, 'viewDetails'])->name('user.product.details');
    Route::post('/byColour',[UserProductController::class, 'productByColour'])->name('user.product.bycolour');
    Route::get('filter/{filter}', [UserProductController::class, 'filterProduct'])->name('user.filterproduct');
});
Route::group(['middleware' => 'auth'], function(){
    Route::prefix("cart")->group(function () {
        Route::get('/', [CartController::class,'view'])->name('user.cart.view');
        Route::get('/store/{id}', [CartController::class,'store'])->name('user.cart.store');//store/{product_id}
        Route::post('/add_to_cart', [CartController::class,'updateCartProduct'])->name('user.cart.update');
        Route::get('/all', [CartController::class,'AllCart'])->name('user.cart.all');
    });
    Route::prefix("checkout")->group(function () {
        Route::get('/', [CheckoutController::class,'checkout'])->name('checkout');
        Route::post('/store', [CheckoutController::class,'store'])->name('user.checkout');
    });
    Route::prefix("review")->group(function () {
        Route::post('/', [ReviewController::class,'Store'])->name('review.store');
    });
});
require __DIR__ . '/auth.php';
