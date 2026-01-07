<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/dashboard', [DashboardController::class, 'index']);




