<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});
Route::get('/frutas', function () {
    return view('frutas');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/productos', function () {
    return view('productos');
});
Route::get('/sobre', function () {
    return view('sobre');
});
Route::get('/vegetales', function () {
    return view('vegetales');
});
Route::get('/registrar', function () {
    return view('registrar');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/usuario', function () {
    return view('usuario');
})->middleware('auth')->name('usuario');