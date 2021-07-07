<?php

use App\Http\Controllers\alimentosController;
use App\Http\Controllers\negociosController;
use App\Http\Middleware\validarRol;
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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
	Route::get('/negocios',[negociosController::class,'vista'])->name('m.negocios')->middleware('valRol:admin');
	Route::get('/descargar_archivo/{id_negocio}',[negociosController::class,'verArchivo'])->name('m.verarchivo.negocio');
	Route::get('/lista_negocios',[negociosController::class,'listar']);
	Route::post('/editar_negocio',[negociosController::class,'editar']);
	Route::post('/guardar_negocio',[negociosController::class,'guardar']);
	Route::delete('/eliminar_negocio/{id_negocio}',[negociosController::class,'eliminar']);

	Route::get('/alimentos',[alimentosController::class,'vistalim'])->name('m.alimentos')->middleware('auth');
	Route::get('/aviso',[alimentosController::class,'vistav'])->name('m.aviso')->middleware('auth');
	Route::get('/descargar_archivo/{id_alimento}',[negociosController::class,'verArchivo'])->name('m.verarchivo.alimento');
	Route::get('/lista_alimentos',[alimentosController::class,'listaralim']);
	Route::post('/editar_alimento',[alimentosController::class,'editaralim']);
	Route::post('/guardar_alimento',[alimentosController::class,'guardaralim']);
	Route::delete('/eliminar_alimento/{id_alimento}',[alimentosController::class,'eliminaralim']);
});

