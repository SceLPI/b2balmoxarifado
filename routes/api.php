<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Entity\BuildController;
use App\Http\Controllers\Api\Entity\CityHallController;
use App\Http\Controllers\Api\Entity\SecretaryController;
use App\Http\Controllers\Api\Entity\WarehouseController;
use App\Http\Controllers\Api\EntityController;
use App\Http\Controllers\Api\ManufacturerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TypeController;
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
