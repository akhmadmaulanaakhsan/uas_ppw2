<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use App\Http\Middleware\Admin;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/dashboard', function () {return redirect()->route('buku.index');})->name('dashboard');

//Route::get('/dashboard', function () {
//  return redirect()->route('buku.index');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/dashboard', [BukuController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/buku',[BukuController::class,'index'])->name('buku.index');
    Route::get('/dashboard', function () {return redirect()->route('buku.index');})->name('dashboard');
    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

});

Route::middleware([Admin::class])->group(function () {
  Route::post('/buku/delete/{id}',[BukuController::class, 'destroy'])->name('buku.destroy');
  Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
  Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
  Route::get('/buku/create',[BukuController::class, 'create'])->name('buku.create');
  Route::post('/buku',[BukuController::class, 'store'])->name('buku.store');
  Route::post('/buku/update/{id}',[BukuController::class, 'update'])->name('buku.update');

});

require __DIR__.'/auth.php';

Route::get('/inihome',[PostController::class,'panggilhome']);






