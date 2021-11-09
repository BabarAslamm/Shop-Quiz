<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageMetaController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/user', function () {
//     return view('user.index');

//  });
  Route::get('/user', [UserViewController::class, 'index']);
Route::get('/{slug}/show/{id}', [UserViewController::class, 'Page']);
Route::get('/{slug}/show/{id}', [UserViewController::class, 'Shop'])->name('create.shop');
//  Route::get('/create/shop', [UserViewController::class, 'Shop']);
//SHOP PRODUCT MODAL
Route::get('shop/product/{id}',  [App\Http\Controllers\UserViewController::class, 'ProductModal'])->name('ShopProduct');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('status');


////PAGE
Route::get('/{slug}/edit/{id}', [PageController::class, 'Page']);

///////////////// Page Meta
Route::post('PageMeta-data',  [App\Http\Controllers\PageMetaController::class, 'data'])->name('PageMeta-data');
Route::resource('PageMeta', App\Http\Controllers\PageMetaController::class);

///////////////// Category
Route::get('Category-data',  [App\Http\Controllers\CategoryController::class, 'data'])->name('Category-data');
Route::resource('Category', App\Http\Controllers\CategoryController::class);
Route::get('Del/Category/{id}',  [App\Http\Controllers\CategoryController::class, 'destroy'])->name('DelCat');

///////////////// Product
Route::get('Product-data',  [App\Http\Controllers\ProductController::class, 'data'])->name('Product-data');
Route::resource('Product', App\Http\Controllers\ProductController::class);
Route::get('Del/Product/{id}',  [App\Http\Controllers\ProductController::class, 'destroy'])->name('DelPost');
///////////CAROSEL
Route::post('upload/store',  [App\Http\Controllers\ProductController::class, 'carosel_store']);
Route::post('delete',  [App\Http\Controllers\ProductController::class, 'carosel_delete']);



