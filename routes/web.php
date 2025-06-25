<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;




Route::get('/', [BookingController::class, 'calendar'])->name('bookings.calendar');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');
