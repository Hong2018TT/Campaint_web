<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

// All Controllers
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColorFamilyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DepoController;
use App\Http\Controllers\CaculateProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Forgot Password (Optional Setup)
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); // Create this view if needed
})->middleware('guest')->name('password.request');

/*
|--------------------------------------------------------------------------
| Public Routes (Login / Logout)
|--------------------------------------------------------------------------
*/
// Login Page
Route::get('/', [AuthController::class, 'index'])->name('login');

// Login Submit
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout (POST method required for security)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes (Requires Authentication)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.home');

    // Product Management
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product-create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::get('/product-edit', [ProductController::class, 'edit'])->name('admin.product.edit');

    // Color Family Management
    Route::get('/colorfamily', [ColorFamilyController::class, 'index'])->name('admin.colorfamily.index');

    // Color Management
    Route::get('/colors', [ColorController::class, 'index'])->name('admin.color.index');
    Route::get('/colors-create', [ColorController::class, 'create'])->name('admin.color.create');
    Route::get('/colors-edit', [ColorController::class, 'edit'])->name('admin.color.edit');

    // Depot Management
    Route::get('/depo', [DepoController::class, 'index'])->name('admin.depo.index');
    Route::get('/depo-create', [DepoController::class, 'create'])->name('admin.depo.create');
    Route::get('/depo-edit', [DepoController::class, 'edit'])->name('admin.depo.edit');

    // Product Calculation
    Route::get('/calculate-product', [CaculateProductController::class, 'index'])->name('admin.cal_product.index');

    // User Management
    Route::get('/user', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user-profile', [UserController::class, 'profile'])->name('admin.users.profile');

    // Misc Pages
    Route::get('/about', [AboutController::class, 'index'])->name('admin.about.index');
    Route::get('/task', [TaskController::class, 'index'])->name('admin.task.index');
});
