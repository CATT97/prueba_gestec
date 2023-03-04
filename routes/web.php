<?php

use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PrestamoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/libros', LibrosController::class);
Route::resource('/estudiantes', EstudiantesController::class);
Route::resource('/prestamos', PrestamoController::class);
