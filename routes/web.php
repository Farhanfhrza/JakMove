<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MobileBookingController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/payment', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('ticket')->group(function () {
        Route::get('/type', [BookingController::class, 'chooseTransport'])->name('choose.transport');
        Route::get('/stops/{transportType}', [BookingController::class, 'chooseStops'])->name('choose.stops');
        Route::post('/review', [BookingController::class, 'reviewTicket'])->name('ticket.review');
        Route::post('/pay', [BookingController::class, 'payTicket'])->name('ticket.pay');
    });
    
    Route::prefix('mobile')->group(function () {
        Route::get('/dashboard', [MobileBookingController::class, 'dashboard'])->name('mobile.dashboard');

        Route::prefix('ticket')->group(function () {
            Route::get('/type', [MobileBookingController::class, 'chooseTransport'])->name('mobile.choose.transport');
            Route::get('/{id}', [MobileBookingController::class, 'show'])->name('mobile.ticket.detail');
            Route::get('/stops/{transportType}', [MobileBookingController::class, 'chooseStops'])->name('mobile.choose.stops');
            Route::post('/review', [MobileBookingController::class, 'reviewTicket'])->name('mobile.ticket.review');
            Route::post('/pay', [MobileBookingController::class, 'payTicket'])->name('mobile.ticket.pay');
        });
    });
});

require __DIR__ . '/auth.php';
