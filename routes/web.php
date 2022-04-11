<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaFrecuenteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OpinioneController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Auth::routes();

Route::get('/clear-cache', function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

/*SECCIONES WEB*/
/*Preguntas Frecuentes*/
Route::get('/preguntas_frecuentes', [PreguntaFrecuenteController::class, 'index'])->name('preguntasFrecuentes');
Route::get('/agregar_pregunta', [PreguntaFrecuenteController::class, 'agregarForm'])->name('agregarPregunta');
Route::post('grabarPregunta', [PreguntaFrecuenteController::class, 'grabar'])->name('grabarPregunta');
Route::get('editarPregunta/{id}', [PreguntaFrecuenteController::class, 'editarForm'])->name('editarPreguntaForm');
Route::match(['put', 'patch'],'editarPregunta/{id}', [PreguntaFrecuenteController::class, 'editar'])->name('editarPregunta');
Route::get('eliminarPregunta/{id}', [PreguntaFrecuenteController::class, 'eliminarForm'])->name('eliminarPreguntaForm');
Route::delete('eliminarPregunta/{id}', [PreguntaFrecuenteController::class, 'eliminar'])->name('eliminarPregunta');

/*opiniones*/
Route::get('/opiniones', [OpinioneController::class, 'index'])->name('opiniones');
Route::match(['put', 'patch'],'editarOpinion/{id}', [OpinioneController::class, 'editar'])->name('editarOpinion');

/*PRODUCTOS*/
/*categorias*/
Route::get('/categorias/{categoria?}/{subcategoria?}', [CategoriaController::class, 'index'])->name('categorias');

Route::get('/agregar_categoria', [CategoriaController::class, 'agregarForm'])->name('agregarCategoria');
Route::post('grabarCategoria', [CategoriaController::class, 'grabar'])->name('grabarCategoria');

Route::get('editarCategoria/{id}', [CategoriaController::class, 'editarForm'])->name('editarCategoriaForm');
Route::match(['put', 'patch'],'editarCategoria/{id}', [CategoriaController::class, 'editar'])->name('editarCategoria');
/*
Route::get('eliminarPregunta/{id}', [CategoriaController::class, 'eliminarForm'])->name('eliminarPreguntaForm');
Route::delete('eliminarPregunta/{id}', [CategoriaController::class, 'eliminar'])->name('eliminarPregunta');*/



/*FIN SECCIONES WEB*/