<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\CardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\SingleProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','as'=>'admin.' ,'middleware' => ['auth']], function ()
{
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category' , CategoryController::class);
    Route::resource('product' , ProductController::class);
    Route::resource('order' , OrderController::class);
});


Route::group(['as' => 'frontend.'], function ()
{
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/koszyk', [CardController::class, 'index'])->name('cart-index');
    Route::get('/koszyk/show-Product', [CardController::class, 'show-Product'])->name('show-product');
    Route::post('/koszyk/order/{id}', [CardController::class, 'addOrder'])->name('add-order');
    Route::get('/{category}/', [FrontendController::class, 'categoryProduct'])->name('category-product');
    Route::get('/{slugCategory}/{product}', [SingleProductController::class, 'index'])->name('single-product');
    Route::post('/produkt/{product}', [CardController::class, 'addProduct'])->name('add-product');
    Route::post('/koszyk/{product}', [CardController::class, 'deleteProduct'])->name('delete-product');
});
