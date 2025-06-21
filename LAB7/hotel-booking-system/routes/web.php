<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('bookings/report', [BookingController::class, 'report'])->name('bookings.report');
Route::resource('rooms', RoomController::class);
Route::resource('guests', GuestController::class);
Route::resource('bookings', BookingController::class);
