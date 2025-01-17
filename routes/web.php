<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Halaman register yang digunakan di halaman utama
Route::get('/', function () {
    return view('auth/register');
});

// Halaman utama untuk user yang sudah login dengan role customer
// Route::get('home', [HomeController::class, 'home'])
//     ->middleware(['auth', 'verified', 'rolemanager:customer'])
//     ->name('dashboard');


// Rute untuk menambahkan item ke keranjang
// Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])
//     ->middleware(['auth', 'verified', 'rolemanager:customer'])
//     ->name('add_cart');

// Halaman dashboard admin
Route::get('/admin/dashboard', function () {
    return view('admin/index');
})->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin');


// Halaman dashboard vendor
Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified', 'rolemanager:vendor'])->name('vendor');

// Rute untuk mengelola profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // // Halaman Keranjang
    // Route::get('cart', [HomeController::class, 'cart'])->name('cart');
    
    // // Hapus item dari keranjang
    // Route::delete('cart/{id}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
});

// Rute untuk halaman checkout
// Route::middleware(['auth'])->group(function () {
//     Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
// });

// Rute untuk halaman admin dan manajemen produk
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    // Halaman untuk menambahkan produk
    Route::get('admin/addProduct', [AdminController::class, 'add_Product'])
        ->name('admin.addProduct');
    
    // Proses upload produk
    Route::post('upload_product', [AdminController::class, 'upload_product']);

    // Halaman daftar produk
    Route::get('admin/viewProduct', [AdminController::class, 'index'])
        ->name('admin.viewProduct');

    // Halaman edit produk
    Route::get('admin/editProduct/{id}', [AdminController::class, 'edit'])
        ->name('admin.editProduct');

    // Proses update produk
    Route::put('admin/updateProduct/{id}', [AdminController::class, 'update'])
        ->name('admin.updateProduct');

    // Proses delete produk
    Route::delete('admin/deleteProduct/{id}', [AdminController::class, 'destroy'])
        ->name('admin.deleteProduct');
    //history
    Route::get('admin/history', [AdminController::class, 'index2'])->name('admin.orders');
});


Route::middleware('rolemanager:customer')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('dashboard');
    // Memproses checkout
    Route::post('customer/midtranSnap', [OrderController::class, 'checkout'])->name('checkout.process');

    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout'); // Menggunakan parameter ID produk
});



//Route::post('/callback', [OrderController::class, 'callback']);

require __DIR__.'/auth.php';
