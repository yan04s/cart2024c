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
Route::get('/addProduct/store', [ProductController::class, 'add'])->name('addProduct');


