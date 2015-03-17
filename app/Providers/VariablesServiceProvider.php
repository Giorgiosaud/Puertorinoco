<?php namespace App\Providers;

use App\ClasesDeApoyo\Variables;
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
            return new Variables();
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
