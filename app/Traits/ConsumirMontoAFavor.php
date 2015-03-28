<?php
/**
 * Created by jorgelsaud.
 * User: jorgelsaud
 * Date: 23/3/15
 * Time: 18:11
 */

namespace App\Traits;


trait ConsumirMontoAFavor {
        protected static function boot()
        {
            parent::boot();
            //static::created(function($reserva){
                //$reserva->procesar();
            //});
            static::creating(function($reserva){
                $precio = $this->paseo->tipoDePaseo->precios()->PrecioParaLaFecha($this->fecha)->first();
                $montoAPagar = ($precio->adulto * $this->adultos) + ($precio->mayor * $this->mayores) +
                    ($precio->nino * $this->ninos);
                $reserva->montoTotal=$montoAPagar;
            });
        }
    public function consumirMontoAFavor()
    {
        $precio = $this->paseo->tipoDePaseo->precios()->PrecioParaLaFecha($this->fecha)->first();
        $montoAPagar = ($precio->adulto * $this->adultos) + ($precio->mayor * $this->mayores) +
            ($precio->nino * $this->ninos);
        $this->attributes['montoTotal']=$montoAPagar;
        $this->save();
        $credito = $this->cliente->credito;
        if ($credito == 0)
        {
            return $this;
        }
        if ($credito >= $montoAPagar)
        {
            $Pago = new Pago();
            $Pago->monto = $montoAPagar;
            $Pago->reservacion_id = $this->id;
            $PagoDirecto = PagoDirecto::create([
                'fecha'           => Carbon::now(),
                'descripcion'     => 'Credito A Favor',
                'tipo_de_pago_id' => '8'
            ]);
            $PagoDirecto->pagos()->save($Pago);
            $this->cliente->credito = $credito - $montoAPagar;
            $this->cliente->save();
            $Pago->procesar();
            return $this;
        }
        $Pago = new Pago();
        $Pago->monto = $credito;
        $Pago->reservacion_id = $this->id;
        $PagoDirecto = PagoDirecto::create([
            'fecha'           => Carbon::now(),
            'descripcion'     => 'Credito A Favor',
            'tipo_de_pago_id' => '8'
        ]);
        $PagoDirecto->pagos()->save($Pago);
        $this->cliente->credito = 0;
        $this->cliente->save();
        $Pago->procesar();
        return $this;


    }

}