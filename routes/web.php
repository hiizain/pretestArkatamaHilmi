<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\PageController;

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


// App
// // Page
Route::get('/', [PageController::class, 'index'])->name('page');
Route::get('/artikel/{slug}', [PageController::class, 'artikel'])->name('artikel');
Route::get('getArtikel', [PageController::class, 'getArtikel'])->name('getArtikel');

// // Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog')->middleware('auth');
Route::post('createBlog', [BlogController::class, 'createBlog_action'])->name('createBlog.action');
Route::get('editBlog/{idBlog}', [BlogController::class, 'editBlog'])->name('editBlog');
Route::get('publishBlog/{idBlog}', [BlogController::class, 'publishBlog'])->name('publishBlog');
Route::get('takeDownBlog/{idBlog}', [BlogController::class, 'takeDownBlog'])->name('takeDownBlog');

// // Konten
Route::post('editKonten', [KontenController::class, 'editKonten'])->name('editKonten');
Route::post('editKonten', [KontenController::class, 'editKonten_action'])->name('editKonten.action');
Route::post('createKonten', [KontenController::class, 'createKonten_action'])->name('createKonten.action');
Route::post('uploadImgKonten', [KontenController::class, 'uploadImgKonten'])->name('konten.image-upload');

// // Kategori
Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('createKategori', [KategoriController::class, 'createKategori'])->name('createKategori');
Route::post('createKategori', [KategoriController::class, 'createKategori_action'])->name('createKategori.action');
Route::get('editKategori/{idKategori}', [KategoriController::class, 'editKategori'])->name('editKategori');
Route::post('editKategoriAction', [KategoriController::class, 'editKategori_action'])->name('editKategori.action');
Route::post('deleteKategori', [KategoriController::class, 'deleteKategori_action'])->name('deleteKategori.action');

Route::get('getKategori', [KategoriController::class, 'getKategori'])->name('getKategori');


// =====================================================================================

// Register
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

// Route::get('/login', function () {
//     return view('login');
// });
// Login
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate'])->name('login.action');

// Logout
Route::get('logout', [UserController::class, 'logout'])->name('logout');
