<?php
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [DoctorController::class, 'index'])->name('testApi');

Route::get('/doctors/{slug}', [DoctorController::class, 'show']);

Route::post('/messages', [MessageController::class, 'store']);

Route::get('/doctors/specialization/{slug}', [DoctorController::class, 'getDoctorsBySpecializationSlug']);
Route::get('/doctors/{slug}', [DoctorController::class, 'show']);