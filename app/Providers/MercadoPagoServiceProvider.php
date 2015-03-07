<?php namespace App\Providers;

use App\Variable;
use Illuminate\Support\ServiceProvider;
use Mercadopago\MP;

class MercadoPagoServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('reservacion.assets.reservacion.Datos.Club', function ($view)
        {
            $adulTA = Variable::whereNombre('adultosPagoClubTemporadaAlta')->first()->valor;
            $mayNinTA = Variable::whereNombre('ninosymayoresPagoClubTemporadaAlta')->first()->valor;
            $adulTB = Variable::whereNombre('adultosPagoClubTemporadaBaja')->first()->valor;
            $mayNinTB = Variable::whereNombre('ninosymayoresPagoClubTemporadaBaja')->first()->valor;
            $view->with(compact('mayNinTB', 'adulTB','mayNinTA','adulTA'));
        });
        view()->composer('reservacion.assets.reservacion.MercadoPago.pagoMP', function ($view)
        {
            if (env('MP_SANDBOXMODE') == true)
            {
                $mp_sanboxmode = 'sandbox_init_point';
            } else
            {
                $mp_sanboxmode = 'init_point';
            }
            $mp = new MP(env('CLIENT_ID'), env('CLIENT_SECRET'));
            $mp->sandbox_mode(env('MP_SANDBOXMODE'));
            $view->with(compact('mp', 'mp_sanboxmode'));
        }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public
    function register()
    {
        //
    }

}
