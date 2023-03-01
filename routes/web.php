<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\BerandaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\RegulasiController;
use App\Http\Controllers\Admin\GaleriController;

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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::middleware('auth')->group(function () {
    Route::middleware('features:berita')->group(function () {
        Route::get('/berita/data', [BeritaController::class, 'anyData'])->name('berita.data');
        Route::resource('/berita', BeritaController::class);
    });
    Route::middleware('features:regulasi')->group(function () {
        Route::get('/regulasi/data', [RegulasiController::class, 'anyData'])->name('regulasi.data');
        Route::get('/regulasi/file/{id}', [RegulasiController::class, 'file'])->name('regulasi.file');
        Route::resource('/regulasi', RegulasiController::class);
    });
    Route::middleware('features:galeri')->group(function () {
        Route::post('/media/store/{id}', [GaleriController::class, 'storeMedia'])->name('media.store');
        Route::delete('/media/delete', [GaleriController::class, 'deleteMedia'])->name('media.delete');
        Route::get('/galeri/data', [GaleriController::class, 'anyData'])->name('galeri.data');
        Route::resource('/galeri', GaleriController::class);
    });
});

require __DIR__ . '/auth.php';
