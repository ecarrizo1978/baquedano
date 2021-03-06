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
	if(Auth::check()){
	return view('home');
	   }else{
	return view('auth.login');
	}
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// SERVICIOS DE COMUNA/REGION

Route::get('inmuebles/{text}','InmuebleController@getInmuebles');

Route::get('personas/{text}','PersonaController@getPersonas');

Route::get('personas/email/{text}','PersonaController@getPersonasEmail');

Route::get('personas/fono/{text}','PersonaController@getPersonasFono');

Route::get('provincias/{id}','RegionController@getProvincias');

Route::get('captaciones/correo/{id}','CaptacionController@getCaptacionesCorreo');

Route::get('captaciones/gestion/{id}','CaptacionController@getCaptacionesGestiones');

Route::get('comunas/{id}','ProvinciaController@getComunas');

//RUTAS
Route::middleware(['auth'])->group(function(){
	
	//Roles
	Route::post('roles/store','RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles','RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create','RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}','RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}','RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');

	//Notaria
	Route::post('notarias/store','NotariaController@store')->name('notarias.store')
		->middleware('permission:notarias.create');

	Route::get('notarias','NotariaController@index')->name('notarias.index')
		->middleware('permission:notarias.index');

	Route::get('notarias/create','NotariaController@create')->name('notarias.create')
		->middleware('permission:notarias.create');

	Route::post('notarias/{notaria}','NotariaController@update')->name('notarias.update')
		->middleware('permission:notarias.edit');

	Route::get('notarias/{notaria}','NotariaController@show')->name('notarias.show')
		->middleware('permission:notaria.show');

	Route::delete('notarias/{notaria}','NotariaController@destroy')->name('notarias.destroy')
		->middleware('permission:notarias.destroy');

	Route::get('notarias/{notaria}/edit','NotariaController@edit')->name('notarias.edit')
		->middleware('permission:notarias.edit');


//Usuario
	Route::post('users/store','UsersController@store')->name('users.store')
		->middleware('permission:users.create');

	Route::get('users','UsersController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::get('users/create','UsersController@create')->name('users.create')
		->middleware('permission:users.create');

	Route::put('users/{user}','UsersController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}','UsersController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}','UsersController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit','UsersController@edit')->name('users.edit')
		->middleware('permission:users.edit');



	//Condicion
	Route::post('condicion/store','CondicionController@store')->name('condicion.store')
		->middleware('permission:condicion.create');

	Route::get('condicion','CondicionController@index')->name('condicion.index')
		->middleware('permission:condicion.index');

	Route::get('condicion/create','CondicionController@create')->name('condicion.create')
		->middleware('permission:condicion.create');

	Route::post('condicion/{condicion}','CondicionController@update')->name('condicion.update')
		->middleware('permission:condicion.edit');

	Route::get('condicion/{condicion}','CondicionController@show')->name('condicion.show')
		->middleware('permission:condicion.show');

	Route::delete('condicion/{condicion}','CondicionController@destroy')->name('condicion.destroy')
		->middleware('permission:condicion.destroy');

	Route::get('condicion/{notaria}/edit','CondicionController@edit')->name('condicion.edit')
		->middleware('permission:condicion.edit');


	//Inmueble
	Route::post('inmueble/store','InmuebleController@store')->name('inmueble.store')
		->middleware('permission:inmueble.create');

	Route::get('inmueble','InmuebleController@index')->name('inmueble.index')
		->middleware('permission:inmueble.index');

	Route::get('inmueble/create','InmuebleController@create')->name('inmueble.create')
		->middleware('permission:inmueble.create');

	Route::post('inmueble/{inmueble}','InmuebleController@update')->name('inmueble.update')
		->middleware('permission:inmueble.edit');

	Route::get('inmueble/{inmueble}','InmuebleController@show')->name('inmueble.show')
		->middleware('permission:inmueble.show');

	Route::delete('inmueble/{inmueble}','InmuebleController@destroy')->name('inmueble.destroy')
		->middleware('permission:inmueble.destroy');

	Route::get('inmueble/{inmueble}/edit','InmuebleController@edit')->name('inmueble.edit')
		->middleware('permission:inmueble.edit');


//Persona
	Route::post('persona/store','PersonaController@store')->name('persona.store')
		->middleware('permission:persona.create');

	Route::get('persona','PersonaController@index')->name('persona.index')
		->middleware('permission:persona.index');

	Route::get('persona/create','PersonaController@create')->name('persona.create')
		->middleware('permission:persona.create');

	Route::post('persona/{persona}','PersonaController@update')->name('persona.update')
		->middleware('permission:persona.edit');

	Route::post('persona/{persona}/updatehome','PersonaController@updatehome')->name('persona.updatehome');
		
	Route::get('persona/{persona}/edithome','PersonaController@edithome')->name('persona.edithome');

	Route::get('persona/{persona}','PersonaController@show')->name('persona.show')
		->middleware('permission:persona.show');

	Route::delete('persona/{persona},{cargo}','PersonaController@destroy')->name('persona.destroy')
		->middleware('permission:persona.destroy');

	Route::get('persona/{persona}/edit','PersonaController@edit')->name('persona.edit')
		->middleware('permission:persona.edit');


//Cargo
	Route::post('cargo/store','CargoController@store')->name('cargo.store')
		->middleware('permission:cargo.create');

	Route::get('cargo','CargoController@index')->name('cargo.index')
		->middleware('permission:cargo.index');

	Route::get('cargo/create','CargoController@create')->name('cargo.create')
		->middleware('permission:cargo.create');

	Route::post('cargo/{cargo}','CargoController@update')->name('cargo.update')
		->middleware('permission:cargo.edit');

	Route::get('cargo/{cargo}','CargoController@show')->name('cargo.show')
		->middleware('permission:cargo.show');

	Route::delete('cargo/{cargo}','CargoController@destroy')->name('cargo.destroy')
		->middleware('permission:cargo.destroy');

	Route::get('cargo/{cargo}/edit','CargoController@edit')->name('cargo.edit')
		->middleware('permission:cargo.edit');


//Servicios
	Route::post('servicio/store','ServicioController@store')->name('servicio.store')
		->middleware('permission:servicio.create');

	Route::get('servicio','ServicioController@index')->name('servicio.index')
		->middleware('permission:servicio.index');

	Route::get('servicio/create','ServicioController@create')->name('servicio.create')
		->middleware('permission:servicio.create');

	Route::post('servicio/{servicio}','ServicioController@update')->name('servicio.update')
		->middleware('permission:servicio.edit');

	Route::get('servicio/{servicio}','ServicioController@show')->name('servicio.show')
		->middleware('permission:servicio.show');

	Route::delete('servicio/{servicio}','ServicioController@destroy')->name('servicio.destroy')
		->middleware('permission:servicio.destroy');

	Route::get('servicio/{servicio}/edit','ServicioController@edit')->name('servicio.edit')
		->middleware('permission:servicio.edit');


//Multa
	Route::post('multa/store','MultaController@store')->name('multa.store')
		->middleware('permission:multa.create');

	Route::get('multa','MultaController@index')->name('multa.index')
		->middleware('permission:multa.index');

	Route::get('multa/create','MultaController@create')->name('multa.create')
		->middleware('permission:multa.create');

	Route::post('multa/{multa}','MultaController@update')->name('multa.update')
		->middleware('permission:multa.edit');

	Route::get('multa/{multa}','MultaController@show')->name('multa.show')
		->middleware('permission:multa.show');

	Route::delete('multa/{multa}','MultaController@destroy')->name('multa.destroy')
		->middleware('permission:multa.destroy');

	Route::get('multa/{multa}/edit','MultaController@edit')->name('multa.edit')
		->middleware('permission:multa.edit');


//Captacion

	Route::get('importExport', 'CaptacionController@importExport')->name('captacion.importExport')
		->middleware('permission:captacion.edit');

	Route::get('downloadExcel/{type}', 'CaptacionController@downloadExcel')->name('captacion.downloadExcel')
		->middleware('permission:captacion.edit');

	Route::post('importExcel', 'CaptacionController@importExcel')->name('captacion.importExcel')
		->middleware('permission:captacion.edit');

	Route::get('procesarxls/{id}', 'CaptacionController@procesarxls')->name('captacion.procesarxls')
		->middleware('permission:captacion.edit');

	Route::get('limpiarxls/{id}', 'CaptacionController@limpiarxls')->name('captacion.limpiarxls')
		->middleware('permission:captacion.edit');

	Route::post('captacion/store','CaptacionController@store')->name('captacion.store')
		->middleware('permission:captacion.create');

	Route::get('captacion','CaptacionController@index')->name('captacion.index')
		->middleware('permission:captacion.index');

	Route::get('captacion/create','CaptacionController@create')->name('captacion.create')
		->middleware('permission:captacion.create');

	Route::post('captacion/{captacion}','CaptacionController@update')->name('captacion.update')
		->middleware('permission:captacion.edit');

	Route::post('captacion/foto/{captacion}','CaptacionController@savefotos')->name('captacion.savefotos')
		->middleware('permission:captacion.edit');

	Route::post('captacion/gestion/create','CaptacionController@crearGestion')->name('captacion.crearGestion')
		->middleware('permission:captacion.edit');

	Route::post('captacion/gestion/update','CaptacionController@editarGestion')->name('captacion.editarGestion')
		->middleware('permission:captacion.edit');

	Route::post('captacion/gestion/proceso/create','CaptacionController@crearGestion_proceso')->name('captacion.crearGestion_proceso')
		->middleware('permission:captacion.edit');

	Route::post('captacion/gestion/proceso/update','CaptacionController@editarGestion_proceso')->name('captacion.editarGestion_proceso')
		->middleware('permission:captacion.edit');

	Route::get('captacion/gestion/{idg}','CaptacionController@mostrarGestion');
	
		Route::get('procesoCaptacion/{id}', 'PrimeraGestionController@volver_proceso')->name('captacion.volver_proceso')
		->middleware('permission:captacion.edit');

    Route::post('procesoCaptacion/store','PrimeraGestionController@storeCaptacion')->name('primeraGestion.storeCaptacion')
		->middleware('permission:captacion.create');

	Route::get('captacion/reportes','CaptacionController@reportes')->name('captacion.reportes')
		->middleware('permission:captacion.edit');

	Route::get('captacion/{captacion}','CaptacionController@show')->name('captacion.show')
		->middleware('permission:captacion.show');

	Route::delete('captacion/{captacion}','CaptacionController@destroy')->name('captacion.destroy')
		->middleware('permission:captacion.destroy');

	Route::get('captacion/{captacion}/edit','CaptacionController@edit')->name('captacion.edit')
		->middleware('permission:captacion.edit');

	Route::get('captacion/agregarinmueble/{idc}/{idi}','CaptacionController@agregarInmueble')->name('captacion.agregarinmueble')
		->middleware('permission:captacion.edit');

	Route::get('captacion/agregarpersona/{idc}/{idp}','CaptacionController@agregarPropietario')->name('captacion.agregarpersona')
		->middleware('permission:captacion.edit');

	Route::get('captacion/eliminarfoto/{idf}/{idc}','CaptacionController@eliminarfoto')->name('captacion.eliminarfoto')
		->middleware('permission:captacion.edit');

		Route::get('importar/gestion/{idc}','CaptacionController@importarGestion')->name('captacion.importarGestion')
		->middleware('permission:captacion.edit');



//Formas de Pago
	Route::post('formasDePago/store','FormasDePagoController@store')->name('formasDePago.store')
		->middleware('permission:formasDePago.create');

	Route::get('formasDePago','FormasDePagoController@index')->name('formasDePago.index')
		->middleware('permission:formasDePago.index');

	Route::get('formasDePago/create','FormasDePagoController@create')->name('formasDePago.create')
		->middleware('permission:formasDePago.create');

	Route::post('formasDePago/{formasDePago}','FormasDePagoController@update')->name('formasDePago.update')
		->middleware('permission:formasDePago.edit');

	Route::get('formasDePago/{formasDePago}','FormasDePagoController@show')->name('formasDePago.show')
		->middleware('permission:formasDePago.show');

	Route::delete('formasDePago/{formasDePago}','FormasDePagoController@destroy')->name('formasDePago.destroy')
		->middleware('permission:formasDePago.destroy');

	Route::get('formasDePago/{formasDePago}/edit','FormasDePagoController@edit')->name('formasDePago.edit')
		->middleware('permission:formasDePago.edit');
	

//Comisiones
	Route::post('comision/store','ComisionController@store')->name('comision.store')
		->middleware('permission:comision.create');

	Route::get('comision','ComisionController@index')->name('comision.index')
		->middleware('permission:comision.index');

	Route::get('comision/create','ComisionController@create')->name('comision.create')
		->middleware('permission:comision.create');

	Route::post('comision/{comision}','ComisionController@update')->name('comision.update')
		->middleware('permission:comision.edit');

	Route::get('comision/{comision}','ComisionController@show')->name('comision.show')
		->middleware('permission:comision.show');

	Route::delete('comision/{comision}','ComisionController@destroy')->name('comision.destroy')
		->middleware('permission:comision.destroy');

	Route::get('comision/{comision}/edit','ComisionController@edit')->name('comision.edit')
		->middleware('permission:comision.edit');



//Flexibilidad
	Route::post('flexibilidad/store','FlexibilidadController@store')->name('flexibilidad.store')
		->middleware('permission:flexibilidad.create');

	Route::get('flexibilidad','FlexibilidadController@index')->name('flexibilidad.index')
		->middleware('permission:flexibilidad.index');

	Route::get('flexibilidad/create','FlexibilidadController@create')->name('flexibilidad.create')
		->middleware('permission:flexibilidad.create');

	Route::post('flexibilidad/{flexibilidad}','FlexibilidadController@update')->name('flexibilidad.update')
		->middleware('permission:flexibilidad.edit');

	Route::get('flexibilidad/{flexibilidad}','FlexibilidadController@show')->name('flexibilidad.show')
		->middleware('permission:flexibilidad.show');

	Route::delete('flexibilidad/{flexibilidad}','FlexibilidadController@destroy')->name('flexibilidad.destroy')
		->middleware('permission:flexibilidad.destroy');

	Route::get('flexibilidad/{flexibilidad}/edit','FlexibilidadController@edit')->name('flexibilidad.edit')
		->middleware('permission:flexibilidad.edit');


//Persona Inmueble
	Route::post('personaInmueble/store','PersonaInmuebleController@store')->name('personaInmueble.store')
		->middleware('permission:personaInmueble.create');

	Route::get('personaInmueble','PersonaInmuebleController@index')->name('personaInmueble.index')
		->middleware('permission:personaInmueble.index');

	Route::get('personaInmueble/create','PersonaInmuebleController@create')->name('personaInmueble.create')
		->middleware('permission:personaInmueble.create');

	Route::post('personaInmueble/{personaInmueble}','PersonaInmuebleController@update')->name('personaInmueble.update')
		->middleware('permission:personaInmueble.edit');

	Route::get('personaInmueble/{personaInmueble}','PersonaInmuebleController@show')->name('personaInmueble.show')
		->middleware('permission:personaInmueble.show');

	Route::delete('personaInmueble/{personaInmueble}','PersonaInmuebleController@destroy')->name('personaInmueble.destroy')
		->middleware('permission:personaInmueble.destroy');

	Route::get('personaInmueble/{personaInmueble}/edit','PersonaInmuebleController@edit')->name('personaInmueble.edit')
		->middleware('permission:personaInmueble.edit');

//Correo Tipo
	Route::post('correo/store','CorreoController@store')->name('correo.store')
		->middleware('permission:correo.create');

	Route::get('correo','CorreoController@index')->name('correo.index')
		->middleware('permission:correo.index');

	Route::get('correo/create','CorreoController@create')->name('correo.create')
		->middleware('permission:correo.create');

	Route::post('correo/{correo}','CorreoController@update')->name('correo.update')
		->middleware('permission:correo.edit');

	Route::get('correo/{correo}','CorreoController@show')->name('correo.show')
		->middleware('permission:correo.show');

	Route::delete('correo/{correo}','CorreoController@destroy')->name('correo.destroy')
		->middleware('permission:correo.destroy');

	Route::get('correo/{correo}/edit','CorreoController@edit')->name('correo.edit')
		->middleware('permission:correo.edit');


//Primera Gestion
    Route::post('primeraGestion/store','PrimeraGestionController@store')->name('primeraGestion.store')
		->middleware('permission:primeraGestion.create');


	Route::get('primeraGestion/{tipo}','PrimeraGestionController@index')->name('primeraGestion.index')
		->middleware('permission:primeraGestion.index');

	Route::get('primeraGestion/create','PrimeraGestionController@create')->name('primeraGestion.create')
		->middleware('permission:primeraGestion.create');

	Route::post('primeraGestion/{primeraGestion}','PrimeraGestionController@update')->name('primeraGestion.update')
		->middleware('permission:primeraGestion.edit');

	Route::get('primeraGestion/{primeraGestion}','PrimeraGestionController@show')->name('primeraGestion.show')
		->middleware('permission:primeraGestion.show');

	Route::delete('primeraGestion/{primeraGestion}','PrimeraGestionController@destroy')->name('primeraGestion.destroy')
		->middleware('permission:primeraGestion.destroy');

	Route::get('primeraGestion/{primeraGestion}/edit','PrimeraGestionController@edit')->name('primeraGestion.edit')
		->middleware('permission:primeraGestion.edit');


//Portales
    Route::post('portal/store','PortalesController@store')->name('portal.store')
		->middleware('permission:portal.create');

	Route::get('portal','PortalesController@index')->name('portal.index')
		->middleware('permission:portal.index');

	Route::get('portal/create','PortalesController@create')->name('portal.create')
		->middleware('permission:portal.create');

	Route::post('portal/{portal}','PortalesController@update')->name('portal.update')
		->middleware('permission:portal.edit');

	Route::get('portal/{portal}','PortalesController@show')->name('portal.show')
		->middleware('permission:portal.show');

	Route::delete('portal/{portal}','PortalesController@destroy')->name('portal.destroy')
		->middleware('permission:portal.destroy');

	Route::get('portal/{portal}/edit','PortalesController@edit')->name('portal.edit')
		->middleware('permission:portal.edit');

	//Reporte Gestion
	Route::get('reporteGestion/{reporteGestion}','ReporteGestionController@index')->name('reporteGestion.index')
		->middleware('permission:primeraGestion.index');

	//Reporte Captaciones
	Route::get('reporteCaptaciones/{reporteCaptaciones}','ReporteCaptacionesController@index')->name('reporteCaptaciones.index')
		->middleware('permission:primeraGestion.index');



});