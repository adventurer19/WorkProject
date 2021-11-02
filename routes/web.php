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

// public route
Route::name('/')->get('/', function () {
    return view('home.public',['categories'=>\App\Models\Category::all()]);
});


// admin/user panel
Route::name('panel')->get('/panel',function (){
    return view('body.main');
});



Route::name('list')->get('/list', [\App\Http\Controllers\PublicController::class, 'index']);




Route::prefix('products')->middleware('auth')->resource('/product',ProductController::class);

Route::prefix('categories')->middleware('auth')->resource('/category',CategoryController::class);

Route::prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::resource('/users',UserController::class);
});
