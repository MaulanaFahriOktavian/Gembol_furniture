<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Customer\Home;
use App\Livewire\Customer\ProductDetail;
use App\Livewire\Admin\Dashboard as AdminDashboard; // ← IMPORT INI
use App\Livewire\Admin\Products as AdminProducts;
use App\Livewire\Customer\Checkout;
use App\Livewire\Customer\OrderSuccess;

Route::get('/order/success/{orderId}', OrderSuccess::class)->name('order.success');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/', Home::class)->name('home');
Route::get('/product/{slug}', ProductDetail::class)->name('product.show');

// ... route admin ...
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth']) // Tambahkan 'role:admin' nanti jika sudah setup roles
    ->group(function () {
        
        // ✅ Gunakan ::class untuk Livewire component
        Route::get('/', AdminDashboard::class)->name('dashboard');

        Route::get('/products', AdminProducts::class)->name('products');
        
        // Route placeholder untuk produk & orders (nanti kita buat component-nya)
        Route::get('/products', function() {
            return view('livewire.admin.products');
        })->name('products');
        
        Route::get('/orders', function() {
            return view('livewire.admin.orders');
        })->name('orders');
    });