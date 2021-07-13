<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PendaftaranController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layout.dashboard');
})->name('dashboard');

Route::resource('tindakan', 'TindakanController');
Route::resource('obat', 'ObatController');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('wilayah', 'WilayahController');
Route::resource('kota', 'KotaController');
Route::resource('pegawai', 'EmployeeController');
Route::resource('pasien', 'PasienController');
Route::resource('pendaftaran', 'PendaftaranController');
Route::resource('pengobatan', 'PengobatanController');
Route::resource('pengobatan_detail', 'PengobatanDetailController');
Route::resource('resep', 'ResepController');
Route::resource('pembayaran', 'PembayaranController');

//route untuk select2
Route::get('search-user', [App\Http\Controllers\EmployeeController::class,'selectUser']);
Route::get('search-kota', [App\Http\Controllers\EmployeeController::class,'selectKota']);
Route::get('ajax-autocomplete-search', [PendaftaranController::class,'selectSearch']);
Route::get('search-pasien-pendaftaran', [App\Http\Controllers\PengobatanController::class,'selectPendaftaran']);
Route::get('search-tindakan', [App\Http\Controllers\PengobatanDetailController::class,'selectTindakan']);
Route::get('search-obat', [App\Http\Controllers\ResepController::class,'selectObat']);
