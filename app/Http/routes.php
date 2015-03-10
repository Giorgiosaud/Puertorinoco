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
    Route::resource(LaravelLocalization::transRoute('routes.embarcaciones'), 'EmbarcacionesController');
    Route::resource(LaravelLocalization::transRoute('routes.variables'), 'VariablesController');
    Route::get(LaravelLocalization::transRoute('routes.reservacion') . '/' . LaravelLocalization::transRoute('routes.crear'), 'ReservacionController@create');
    Route::post(LaravelLocalization::transRoute('routes.reservacion') . '/' . LaravelLocalization::transRoute('routes.crear'), 'ReservacionController@store');
    Route::get(LaravelLocalization::transRoute('routes.reservacion') . '/' . LaravelLocalization::transRoute('routes.mostrar') . '/{id}', 'ReservacionController@show');
    Route::get('ObtenerVariables', 'VariablesController@fechasEspeciales');
    Route::get('ObtenerVariables/{fecha}', 'VariablesController@otrasVariables');
    Route::get('ObtenerDatosClientes/{identificacion}', 'ClientesController@obtenerDatos');
});
