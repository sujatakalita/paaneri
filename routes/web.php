<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\Faqs;
use App\Http\Controllers\User\Privacy;
use App\Http\Controllers\User\ReturnPolicy;
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
Route::prefix("wishlist")->group(function () {
    Route::get('/store/{id}', [WishlistController::class,'store'])->name('user.wishlist.store');//store/{product_id}
    Route::get('/',[WishlistController::class,'index'])->name('user.wishlist.index');
    Route::get('/delete/{id}',[WishlistController::class,'destroy'])->name('user.wishlist.delete');
});
Route::group(['middleware' => 'auth'], function(){
    Route::prefix("cart")->group(function () {
        Route::get('/', [CartController::class,'view'])->name('user.cart.view');
        Route::get('/store/{id}', [CartController::class,'store'])->name('user.cart.store');//store/{product_id}
        Route::post('/add_to_cart', [CartController::class,'updateCartProduct'])->name('user.cart.update');
        Route::get('/all', [CartController::class,'AllCart'])->name('user.cart.all');
        Route::post('/deleteCartItem', [CartController::class,'deleteCartItem']);
    });
    Route::prefix("checkout")->group(function () {
        Route::get('/{status}', [CheckoutController::class,'checkout'])->name('checkout');
        Route::post('/store', [CheckoutController::class,'store'])->name('user.checkout');
    });
    Route::prefix("review")->group(function () {
        Route::post('/', [ReviewController::class,'Store'])->name('review.store');
    });
    Route::prefix("profile")->group(function () {
        Route::any('/', [UserProfileController::class,'profile'])->name('user.profile.view');
        Route::get('/getProfileInformation', [UserProfileController::class,'getProfileRecord']);
        Route::post('/updateProfileInformation', [UserProfileController::class,'updateProfileRecord']);
        Route::post('/updateProfileMobile', [UserProfileController::class,'updateMobileRecord']);
        Route::get('/address', [UserAddressController::class,'address'])->name('user.profile.address.view');
        Route::post('/address/store', [UserAddressController::class,'store']);
        Route::get('/address/get', [UserAddressController::class,'get']);
        Route::post('/address/delete', [UserAddressController::class,'deleteAddress']);
        Route::get('/address/getOne/{id}', [UserAddressController::class,'getOne']);
        Route::post('/address/update', [UserAddressController::class,'update']);
    });
});

Route::group(['prefix' => 'faqs'], function () {
    Route::any('/', [Faqs::class, 'index'])->name('user.faqs');
});

Route::group(['prefix' => 'policy'], function () {
    Route::any('/', [Privacy::class, 'index'])->name('user.policy');
});

Route::group(['prefix' => 'return-policy'], function () {
    Route::any('/', [ReturnPolicy::class, 'index'])->name('user.return');
});

Route::prefix("/order")->group(function () {
Route::post('/{product_id}', [OrderController::class, 'buyOrCart'])->name('admin.order.buyorcart');
});
require __DIR__ . '/auth.php';
