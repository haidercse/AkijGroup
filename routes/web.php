<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\admin\AdminProductController;

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

//backend
 Route::group(['prefix'=>'admin'], function(){

     Route::get('/dashboard',[AdminController::class,'index']);

      //admin product
     Route::group(['prefix'=>'/product'], function(){
     Route::get('/insert-product',[AdminProductController::class,'index'])->name('admin.product');

     Route::post('/create',[AdminProductController::class,'create'])->name('admin.product.create');

     Route::get('/create',[AdminProductController::class,'create'])->name('admin.product.create');

     Route::get('/product-list',[AdminProductController::class,'list'])->name('admin.product.list');

     Route::get('/product-update/{id}',[AdminProductController::class,'update'])->name('admin.product.update');

     Route::post('/product-update/{id}',[AdminProductController::class,'store'])->name('admin.product.store');

     Route::post('/product-delete/{id}',[AdminProductController::class,'delete'])->name('admin.product.delete');


    });

 });

 //frontend
Route::get('/',[ProductController::class,'index'])->name('product.index');


