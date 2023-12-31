<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','role:user'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard','index')->name('admindashboard');
       
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category','Index')->name('allcategory');
        Route::get('/admin/add-category','AddCategory')->name('addcategory');
        Route::post('/admin/store-category','StoreCategory')->name('storecategory');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory','Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory');
       
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products','Index')->name('allproducts');
        Route::get('/admin/add-product','AddProduct')->name('addproduct');
       
    });
    
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order','Index')->name('pendingorder');
    });
    
    });









require __DIR__.'/auth.php';

//add github