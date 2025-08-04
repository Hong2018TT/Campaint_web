<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\PasswordResetController;

// Controller All In
use App\Http\Controllers\{
    Auth\AuthController,
    DashboardController,
    ColorfamilyController,
    ProductController,
    ColorController,
    DepoController,
    CaculateProductController,
    UserController,
    AboutController,
    TaskController,
    CategoryController,
    SubCategoryController,
    Controller
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
    Route::delete('/dashboard-color-del/{id}',[DashboardController::class, 'destroy'])->name('delete_dashboard_color');
    Route::put('/dashboard-color-update/{id}', [DashboardController::class, 'update'])->name('update_dashboard_colorfamily');

    // Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    //====== selection Product=====
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/products-create',[ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/products',[ProductController::class, 'store'])->name('save_product');
    Route::get('/products-edit/{id}',[ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/products-update/{id}',[ProductController::class, 'update'])->name('update_product');
    Route::delete('/products-delete/{id}', [ProductController::class, 'destroy'])->name('delete_product');

    //====== selection Category
    Route::get('/categorys', [CategoryController::class, 'index'])->name('admin.categories.index');

    //====== selection SubCategory
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories.index');

    //====== selection ColorFamily=====
    Route::get('/colorfamilys', [ColorfamilyController::class, 'index'])->name('admin.colorfamily.index');
    Route::post('/colorfamilys-store',[ColorFamilyController::class, 'store'])->name('save_colorfamily');
    Route::put('/colorfamilys/{id}', [ColorfamilyController::class, 'update'])->name('update_colorfamily');
    Route::delete('/colorfamilys-delete/{id}', [ColorfamilyController::class, 'destroy'])->name('delete_colorfamily');

    //====== selection Colors=====
    Route::get('/colors',[ColorController::class, 'index'])->name('admin.color.index');
    Route::get('/colors-create',[ColorController::class, 'create'])->name('admin.color.create');
    Route::post('/colors',[ColorController::class, 'store'])->name('save_color');
    Route::get('/colors-edit/{id}',[ColorController::class, 'edit'])->name('admin.color.edit');
    Route::put('/colors-update{id}',[ColorController::class, 'update'])->name('update_color');

    Route::delete('/colors-delete/{id}',[ColorController::class, 'destroy'])->name('delete_color');
    Route::get('/colors/data', [ColorController::class, 'getColorsData'])->name('admin.color.data');


    //====== selection Depo=====
    Route::get('/depos',[DepoController::class, 'index'])->name('admin.depo.index');
    // Add a new route for DataTables AJAX requests
    Route::get('/depos/data', [DepoController::class, 'getDeposData'])->name('admin.depo.data');

    Route::get('/depos-create',[DepoController::class, 'create'])->name('admin.depo.create');
    Route::post('/depos',[DepoController::class, 'store'])->name('save_depo');
    Route::get('/depos-edit/{id}',[DepoController::class, 'edit'])->name('admin.depo.edit');
    Route::put('/depo_update/{id}',[DepoController::class, 'update'])->name('update_depo');
    Route::delete('/depos-delete/{id}',[DepoController::class, 'destroy'])->name('delete_depo');
    
    //====== selection CaculateProduct=====
    Route::get('/calculates-product',[CaculateProductController::class, 'index'])->name('admin.cal_product.index');
    
    //====== selection User=====
    Route::get('/users',[UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users-create',[UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users',[UserController::class, 'store'])->name('save_user');
    Route::get('/users-edit/{id}',[UserController::class ,'edit'])->name('admin.users.edit');
    Route::put('/users-update/{id}',[UserController::class, 'update'])->name('update_user');
    Route::delete('/users-delete/{id}', [UserController::class, 'destroy'])->name('delete_user');

    Route::get('/user-profile',[UserController::class, 'profile'])->name('admin.users.profile');
    Route::post('/user-profile',[UserController::class, 'profileUpdate'])->name('update_userprofile');
    
    Route::get('/about-us',[AboutController::class, 'index'])->name('admin.about.index');
    // Route to handle the form submission for updating
    Route::post('/about-us', [AboutController::class, 'update'])->name('update_aboutus');

    Route::get('/tasks',[TaskController::class, 'index'])->name('admin.task.index');
});

Route::middleware(['user'])->group(function () {
    // This middleware will apply to all routes that require authentication
});

Route::middleware(['manager'])->group(function () {
    // This middleware will apply to all routes that require manager access
});