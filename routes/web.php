<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;

// Route to show the login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Route to handle the login submission
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); // Show login page
Route::post('login', [LoginController::class, 'login']); // Handle login form submission
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Handle logout
// Auth::routes();
Route::get('/', function () {
    return view('index');
});

Route::get('product', function () {
    return view('product'); 
})->name('product');
