<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryStockController;
use App\Http\Controllers\HistoryItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/', [AuthController::class, 'index'])->middleware('role:auth');

Route::post('/login', [AuthController::class, 'cek_login']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('role:auth');

Route::get('/drivers', [LocationController::class, 'show_drivers_page'])->middleware('role:auth');

Route::get('/trucks', [CategoryController::class, 'show_trucks_page'])->middleware('role:auth');

Route::get('/parts', [CategoryStockController::class, 'show_parts_page'])->middleware('role:auth');

Route::get('/about', [BarangMasukController::class, 'show_about_page'])->middleware('role:auth');






