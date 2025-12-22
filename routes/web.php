<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
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

Route::middleware('auth')->group(function () {
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

    Route::middleware('admin')->group(function () {
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
        Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/confirmation', [CartController::class, 'confirmation'])->name('cart.confirmation');
});

Route::view('/contact', 'components.contact')->name('contact');
