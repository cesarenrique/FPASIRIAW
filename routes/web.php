<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalidadUsuarioController;
use App\Http\Controllers\CrearController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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


Route::get('/multa/registrar', [MultaController::class, 'registrarForm' ])->middleware('auth')->name('multa.registrarForm');
Route::post('/multa/registrar', [MultaController::class, 'registrar' ])->middleware('auth')->name('multa.registrar');
Route::get('/multa/listar', [MultaController::class, 'listar' ])->middleware('auth')->name('multa.listar');
Route::post('/multa/modificarForm', [MultaController::class, 'modificarForm' ])->middleware('auth')->name('multa.modificarForm');
Route::post('/multa/modificar', [MultaController::class, 'modificar' ])->middleware('auth')->name('multa.modificar');
Route::get('/multa/borrar/{id}', [MultaController::class, 'borrar' ])->middleware('auth')->name('multa.borrar');
Route::get('/multa/{id}/modificar', [MultaController::class, 'modificarId' ])->middleware('auth')->name('multa.modificar.id');
Route::get('/multa/{id}/borrar', [MultaController::class, 'borrar' ])->middleware('auth')->name('multa.borrar.id');
Route::get('/multa/{id}', [MultaController::class, 'showOne' ])->middleware('auth')->name('multa.showOne');

Route::get('/autor/registrar', [AutorController::class, 'registrarForm' ])->middleware('auth')->name('autor.registrarForm');
Route::post('/autor/registrar', [AutorController::class, 'registrar' ])->middleware('auth')->name('autor.registrar');
Route::get('/autor/listar', [AutorController::class, 'listar' ])->middleware('auth')->name('autor.listar');
Route::post('/autor/modificarForm', [AutorController::class, 'modificarForm' ])->middleware('auth')->name('autor.modificarForm');
Route::post('/autor/modificar', [AutorController::class, 'modificar' ])->middleware('auth')->name('autor.modificar');
Route::get('/autor/{id}/modificar', [AutorController::class, 'modificarId' ])->middleware('auth')->name('autor.modificar.id');
Route::get('/autor/{id}/borrar', [AutorController::class, 'borrar' ])->middleware('auth')->name('autor.borrar.id');
Route::get('/autor/{id}', [AutorController::class, 'showOne' ])->middleware('auth')->name('autor.showOne');

Route::get('/localidad/registrar', [LocalidadController::class, 'registrarForm' ])->middleware('auth')->name('localidad.registrarForm');
Route::post('/localidad/registrar', [LocalidadController::class, 'registrar' ])->middleware('auth')->name('localidad.registrar');
Route::get('/localidad/listar', [LocalidadController::class, 'listar' ])->middleware('auth')->name('localidad.listar');
Route::post('/localidad/modificarForm', [LocalidadController::class, 'modificarForm' ])->middleware('auth')->name('localidad.modificarForm');
Route::post('/localidad/modificar', [LocalidadController::class, 'modificar' ])->middleware('auth')->name('localidad.modificar');
Route::get('/localidad/borrar/{id}', [LocalidadController::class, 'borrar' ])->middleware('auth')->name('localidad.borrar');
Route::get('/localidad/{id}/modificar', [LocalidadController::class, 'modificarId' ])->middleware('auth')->name('localidad.modificar.id');
Route::get('/localidad/{id}/borrar', [LocalidadController::class, 'borrar' ])->middleware('auth')->name('localidad.borra.idr');
Route::get('/localidad/{id}', [LocalidadController::class, 'showOne' ])->middleware('auth')->name('localidad.showOne');

Route::get('/usuario/registrar', [UsuarioController::class, 'registrarForm' ])->middleware('auth')->name('usuario.registrarForm');
Route::post('/usuario/registrar', [UsuarioController::class, 'registrar' ])->middleware('auth')->name('usuario.registrar');
Route::get('/usuario/listar', [UsuarioController::class, 'listar' ])->middleware('auth')->name('usuario.listar');
Route::post('/usuario/modificarForm', [UsuarioController::class, 'modificarForm' ])->middleware('auth')->name('usuario.modificarForm');
Route::post('/usuario/modificar', [UsuarioController::class, 'modificar' ])->middleware('auth')->name('usuario.modificar');
Route::get('/usuario/borrar/{id}', [UsuarioController::class, 'borrar' ])->middleware('auth')->name('usuario.borrar');
Route::get('/usuario/{id}/modificar', [UsuarioController::class, 'modificarId' ])->middleware('auth')->name('usuario.modificar.id');
Route::get('/usuario/{id}/borrar', [UsuarioController::class, 'borrar' ])->middleware('auth')->name('usuario.borrar.id');
Route::get('/usuario/{id}', [UsuarioController::class, 'showOne' ])->middleware('auth')->name('usuario.showOne');


Route::get('/editorial', [EditorialController::class,'listaeditorial'])
         ->middleware('auth')->name('listaeditorial');

Route::get('/editorial/{id}', [EditorialController::class,'listaid'])
         ->middleware('auth')->name('listaid');


Route::get('/editorialform', [EditorialController::class,'muestraform'])
    ->middleware('auth')->name('editorial.muestraform');

Route::post('/editorialalta', [EditorialController::class,'editorialalta'] )
    ->middleware('auth')->name('editorialalta');

Route::get('/editorial/delete/{id}', [EditorialController::class,'delete'])
    ->middleware('auth')->name('deleteditorial');

//Esta ruta llama a la funcion listatipo
//del controlador TipoController

//Le puedo dar un nombre a esta ruta para llamarla posteriormente
//de manera facil

Route::get('/tipo', [TipoController::class,'listatipo'])
         ->middleware('auth')->name('listatipo');

Route::get('/tipo/{id}', [TipoController::class,'listaid'])
        ->middleware('auth') ->name('listaid');


Route::get('/tipoform', [TipoController::class,'muestraform'])
    ->middleware('auth')->name('tipo.muestraform');

Route::post('/tipoalta', [TipoController::class,'tipoalta'] )
    ->middleware('auth')->name('tipoalta');

Route::get('/tipo/delete/{id}', [TipoController::class,'delete'])
    ->middleware('auth')->name('deletetipo');

//Esta ruta llama a la funcion listarticulo
//del controlador ArticuloController

//Le puedo dar un nombre a esta ruta para llamarla posteriormente
//de manera facil

Route::get('/articulo', [ArticuloController::class,'listarticulo'])
         ->middleware('auth')->name('listarticulo');

Route::get('/articulo/{id}', [ArticuloController::class,'listaid'])
         ->middleware('auth')->name('listaid');


Route::get('/articuloform', [ArticuloController::class,'muestraform'])
    ->middleware('auth')->name('articulo.muestraform');

Route::post('/articuloalta', [ArticuloController::class,'articuloalta'] )
    ->middleware('auth')->name('articuloalta');

Route::get('/articulo/delete/{id}', [ArticuloController::class,'delete'])
  ->middleware('auth')->name('deletearticulo');

Route::get('/localidad/{id}/usuario/listar', [LocalidadUsuarioController::class, 'listar' ])->middleware('auth')->name('localidad.usuario.listar');
Route::get('/localidad/seleccionar/usuario', [LocalidadUsuarioController::class, 'seleccionar' ])->middleware('auth')->name('localidad.usuario.seleccionar');
Route::post('/localidad/seleccionar/usuario', [LocalidadUsuarioController::class, 'seleccionado' ])->middleware('auth')->name('localidad.usuario.seleccionado');

Route::get('/autor/seleccionar/articulo',[CrearController::class,'seleccionar'])->middleware('auth')->name('autor.articulo.seleccionar');
Route::post('/autor/seleccionado/articulo',[CrearController::class,'seleccionado'])->middleware('auth')->name('autor.articulo.seleccionado');
//Route::get('/autor/{id}/articulo',[CrearController::class,'registrarAutorArticuloForm'])->name('autor.articulo.registrarForm');
Route::post('/autor/seleccionado/articulo/agregar',[CrearController::class,'registrar'])->middleware('auth')->name('autor.articulo.registrar');
Route::get('/autor/{autor}/articulo/{articulo}/borrar',[CrearController::class,'borrar'])->middleware('auth')->name('autor.articulo.borrar');
Route::get('/autor/{autor}/articulo/{articulo}',[CrearController::class,'articuloPorAutor'])->middleware('auth')->name('autor.articulo.show');

Route::get('/inicio',[DashboardController::class,'index'])->middleware('auth')->name('inicio');




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
