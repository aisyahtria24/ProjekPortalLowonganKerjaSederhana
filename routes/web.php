<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LowonganController;
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

Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');

  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/register/store', [AuthController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::resource('lowongan', LowonganController::class);
  Route::resource('lamaran', LamaranController::class)->except(['show', 'create', 'store']);
  Route::resource('lowongan.lamaran', LamaranController::class)->only(['show', 'create', 'store']);

  Route::get('/lamaran/{lamaran}/approve', [LamaranController::class, 'approve'])->name('lamaran.approve');
  Route::get('/lamaran/{lamaran}/reject', [LamaranController::class, 'reject'])->name('lamaran.reject');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
