<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\PatientController;

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

Route::prefix('v1')->group(function(){

    Route::post('/masuk', [PatientController::class, 'login']);
    Route::post('/send-otp', [PatientController::class, 'sendOTP']);

    Route::middleware(['auth:sanctum', 'pasien'])->group(function(){
        
        Route::prefix('auth')->controller(PatientController::class)->group(function(){
            Route::post('/keluar', [PatientController::class, 'keluar']);
        });

    });
});