<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes/web.php

// Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
Route::get('/add-surat', [ArsipController::class, 'create'])->name('addsurat');
Route::get('/view-surat/{id}', [ArsipController::class, 'show'])->name('viewsurat');
Route::post('/add-surat', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip/{id}', [ArsipController::class, 'update'])->name('arsip.update');
Route::delete('/del-surat/{arsip}', [ArsipController::class, 'destroy'])->name('arsip.delete');
Route::get('/arsip/download/{arsip}', [ArsipController::class, 'download'])->name('arsip.download');


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/add-kategori', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/add-kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/edit-kategori/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/edit-kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/del-kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.delete');


Route::get('/about', [HomeController::class, 'about'])->name('about');
