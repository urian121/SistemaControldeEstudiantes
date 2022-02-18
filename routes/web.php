<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\PagosController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('cursos', CursosController::class);  
Route::resource('profesores', ProfesoresController::class);
Route::resource('alumnos', AlumnosController::class);
Route::resource('pagos', PagosController::class);


