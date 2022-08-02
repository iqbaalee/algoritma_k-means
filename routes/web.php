<?php

use App\Http\Controllers\analisisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\mhscekController::class, 'index'])->name('mhscek');

// Auth::routes();
Route::prefix('wp-admin')->group(function () {
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matkul', MatkulController::class);
// Route::resource('nilai', NilaiController::class);
Route::name('nilai.')->prefix('nilai')->group(function () {
    // ex : 
    //route_name ==> nilai.index, in url ==> nilai/
    Route::get('/', [NilaiController::class, 'index'])->name('index');
    Route::get('/create', [NilaiController::class, 'create'])->name('create');
    Route::get('/edit/{id}/{angkatan}', [NilaiController::class, 'edit'])->name('edit');
    Route::get('/{id}', [NilaiController::class, 'show'])->name('show');
    Route::post('/store', [NilaiController::class, 'store'])->name('store');
    Route::post('/update/{id}', [NilaiController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [NilaiController::class, 'destroy'])->name('destroy');
});
Route::name('analisis.')->prefix('analisis')->group(function () {
    // ex : 
    //route_name ==> nilai.index, in url ==> nilai/
    Route::get('/', [analisisController::class, 'index'])->name('index');
    Route::post('/analyze', [analisisController::class, 'analyze'])->name('analyze');
    Route::put('/update/{id}', [analisisController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [analisisController::class, 'destroy'])->name('destroy');
    Route::post('/store', [analisisController::class, 'store'])->name('store');
    Route::get('/hasil', [analisisController::class, 'hasil'])->name('hasil');
    Route::get('/chart_result', [analisisController::class, 'chart_result'])->name('chart_result');
    Route::get('/get_chart_data', [analisisController::class, 'get_chart_data'])->name('get_chart_data');
    Route::get('/print_result', [analisisController::class, 'print_result'])->name('print_result');
});
Route::put('/nilai/ajax_get_nilai_by_id/{id}', [App\Http\Controllers\NilaiController::class, 'ajax_get_nilai_by_id'])->name('nilai.ajax_get_nilai_by_id');
Route::get('/profile/index', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/cek', [App\Http\Controllers\mhscekController::class, 'show'])->name('mhscek.show');
// Route::get('/analisis', [App\Http\Controllers\analisisController::class, 'index'])->name('analisis.index');
