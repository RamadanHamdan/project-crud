<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    return view('home',['title' => 'Dashboard']);
});

Route::get('create',function() {
    return view('create',['title' => 'Create']);
});

Route::get('products',function($product){
    return view('products',['products' => Product::all()]);
});