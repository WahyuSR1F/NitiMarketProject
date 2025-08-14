<?php

use App\Livewire\About;

use App\Livewire\Contact;
use App\Livewire\Landing;
use App\Livewire\Login;
use App\Livewire\Product\Detail;
use App\Livewire\Product\Product;
use Illuminate\Support\Facades\Route;





Route::get('/', Landing::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/product', Product::class)->name('product');
Route::get('/product/detail/{user}', Detail::class)->name('product.detail');
Route::get('/login', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
});

Route::get('/product/ungulan', \App\Livewire\Product\ProductUnggulan::class)->name('ungulan');
Route::get('/product/kategori', \App\Livewire\Product\KategoriProduct::class)->name('kategori');
Route::get('/product/promo',\App\Livewire\Promo::class)->name('promo');
Route::get('/lacak', \App\Livewire\LacakPesanan::class)->name('lacak');
Route::get('/product/packet',\App\Livewire\Product\Packet::class)->name('packet');





