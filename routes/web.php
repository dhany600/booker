<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});
Route::get('/example-book', function () {
    return view('example-book.index');
});

// Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
// Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
// Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::resource('/admin-dashboard/book', AdminBookController::class, ['names' => 'admin.book']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('home.about');
Route::resource('/katalog', CatalogController::class, ['names' => 'catalog']);

Auth::routes(['verify' => true]);

