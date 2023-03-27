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

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['checkLevel:admin'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->middleware(['checkLevel:admin'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->middleware(['checkLevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['checkLevel:admin'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['checkLevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware(['checkLevel:admin'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('user.delete');

Route::get('pengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->middleware(['checkLevel:admin'])->name('pengaduan.index');
Route::get('pengaduan/create', [App\Http\Controllers\PengaduanController::class, 'create'])->middleware(['checkLevel:admin'])->name('pengaduan.create');
Route::post('pengaduan/store', [App\Http\Controllers\PengaduanController::class, 'store'])->middleware(['checkLevel:admin'])->name('pengaduan.store');
Route::get('pengaduan/edit/{id}', [App\Http\Controllers\PengaduanController::class, 'edit'])->middleware(['checkLevel:admin'])->name('pengaduan.edit');
Route::put('pengaduan/update/{id}', [App\Http\Controllers\PengaduanController::class, 'update'])->middleware(['checkLevel:admin'])->name('pengaduan.update');
Route::get('pengaduan/show/{id}', [App\Http\Controllers\PengaduanController::class, 'show'])->middleware(['checkLevel:admin'])->name('pengaduan.show');
Route::delete('pengaduan/delete/{id}', [App\Http\Controllers\PengaduanController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('pengaduan.delete');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
