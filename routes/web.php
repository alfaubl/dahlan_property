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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->whereNumber('property')
    ->name('properties.show');


/*
|--------------------------------------------------------------------------
| MIDTRANS WEBHOOK - TANPA CSRF & TANPA AUTH ⚠️ PENTING
|--------------------------------------------------------------------------
*/
Route::post('/payment/notification', [PaymentController::class, 'notification'])
    ->name('payment.notification');


/*
|--------------------------------------------------------------------------
| MIDTRANS REDIRECT HANDLERS - TANPA AUTH MIDDLEWARE
|--------------------------------------------------------------------------
*/
Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/finish', [PaymentController::class, 'finish'])->name('finish');
    Route::get('/unfinish', [PaymentController::class, 'unfinish'])->name('unfinish');
    Route::get('/error', [PaymentController::class, 'error'])->name('error');
});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', fn() => redirect()->route('dashboard'));

    /* PROPERTIES CRUD */
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    /* CART */
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{property}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{cart}', [CartController::class, 'remove'])->name('remove');
    });

    /* WISHLIST */
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::post('/{property}', [WishlistController::class, 'store'])->name('store');
        Route::delete('/{wishlist}', [WishlistController::class, 'destroy'])->name('destroy');
    });

    /* PROFILE */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* =======================
       BOOKING ROUTES - PASTI KONSISTEN
       ======================= */
    Route::prefix('bookings')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');        // route: booking.index
        Route::get('/create/{property}', [BookingController::class, 'create'])->name('create'); // route: booking.create
        Route::post('/', [BookingController::class, 'store'])->name('store');       // route: booking.store
        Route::get('/{bookings', [BookingController::class, 'show'])->name('show'); // route: booking.show
        Route::post('/{bookings}/cancel', [BookingController::class, 'cancel'])->name('cancel'); // route: booking.cancel
    });

    /* PAYMENT - USER SIDE */
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/process/{payment}/{token?}', [PaymentController::class, 'process'])->name('process');
        Route::get('/success/{payment}', [PaymentController::class, 'success'])->name('success');
        Route::get('/failed/{payment}', [PaymentController::class, 'failed'])->name('failed');
        Route::post('/retry/{payment}', [PaymentController::class, 'retry'])->name('retry');
        Route::get('/check-status/{id}', [PaymentController::class, 'checkStatus'])->name('checkStatus');
        
        // Generate Snap Token untuk frontend
        Route::post('/snap-token/{booking}', [PaymentController::class, 'generateSnapToken'])
            ->name('snap-token');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});