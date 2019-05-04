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

Route::resource('cuenta', 'CuentaController');


Route::get('addCuenta','CuentaController@addCuenta');
Route::get('add','CuentaController@add');

Route::post('store','CuentaController@store');
Route::post('destroy/{cuenta}','CuentaController@destroy');
Route::post('store_cuenta','CuentaController@store_cuenta');

Route::post('acreditar','CuentaController@acreditar');

Route::post('debitar','CuentaController@debitar');

Route::post('editar/{cuenta}','CuentaController@editar');