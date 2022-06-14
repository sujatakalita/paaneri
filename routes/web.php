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
use App\Http\Controllers\User\TermsCondition;
use App\Http\Controllers\User\ReturnPolicy;
use App\Http\Controllers\User\HomeController;
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


// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix("/product")->group(function () {
    Route::any('/', [UserProductController::class, 'index'])->name('user.product');
    Route::any('/sale', [UserProductController::class, 'sale'])->name('user.sale');
    Route::any('/shop-by-occasion/{scat_slug}', [UserProductController::class, 'occasion'])->name('user.occasion');
    Route::any('/shop-by-style/{scat_slug}', [UserProductController::class, 'style'])->name('user.style');
    Route::any('/shop-by-color/{scat_slug}', [UserProductController::class, 'color'])->name('user.color');
    Route::any('/{mega_menu_men_slug}/store', [UserProductController::class, 'men'])->name('user.men');

    Route::any('/bridal-collection/{mega_menu_bridal_slug}/store', [UserProductController::class, 'bridal'])->name('user.bridal');

    Route::any('/accessories-collection/{mega_menu_accessories_slug}/store', [UserProductController::class, 'accessories'])->name('user.accessories');
    Route::get('/{product_slug}', [UserProductController::class, 'viewDetails'])->name('user.product.details');
    Route::get('/byCategory/{mega_menu}/{category_slug}',[UserProductController::class, 'productByCategory'])->name('user.product.byCategory');
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
        Route::get('/{status}', [CheckoutController::class,'checkout'])->name('checkout')->middleware('auth');
        Route::post('/store', [CheckoutController::class,'store'])->name('user.checkout')->middleware('auth');
    });
    Route::prefix("review")->group(function () {
        Route::post('/', [ReviewController::class,'store'])->name('review.store');
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
    Route::prefix("rating")->group(function () {
        Route::post('/', [UserProductController::class,'ratingStore'])->name('product-review.store');
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

Route::group(['prefix' => 'terms-and-conditions'], function () {
    Route::any('/', [TermsCondition::class, 'index'])->name('user.t&c');
});

Route::prefix("/order")->group(function () {
Route::post('/{product_id}', [OrderController::class, 'buyOrCart'])->name('admin.order.buyorcart');
Route::post('/buy/{status}', [OrderController::class, 'payment'])->name('user.plan.payment');
});


require __DIR__ . '/auth.php';
