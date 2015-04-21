<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group([
    'prefix'     => LaravelLocalization::setLocale(),
    'middleware' => [
        'localize',
        'localizationRedirect',
    ]
], function ()
{

    Route::get('/', ['as' => 'inicio.index', 'uses' => 'PagesController@index']);
    Route::get('/mpPayment', ['as' => 'PagoMercadoPago', 'uses' => 'PagesController@index']);
    //Route::resource(LaravelLocalization::transRoute('routes.embarcaciones'), 'EmbarcacionesController');
    Route::resource(LaravelLocalization::transRoute('routes.variables'), 'VariablesController');
    Route::get(LaravelLocalization::transRoute('routes.reservacionCrear'),
        ['as'=>'crearReservacion','uses'=>'ReservacionController@create']);
    Route::post(LaravelLocalization::transRoute('routes.reservacionCrear'),
        ['as'=>'creandoReservacion','uses'=>'ReservacionController@store']);
    Route::get(LaravelLocalization::transRoute('routes.reservacionMostrar'),
        ['as'=>'mostrarReserva','uses'=>'ReservacionController@show']);
    Route::get('ObtenerVariables', 'VariablesController@fechasEspeciales');
    Route::get('ObtenerVariables/{fecha}', 'VariablesController@otrasVariables');
    Route::get('ObtenerDatosClientes/{identificacion}', 'ClientesController@obtenerDatos');
});

Route::get('/logout', ['uses' => 'PanelAdministrativoController@logout', 'as' => 'logout']);
Route::group(['prefix' => '/PanelAdministrativo'], function ()
{
    Route::get('/', ['uses' => 'PanelAdministrativoController@mostrarFormularioEntrada', 'as' => 'loginPanel']);
    //Route::post('/',function(){
    //   return 'll' ;
    //});
    Route::post('/', ['uses' => 'PanelAdministrativoController@validarAcceso', 'as' => 'loginAuth']);
    Route::resource('embarcaciones', 'EmbarcacionesAdminController');
    Route::resource('paseos', 'PaseosAdminController');
    Route::resource('fechasEspeciales', 'FechasEspecialesAdminController');
    Route::resource('precios', 'PreciosAdminController');
    Route::get('reservas', ['uses'=>'ConsultarReservasAdminController@mostrarFormulario','as'=>'formularioDeConsultaDeReserva']);

    Route::get('reservas/consultar', ['uses'=>'ConsultarReservasAdminController@consultarReservas',
                          'as'=>'consultarReservas']);
    Route::get('reservas/{idreserva}/editar', ['uses'=>'ConsultarReservasAdminController@editarReserva',
                             'as'=>'editarReservas']);
    Route::post('reservas/modificarCliente',['uses'=>'ConsultarReservasAdminController@modificarCliente',
                                                         'as'=>'modificarCliente']);
    Route::post('reservas/modificarPaseo',['uses'=>'ConsultarReservasAdminController@modificarPaseo',
                                                       'as'=>'modificarPaseo']);
    Route::post('reservas/{idreserva}/pagar',['uses'=>'ConsultarReservasAdminController@recibirPago',
                                             'as'=>'recibirPago2']);
    Route::post('reservas/pagar',['uses'=>'ConsultarReservasAdminController@recibirPago',
                                              'as'=>'recibirPago']);
    Route::post('reservas/{idreserva}/borrarPago',['uses'=>'ConsultarReservasAdminController@borrarPago',
                                              'as'=>'borrarPago']);
    Route::get('abordaje', ['uses'=>'ConsultarReservasAdminController@mostrarFormularioAbordaje',
                            'as'=>'formularioDeConsultaDeAbordaje']);
    Route::post('reservas/anadirPasajeros',['uses'=>'ConsultarReservasAdminController@anadirPasajeros',
                                              'as'=>'anadirPasajeros']);
    Route::post('reservas/borrarPasajero',['uses'=>'ConsultarReservasAdminController@borrarPasajero',
                                            'as'=>'borrarPasajero']);


    //    Route::resource('/tours', 'TourController');
    //    Route::resource('/prices', 'PriceController');
    //    Route::resource('/mantenimiento', 'MaintenancesController');
    //    Route::resource('/items', 'ItemsController');
    //    Route::resource('/reservas/pagos', 'PaymentAdminController');
    //    Route::resource('/reservas/pasajeros', 'PasajerosAdminController');
    //    Route::get('/reservas/informacion/{id}', 'ReservationController@reservaInfo');
    //    Route::resource('/reservas', 'ReservationAdminController');
    //    Route::resource('/abordaje', 'AbordajeAdminController');
    //    Route::get('/logout', function ()
    //    {
    //        Auth::logout();
    //
    //        return Redirect::intended('/PanelAdministrativo');

}
);
