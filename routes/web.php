<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Customer\Home;
use App\Livewire\Customer\ProductDetail;
use App\Livewire\Admin\Dashboard as AdminDashboard; // ← IMPORT INI
use App\Livewire\Admin\Products as AdminProducts;
use App\Livewire\Customer\Checkout;
use App\Livewire\Customer\OrderSuccess;
use App\Livewire\Admin\OrderManagement;

// Route::get('/admin/orders', OrderManagement::class)->name('admin.orders');
Route::get('/order/success/{orderId}', OrderSuccess::class)->name('order.success');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/', Home::class)->name('home');
Route::get('/collections', \App\Livewire\Customer\ProductsCatalog::class)->name('products');
Route::get('/collections/{slug}', ProductDetail::class)->name('product.show');
Route::get('/custom-request', \App\Livewire\Customer\CustomRequest::class)->name('custom-request');
Route::get('/about', \App\Livewire\Customer\About::class)->name('about');
Route::get('/gallery', \App\Livewire\Customer\GalleryPage::class)->name('gallery');
Route::get('/contact', \App\Livewire\Customer\ContactPage::class)->name('contact');
// ... route admin ...
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth']) // Tambahkan 'role:admin' nanti jika sudah setup roles
    ->group(function () {
        Route::get('/', AdminDashboard::class)->name('dashboard');
        Route::get('/products', AdminProducts::class)->name('products');
        Route::get('/orders', OrderManagement::class)->name('orders');
        Route::get('/galleries', \App\Livewire\Admin\Galleries::class)->name('galleries');
        Route::get('/testimonials', \App\Livewire\Admin\Testimonials::class)->name('testimonials');
        Route::get('/custom-orders', \App\Livewire\Admin\CustomOrders::class)->name('custom-orders');
        Route::get('/contacts', \App\Livewire\Admin\Contacts::class)->name('contacts');
    });