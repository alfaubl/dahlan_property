<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman statis
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// PUBLIC PROPERTY (lihat saja tanpa login)
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Guest Only)
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    /*
    =======================
    PROPERTIES CRUD (MANUAL)
    =======================
    */
    // ✅ ROUTE MANUAL - INI YANG HARUS DIPAKAI!
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    // HAPUS atau KOMENTARI baris ini (jangan dipakai bersama route manual)
    // Route::resource('properties', PropertyController::class)->except(['index', 'show']);


    /*
    =======================
    CART
    =======================
    */
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{property}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{cart}', [CartController::class, 'remove'])->name('remove');
    });


    /*
    =======================
    WISHLIST
    =======================
    */
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::post('/{property}', [WishlistController::class, 'store'])->name('store');
        Route::delete('/{wishlist}', [WishlistController::class, 'destroy'])->name('destroy');
    });


    /*
    =======================
    PROFILE
    =======================
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /*
    =======================
    BOOKING
    =======================
    */
    Route::prefix('bookings')->name('booking.')->group(function () {
        Route::post('/', [BookingController::class, 'store'])->name('store');
        Route::get('/{booking}', [BookingController::class, 'show'])->name('show');
        Route::post('/{booking}/cancel', [BookingController::class, 'cancel'])->name('cancel');
    });


    /*
    =======================
    PAYMENT
    =======================
    */
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/process', [PaymentController::class, 'process'])->name('process');
        Route::post('/notification', [PaymentController::class, 'notification'])->name('notification');
        Route::get('/finish', [PaymentController::class, 'finish'])->name('finish');
        Route::get('/unfinish', [PaymentController::class, 'unfinish'])->name('unfinish');
        Route::get('/error', [PaymentController::class, 'error'])->name('error');
    });


    /*
    =======================
    LOGOUT
    =======================
    */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});