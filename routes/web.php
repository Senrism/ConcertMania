<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ConcertController;
use App\Http\Controllers\admin\TicketController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\guest\BookTicketController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/concert-available', [LandingController::class, 'create'])->name('landing.concert');
Route::get('/book-ticket/{id}', [BookTicketController::class,'create'])->name('booking');
Route::post('/booked', [BookTicketController::class,'store'])->name('booked');

Auth::routes(['register' => false]);
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('concert')->group(function(){
        Route::get('/list', [ConcertController::class, 'index'])->name('concert.index');
        Route::get('/add', [ConcertController::class, 'create'])->name('concert.add');
        Route::post('/store', [ConcertController::class, 'store'])->name('concert.store');
        Route::get('/delete/{id}', [ConcertController::class, 'destroy'])->name('concert.delete');
        Route::get('/show/{id}', [ConcertController::class, 'show'])->name('concert.show');
    });

    Route::prefix('ticket')->group(function(){
        Route::get('/check-ticket-validation', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');
        Route::post('/check-in', [TicketController::class, 'store'])->name('ticket.checkin');
    });

    Route::prefix('customer')->group(function(){
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update', [CustomerController::class, 'update'])->name('customer.update');
    });
});
