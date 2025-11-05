<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\RepartidorController;


Route::view('/', 'index');
Route::view('/frutas', 'frutas');
Route::view('/contacto', 'contacto');
Route::view('/productos', 'productos');
Route::view('/sobre', 'sobre');
Route::view('/vegetales', 'vegetales');
Route::view('/carrito', 'carrito')->name('carrito');
Route::view('/pago', 'pago')->name('pago');
Route::view('/error', 'error')->name('error');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/usuario', function () {
        return view('usuario');
    })->name('usuario');

    // ✅ Compra
    Route::get('/compra', [CompraController::class, 'index'])->name('compra');
    Route::post('/compra/finalizar', [CompraController::class, 'finalizar'])->name('compra.finalizar');

    // ✅ Repartidor
    Route::get('/repartidor', [RepartidorController::class, 'index'])->name('repartidor');
    Route::post('/repartidor/entregar/{id}', [RepartidorController::class, 'entregar'])->name('repartidor.entregar');

    // ✅ Admin (si usas roles más adelante)
    Route::view('/admin', 'admin')->name('admin');
});
