<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controller All In
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

Route::get('/', [AuthController::class, 'index'])->name('admin.auth.index');
Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard.home');

//====== selection Product=====
Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
Route::get('/product-create',[ProductController::class, 'create'])->name('admin.product.create');
Route::get('/product-edit',[ProductController::class, 'edit'])->name('admin.product.edit');

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

Route::get('/about',[AboutController::class, 'index'])->name('admin.about.index');
Route::get('/task',[TaskController::class, 'index'])->name('admin.task.index');