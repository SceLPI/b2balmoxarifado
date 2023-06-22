<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('test', [EntityController::class, "index"]);

// Route::get('')

Route::get('/', [HomeController::class, "home"])->name('home');
Route::resource('/types', TypeController::class);
Route::resource('/manufacturers', ManufacturerController::class);
Route::resource('/entities', EntityController::class);
Route::resource('/warehouses', WarehouseController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);
Route::resource('/users', UserController::class);
Route::resource('/orders', OrderController::class);
