<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
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
Route::name('/')->get('/', function () {
    return view('home.index',['categories'=>\App\Models\Category::all()]);
});
//Route::name('search')->get('/search',function (){
//    return view('home.index',['categories'=>\App\Models\Category::all()]);
//});

//Route::get('/home',function (){
//    return view('product.index');
//});


Route::prefix('products')->middleware('auth')->resource('/product',ProductController::class);

Route::prefix('categories')->middleware('auth')->resource('/category',CategoryController::class);

Route::prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::resource('/users',UserController::class);
});
