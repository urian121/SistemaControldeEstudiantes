<?php


use App\Http\Controllers\CursosController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\PagosController; 

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('curso', CursosController::class);
Route::resource('profe', ProfesoresController::class);
Route::resource('alumno', AlumnosController::class);
Route::resource('pago', PagosController::class);




