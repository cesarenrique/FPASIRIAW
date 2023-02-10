<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalidadUsuarioController;
use App\Http\Controllers\CrearController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\EjemplarController;
use App\Http\Controllers\PrestarController;
use App\Http\Controllers\MultaController;
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
    return view('welcome');
});

/** mis rutas cojojnudas */
Route::get('/multa/registrar', [MultaController::class, 'registrarForm' ])->name('multa.registrarForm');
Route::post('/multa/registrar', [MultaController::class, 'registrar' ])->name('multa.registrar');
Route::get('/multa/listar', [MultaController::class, 'listar' ])->name('multa.listar');
Route::post('/multa/modificarForm', [MultaController::class, 'modificarForm' ])->name('multa.modificarForm');
Route::post('/multa/modificar', [MultaController::class, 'modificar' ])->name('multa.modificar');
Route::get('/multa/borrar/{id}', [MultaController::class, 'borrar' ])->name('multa.borrar');

Route::get('/ejemplar/registrar', [EjemplarController::class, 'registrarForm' ])->name('ejemplar.registrarForm');
Route::post('/ejemplar/registrar', [EjemplarController::class, 'registrar' ])->name('ejemplar.registrar');
Route::get('/ejemplar/listar', [EjemplarController::class, 'listar' ])->name('ejemplar.listar');
Route::post('/ejemplar/modificarForm', [EjemplarController::class, 'modificarForm' ])->name('ejemplar.modificarForm');
Route::post('/ejemplar/modificar', [EjemplarController::class, 'modificar' ])->name('ejemplar.modificar');
Route::get('/ejemplar/borrar/{id}', [EjemplarController::class, 'borrar' ])->name('ejemplar.borrar');


Route::get('/autor/registrar', [AutorController::class, 'registrarForm' ])->name('autor.registrarForm');
Route::post('/autor/registrar', [AutorController::class, 'registrar' ])->name('autor.registrar');
Route::get('/autor/listar', [AutorController::class, 'listar' ])->name('autor.listar');
Route::post('/autor/modificarForm', [AutorController::class, 'modificarForm' ])->name('autor.modificarForm');
Route::post('/autor/modificar', [AutorController::class, 'modificar' ])->name('autor.modificar');
Route::get('/autor/borrar/{id}', [AutorController::class, 'borrar' ])->name('autor.borrar');

Route::get('/localidad/registrar', [LocalidadController::class, 'registrarForm' ])->name('localidad.registrarForm');
Route::post('/localidad/registrar', [LocalidadController::class, 'registrar' ])->name('localidad.registrar');
Route::get('/localidad/listar', [LocalidadController::class, 'listar' ])->name('localidad.listar');
Route::post('/localidad/modificarForm', [LocalidadController::class, 'modificarForm' ])->name('localidad.modificarForm');
Route::post('/localidad/modificar', [LocalidadController::class, 'modificar' ])->name('localidad.modificar');
Route::get('/localidad/borrar/{id}', [LocalidadController::class, 'borrar' ])->name('localidad.borrar');

Route::get('/usuario/registrar', [UsuarioController::class, 'registrarForm' ])->name('usuario.registrarForm');
Route::post('/usuario/registrar', [UsuarioController::class, 'registrar' ])->name('usuario.registrar');
Route::get('/usuario/listar', [UsuarioController::class, 'listar' ])->name('usuario.listar');
Route::post('/usuario/modificarForm', [UsuarioController::class, 'modificarForm' ])->name('usuario.modificarForm');
Route::post('/usuario/modificar', [UsuarioController::class, 'modificar' ])->name('usuario.modificar');
Route::get('/usuario/borrar/{id}', [UsuarioController::class, 'borrar' ])->name('usuario.borrar');

Route::get('/pais/registrar', [PaisController::class, 'registrarForm' ])->name('pais.registrarForm');
Route::post('/pais/registrar', [PaisController::class, 'registrar' ])->name('pais.registrar');
Route::get('/pais/listar', [PaisController::class, 'listar' ])->name('pais.listar');
Route::post('/pais/modificarForm', [PaisController::class, 'modificarForm' ])->name('pais.modificarForm');
Route::post('/pais/modificar', [PaisController::class, 'modificar' ])->name('pais.modificar');
Route::get('/pais/borrar/{id}', [PaisController::class, 'borrar' ])->name('pais.borrar');

Route::get('/provincia/registrar', [ProvinciaController::class, 'registrarForm' ])->name('provincia.registrarForm');
Route::post('/provincia/registrar', [ProvinciaController::class, 'registrar' ])->name('provincia.registrar');
Route::get('/provincia/listar', [ProvinciaController::class, 'listar' ])->name('provincia.listar');
Route::post('/provincia/modificarForm', [ProvinciaController::class, 'modificarForm' ])->name('provincia.modificarForm');
Route::post('/provincia/modificar', [ProvinciaController::class, 'modificar' ])->name('provincia.modificar');
Route::get('/provincia/borrar/{id}', [ProvinciaController::class, 'borrar' ])->name('provincia.borrar');

Route::get('/editorial', [EditorialController::class,'listaeditorial'])
         ->name('listaeditorial');

Route::get('/editorial/{id}', [EditorialController::class,'listaid'])
         ->name('listaid');


Route::get('/editorialform', [EditorialController::class,'muestraform'])
    ->name('editorial.muestraform');

Route::post('/editorialalta', [EditorialController::class,'editorialalta'] )
    ->name('editorialalta');

Route::get('/editorial/delete/{id}', [EditorialController::class,'delete'])
    ->name('deleteditorial');

//Esta ruta llama a la funcion listatipo
//del controlador TipoController

//Le puedo dar un nombre a esta ruta para llamarla posteriormente
//de manera facil

Route::get('/tipo', [TipoController::class,'listatipo'])
         ->name('listatipo');

Route::get('/tipo/{id}', [TipoController::class,'listaid'])
         ->name('listaid');


Route::get('/tipoform', [TipoController::class,'muestraform'])
    ->name('tipo.muestraform');

Route::post('/tipoalta', [TipoController::class,'tipoalta'] )
    ->name('tipoalta');

Route::get('/tipo/delete/{id}', [TipoController::class,'delete'])
    ->name('deletetipo');

//Esta ruta llama a la funcion listarticulo
//del controlador ArticuloController

//Le puedo dar un nombre a esta ruta para llamarla posteriormente
//de manera facil

Route::get('/articulo', [ArticuloController::class,'listarticulo'])
         ->name('listarticulo');

Route::get('/articulo/{id}', [ArticuloController::class,'listaid'])
         ->name('listaid');


Route::get('/articuloform', [ArticuloController::class,'muestraform'])
    ->name('articulo.muestraform');

Route::post('/articuloalta', [ArticuloController::class,'articuloalta'] )
    ->name('articuloalta');

Route::get('/articulo/delete/{id}', [ArticuloController::class,'delete'])
  ->name('deletearticulo');

Route::get('/localidad/{id}/usuario/listar', [LocalidadUsuarioController::class, 'listar' ])->name('localidad.usuario.listar');
Route::get('/localidad/seleccionar/usuario', [LocalidadUsuarioController::class, 'seleccionar' ])->name('localidad.usuario.seleccionar');
Route::post('/localidad/seleccionar/usuario', [LocalidadUsuarioController::class, 'seleccionado' ])->name('localidad.usuario.seleccionado');

Route::get('/autor/seleccionar/articulo',[CrearController::class,'seleccionar'])->name('autor.articulo.seleccionar');
Route::post('/autor/seleccionado/articulo',[CrearController::class,'seleccionado'])->name('autor.articulo.seleccionado');
//Route::get('/autor/{id}/articulo',[CrearController::class,'registrarAutorArticuloForm'])->name('autor.articulo.registrarForm');
Route::post('/autor/seleccionado/articulo/agregar',[CrearController::class,'registrar'])->name('autor.articulo.registrar');
Route::get('/autor/{autor}/articulo/{articulo}/borrar',[CrearController::class,'borrar'])->name('autor.articulo.borrar');
Route::get('/autor/{autor}/articulo/{articulo}',[CrearController::class,'articuloPorAutor'])->name('autor.articulo.show');

Route::get('/usuario/seleccionar/ejemplar',[PrestarController::class,'seleccionar'])->name('usuario.ejemplar.seleccionar');
Route::post('/usuario/seleccionado/ejemplar',[PrestarController::class,'seleccionado'])->name('usuario.ejemplar.seleccionado');
Route::post('/usuario/seleccionado/ejemplar/agregar',[PrestarController::class,'registrar'])->name('usuario.ejemplarejemplar.registrar');
Route::get('/usuario/{usuario}/ejemplar/{ejemplar}/borrar',[PrestarController::class,'borrar'])->name('usuario.ejemplar.borrar');
Route::get('/usuario/{usuario}/ejemplar/{ejemplar}',[PrestarController::class,'articuloPorAutor'])->name('usuario.ejemplar.show');


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});
