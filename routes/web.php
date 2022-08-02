<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoritController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Website\HomepageController;

Route::get('/home', [HomepageController::class, 'index'])->name('home_page');
Route::get('/', function (){
    return redirect()->route('home_page');
});
Route::get('/products/details/{name}', [HomepageController::class, 'product_details'])->name('product.details');

Route::group(['prefix' => 'user', 'middleware' => 'seller'], function () {
    Route::get('edit/profile/{id}', [SellerController::class, 'editProfile'])->name('edit.profile');
    Route::post('update', [SellerController::class, 'update'])->name('update.profile');

    // favorits
    Route::post('add/product/favorit', [FavoritController::class, 'addProduct'])->name('user.add.fav');
    Route::get('favorits', [FavoritController::class, 'getFavorits'])->name('user.get.fav');

    // carts
    Route::post('add/product/cart', [CartController::class, 'addProduct'])->name('cart.add.product');
    Route::get('carts', [CartController::class, 'getCarts'])->name('user.get.cart');
});

Route::get('contact', [HomepageController::class, 'contacts'])->name('contact');
Route::post('contact/send_msg', [HomepageController::class, 'sendMessage'])->name('form.contact');

Route::prefix('seller')->group(function () {

    Route::get('/login', [SellerController::class, 'SellerIndex'])->name('seller_login_from');

    Route::get('/dashboard', [SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');

    Route::post('/login/owner', [SellerController::class, 'SellerLogin'])->name('seller.login');

    Route::get('/logout', [SellerController::class, 'SellerLogout'])->name('seller.logout')->middleware('seller');

    Route::get('/register', [SellerController::class, 'SellerRegister'])->name('seller.register');

    Route::post('/register/create', [SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');
});



require __DIR__ . '/auth.php';
