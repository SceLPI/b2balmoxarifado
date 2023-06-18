<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Entity\BuildController;
use App\Http\Controllers\Backend\Entity\CityHallController;
use App\Http\Controllers\Backend\Entity\SecretaryController;
use App\Http\Controllers\Backend\Entity\WarehouseController;
use App\Http\Controllers\Backend\EntityController;
use App\Http\Controllers\Backend\ManufacturerController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

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
