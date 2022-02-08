<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // CRUD
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    //Data Pegawai + CRUD
    Route::get('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'index'])->name('users.pegawai.index');
    Route::get('/exportpegawai', [\App\Http\Controllers\PegawaiController::class, 'pegawaiexport'])->name('exportpegawai');
    Route::post('/importpegawai', [\App\Http\Controllers\PegawaiController::class, 'pegawaiimport'])->name('importpegawai');
    Route::get('/pegawai/create', [\App\Http\Controllers\PegawaiController::class, 'create'])->name('users.pegawai.create');
    Route::post('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'store'])->name('users.pegawai.store');
    Route::get('/pegawai/{id}/edit', [\App\Http\Controllers\PegawaiController::class, 'edit'])->name('users.pegawai.edit');
    Route::put('/pegawai/{id}', [\App\Http\Controllers\PegawaiController::class, 'update'])->name('users.pegawai.update');
    Route::delete('/pegawai/{id}', [\App\Http\Controllers\PegawaiController::class, 'destroy'])->name('users.pegawai.destroy');

});
