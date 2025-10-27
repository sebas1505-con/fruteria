<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/usuario', function () {
    return view('usuario');
});
Route::get('/vegetales', function () {
    return view('vegetales');
});
