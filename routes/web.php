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

        Route::get('sedes/index', 'SedeController@index')->name('sedes.index');
Route::post('sedes/store', 'SedeController@store')->name('sedes.store');
Route::get('sedes/create', 'SedeController@create')->name('sedes.create');
Route::put('sedes/{sede}', 'SedeController@update')->name('sedes.update');
Route::get('sedes/{sede}', 'SedeController@show')->name('sedes.show');
Route::delete('sedes/{sede}', 'SedeController@destroy')->name('sedes.destroy');
Route::get('sedes/{sede}/edit', 'SedeController@edit')->name('sedes.edit');








        Route::get('vehiculo', 'VehiculoController@index')->name('vehiculo.index');
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

