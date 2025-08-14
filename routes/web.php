<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controller All In
use App\Http\Controllers\{
    Auth\AuthController,
    Auth\ForgotPasswordController,
    Auth\ResetPasswordController,
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
use App\Models\SubCategory;

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'Administrator') {
        return redirect()->route('admin.dashboard.home');
    }

    return app(\App\Http\Controllers\Auth\AuthController::class)->index();
})->name('admin.auth.index');



Route::post('/login', [AuthController::class, 'login'])->name('savelogin');

Route::middleware(['admin'])->group(function () {

    // Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['namespace' => 'App\Http\Controllers'],function(){

        //====== selection Dashboard =====
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard.home');
            Route::delete('/dashboard-color-del/{id}','destroy')->name('delete_dashboard_color');
            Route::put('/dashboard-color-update/{id}','update')->name('update_dashboard_colorfamily');
        });

        //====== selection Product =====
        Route::controller(ProductController::class)->group(function(){
            Route::get('/products','index')->name('admin.product.index');
            Route::get('/products-create','create')->name('admin.product.create');
            Route::post('/products','store')->name('save_product');
            Route::get('/products-edit/{id}','edit')->name('admin.product.edit');
            Route::put('/products-update/{id}','update')->name('update_product');
            Route::delete('/products-delete/{id}','destroy')->name('delete_product');
        });

        //====== selection Category=====
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/categorys','index')->name('admin.categories.index');
        });

        //====== selection SubCategory=====
        Route::controller(SubCategoryController::class)->group(function(){
            Route::get('/subcategories','index')->name('admin.subcategories.index');
        });

        //====== selection ColorFamily=====
        Route::controller(ColorfamilyController::class)->group(function(){
            Route::get('/colorfamilys','index')->name('admin.colorfamily.index');
            Route::post('/colorfamilys-store','store')->name('save_colorfamily');
            Route::put('/colorfamilys/{id}','update')->name('update_colorfamily');
            Route::delete('/colorfamilys-delete/{id}','destroy')->name('delete_colorfamily');
        });

        //====== selection Colors=====
        Route::controller(ColorController::class)->group(function(){
            Route::get('/colors','index')->name('admin.color.index');
            Route::get('/colors-create','create')->name('admin.color.create');
            Route::post('/colors','store')->name('save_color');
            Route::get('/colors-edit/{id}','edit')->name('admin.color.edit');
            Route::put('/colors-update{id}','update')->name('update_color');

            Route::delete('/colors-delete/{id}','destroy')->name('delete_color');
            Route::get('/colors/data','getColorsData')->name('admin.color.data');
        });

        //====== selection Depo=====
        Route::controller(DepoController::class)->group(function(){
            Route::get('/depos','index')->name('admin.depo.index');
            // Add a new route for DataTables AJAX requests
            Route::get('/depos/data','getDeposData')->name('admin.depo.data');

            Route::get('/depos-create', 'create')->name('admin.depo.create');
            Route::post('/depos','store')->name('save_depo');
            Route::get('/depos-edit/{id}','edit')->name('admin.depo.edit');
            Route::put('/depo_update/{id}','update')->name('update_depo');
            Route::delete('/depos-delete/{id}','destroy')->name('delete_depo');
        });

        //====== selection CaculateProduct=====
        Route::controller(CaculateProductController::class)->group(function(){
            Route::get('/calculate-products','index')->name('admin.cal_product.index');
            Route::post('/calculate-products','store')->name('save_calculateproduct');
            Route::put('/calculate-products/{id}','update')->name('update_calculateproduct');
            Route::delete('/calculate-products-delete/{id}','destroy')->name('delete_calculateproduct');
        });

        //====== selection User=====
        Route::controller(UserController::class)->group(function(){
            Route::get('/users','index')->name('admin.users.index');
            Route::get('/users-create','create')->name('admin.users.create');
            Route::post('/users','store')->name('save_user');
            Route::get('/users-edit/{id}','edit')->name('admin.users.edit');
            Route::put('/users-update/{id}','update')->name('update_user');
            Route::delete('/users-delete/{id}','destroy')->name('delete_user');

            // Route User profile and update profile
            Route::get('/user-profile','profile')->name('admin.users.profile');
            Route::post('/user-profile','profileUpdate')->name('update_userprofile');
        });

        //====== selection ForgotPassword =====
        Route::controller(ForgotPasswordController::class)->group(function(){

        });

        //====== selection ResetPassword =====
        Route::controller(ResetPasswordController::class)->group(function(){

        });

        //====== selection AboutUs=====
        Route::controller(AboutController::class)->group(function(){
            Route::get('/about-us','index')->name('admin.about.index');
                // Route to handle the form submission for updating
            Route::post('/about-us','update')->name('update_aboutus');
        });

        //====== selection Task=====
        Route::controller(TaskController::class)->group(function(){
            Route::get('/tasks','index')->name('admin.task.index');;
        });
    });
});

Route::middleware(['user'])->group(function () {
    // This middleware will apply to all routes that require authentication
});

Route::middleware(['manager'])->group(function () {
    // This middleware will apply to all routes that require manager access
});