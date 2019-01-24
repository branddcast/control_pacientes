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

//Verificar email
Auth::routes(['verify' => true]);
Route::get('verificarcuenta/{token}/{id}'	, 'UsuariosController@verificarEmail')->name('verificarcuenta');

//Rutas de Controladores
Route::resource('pacientes'		, 'PacientesController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('estatus'		, 'EstatusController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('especialistas' , 'EspecialistasController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('especialidades', 'EspecialidadesController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('roles'			, 'RolesController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('citas'			, 'CitasController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('colores'		, 'ColoresController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('usuarios'		, 'UsuariosController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('notificaciones', 'NotificacionesController')->middleware('auth', 'rol:Super Admin, Admin');
Route::resource('detalles_especialistas', 'DetallesEspecialistasController')->middleware('auth', 'rol:Super Admin, Admin');

Route::get('historia_clinica/create/{id}', 'HistoriasClinicasController@create')
		->middleware('auth', 'rol:Super Admin, Admin');

Route::get('historia_clinica/show/{id}', 'HistoriasClinicasController@show')
		->name('historia_clinica.show')
		->middleware('auth', 'rol:Super Admin, Admin');

Route::post('historia_clinica/store', 'HistoriasClinicasController@store')
		->name('historia_clinica.store')
		->middleware('auth', 'rol:Super Admin, Admin');

Route::post('historia_clinica/update/{id}', 'HistoriasClinicasController@update')
		->name('historia_clinica.update')
		->middleware('auth', 'rol:Super Admin, Admin');

Route::post('historia_clinica/destroy/{id}', 'HistoriasClinicasController@destroy')
		->name('historia_clinica.destroy')
		->middleware('auth', 'rol:Super Admin, Admin');

Route::get('historia_clinica/delete_file/{file}/{id}', 'HistoriasClinicasController@eliminarDoc')
		->name('historia_clinica.delete_file')
		->middleware('auth', 'rol:Super Admin, Admin');

Route::get('historia_clinica/print/{id}', 'HistoriasClinicasController@print')
		->name('historia_clinica.print')
		->middleware('auth', 'rol:Super Admin, Admin');

//Rutas downloads
Route::get('/download/{file}' 	, 'HistoriasClinicasController@downloadFile')->middleware('auth', 'rol:Super Admin, Admin');

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
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'rol:*');
