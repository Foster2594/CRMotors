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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//Route::resourse('clientes','CRM/ClienteController');

//Pruebas
//Route::get('prueba/sedes', 'SedeController@store')->name('sedes.store');
// Route::get('prueba/cotizaciones/create', 'CotizacionController@create')->name('cotizaciones.create');
//Sedes
Route::get('sedes/index', 'SedeController@index')->name('sedes.index');
Route::post('sedes/store', 'SedeController@store')->name('sedes.store');
Route::get('sedes/create', 'SedeController@create')->name('sedes.create');
Route::post('sedes/{sede}', 'SedeController@update')->name('sedes.update');
Route::get('sedes/{sede}', 'SedeController@show')->name('sedes.show');
Route::delete('sedes/{sede}', 'SedeController@destroy')->name('sedes.destroy');
Route::get('sedes/{sede}/edit', 'SedeController@edit')->name('sedes.edit');

//Cotizacion
Route::get('cotizaciones/index', 'CotizacionController@index')->name('cotizaciones.index');
Route::post('cotizaciones/store', 'CotizacionController@store')->name('cotizaciones.store');
Route::get('cotizaciones/create', 'CotizacionController@create')->name('cotizaciones.create');
Route::post('cotizaciones/{cotizacion}', 'CotizacionController@update')->name('cotizaciones.update');
Route::get('cotizaciones/{cotizacion}', 'CotizacionController@show')->name('cotizaciones.show');
Route::delete('cotizaciones/{cotizacion}', 'CotizacionController@destroy')->name('cotizaciones.destroy');
Route::get('cotizaciones/{cotizacion}/edit', 'CotizacionController@edit')->name('cotizaciones.edit');
Route::get('cotizaciones/nueva', 'CotizacionController@nueva')->name('cotizaciones.nueva');

//Campana
<<<<<<< HEAD
        Route::get('campanas/index', 'CampanaController@index')->name('campanas.index');
        Route::post('campanas/store', 'CampanaController@store')->name('campanas.store');
        Route::get('campanas/create', 'CampanaController@create')->name('campanas.create');
        Route::put('campanas/{campana}', 'CampanaController@update')->name('campanas.update');
        Route::get('campanas/{campana}', 'CampanaController@show')->name('campanas.show');
        Route::delete('campanas/{campana}', 'CampanaController@destroy')->name('campanas.destroy');
        Route::get('campanas/{campana}/edit', 'CampanaController@edit')->name('campanas.edit');
=======
Route::get('campanas/index', 'CampanaController@index')->name('campanas.index');
Route::post('campanas/store', 'CampanaController@store')->name('campanas.store');
Route::get('campanas/create', 'CampanaController@create')->name('campanas.create');
Route::get('campanas/{campana}', 'CampanaController@update')->name('campanas.update');
Route::get('campanas/{campana}', 'CampanaController@show')->name('campanas.show');
Route::delete('campanas/{campana}', 'CampanaController@destroy')->name('campanas.destroy');
Route::get('campanas/{campana}/edit', 'CampanaController@edit')->name('campanas.edit');
>>>>>>> 315af915ae121b9d31f6f7d6f21d3152b8d98bb5


//Detalle
//        Route::get('sedes/index', 'SedeController@index')->name('sedes.index');
//        Route::post('sedes/store', 'SedeController@store')->name('sedes.store');
//        Route::get('sedes/create', 'SedeController@create')->name('sedes.create');
//        Route::put('sedes/{sede}', 'SedeController@update')->name('sedes.update');
//        Route::get('sedes/{sede}', 'SedeController@show')->name('sedes.show');
//        Route::delete('sedes/{sede}', 'SedeController@destroy')->name('sedes.destroy');
//        Route::get('sedes/{sede}/edit', 'SedeController@edit')->name('sedes.edit');


//vehiculo

Route::get('vehiculos/index', 'VehiculoController@index')->name('vehiculos.index');
Route::post('vehiculos/store', 'VehiculoController@store')->name('vehiculos.store');
Route::get('vehiculos/create', 'VehiculoController@create')->name('vehiculos.create');
Route::post('vehiculos/{vehiculo}', 'VehiculoController@update')->name('vehiculos.update');
Route::get('vehiculos/{vehiculo}', 'VehiculoController@show')->name('vehiculos.show');
Route::delete('vehiculos/{vehiculo}', 'VehiculoController@destroy')->name('vehiculos.destroy');
Route::get('vehiculos/{vehiculo}/edit', 'VehiculoController@edit')->name('vehiculos.edit');

//       Route::get('vehiculo', 'VehiculoController@index')->name('vehiculos.index');
Route::get('cliente', 'ClienteController@index')->name('clientes.index');
/*      Route::post('roles/store', 'Roles\RoleController@store')->name('roles.store')->middleware('can:roles.create');
        Route::get('roles/create', 'Roles\RoleController@create')->name('roles.create')->middleware('can:roles.create');
        Route::put('roles/{role}', 'Roles\RoleController@update')->name('roles.update')->middleware('can:roles.edit');
        Route::get('roles/{role}', 'Roles\RoleController@show')->name('roles.show')->middleware('can:roles.show');
        Route::delete('roles/{role}', 'Roles\RoleController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');
        Route::get('roles/{role}/edit', 'Roles\RoleController@edit')->name('roles.edit')->middleware('can:roles.edit');
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

}
);

