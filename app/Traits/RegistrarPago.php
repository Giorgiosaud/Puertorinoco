<?php
/**
 * Created by jorgelsaud.
 * User: jorgelsaud
 * Date: 23/3/15
 * Time: 16:35
 */

namespace App\Traits;


use App\Pago;

trait RegistrarPago {

    protected static function boot()
    {
        parent::boot();
        static::created(function ($pagoDetalle)
        {
            $pagoDetalle->crearPago();
        });
        static::deleted(function ($pagoDetalle)
        {
            $pagoDetalle->borrarPago();
        });
    }
    private function borrarPago(){
        $p=Pago::where('pago_id',$this->id)->where('pago_type',get_class($this))->first();
        $p->delete();
    }
    /**
     *
     */
    private function crearPago()
    {
        $p = Pago::create([
            'monto'          => $this->montoPagado,
            'reservacion_id' => $this->NumeroDeReservacion,
            'pago_type'      => get_class($this),
            'pago_id'        => $this->id,
        ]);
    }


}