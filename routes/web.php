<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LabController;

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
    return view('welcomes/welcome');
})->middleware('guest');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/set-obat', [HomeController::class, 'obat_habis'])->name('set_obat');

    Route::get('/set-timer', [HomeController::class, 'set_timer'])->name('set-timer');

    Route::get('/keluhan-pasien', [HomeController::class, 'keluhan_pasien'])->name('keluhan-pasien');

    Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');

    Route::get('/stock-obat', [HomeController::class, 'stock_obat'])->name('stock-obat');

    //Menu Pasien
    Route::post('/submit', [HomeController::class, 'store_pasien'])->name('store_pasien');

    Route::get('/detail-pasien-{slug}', [HomeController::class, 'detail_pasien'])->name('pasien');

    Route::get('/keluhan-pasien-{slug}', [HomeController::class, 'detail_pasien'])->name('keluhan-pasien');

    Route::get('/timer-obat-pasien-{slug}', [HomeController::class, 'detail_pasien'])->name('set-timer');

    Route::post('/add-schedule', [ScheduleController::class, 'add_schedule'])->name('add-schedule');

    Route::post('/submit-obat', [ObatController::class, 'store_obat'])->name('store-obat');

    Route::post('/submit-datalab', [LabController::class, 'store_datalab'])->name('store-datalab');

    //Admin
    Route::get('/all-admin', [AdminController::class, 'index'])->name('all-admin')->middleware('admin');

    Route::post('/store-account', [AdminController::class, 'store_account'])->name('all-admin')->middleware('admin');

    Route::get('/delete-account-{id}', [AdminController::class, 'delete_account'])->name('all-admin')->middleware('admin');

    Route::get('/users', [AdminController::class, 'users'])->name('users')->middleware('admin');

    Route::get('/settings', [AdminController::class, 'settings'])->name('settings')->middleware('admin');


});



?>
