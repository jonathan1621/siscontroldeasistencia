<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

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

Route::get('/', function () {return view('index');})->middleware('auth');


Auth::routes(['register'=>true]); // Deshabilitar ruta con false


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/eventos', \App\Http\Controllers\EventoController::class);

Route::resource('/invitados', \App\Http\Controllers\InvitadoController::class);


//Route::get('/invitados.crearinvitado', \App\Http\Controllers\InvitadoController::class);
Route::get('/invitados/create/{id?}', [\App\Http\Controllers\InvitadoController::class, 'create'])->name('invitados.create');

