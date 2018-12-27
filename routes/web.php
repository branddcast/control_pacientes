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

//Rutas de Controladores
Route::resource('pacientes'		, 'PacientesController');
Route::resource('estatus'		, 'EstatusController');
Route::resource('especialistas' , 'EspecialistasController');
Route::resource('especialidades', 'EspecialidadesController');
Route::resource('roles'			, 'RolesController');
Route::resource('citas'			, 'CitasController');
Route::resource('colores'		, 'ColoresController');
Route::resource('usuarios'		, 'UsuariosController');
Route::resource('notificaciones', 'NotificacionesController');

//Rutas de Citas
Route::get( '/citas_json'		, 'CitasController@citas_json')->name('citas_json');
Route::post('/citas/modificar'	, 'CitasController@modificar')->name('modificar');
Route::post('/citas/eliminar'	, 'CitasController@destroy')->name('delete');

//Rutas de Notificaciones
Route::get('/get_notifications' , 'NotificacionesController@getAll')->name('get_notifications');
Route::get('/seen_notifications', 'NotificacionesController@seen_notifications')->name('seen_notifications');

//Rutas de autenticación. Login. Register. Etc.
Auth::routes();

//Ruta Home (Dashboard)
Route::get('/home', 'HomeController@index')->name('home');
