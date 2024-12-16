<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contactUs', function () {
    return view('contact');
});
//Model View Controller (MVC) 
//View: UI/ html

Route::get('/addProduct', function () {
    return view('addProduct');
});
Route::post('/addProduct/store', [ProductController::class, 'add'])->name('addProduct');
Route::get('/showProduct', [ProductController::class, 'show'])->name('showProduct');


Route::get('/editProduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
Route::post('/updateProduct', [ProductController::class, 'update'])->name('updateProduct');

Route::get('/deleteProduct/{id}', [ProductController::class, 'delete'])->name('deleteProduct');

Route::get('/productDetail/{id}', [ProductController::class, 'detail'])->name('productDetail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
