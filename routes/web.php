<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\UserController;

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
    return view('user.login');
});

Route::get('/clientes/turnos/:id', [\App\Http\Controllers\TurnosController::class, 'mostrar'])
->name('turnos.mostrar');

Route::get('/clientes/turnosdia', [\App\Http\Controllers\TurnosController::class, 'turnosDia'])
->name('turnosDia.misTurnos');

Route::get('/clientes/turnosprueba', [\App\Http\Controllers\TurnosController::class, 'misTurnos'])
->name('turnos.misTurnos');

Route::get('/clientes/sus/{id}', [\App\Http\Controllers\SuscripcionController::class, 'mostrarSuscripcion'])
->name('suscripcion.mostrarSuscripcion');

Route::post('/clientes/ed', [\App\Http\Controllers\SuscripcionController::class, 'agregarSuscripcion'])
->name('suscripcion.agregarSuscripcion');

Route::get('/clientes/ed', [\App\Http\Controllers\SuscripcionController::class, 'editarSuscripcion'])
->name('suscripcion.editarSuscripcion');

Route::get('/clientes/rutinas', [\App\Http\Controllers\RutinasController::class, 'mostrar'])
->name('rutinas.mostrar');


Route::post('/clientes/rutinas', [\App\Http\Controllers\RutinasController::class, 'insertar'])
->name('rutinas.insertar');

Route::put('/clientes/rutinas/mod', [\App\Http\Controllers\RutinasController::class, 'modificar'])
->name('rutinas.modificar');

Route::delete('/clientes/rutinas', [\App\Http\Controllers\RutinasController::class, 'borrar'])
->name('rutinas.borrar');

Route::get('/clientes/marcas', [\App\Http\Controllers\RutinasController::class, 'marcas'])
->name('rutinas.marcas');

Route::post('/clientes/marcas', [\App\Http\Controllers\RutinasController::class, 'insertarMarca'])
->name('rutinas.insertarMarca');

Route::post('/clientes/susc', [\App\Http\Controllers\SuscripcionController::class, 'modificarSuscripcion'])
->name('suscripcion.modificarSuscripcion');

Route::post('/clientes/turnosprueba', [\App\Http\Controllers\TurnosController::class, 'agregarTurno'])
->name('turnos.agregarTurno');

Route::get('/clientes/admin', [\App\Http\Controllers\ClientesController::class, 'administrar'])
->name('clientes.administrar');

Route::resource('clientes', \App\Http\Controllers\ClientesController::class);

Route::post('/clientes', [\App\Http\Controllers\ClientesController::class, 'inicio'])->name('clientes.inicio');

Route::post('/clientes/nuevo', [\App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

