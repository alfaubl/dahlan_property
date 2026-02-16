<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;

// ==================== PUBLIC ROUTES ====================
Route::get('/', function () {
    return view('welcome');
});

// Halaman statis
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Properties public routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

// ==================== AUTH ROUTES (GUEST) ====================
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Forgot Password
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

// ==================== PROTECTED ROUTES (AUTH) ====================
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    // Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
        Route::post('/add/{property}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
        Route::delete('/remove/{cart}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    });

    // ========== TAMBAHKAN WISHLIST ROUTES DI SINI ==========
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [\App\Http\Controllers\WishlistController::class, 'index'])->name('index');
        Route::post('/{property}', [\App\Http\Controllers\WishlistController::class, 'store'])->name('store');
        Route::delete('/{wishlist}', [\App\Http\Controllers\WishlistController::class, 'destroy'])->name('destroy');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Properties CRUD (except index & show which are public)
    Route::resource('properties', PropertyController::class)->except(['index', 'show']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});