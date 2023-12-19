<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\KategoriBukuController;

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

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

Route::get('/dashboard', [BukuController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


//Route::get('/detail-buku/{title}',[BukuController::class, 'galbuku'])->name('galeri.buku');


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
    //Route::get('/buku',[BukuController::class,'index'])->name('buku.index');
    //Route::get('/dashboard', function () {return redirect()->route('buku.index');})->name('dashboard');
    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
    Route::post('/buku/rate/{id}', [BukuController::class, 'rate'])->name('buku.rate');
    Route::post('/buku/add-to-favourites/{id}', [BukuController::class, 'addToFavourites'])->name('buku.addToFavourites');
    Route::get('/buku/myfavourites', [BukuController::class, 'myFavourites'])->name('buku.myFavourites');
    // Add a new route for the Buku Populer page

    
    Route::get('/buku/kategori', [KategoriBukuController::class, 'kategori'])->name('buku.kategori');
 
});

require __DIR__.'/auth.php';

//Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/detail-buku/{id}', [BukuController::class, 'galbuku'])->name('galeri.buku');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
Route::get('/buku-populer', [BukuController::class, 'bukuPopuler'])->name('buku.buku-populer');

Route::middleware([Admin::class])->group(function () {
  Route::post('/buku/delete/{id}',[BukuController::class, 'destroy'])->name('buku.destroy');
  Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
  Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
  Route::get('/buku/create',[BukuController::class, 'create'])->name('buku.create');
  Route::post('/buku/store',[BukuController::class, 'store'])->name('buku.store');
  Route::post('/buku/update/{id}',[BukuController::class, 'update'])->name('buku.update');
  Route::get('/gallery/delete/{id}', [BukuController::class, 'deletegallery'])->name('buku.deletegallery');
  //Route::get('/create', [KategoriBukuController::class, 'create'])->name('kategori.create');
  Route::post('/store', [KategoriBukuController::class, 'store'])->name('kategori.store');
  Route::get('/buku/create-kategori', [KategoriBukuController::class, 'create'])->name('buku.create-kategori');



});






