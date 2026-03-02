<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AwardsController;
use App\Http\Controllers\Frontend\ContactController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
