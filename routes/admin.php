<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FestivalController;
use App\Http\Controllers\Admin\PujaController;
use App\Http\Controllers\Admin\TempleController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:Super Admin|Admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('temples', TempleController::class);
    Route::resource('pujas', PujaController::class);
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');
    Route::resource('blogs', BlogController::class);
    Route::resource('festivals', FestivalController::class);
    Route::resource('testimonials', TestimonialController::class);
});
