<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::get('producto/pdf', [App\Http\Controllers\ProductoController::class, 'pdf'])->name('productos.pdf');

Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');
Route::resource('marcas', App\Http\Controllers\MarcaController::class)->middleware('auth');
Route::resource('unidades', App\Http\Controllers\UnidadeController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
