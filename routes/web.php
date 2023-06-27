<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FromToProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
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

Route::middleware('auth')->prefix('/')->group(function () {
    Route::get('/logout', [AuthController::class, "logout"])->name('auth.logout');
    Route::get('/', [HomeController::class, "home"])->name('home');
    Route::resource('/types', TypeController::class);
    Route::resource('/manufacturers', ManufacturerController::class);
    Route::resource('/entities', EntityController::class);
    Route::resource('/warehouses', WarehouseController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/from_to_products', FromToProductController::class);
    Route::get('/invoices', [ ProductController::class, "invoice"])->name('products.invoice');
    Route::post('/invoices/review', [ ProductController::class, "invoiceUpload"])->name('products.invoice.review');
    Route::post('/invoices', [ ProductController::class, "invoiceFinish"])->name('products.invoice.finish');
});

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
