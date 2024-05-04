<?php

use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\BraintreeController2;
use App\Http\Controllers\BraintreeController3;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SponsorizationController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware("auth")->group( function(){
    Route::resource("doctors", DoctorController::class);
});

Route::middleware("auth")->group( function(){
    Route::resource("messages", MessageController::class);
});

Route::middleware("auth")->group( function(){
    Route::resource("reviews", ReviewController::class);
});

Route::middleware("auth")->group( function(){
    Route::resource("specializations", SpecializationController::class);
});

Route::middleware("auth")->group( function(){
    Route::resource("sponsorizations", SponsorizationController::class);
});

Route::middleware("auth")->group( function(){
    Route::resource("votes", VoteController::class);
});

Route::any('/payment', [BraintreeController::class, 'token'])->name('token')->middleware('auth');

Route::any('/payment2', [BraintreeController2::class, 'token'])->name('token2')->middleware('auth');

Route::any('/payment3', [BraintreeController3::class, 'token'])->name('token3')->middleware('auth');

Route::post('/assign-sponsorization', [DoctorController::class, 'assignSponsorizationToDoctor'])->name('doctor.assignSponsorization');




require __DIR__.'/auth.php';
