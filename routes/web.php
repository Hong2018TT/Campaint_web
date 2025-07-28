<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controller All In
use App\Http\Controllers\{
    Auth\AuthController,
    DashboardController,
    ColorFamilyController,
    ProductController,
    ColorController,
    DepoController,
    CaculateProductController,
    UserController,
    AboutController,
    TaskController
};

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'Administrator') {
        return redirect()->route('admin.dashboard.home');
    }

    return app(\App\Http\Controllers\Auth\AuthController::class)->index();
})->name('admin.auth.index');

Route::post('/login', [AuthController::class, 'login'])->name('savelogin');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard.home');

    // Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    //====== selection Product=====
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/products-create',[ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/products',[ProductController::class, 'store'])->name('save_product');
    Route::get('/products-edit/{id}',[ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/products-update/{id}',[ProductController::class, 'update'])->name('update_product');
    Route::delete('/products-delete/{id}', [ProductController::class, 'destroy'])->name('delete_product');

    //====== selection Color Family=====
    Route::get('/colorfamily',[ColorFamilyController::class, 'index'])->name('admin.colorfamily.index');
    
    //====== selection Colors=====
    Route::get('/colors',[ColorController::class, 'index'])->name('admin.color.index');
    Route::get('/colors-create',[ColorController::class, 'create'])->name('admin.color.create');
    Route::get('/colors-edit',[ColorController::class, 'edit'])->name('admin.color.edit');
    
    //====== selection Depo=====
    Route::get('/depo',[DepoController::class, 'index'])->name('admin.depo.index');
    Route::get('/depo-create',[DepoController::class, 'create'])->name('admin.depo.create');
    Route::get('/depo-edit',[DepoController::class, 'edit'])->name('admin.depo.edit');
    
    //====== selection CaculateProduct=====
    Route::get('/calculate-product',[CaculateProductController::class, 'index'])->name('admin.cal_product.index');
    
    //====== selection User=====
    Route::get('/user',[UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user-create',[UserController::class, 'create'])->name('admin.users.create');
    Route::post('/user',[UserController::class, 'store'])->name('save_user');
    Route::get('/user-edit/{id}',[UserController::class ,'edit'])->name('admin.users.edit');
    Route::put('/user-update/{id}',[UserController::class, 'update'])->name('update_user');
    Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('delete_user');

    Route::get('/user-profile',[UserController::class, 'profile'])->name('admin.users.profile');
    
    Route::get('/about-us',[AboutController::class, 'index'])->name('admin.about.index');
    // Route to handle the form submission for updating
    Route::post('/about-us', [AboutController::class, 'update'])->name('update_aboutus');

    Route::get('/task',[TaskController::class, 'index'])->name('admin.task.index');
});

Route::middleware(['user'])->group(function () {
    // This middleware will apply to all routes that require authentication
});

Route::middleware(['manager'])->group(function () {
    // This middleware will apply to all routes that require manager access
});