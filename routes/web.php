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

//rutas direccion
Route::post('search/provincia', 'SearchController@provincia')->name('search.provincia');
Route::post('search/canton', 'SearchController@canton')->name('search.canton');
Route::post('search/distrito', 'SearchController@distrito')->name('search.distrito');


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
    Route::get('cotizaciones/nueva/detalle', 'CotizacionController@detalle')->name('cotizacion.detalle');
    Route::get('cotizaciones/nueva/{vehiculo}', 'CotizacionController@agregar')->name('cotizaciones.agregar');
    Route::post('cotizaciones/{cotizacion}', 'CotizacionController@update')->name('cotizaciones.update');
    Route::get('cotizaciones/{cotizacion}', 'CotizacionController@show')->name('cotizaciones.show');
    Route::delete('cotizaciones/{cotizacion}', 'CotizacionController@destroy')->name('cotizaciones.destroy');
    Route::get('cotizaciones/{cotizacion}/edit', 'CotizacionController@edit')->name('cotizaciones.edit');


 Route::get('cotizaciones/{cotizacion}/pdf', 'CotizacionController@create_pdf')->name('cotizaciones.pdf');
    //importacion de vehiculos para el modal


//Campana

    Route::get('campanas/index', 'CampanaController@index')->name('campanas.index');
    Route::post('campanas/store', 'CampanaController@store')->name('campanas.store');
    Route::get('campanas/create', 'CampanaController@create')->name('campanas.create');
    Route::post('campanas/{campana}', 'CampanaController@update')->name('campanas.update');
    Route::get('campanas/{campana}', 'CampanaController@show')->name('campanas.show');
    Route::delete('campanas/{campana}', 'CampanaController@destroy')->name('campanas.destroy');
    Route::get('campanas/{campana}/edit', 'CampanaController@edit')->name('campanas.edit');




//// rutas para el mantenimiento de vehiculo, aqui esta para ver la seccion Vehiculo,para actualizar,crear,eliminar,etc


    Route::get('vehiculos/select', 'VehiculoController@select')->name('vehiculos.select');
    Route::get('vehiculos/index', 'VehiculoController@index')->name('vehiculos.index');
    Route::post('vehiculos/store', 'VehiculoController@store')->name('vehiculos.store');
    Route::get('vehiculos/create', 'VehiculoController@create')->name('vehiculos.create');
    Route::post('vehiculos/{vehiculo}', 'VehiculoController@update')->name('vehiculos.update');
    Route::get('vehiculos/{vehiculo}', 'VehiculoController@show')->name('vehiculos.show');
    Route::delete('vehiculos/{vehiculo}', 'VehiculoController@destroy')->name('vehiculos.destroy');
    Route::get('vehiculos/{vehiculo}/edit', 'VehiculoController@edit')->name('vehiculos.edit');

//// rutas para el mantenimiento de vehiculo, aqui esta para ver la seccion Proveedores,para actualizar,crear,eliminar,etc


    Route::get('proveedores/select', 'ProveedorController@select')->name('proveedores.select');
    Route::get('proveedores/index', 'ProveedorController@index')->name('proveedores.index');//->middleware('proveedores.index');
    Route::post('proveedores/store', 'ProveedorController@store')->name('proveedores.store');
    Route::get('proveedores/create', 'ProveedorController@create')->name('proveedores.create');
    Route::post('proveedores/{proveedor}', 'ProveedorController@update')->name('proveedores.update');
    Route::get('proveedores/{proveedor}', 'ProveedorController@show')->name('proveedores.show');
    Route::delete('proveedores/{proveedor}', 'ProveedorController@destroy')->name('proveedores.destroy');
    Route::get('proveedores/{proveedor}/edit', 'ProveedorController@edit')->name('proveedores.edit');


// rutas para el mantenimiento de cliente, aqui esta para ver la seccion Clientes,para actualizar,crear,eliminar,etc

    Route::get('clientes/indexCartera', 'ClienteController@indexCartera')->name('clientes.indexCartera');
    Route::get('clientes/index', 'ClienteController@index')->name('clientes.index');
    Route::post('clientes/store', 'ClienteController@store')->name('clientes.store');
    Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
    Route::get('clientes/asignar', 'ClienteController@asignarCartera')->name('clientes.asignarCartera');
    Route::post('clientes/asignarCli', 'ClienteController@asignarCliente')->name('clientes.asignarCliente');
    Route::post('clientes/{cliente}', 'ClienteController@update')->name('clientes.update');
    Route::get('clientes/{cliente}/quitar', 'ClienteController@quitarDeCartera')->name('clientes.quitarDeCartera');
    Route::get('clientes/{cliente}', 'ClienteController@show')->name('clientes.show');
    Route::delete('clientes/{cliente}', 'ClienteController@destroy')->name('clientes.destroy');
    Route::get('clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');

// rutas para el mantenimiento de empleados, aqui esta para ver la seccion Empleados,para actualizar,crear,eliminar,etc

    Route::get('empleados/index', 'EmpleadoController@index')->name('empleados.index');
    Route::post('empleados/store', 'EmpleadoController@store')->name('empleados.store');
    Route::get('empleados/create', 'EmpleadoController@create')->name('empleados.create');
    Route::post('empleados/{empleado}', 'EmpleadoController@update')->name('empleados.update');
    Route::get('empleados/{empleado}', 'EmpleadoController@show')->name('empleados.show');
    Route::delete('empleados/{empleado}', 'EmpleadoController@destroy')->name('empleados.destroy');
    Route::get('empleados/{empleado}/edit', 'EmpleadoController@edit')->name('empleados.edit');

    Route::prefix('admin')->group(function () {
        //Roles
        Route::post('roles/store', 'Roles\RoleController@store')->name('roles.store')->middleware('can:roles.create');
        Route::get('roles', 'Roles\RoleController@index')->name('roles.index')->middleware('can:roles.index');
        Route::get('roles/create', 'Roles\RoleController@create')->name('roles.create')->middleware('can:roles.create');
        Route::put('roles/{role}', 'Roles\RoleController@update')->name('roles.update')->middleware('can:roles.edit');
        Route::get('roles/{role}', 'Roles\RoleController@show')->name('roles.show')->middleware('can:roles.show');
        Route::delete('roles/{role}', 'Roles\RoleController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');
        Route::get('roles/{role}/edit', 'Roles\RoleController@edit')->name('roles.edit')->middleware('can:roles.edit');

        //Permissions
        Route::post('permissions/store', 'Roles\PermissionController@store')->name('permissions.store')->middleware('can:permissions.create');
        Route::get('permissions', 'Roles\PermissionController@index')->name('permissions.index')->middleware('can:permissions.index');
        Route::get('permissions/create', 'Roles\PermissionController@create')->name('permissions.create')->middleware('can:permissions.create');
        Route::put('permissions/{permission}', 'Roles\PermissionController@update')->name('permissions.update')->middleware('can:permissions.edit');
        Route::get('permissions/{permission}', 'Roles\PermissionController@show')->name('permissions.show')->middleware('can:permissions.show');
        Route::delete('permissions/{permission}', 'Roles\PermissionController@destroy')->name('permissions.destroy')->middleware('can:permissions.destroy');
        Route::get('permissions/{permission}/edit', 'Roles\PermissionController@edit')->name('permissions.edit')->middleware('can:permissions.edit');

        //Users
        Route::get('users', 'Roles\UserController@index')->name('users.index')->middleware('can:users.index');
        Route::get('users/create', 'Roles\UserController@create')->name('users.create')->middleware('can:users.create');
        Route::put('users/{user}', 'Roles\UserController@update')->name('users.update')->middleware('can:users.edit');
        Route::get('users/{user}', 'Roles\UserController@show')->name('users.show')->middleware('can:users.show');
        Route::delete('users/{user}', 'Roles\UserController@destroy')->name('users.destroy')->middleware('can:users.destroy');
        Route::get('users/{user}/edit', 'Roles\UserController@edit')->name('users.edit')->middleware('can:users.edit');


    });

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

// rutas para el envio de correo a la hora de realizar un registro
Route::get('cotizacionMail/{cotizacion}/envia', 'CotizacionController@cotizacionMail')->name('Email.cotizacionMail');
//Route::get('registro', 'EmailController@registro')->name('Email.registro');
