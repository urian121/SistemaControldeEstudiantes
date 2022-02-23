<?php


use App\Http\Controllers\CursosController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\PagosController; 

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['register' => false]); //para desactivar el registro de usuario.


Route::resource('curso', CursosController::class)->middleware('auth');
Route::resource('profe', ProfesoresController::class)->middleware('auth');
Route::resource('alumno', AlumnosController::class)->middleware('auth');
Route::resource('pago', PagosController::class)->middleware('auth');

//Route::get('dashboard', 'AppHttpControllersUserController@dashboard')->middleware('auth');
//Route::get("/gestionarMedicos", [PersonaController::class,"mostrarMedicos"])->name("personaMostrarMedicos")->middleware("auth","firstLogin","role:administrador");


