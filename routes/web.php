<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaFrecuenteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OpinioneController;
use App\Http\Controllers\RedesSocialesController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\FormaEnvioController;
use App\Http\Controllers\TerminalRetiroController;
use App\Http\Controllers\ContrarrembolsoEmpresaController;
use App\Http\Controllers\FormaRmaController;
use App\Http\Controllers\ServiceConsolaController;
use App\Http\Controllers\ServiceEstadoController;
use App\Http\Controllers\GastoConceptoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\DatosContactoController;
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

/*PRODUCTOS*/
/*categorias*/
Route::get('/categorias/{categoria?}/{subcategoria?}', [CategoriaController::class, 'index'])->name('categorias');

Route::get('/agregar_categoria', [CategoriaController::class, 'agregarForm'])->name('agregarCategoria');
Route::post('grabarCategoria', [CategoriaController::class, 'grabar'])->name('grabarCategoria');

Route::get('editarCategoria/{id}', [CategoriaController::class, 'editarForm'])->name('editarCategoriaForm');
Route::match(['put', 'patch'],'editarCategoria/{id}', [CategoriaController::class, 'editar'])->name('editarCategoria');

/*FIN PRODUCTOS*/


/*SECCIONES WEB*/
/*Preguntas Frecuentes*/
Route::get('/preguntas_frecuentes', [PreguntaFrecuenteController::class, 'index'])->name('preguntasFrecuentes');
Route::get('/agregar_pregunta', [PreguntaFrecuenteController::class, 'agregarForm'])->name('agregarPregunta');
Route::post('grabarPregunta', [PreguntaFrecuenteController::class, 'grabar'])->name('grabarPregunta');
Route::get('editarPregunta/{id}', [PreguntaFrecuenteController::class, 'editarForm'])->name('editarPreguntaForm');
Route::match(['put', 'patch'],'editarPregunta/{id}', [PreguntaFrecuenteController::class, 'editar'])->name('editarPregunta');
Route::get('eliminarPregunta/{id}', [PreguntaFrecuenteController::class, 'eliminarForm'])->name('eliminarPreguntaForm');
Route::delete('eliminarPregunta/{id}', [PreguntaFrecuenteController::class, 'eliminar'])->name('eliminarPregunta');

/*
Route::get('eliminarPregunta/{id}', [CategoriaController::class, 'eliminarForm'])->name('eliminarPreguntaForm');
Route::delete('eliminarPregunta/{id}', [CategoriaController::class, 'eliminar'])->name('eliminarPregunta');*/

/*opiniones*/
Route::get('/opiniones', [OpinioneController::class, 'index'])->middleware('auth');
Route::get('/agregarOpinion', [OpinioneController::class, 'create'])->name('agregarOpinion')->middleware('auth');
Route::post('grabarOpinion', [OpinioneController::class, 'store'])->name('grabarOpinion')->middleware('auth');
Route::put('aceptarOpinion/{opinion}', [OpinioneController::class, 'aceptar'])->name('aceptarOpinion')->middleware('auth');
Route::put('rechazarOpinion/{opinion}', [OpinioneController::class, 'rechazar'])->name('rechazarOpinion')->middleware('auth');

/*redes sociales*/
Route::get('/redes_sociales', [RedesSocialesController::class, 'index'])->middleware('auth');
// Route::get('/agregarRedSocial', [RedesSocialesController::class, 'create'])->name('agregarRedSocial')->middleware('auth');
// Route::post('grabarRedSocial', [RedesSocialesController::class, 'store'])->name('grabarRedSocial')->middleware('auth');
Route::get('/editarRedSocial/{red_social}', [RedesSocialesController::class, 'edit'])->name('editarRedSocialForm')->middleware('auth');
Route::put('/editarRedSocial/{red_social}', [RedesSocialesController::class, 'update'])->name('editarRedSocial')->middleware('auth');
// Route::delete('eliminarRedSocial/{red_social}', [RedesSocialesController::class, 'destroy'])->name('eliminarRedSocial')->middleware('auth');

/*Slider home*/
Route::get('/slider', [SliderController::class, 'index'])->middleware('auth');
Route::get('/agregarSlider', [SliderController::class, 'create'])->name('agregarSlider')->middleware('auth');
Route::post('grabarSlider', [SliderController::class, 'store'])->name('grabarSlider')->middleware('auth');
Route::get('eliminarSlider/{slider}', [SliderController::class, 'eliminarForm'])->name('eliminarSliderForm')->middleware('auth');
Route::delete('eliminarSlider/{slider}', [SliderController::class, 'destroy'])->name('eliminarSlider')->middleware('auth');

/*Datos de contacto*/
Route::get('/datos_de_contacto', [DatosContactoController::class, 'index'])->middleware('auth');
Route::get('/editarDatoDeContacto/{dato}', [DatosContactoController::class, 'edit'])->name('editarDatoDeContactoForm')->middleware('auth');
Route::put('/editarDatoDeContacto/{dato}', [DatosContactoController::class, 'update'])->name('editarDatoDeContacto')->middleware('auth');

/*FIN SECCIONES WEB*/


/*VENTAS*/
/*formas de pago*/
Route::get('/formas_de_pago', [FormaPagoController::class, 'index'])->middleware('auth');
Route::get('/agregarFormaDePago', [FormaPagoController::class, 'create'])->name('agregarFormaDePago')->middleware('auth');
Route::post('grabarFormaDePago', [FormaPagoController::class, 'store'])->name('grabarFormaDePago')->middleware('auth');
Route::get('/editarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'edit'])->name('editarFormaDePagoForm')->middleware('auth');
Route::put('/editarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'update'])->name('editarFormaDePago')->middleware('auth');
Route::get('eliminarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'eliminarForm'])->name('eliminarFormaDePagoForm')->middleware('auth');
Route::delete('eliminarFormaDePago/{forma_de_pago}', [FormaPagoController::class, 'destroy'])->name('eliminarFormaDePago')->middleware('auth');

/*formas de envio*/
Route::get('/formas_de_envio', [FormaEnvioController::class, 'index'])->middleware('auth');
Route::get('/agregarFormaDeEnvio', [FormaEnvioController::class, 'create'])->name('agregarFormaDeEnvio')->middleware('auth');
Route::post('grabarFormaDeEnvio', [FormaEnvioController::class, 'store'])->name('grabarFormaDeEnvio')->middleware('auth');
Route::get('/editarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'edit'])->name('editarFormaDeEnvioForm')->middleware('auth');
Route::put('/editarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'update'])->name('editarFormaDeEnvio')->middleware('auth');
Route::get('eliminarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'eliminarForm'])->name('eliminarFormaDeEnvioForm')->middleware('auth');
Route::delete('eliminarFormaDeEnvio/{forma_de_envio}', [FormaEnvioController::class, 'destroy'])->name('eliminarFormaDeEnvio')->middleware('auth');

/*terminal retiro*/
Route::get('/terminal_retiro', [TerminalRetiroController::class, 'index'])->middleware('auth');
Route::get('/agregarTerminalRetiro', [TerminalRetiroController::class, 'create'])->name('agregarTerminalRetiro')->middleware('auth');
Route::post('grabarTerminalRetiro', [TerminalRetiroController::class, 'store'])->name('grabarTerminalRetiro')->middleware('auth');
Route::get('/editarTerminalRetiro/{terminal_retiro}', [TerminalRetiroController::class, 'edit'])->name('editarTerminalRetiroForm')->middleware('auth');
Route::put('/editarTerminalRetiro/{terminal_retiro}', [TerminalRetiroController::class, 'update'])->name('editarTerminalRetiro')->middleware('auth');
Route::get('eliminarTerminalRetiro/{terminal_retiro}', [TerminalRetiroController::class, 'eliminarForm'])->name('eliminarTerminalRetiroForm')->middleware('auth');
Route::delete('eliminarTerminalRetiro/{terminal_retiro}', [TerminalRetiroController::class, 'destroy'])->name('eliminarTerminalRetiro')->middleware('auth');

/*contrareembolsos*/
Route::get('/contrareembolsos', [ContrarrembolsoEmpresaController::class, 'index'])->middleware('auth');
Route::get('/agregarContrareembolso', [ContrarrembolsoEmpresaController::class, 'create'])->name('agregarContrareembolso')->middleware('auth');
Route::post('grabarContrareembolso', [ContrarrembolsoEmpresaController::class, 'store'])->name('grabarContrareembolso')->middleware('auth');
Route::get('/editarContrareembolso/{contrarrembolso_empresa}', [ContrarrembolsoEmpresaController::class, 'edit'])->name('editarContrareembolsoForm')->middleware('auth');
Route::put('/editarContrareembolso/{contrarrembolso_empresa}', [ContrarrembolsoEmpresaController::class, 'update'])->name('editarContrareembolso')->middleware('auth');
Route::get('eliminarContrareembolso/{contrarrembolso_empresa}', [ContrarrembolsoEmpresaController::class, 'eliminarForm'])->name('eliminarContrareembolsoForm')->middleware('auth');
Route::delete('eliminarContrareembolso/{contrarrembolso_empresa}', [ContrarrembolsoEmpresaController::class, 'destroy'])->name('eliminarContrareembolso')->middleware('auth');

/*formas RMA*/
Route::get('/formas_rma', [FormaRmaController::class, 'index'])->middleware('auth');
Route::get('/agregarFormaRMA', [FormaRmaController::class, 'create'])->name('agregarFormaRMA')->middleware('auth');
Route::post('grabarFormaRMA', [FormaRmaController::class, 'store'])->name('grabarFormaRMA')->middleware('auth');
Route::get('/editarFormaRMA/{forma_rma}', [FormaRmaController::class, 'edit'])->name('editarFormaRMAForm')->middleware('auth');
Route::put('/editarFormaRMA/{forma_rma}', [FormaRmaController::class, 'update'])->name('editarFormaRMA')->middleware('auth');
Route::get('eliminarFormaRMA/{forma_rma}', [FormaRmaController::class, 'eliminarForm'])->name('eliminarFormaRMAForm')->middleware('auth');
Route::delete('eliminarFormaRMA/{forma_rma}', [FormaRmaController::class, 'destroy'])->name('eliminarFormaRMA')->middleware('auth');

/*Depositos*/
Route::get('/depositos', [CuentaController::class, 'index'])->middleware('auth');
Route::get('/agregarDeposito', [CuentaController::class, 'create'])->name('agregarDeposito')->middleware('auth');
Route::post('grabarDeposito', [CuentaController::class, 'store'])->name('grabarDeposito')->middleware('auth');
Route::get('/editarDeposito/{deposito}', [CuentaController::class, 'edit'])->name('editarDepositoForm')->middleware('auth');
Route::put('/editarDeposito/{deposito}', [CuentaController::class, 'update'])->name('editarDeposito')->middleware('auth');
Route::get('eliminarDeposito/{deposito}', [CuentaController::class, 'eliminarForm'])->name('eliminarDepositoForm')->middleware('auth');
Route::delete('eliminarDeposito/{deposito}', [CuentaController::class, 'destroy'])->name('eliminarDeposito')->middleware('auth');

/*FIN VENTAS*/ 

/*USUARIOS*/
/*Proveedores*/
Route::get('/proveedores', [ProveedorController::class, 'index'])->middleware('auth');
Route::get('/agregarProveedor', [ProveedorController::class, 'create'])->name('agregarProveedor')->middleware('auth');
Route::post('grabarProveedor', [ProveedorController::class, 'store'])->name('grabarProveedor')->middleware('auth');
Route::get('/editarProveedor/{proveedor}', [ProveedorController::class, 'edit'])->name('editarProveedorForm')->middleware('auth');
Route::put('/editarProveedor/{proveedor}', [ProveedorController::class, 'update'])->name('editarProveedor')->middleware('auth');
Route::get('eliminarProveedor/{proveedor}', [ProveedorController::class, 'eliminarForm'])->name('eliminarProveedorForm')->middleware('auth');
Route::delete('eliminarProveedor/{proveedor}', [ProveedorController::class, 'destroy'])->name('eliminarProveedor')->middleware('auth');

/*Operadores*/
Route::get('/operadores', [UserController::class, 'index'])->middleware('auth');
Route::get('/agregar_operador', [UserController::class, 'agregarForm'])->name('agregarOperador');
Route::post('grabarOperador', [UserController::class, 'grabar'])->name('grabarOperador');
Route::get('editarOperador/{id}', [UserController::class, 'editarForm'])->name('editarOperadorForm');
Route::match(['put', 'patch'],'editarOperador/{id}', [UserController::class, 'editarOperador'])->name('editarOperador');
Route::get('eliminarOperador/{id}', [UserController::class, 'eliminarForm'])->name('eliminarOperadorForm');
Route::delete('eliminarOperador/{id}', [UserController::class, 'eliminar'])->name('eliminarOperador');



/*FIN USUARIOS*/

/*SERVICE*/
/*Modelos de consola*/
Route::get('/modelos_consolas', [ServiceConsolaController::class, 'index'])->middleware('auth');
Route::get('/agregarConsola', [ServiceConsolaController::class, 'create'])->name('agregarConsola')->middleware('auth');
Route::post('grabarConsola', [ServiceConsolaController::class, 'store'])->name('grabarConsola')->middleware('auth');
Route::get('/editarConsola/{consola}', [ServiceConsolaController::class, 'edit'])->name('editarConsolaForm')->middleware('auth');
Route::put('/editarConsola/{consola}', [ServiceConsolaController::class, 'update'])->name('editarConsola')->middleware('auth');
Route::get('eliminarConsola/{consola}', [ServiceConsolaController::class, 'eliminarForm'])->name('eliminarConsolaForm')->middleware('auth');
Route::delete('eliminarConsola/{consola}', [ServiceConsolaController::class, 'destroy'])->name('eliminarConsola')->middleware('auth');

/*Estados de reparación*/
Route::get('/estados_reparacion', [ServiceEstadoController::class, 'index'])->middleware('auth');
Route::get('/agregarEstadoReparacion', [ServiceEstadoController::class, 'create'])->name('agregarEstadoReparacion')->middleware('auth');
Route::post('grabarEstadoReparacion', [ServiceEstadoController::class, 'store'])->name('grabarEstadoReparacion')->middleware('auth');
Route::get('/editarEstadoReparacion/{estado_reparacion}', [ServiceEstadoController::class, 'edit'])->name('editarEstadoReparacionForm')->middleware('auth');
Route::put('/editarEstadoReparacion/{estado_reparacion}', [ServiceEstadoController::class, 'update'])->name('editarEstadoReparacion')->middleware('auth');
Route::get('eliminarEstadoReparacion/{estado_reparacion}', [ServiceEstadoController::class, 'eliminarForm'])->name('eliminarEstadoReparacionForm')->middleware('auth');
Route::delete('eliminarEstadoReparacion/{estado_reparacion}', [ServiceEstadoController::class, 'destroy'])->name('eliminarEstadoReparacion')->middleware('auth');
/*FIN SERVICE*/

/*USO EXTERNO*/
/*Conceptos*/
Route::get('/conceptos', [GastoConceptoController::class, 'index'])->middleware('auth');
Route::get('/agregarConcepto', [GastoConceptoController::class, 'create'])->name('agregarConcepto')->middleware('auth');
Route::post('grabarConcepto', [GastoConceptoController::class, 'store'])->name('grabarConcepto')->middleware('auth');
Route::get('/editarConcepto/{concepto}', [GastoConceptoController::class, 'edit'])->name('editarConceptoForm')->middleware('auth');
Route::put('/editarConcepto/{concepto}', [GastoConceptoController::class, 'update'])->name('editarConcepto')->middleware('auth');
Route::get('eliminarConcepto/{concepto}', [GastoConceptoController::class, 'eliminarForm'])->name('eliminarConceptoForm')->middleware('auth');
Route::delete('eliminarConcepto/{concepto}', [GastoConceptoController::class, 'destroy'])->name('eliminarConcepto')->middleware('auth');

/*Gastos*/
Route::get('/gastos', [GastoController::class, 'index'])->middleware('auth');
Route::get('/agregarGasto', [GastoController::class, 'create'])->name('agregarGasto')->middleware('auth');
Route::post('grabarGasto', [GastoController::class, 'store'])->name('grabarGasto')->middleware('auth');
Route::get('/editarGasto/{gasto}', [GastoController::class, 'edit'])->name('editarGastoForm')->middleware('auth');
Route::put('/editarGasto/{gasto}', [GastoController::class, 'update'])->name('editarGasto')->middleware('auth');
Route::get('eliminarGasto/{gasto}', [GastoController::class, 'eliminarForm'])->name('eliminarGastoForm')->middleware('auth');
Route::delete('eliminarGasto/{gasto}', [GastoController::class, 'destroy'])->name('eliminarGasto')->middleware('auth');

/*Mailing*/
Route::get('/mailing', [MailingController::class, 'index'])->middleware('auth');
Route::get('/agregarMailing', [MailingController::class, 'create'])->name('agregarMailing')->middleware('auth');
Route::post('grabarMailing', [MailingController::class, 'store'])->name('grabarMailing')->middleware('auth');
Route::get('/editarMailing/{mailing}', [MailingController::class, 'edit'])->name('editarMailingForm')->middleware('auth');
Route::put('/editarMailing/{mailing}', [MailingController::class, 'update'])->name('editarMailing')->middleware('auth');
Route::get('eliminarMailing/{mailing}', [MailingController::class, 'eliminarForm'])->name('eliminarMailingForm')->middleware('auth');
Route::delete('eliminarMailing/{mailing}', [MailingController::class, 'destroy'])->name('eliminarMailing')->middleware('auth');
/*FIN USO EXTERNO*/


