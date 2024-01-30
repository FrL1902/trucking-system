<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryStockController;
use App\Http\Controllers\HistoryItemController;
use App\Http\Controllers\LocationController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/lokasi', [LocationController::class, 'show_location_page']);
Route::get('/kategori', [CategoryController::class, 'show_category_page']);
Route::post('/newCategory', [CategoryController::class, 'add_new_category']);
Route::post('/editCategory', [CategoryController::class, 'edit_category']);
Route::get('/barang/stok', [CategoryStockController::class, 'show_categoryStock_page']);
Route::get('/barang/masuk', [BarangMasukController::class, 'show_inactiveItem_page']);
Route::get('/barang/keluar', [BarangKeluarController::class, 'show_activeItem_page']);
Route::get('/barang/history', [HistoryItemController::class, 'show_historyItem_page']);
