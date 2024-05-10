<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminFavoritController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuSayaController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DaftarPeminjamController;
use App\Http\Controllers\FavoriteBukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/home');
});
// ample-book.index');
// });
Route::get('/example-book', function () {
    return view('example-book.index');
});

// [AuthController::class, 'index'])->name('auth.login');
// Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
// Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::delete('admin/book/{id}', [AdminBookController::class, 'delete'])->name('admin.book.delete');
Route::resource('/admin-dashboard/book', AdminBookController::class, ['names' => 'admin.book'])->middleware('role:admin');

Route::resource('/admin-dashboard/favorite', AdminFavoritController::class, ['names' => 'admin.favorite']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('home.about');

Route::group([
    'middleware' => ['auth', 'verified'],
], function () {
    
Route::post('/borrow-book', [CatalogController::class, 'borrowBook'])->name('borrow.book')->middleware(['auth', 'verified']);
Route::resource('/katalog', CatalogController::class, ['names' => 'catalog']);


Route::post('/kembalikan-buku', [BukuSayaController::class, 'return'])->name('bukuSaya.return');
Route::get('/baca-buku', [BukuSayaController::class, 'bacaBuku'])->name('bukuSaya.bacaBuku');
Route::resource('/buku-saya', BukuSayaController::class, ['names' => 'bukuSaya']);

Route::resource('/daftar-peminjam', DaftarPeminjamController::class, ['names' => 'daftarPeminjam']);

Route::post('/favorite/{book}', [FavoriteBukuController::class, 'toggleFavorite'])->name('favorite.toggle');
Route::resource('/favorite', FavoriteBukuController::class, ['names' => 'favorite']);

Route::get('/buku-favorit', [BukuSayaController::class, 'bukuFavorit'])->name('bukuFavorit');
Route::get('/riwayat-pinjam', [BukuSayaController::class, 'riwayatPinjam'])->name('riwayatPinjam');
Route::resource('/profile', ProfileController::class, ['names' => 'profile']);
});

Auth::routes(['verify' => true]);

