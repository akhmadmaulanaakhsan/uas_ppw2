<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;

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


Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/inihome',[PostController::class,'panggilhome']);

Route::get('/buku',[BukuController::class,'index']);

Route::get('/buku/create',[BukuController::class, 'create'])->name('buku.create');

Route::post('/buku',[BukuController::class, 'store'])->name('buku.store');

Route::post('/buku/delete/{id}',[BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');

Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
