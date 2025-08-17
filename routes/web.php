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



Route::get('/product/ungulan', \App\Livewire\Product\ProductUnggulan::class)->name('ungulan');
Route::get('/product/kategori', \App\Livewire\Product\KategoriProduct::class)->name('kategori');
Route::get('/product/promo',\App\Livewire\Promo::class)->name('promo');
Route::get('/lacak', \App\Livewire\LacakPesanan::class)->name('lacak');
Route::get('/product/packet',\App\Livewire\Product\Packet::class)->name('packet');

Route::middleware(['auth'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
        Route::get('/users', \App\Livewire\Admin\Page\KelolaUser::class)->name('users.index');
        Route::get('/product', \App\Livewire\Admin\Page\ProductAdmin::class)->name('product.index');
        Route::get('/packet', \App\Livewire\Admin\Page\PacketProduct::class)->name("packet.index");
        Route::get('/pesanan', \App\Livewire\Admin\Page\Pesanan::class)->name("pesanan.index");
        Route::get('/promo', \App\Livewire\Admin\Page\ProductPromo::class)->name("promo.index");
        Route::get('/unggulan', \App\Livewire\Admin\Page\ProductUnggulan::class)->name("unggulan.index"); 
});





