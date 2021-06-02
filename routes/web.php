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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
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

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::resource('proveedor', 'App\Http\Controllers\ProveedorController');

    Route::resource('cliente', ClienteController::class);
    Route::get('buscar/cliente', [ClienteController::class, 'buscarCliente'])->name('cliente.buscar'); // Sin uso
    Route::resource('cotizacion', CotizacionController::class);
    Route::resource('facturacion', FacturacionController::class);
    Route::post('facturacion/crear/{cotizacion}', [FacturacionController::class, 'crear'])->name('facturacion.crear');

    Route::resource('raw', 'App\Http\Controllers\MaterialController');
	Route::resource('informacion', 'App\Http\Controllers\InformacionController');
    Route::resource('categoria', 'App\Http\Controllers\CategoriaController');
    Route::resource('producto', 'App\Http\Controllers\ProductoController');
	Route::resource('ordencompra', 'App\Http\Controllers\OrdenCompraController');
	Route::get('materiaprimafiltro','App\Http\Controllers\OrdenCompraController@filtro');
	Route::get('materiaprimafactura','App\Http\Controllers\OrdenCompraController@factura')->name('materiafactura');
	Route::post('guardarmateriafactura','App\Http\Controllers\OrdenCompraController@guardar')->name('guardarmateriafactura');
});