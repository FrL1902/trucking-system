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

Route::get('/user', [UserController::class, 'manage_user_page'])->middleware('role:auth');
Route::post('/user/new', [UserController::class, 'make_new_user'])->middleware('role:auth');
Route::get('/deleteUser/{id}', [UserController::class, 'destroy']);
Route::post('/tex',            [UserController::class, 'tex']);
Route::post('/newPasswordFromAdmin', [UserController::class, 'newPasswordFromAdmin']);




Route::get('/logout', [AuthController::class, 'logout'])->middleware('role:auth');

Route::get('/lokasi', [LocationController::class, 'show_location_page'])->middleware('role:auth');
Route::post('/newLocation', [LocationController::class, 'add_new_location'])->middleware('role:auth');
Route::post('/editLocation', [LocationController::class, 'edit_location'])->middleware('role:auth');

Route::get('/kategori', [CategoryController::class, 'show_category_page'])->middleware('role:auth');
Route::post('/newCategory', [CategoryController::class, 'add_new_category'])->middleware('role:auth');
Route::post('/editCategory', [CategoryController::class, 'edit_category'])->middleware('role:auth');

Route::get('/barang/stok', [CategoryStockController::class, 'show_categoryStock_page'])->middleware('role:auth');
Route::post('/barang/stok/newCategoryStock', [CategoryStockController::class, 'add_new_categoryStock'])->middleware('role:auth');
Route::get('/barang/model/detail/{id}', [CategoryStockController::class, 'model_detail_page'])->middleware('role:auth');

Route::get('/barang/masuk', [BarangMasukController::class, 'show_inactiveItem_page'])->middleware('role:auth');
Route::post('/barang/masuk/newMasuk', [BarangMasukController::class, 'add_new_barang_masuk'])->middleware('role:auth');
Route::get('/barang/masuk/detail/{id}', [BarangMasukController::class, 'view_detail_masuk'])->middleware('role:auth');
Route::post('/barang/masuk/assign', [BarangMasukController::class, 'assign_barang_masuk'])->middleware('role:auth');
Route::get('/barang/masuk/delete/{id}', [BarangMasukController::class, 'hapus_barang_masuk'])->middleware('role:auth');

Route::get('/barang/keluar', [BarangKeluarController::class, 'show_activeItem_page'])->middleware('role:auth');
Route::get('/barang/keluar/detail/{id}', [BarangKeluarController::class, 'view_detail_keluar'])->middleware('role:auth');
Route::post('/barang/keluar/simpan', [BarangKeluarController::class, 'simpan_barang_keluar'])->middleware('role:auth');

Route::get('/barang/history', [HistoryItemController::class, 'show_historyItem_page'])->middleware('role:auth');
Route::get('/barang/history/detail/{id}', [HistoryItemController::class, 'view_detail_barang'])->middleware('role:auth');





