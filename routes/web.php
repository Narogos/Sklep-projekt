<?php

use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\SingleProductController;
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

Route::group(['as' => 'frontend.'], function ()
{
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/{category}/', [FrontendController::class, 'categoryProduct'])->name('category-product');
    Route::get('/{slugCategory}/{product}', [SingleProductController::class, 'index'])->name('single-product');
});
