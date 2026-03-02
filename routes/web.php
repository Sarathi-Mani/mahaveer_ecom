<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AwardsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\MobileAuthController;
use App\Http\Controllers\Frontend\ShopActionController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [HomeController::class, 'index'])
        ->name('home');
Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])
        ->name('products.show');
Route::post('/products/inquiry', [ProductController::class, 'submitInquiry'])
        ->name('products.inquiry');
Route::get('/accessories', [ProductController::class, 'accessories'])
        ->name('accessories.index');
Route::get('/about', [AboutController::class, 'index'])
        ->name('about.index');
Route::get('/awards', [AwardsController::class, 'index'])
        ->name('awards.index');
Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact.index');
Route::post('/contact/submit', [ContactController::class, 'submit'])
        ->name('contact.submit');
Route::post('/search/suggestions', [ProductController::class, 'suggestions'])
        ->name('search.suggestions');

Route::middleware('guest')->group(function () {
    Route::get('/member/register', [MobileAuthController::class, 'showRegisterForm'])->name('member.register');
    Route::post('/member/register', [MobileAuthController::class, 'register']);
    Route::get('/member/login', [MobileAuthController::class, 'showLoginForm'])->name('member.login');
    Route::post('/member/login', [MobileAuthController::class, 'sendLoginOtp'])->name('member.login.otp');
    Route::get('/member/verify-otp', [MobileAuthController::class, 'showVerifyOtpForm'])->name('member.verify-otp');
    Route::post('/member/verify-otp', [MobileAuthController::class, 'verifyOtp'])->name('member.verify-otp.submit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/wishlist', [ShopActionController::class, 'wishlistIndex'])->name('wishlist.index');
    Route::post('/wishlist/{product}', [ShopActionController::class, 'wishlistStore'])->name('wishlist.store');
    Route::post('/wishlist/{product}/toggle', [ShopActionController::class, 'wishlistToggle'])->name('wishlist.toggle');
    Route::delete('/wishlist/{product}', [ShopActionController::class, 'wishlistDestroy'])->name('wishlist.destroy');
    Route::post('/wishlist/{product}/move-to-cart', [ShopActionController::class, 'wishlistMoveToCart'])->name('wishlist.move_to_cart');

    Route::get('/cart', [ShopActionController::class, 'cartIndex'])->name('cart.index');
    Route::post('/cart/{product}', [ShopActionController::class, 'cartStore'])->name('cart.store');
    Route::delete('/cart/{product}', [ShopActionController::class, 'cartDestroy'])->name('cart.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
