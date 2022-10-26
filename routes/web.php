<?php
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductcategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;

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
////utana
Route::get('/',[Testcontroller::class, 'index'])->name('home');
////
route::resource('productcategories', ProductcategoriesController::class);
route::resource('products', ProductsController::class);
