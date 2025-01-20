<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


// Route to show the login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Route to handle the login submission
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('login', [LoginController::class, 'login']); 
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); 

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Auth::routes();
Route::get('/', function () {
    return view('index');
});

Route::get('product', function () {
    return view('product'); 
})->name('product');

Route::get('/', function () {
    return view('index'); 
})->name('index');
