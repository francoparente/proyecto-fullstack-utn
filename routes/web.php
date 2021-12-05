<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\ClientesController;

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
Route::resource('clientes', \App\Http\Controllers\ClientesController::class);

Route::post('/clientes', [\App\Http\Controllers\ClientesController::class, 'inicio'])->name('clientes.inicio');

Route::post('/clientes/nuevo', [\App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
