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

Route::middleware('auth','cekrole:2')->group(function () { //Auth cekrole middleware (super admin)
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // CRUD Users
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    //Data Pegawai + CRUD
    // Route::get('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'index'])->name('users.pegawai.index');
    // Route::get('/exportpegawai', [\App\Http\Controllers\PegawaiController::class, 'pegawaiexport'])->name('exportpegawai');
    // Route::post('/importpegawai', [\App\Http\Controllers\PegawaiController::class, 'pegawaiimport'])->name('importpegawai');
    // Route::get('/pegawai/create', [\App\Http\Controllers\PegawaiController::class, 'create'])->name('users.pegawai.create');
    // Route::post('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'store'])->name('users.pegawai.store');
    // Route::get('/pegawai/{id}/edit', [\App\Http\Controllers\PegawaiController::class, 'edit'])->name('users.pegawai.edit');
    // Route::put('/pegawai/{id}', [\App\Http\Controllers\PegawaiController::class, 'update'])->name('users.pegawai.update');
    // Route::delete('/pegawai/{id}', [\App\Http\Controllers\PegawaiController::class, 'destroy'])->name('users.pegawai.destroy');

    //Data portofolio + CRUD
    Route::get('/portofolio', [\App\Http\Controllers\PortofolioController::class, 'index'])->name('portofolio.index');
    Route::get('/exportportofolio', [\App\Http\Controllers\PortofolioController::class, 'portofolioexport'])->name('exportportofolio');
    Route::get('/portofolio/create', [\App\Http\Controllers\PortofolioController::class, 'create'])->name('portofolio.create');
    Route::post('/portofolio', [\App\Http\Controllers\PortofolioController::class, 'store'])->name('portofolio.store');
    Route::get('/portofolio/{id}/edit', [\App\Http\Controllers\PortofolioController::class, 'edit'])->name('portofolio.edit');
    Route::put('/portofolio/{id}', [\App\Http\Controllers\PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{id}', [\App\Http\Controllers\PortofolioController::class, 'destroy'])->name('portofolio.destroy');

});

Route::middleware('auth','cekrole:1,2')->group(function () { //Auth cekrole middleware (super admin & admin)

    Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Data portofolio + CRUD
    Route::get('/portofolio', [\App\Http\Controllers\PortofolioController::class, 'index'])->name('portofolio.index');
    Route::get('/exportportofolio', [\App\Http\Controllers\PortofolioController::class, 'portofolioexport'])->name('exportportofolio');
    Route::get('/portofolio/create', [\App\Http\Controllers\PortofolioController::class, 'create'])->name('portofolio.create');
    Route::post('/portofolio', [\App\Http\Controllers\PortofolioController::class, 'store'])->name('portofolio.store');
    Route::get('/portofolio/{id}/edit', [\App\Http\Controllers\PortofolioController::class, 'edit'])->name('portofolio.edit');
    Route::put('/portofolio/{id}', [\App\Http\Controllers\PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{id}', [\App\Http\Controllers\PortofolioController::class, 'destroy'])->name('portofolio.destroy');
});

Route::middleware('auth','cekrole:1,2,0')->group(function () { //Auth cekrole middleware (super admin & admin & user/owner )

    Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Data portofolio + CRUD
    Route::get('/portofolio', [\App\Http\Controllers\PortofolioController::class, 'index'])->name('portofolio.index');
    Route::get('/exportportofolio', [\App\Http\Controllers\PortofolioController::class, 'portofolioexport'])->name('exportportofolio');
    Route::get('/portofolio/create', [\App\Http\Controllers\PortofolioController::class, 'create'])->name('portofolio.create');
    Route::post('/portofolio', [\App\Http\Controllers\PortofolioController::class, 'store'])->name('portofolio.store');
    Route::get('/portofolio/{id}/edit', [\App\Http\Controllers\PortofolioController::class, 'edit'])->name('portofolio.edit');
    Route::put('/portofolio/{id}', [\App\Http\Controllers\PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{id}', [\App\Http\Controllers\PortofolioController::class, 'destroy'])->name('portofolio.destroy');

    // Cetak/ Print Portofolio
    Route::get('/cetakportofolio', [\App\Http\Controllers\PortofolioController::class, 'cetakPortofolio'])->name('portofolio.cetak');

    // Filter Portofolio
    Route::get('/filter', [\App\Http\Controllers\PortofolioController::class, 'filter'])->name('portofolio.filter');
});
