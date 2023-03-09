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
    Route::get('/forbidden', [AdminController::class, 'forbidden'])->name('forbidden')->middleware('pasien');

    Route::middleware(['apodok'])->group(function(){

        //Main Menu
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        Route::get('/set-obat', [HomeController::class, 'obat_habis'])->name('set_obat');

        Route::get('/set-timer', [HomeController::class, 'set_timer'])->name('set-timer');

        Route::get('/keluhan-pasien', [HomeController::class, 'keluhan_pasien'])->name('keluhan-pasien');

        Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');

        //Menu Stock Obat
        Route::get('/stock-obat', [ObatController::class, 'stock_obat'])->name('stock-obat');

        Route::post('/add-dataobat', [ObatController::class, 'add_obat'])->name('add-obat');

        //Menu Pasien
        Route::post('/submit', [HomeController::class, 'store_pasien'])->name('store_pasien');

        Route::get('/detail-pasien-{slug}', [HomeController::class, 'detail_pasien'])->name('pasien');

        Route::get('/keluhan-pasien-{slug}', [HomeController::class, 'detail_pasien'])->name('keluhan-pasien');

        Route::get('/timer-obat-pasien-{slug}', [HomeController::class, 'detail_pasien'])->name('set-timer');

        Route::post('/submit-obat', [ObatController::class, 'store_obat'])->name('store-obat');

        Route::post('/submit-datalab', [LabController::class, 'store_datalab'])->name('store-datalab');

        //Menu Schedule Pasien
        Route::post('/add-schedule', [ScheduleController::class, 'add_schedule'])->name('add-schedule');

        Route::post('/delete-schedule', [ScheduleController::class, 'delete_schedule'])->name('delete_schedule');
     });

     Route::middleware(['admin'])->group(function(){

        //Admin
        Route::get('/all-admin', [AdminController::class, 'index'])->name('all-admin')->middleware('admin');

        Route::post('/store-account', [AdminController::class, 'store_account'])->name('all-admin')->middleware('admin');

        Route::get('/delete-account-{id}', [AdminController::class, 'delete_account'])->name('all-admin')->middleware('admin');

        Route::get('/users', [AdminController::class, 'users'])->name('users')->middleware('admin');

        Route::get('/settings', [AdminController::class, 'settings'])->name('settings')->middleware('admin');
     });
});



?>
