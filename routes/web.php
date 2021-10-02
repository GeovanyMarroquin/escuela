<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriaGradoController;
use App\Models\Alumno;
use Illuminate\Support\Facades\Route;


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

Route::redirect('/', '/home', 301)->name('index');

Route::get('/home', function(){
    $alumnos = Alumno::all();
    return view('index', compact('alumnos'));
});

Route::get('/verInformacionAlumno', [AlumnoController::class, 'verInformacionAlumno']);

Route::resource('grados', GradoController::class);
Route::resource('materias', MateriaController::class);
Route::resource('materiasxgrado', MateriaGradoController::class);
Route::resource('alumnos', AlumnoController::class);
