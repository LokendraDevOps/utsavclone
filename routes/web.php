<?php

use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\FestivalController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\PujaController;
use App\Http\Controllers\Front\TempleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
Route::get('/panchang', [PageController::class, 'panchang'])->name('panchang');

Route::get('/temples', [TempleController::class, 'index'])->name('temples.index');
Route::get('/temples/{temple}', [TempleController::class, 'show'])->name('temples.show');

Route::get('/pujas', [PujaController::class, 'index'])->name('pujas.index');
Route::get('/pujas/{puja}', [PujaController::class, 'show'])->name('pujas.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
Route::get('/festivals/{festival}', [FestivalController::class, 'show'])->name('festivals.show');

require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';
