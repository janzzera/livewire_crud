<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SysUserController;
use App\Livewire\Prodlist;
use App\Livewire\ProductCreate;
use App\Livewire\ProductShow;
use App\Livewire\ProductEdit;

Route::get('/login', [SysUserController::class, 'login'])->name('login');
Route::post('/authenticate', [SysUserController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [SysUserController::class, 'register'])->name('register');
Route::post('/store', [SysUserController::class, 'store'])->name('store');

Route::middleware('auth')->group(function() {
    // Route::get('/', function () {
    //     return redirect(route('products.index')); 
    // });
    
    // Route::resource('products', ProductController::class);
    Route::match(['POST', 'GET'], '/logout', [SysUserController::class, 'logout'])->name('logout');
});

Route::get('/productlist', Prodlist::class)->name("productlist");
Route::get('/product-create', ProductCreate::class)->name("product-create");
Route::get('/product-edit', ProductEdit::class)->name("product-edit");
Route::get('/product-show/{product}', ProductShow::class)->name("product-show");



