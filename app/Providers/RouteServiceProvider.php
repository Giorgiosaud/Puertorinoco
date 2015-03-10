<?php namespace App\Providers;

use App\Variable;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
        view()->composer('reservacion.assets.reservacion.Datos.Club', function ($view)
        {
            $adulTA = Variable::whereNombre('adultosPagoClubTemporadaAlta')->first()->valor;
            $mayNinTA = Variable::whereNombre('ninosymayoresPagoClubTemporadaAlta')->first()->valor;
            $adulTB = Variable::whereNombre('adultosPagoClubTemporadaBaja')->first()->valor;
            $mayNinTB = Variable::whereNombre('ninosymayoresPagoClubTemporadaBaja')->first()->valor;
            $view->with(compact('mayNinTB', 'adulTB','mayNinTA','adulTA'));
        });
		//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
