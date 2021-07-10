<?php

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
Route::get('ajax-autocomplete-search', [PendaftaranController::class,'selectSearch']);
