<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


/* ------------- Admin Routes -------------- */


Route::prefix('admin')->group(function (){

    /**
     *   admin Routes
     */

    Route::get('/login',[AdminController::class, 'Index'])->name('login_from');

    Route::post('/login/owner',[AdminController::class, 'Login'])->name('Admin.login');

    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('Admin.dashboard')->middleware('Admin');

    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('Admin.logout')->middleware('Admin');

    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('Admin.register');

    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('Admin.register.create');

    /**
     *   category Routes
     */

    Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'Index'])
        ->name('admin.category')->middleware('Admin');

    Route::post('category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])
        ->name('admin.category.store')->middleware('Admin');

    Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);

    Route::post('category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])
        ->name('admin.category.update')->middleware('Admin');

    Route::get('category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete']);

    /*
     *   product Routes
     */
    Route::resource('products', 'ProductController')->middleware('Admin');

    /*
     *   users Routes
     */
    Route::resource('users', 'UsersController');

});





