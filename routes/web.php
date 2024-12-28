<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

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

Route::post('/addCart', [CartController::class, 'addCart'])->name('addCart');
Route::get('/myCart', [CartController::class, 'view'])->name('myCart');

Route::post('/checkout', [PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('/viewProducts', [ProductController::class, 'view'])->name('viewProduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
