<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimoniController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'sendMessage'])->name('contact.send');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/confirmation', [CartController::class, 'confirmation'])->name('cart.confirmation');
Route::post('/cart/store', [CartController::class, 'storeOrder'])->name('cart.storeOrder');

Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('cars', AdminCarController::class);
    Route::get('carts', [AdminCartController::class, 'index'])->name('carts.index');
    Route::get('carts/{id}', [AdminCartController::class, 'show'])->name('carts.show');
    Route::delete('carts/{id}', [AdminCartController::class, 'destroy'])->name('carts.destroy');

    Route::get('testimoni', [TestimoniController::class, 'adminIndex'])->name('testimoni.index');
    Route::delete('testimoni/{testimoni}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
});
