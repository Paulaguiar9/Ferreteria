<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clientes', 'cliente@index')->name('clientes')->middleware('auth');
Route::get('/clientesAdd','cliente@agregar')->name('clientesAdd')->middleware('auth');
Route::post('/guardarCliente','cliente@guardar')->name('guardar')->middleware('auth');
Route::delete('/eliminar-cliente/{id}','cliente@eliminar')->name('eliminar')->middleware('auth');
Route::get('/editar-cliente/{id}','cliente@editar')->name('editar')->middleware('auth');
Route::patch('/actualizar/{id}','cliente@actualizar')->name('actualizar')->middleware('auth');


Route::get('/articulos','ArticuloController@index')->name('articulos')->middleware('auth');
Route::get('/articulosAdd','ArticuloController@agregar')->name('articulosAdd')->middleware('auth');
Route::post('/guardarArticulo','ArticuloController@guardar')->name('guardar')->middleware('auth');
Route::delete('/eliminar-articulo/{id}','ArticuloController@eliminar')->name('eliminar')->middleware('auth');
Route::get('/editar-articulo/{id}','ArticuloController@editar')->name('editar')->middleware('auth'); 
Route::patch('/actualizar/{id}','ArticuloController@actualizar')->name('actualizar')->middleware('auth');

Route::get('/factura','FacturaController@index')->name('factura')->middleware('auth');
