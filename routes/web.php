<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaFrecuenteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OpinioneController;
use App\Http\Controllers\RedesSocialesController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\FormaEnvioController;


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

/*redes sociales*/
Route::get('/redes_sociales', [RedesSocialesController::class, 'index'])->middleware('auth');
// Route::get('/agregarRedSocial', [RedesSocialesController::class, 'create'])->name('agregarRedSocial')->middleware('auth');
// Route::post('grabarRedSocial', [RedesSocialesController::class, 'store'])->name('grabarRedSocial')->middleware('auth');
Route::get('/editarRedSocial/{red_social}', [RedesSocialesController::class, 'edit'])->name('editarRedSocialForm')->middleware('auth');
Route::put('/editarRedSocial/{red_social}', [RedesSocialesController::class, 'update'])->name('editarRedSocial')->middleware('auth');
// Route::delete('eliminarRedSocial/{red_social}', [RedesSocialesController::class, 'destroy'])->name('eliminarRedSocial')->middleware('auth');

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

/*VENTAS*/
/*formas de pago*/
Route::get('/formas_de_pago', [FormaPagoController::class, 'index'])->middleware('auth');
Route::get('/agregarFormaDePago', [FormaPagoController::class, 'create'])->name('agregarFormaDePago')->middleware('auth');
Route::post('grabarFormaDePago', [FormaPagoController::class, 'store'])->name('grabarFormaDePago')->middleware('auth');
Route::get('/editarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'edit'])->name('editarFormaDePagoForm')->middleware('auth');
Route::put('/editarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'update'])->name('editarFormaDePago')->middleware('auth');
Route::delete('eliminarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'destroy'])->name('eliminarFormaDePago')->middleware('auth');

/*formas de envio*/
Route::get('/formas_de_envio', [FormaEnvioController::class, 'index'])->middleware('auth');
Route::get('/agregarFormaDeEnvio', [FormaEnvioController::class, 'create'])->name('agregarFormaDeEnvio')->middleware('auth');
Route::post('grabarFormaDeEnvio', [FormaEnvioController::class, 'store'])->name('grabarFormaDeEnvio')->middleware('auth');
Route::get('/editarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'edit'])->name('editarFormaDeEnvioForm')->middleware('auth');
Route::put('/editarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'update'])->name('editarFormaDeEnvio')->middleware('auth');
Route::delete('eliminarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'destroy'])->name('eliminarFormaDeEnvio')->middleware('auth');