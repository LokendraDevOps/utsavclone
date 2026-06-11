<?php

use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\BookingFlowController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\FamilyMemberController;
use App\Http\Controllers\User\GotraController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('dashboard')->as('user.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('family-members', FamilyMemberController::class)->except(['show']);
    Route::resource('gotra-information', GotraController::class)->except(['show']);

    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

    Route::get('book-puja', [BookingFlowController::class, 'stepOne'])->name('bookings.start');
    Route::post('book-puja/temple', [BookingFlowController::class, 'storeTemple'])->name('bookings.temple');
    Route::post('book-puja/puja', [BookingFlowController::class, 'storePuja'])->name('bookings.puja');
    Route::post('book-puja/date', [BookingFlowController::class, 'storeDate'])->name('bookings.date');
    Route::post('book-puja/sankalp', [BookingFlowController::class, 'storeSankalp'])->name('bookings.sankalp');
    Route::get('book-puja/summary', [BookingFlowController::class, 'summary'])->name('bookings.summary');
    Route::post('book-puja/confirm', [BookingFlowController::class, 'confirm'])->name('bookings.confirm');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
