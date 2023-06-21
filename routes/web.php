<?php

use App\Http\Controllers\Frontend\EntityController;
use App\Http\Controllers\TypeController;
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

Route::resource('/types', TypeController::class);

Route::resource('/entities', EntityController::class);
Route::resource('/builds', BuildController::class);
Route::resource('/city-halls', CityHallController::class);
Route::resource('/secretaries', SecretaryController::class);
Route::resource('/warehouses', WarehouseController::class);

Route::resource('/manufacturers', ManufacturerController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);
Route::resource('/orders', OrderController::class);
