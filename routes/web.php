<?php
//todas estas rutas se ejecutaran a la hora de arrancar la pagina
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
//ruta para ejecutar la pagina de bienvenida
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
//ruta para ejecutar el home de la pagina
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

// rutas para el mantenimiento de Sedes, aqui esta para ver la seccion sedes,para actualizar,crear,eliminar,etc
    Route::get('sedes/index', 'SedeController@index')->name('sedes.index');
    Route::post('sedes/store', 'SedeController@store')->name('sedes.store');
    Route::get('sedes/create', 'SedeController@create')->name('sedes.create');
    Route::post('sedes/{sede}', 'SedeController@update')->name('sedes.update');
    Route::get('sedes/{sede}', 'SedeController@show')->name('sedes.show');
    Route::delete('sedes/{sede}', 'SedeController@destroy')->name('sedes.destroy');
    Route::get('sedes/{sede}/edit', 'SedeController@edit')->name('sedes.edit');

// rutas para el mantenimiento de cotizacion, aqui esta para ver la seccion COTIZACION,para actualizar,crear,eliminar,etc
    Route::get('cotizaciones/index', 'CotizacionController@index')->name('cotizaciones.index');
    Route::post('cotizaciones/store', 'CotizacionController@store')->name('cotizaciones.store');
    Route::get('cotizaciones/create', 'CotizacionController@create')->name('cotizaciones.create');
    Route::get('cotizaciones/nueva', 'CotizacionController@nueva')->name('cotizaciones.nueva');
    Route::post('cotizaciones/{cotizacion}', 'CotizacionController@update')->name('cotizaciones.update');
    Route::get('cotizaciones/{cotizacion}', 'CotizacionController@show')->name('cotizaciones.show');
    Route::delete('cotizaciones/{cotizacion}', 'CotizacionController@destroy')->name('cotizaciones.destroy');
    Route::get('cotizaciones/{cotizacion}/edit', 'CotizacionController@edit')->name('cotizaciones.edit');


/// rutas para el mantenimiento de campaña, aqui esta para ver la seccion Campañas,para actualizar,crear,eliminar,etc
    Route::get('campanas/index', 'CampanaController@index')->name('campanas.index');
    Route::post('campanas/store', 'CampanaController@store')->name('campanas.store');
    Route::get('campanas/create', 'CampanaController@create')->name('campanas.create');
    Route::put('campanas/{campana}', 'CampanaController@update')->name('campanas.update');
    Route::get('campanas/{campana}', 'CampanaController@show')->name('campanas.show');
    Route::delete('campanas/{campana}', 'CampanaController@destroy')->name('campanas.destroy');
    Route::get('campanas/{campana}/edit', 'CampanaController@edit')->name('campanas.edit');


//Detalle
//        Route::get('sedes/index', 'SedeController@index')->name('sedes.index');
//        Route::post('sedes/store', 'SedeController@store')->name('sedes.store');
//        Route::get('sedes/create', 'SedeController@create')->name('sedes.create');
//        Route::put('sedes/{sede}', 'SedeController@update')->name('sedes.update');
//        Route::get('sedes/{sede}', 'SedeController@show')->name('sedes.show');
//        Route::delete('sedes/{sede}', 'SedeController@destroy')->name('sedes.destroy');
//        Route::get('sedes/{sede}/edit', 'SedeController@edit')->name('sedes.edit');


//// rutas para el mantenimiento de vehiculo, aqui esta para ver la seccion Vehiculo,para actualizar,crear,eliminar,etc

    Route::get('vehiculos/index', 'VehiculoController@index')->name('vehiculos.index');
    Route::post('vehiculos/store', 'VehiculoController@store')->name('vehiculos.store');
    Route::get('vehiculos/create', 'VehiculoController@create')->name('vehiculos.create');
    Route::post('vehiculos/{vehiculo}', 'VehiculoController@update')->name('vehiculos.update');
    Route::get('vehiculos/{vehiculo}', 'VehiculoController@show')->name('vehiculos.show');
    Route::delete('vehiculos/{vehiculo}', 'VehiculoController@destroy')->name('vehiculos.destroy');
    Route::get('vehiculos/{vehiculo}/edit', 'VehiculoController@edit')->name('vehiculos.edit');

// rutas para el mantenimiento de cliente, aqui esta para ver la seccion Clientes,para actualizar,crear,eliminar,etc
    Route::get('clientes/index', 'ClienteController@index')->name('clientes.index');
  Route::post('clientes/store', 'ClienteController@store')->name('clientes.store');
    Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
    Route::post('clientes/{cliente}', 'ClienteController@update')->name('clientes.update');
    Route::get('clientes/{cliente}', 'ClienteController@show')->name('clientes.show');
    Route::delete('clientes/{cliente}', 'ClienteController@destroy')->name('clientes.destroy');
    Route::get('clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');

});

//envio de correo
// ruta de formulario
Route::get('envio/index', 'ControllerMail@index');
// ruta al enviar correo
Route::post('mensaje/send', 'ControllerMail@send');

// rutas extraer los iconos,tipografia,notificaciones,mapas,entre otras que la plantilla ofrece
Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});
// rutas para el mantenimiento de usuarios, aqui esta para editar,crear y actualizar los usuarios
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

}
);
// rutas para el envio de correo a la hora de realizar un registro
Route::get('registro', 'Auth\RegisterController@registroMail')->name('Email.registroMail');
//Route::get('registro', 'EmailController@registro')->name('Email.registro');




