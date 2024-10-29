<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontController;

// Route::get('/', function () {
//     return view('backend/main');
// }); 



// auth route
// Registration Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Login Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Logout Route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', [BackendController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [FrontController::class, 'index'])->name('index');
});
