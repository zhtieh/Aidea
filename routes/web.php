<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\LoginRegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class, 'home']);

Route::get('/payment/{productGUID}', [HomeController::class, 'payment']);

Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/admin/store', 'store')->name('store');
    Route::get('/admin/login', 'login')->name('login');
    Route::post('/admin/authenticate', 'authenticate')->name('authenticate');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::post('/admin/logout', 'logout')->name('logout');
});

Route::controller(BannerController::class)->group(function() {
    Route::get('/admin/banners/activebanners', 'index')->name('activebanners');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('/admin/products', 'index')->name('products');
});

//Ajax
//Banner
Route::post('update-banner-details', [BannerController::class, 'UpdateBanner'])->name('UpdateBanner');
Route::get('get-active-banner', [BannerController::class, 'GetActiveBanner'])->name('GetActiveBanner'); 

//Product
Route::get('GetProductDetails/{productGUID}', [ProductController::class, 'GetProductDetails'])->name('GetProductDetails'); 
Route::post('add-product', [ProductController::class, 'EditProduct'])->name('EditProduct');
Route::post('edit-product', [ProductController::class, 'AddNewProduct'])->name('AddNewProduct');
Route::post('delete-product', [ProductController::class, 'DeleteProduct'])->name('DeleteProduct');
Route::post('set-hotsales', [ProductController::class, 'SetHotSales'])->name('SetHotSales');

Route::get('get-active-product', [ProductController::class, 'GetActiveProduct'])->name('GetActiveProduct'); 