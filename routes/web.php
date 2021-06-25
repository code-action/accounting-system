<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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
	if(auth()->check())
		return redirect()->route('home');
	else
    	return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth','change']], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => ['auth','change']], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::resource('proveedor', 'App\Http\Controllers\ProveedorController');

    Route::resource('cliente', ClienteController::class);
    Route::resource('cotizacion', CotizacionController::class);
    Route::resource('facturacion', FacturacionController::class);
    Route::post('facturacion/crear/{cotizacion}', [FacturacionController::class, 'crear'])->name('facturacion.crear'); // botón facturar
    Route::post('facturacion/crear/', [FacturacionController::class, 'crear2'])->name('facturacion.crear2'); // botón guardar y facturar
    Route::resource('empaque', \App\Http\Controllers\EmpaqueController::class);

    Route::resource('raw', 'App\Http\Controllers\MaterialController');
    Route::resource('proyecto', 'App\Http\Controllers\ProyectoController');
    Route::resource('tarea', 'App\Http\Controllers\TareaController');
    Route::resource('ubicacion', 'App\Http\Controllers\UbicacionController');
	Route::resource('informacion', 'App\Http\Controllers\InformacionController');
    Route::resource('medida', 'App\Http\Controllers\MedidaController');
    Route::resource('categoria', 'App\Http\Controllers\CategoriaController');
    Route::resource('producto', 'App\Http\Controllers\ProductoController');
	Route::resource('ordencompra', 'App\Http\Controllers\OrdenCompraController');
	Route::get('materiaprimafiltro','App\Http\Controllers\OrdenCompraController@filtro');
	Route::get('materiaprimafactura','App\Http\Controllers\OrdenCompraController@factura')->name('materiafactura');
	Route::post('guardarmateriafactura','App\Http\Controllers\OrdenCompraController@guardar')->name('guardarmateriafactura');
});
