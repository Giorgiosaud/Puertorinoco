<?php namespace App\Providers;

use App\Variable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class VariablesServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

        App::bind('vari', function ()
        {
            return Variable::all();
        });


    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
