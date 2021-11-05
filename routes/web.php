<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\PublicController;
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




// admin/user panel
Route::name('panel')->get('/panel',function (){
    return view('body.main');
});

//Route::name('/')->get('/',[PublicController::class,'public']);
Route::name('/')->get('/',function (){
    return view('public.index',['categories'=>\App\Models\Category::all()]);
});




Route::prefix('public')->resource('/public',\App\Http\Controllers\PublicController::class);




Route::prefix('products')->middleware('auth')->resource('/product',ProductController::class);

Route::prefix('categories')->middleware('auth')->resource('/category',CategoryController::class);

Route::prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::resource('/users',UserController::class);
});
