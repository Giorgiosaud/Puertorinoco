<?php /**
 * Created by jorgelsaud.
 * User: jorgelsaud
 * Date: 23/3/15
 * Time: 18:30
 */
namespace App\Traits;


use App\PagoDirecto;
use App\Paseo;
use Carbon\Carbon;

trait ProcesarReservacion {

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($reserva)
        {
            $reserva->carcularMontoAPagar($reserva);
        });
        static::created(function ($reserva)
        {
            $reserva->procesar();
        });
        static::updating(function($reserva){
           $reserva->actualizar();
        });
    }

    private function carcularMontoAPagar($reserva)
    {
        $precio = Paseo::find($reserva['paseo_id'])->tipoDePaseo->precios()->PrecioParaLaFecha($reserva['fecha'])->first();
        $montoAPagar = ($precio->adulto * $reserva['adultos']) + ($precio->mayor * $reserva['mayores']) +
            ($precio->nino * $reserva['ninos']);
        $reserva['montoTotal'] = $montoAPagar;
        $reserva['deudaRestante'] = $montoAPagar;


    }
    private function actualizar(){
        $precio = Paseo::find($this->paseo_id)->tipoDePaseo->precios()->PrecioParaLaFecha($this->fecha)
            ->first();
        $montoAPagar = ($precio->adulto * $this->adultos) + ($precio->mayor * $this->mayores) +
            ($precio->nino * $this->ninos);
        $this->montoTotal = $montoAPagar;
        $montoPagado=$this->pagos->sum('monto');
        $deuda=$montoAPagar-$montoPagado;
        $credito = $this->cliente->credito;
        if($deuda<=0)
        {
            $PagoDirecto = PagoDirecto::create([
                'monto'           => $deuda,
                'reservacion_id'  => $this->id,
                'fecha'           => Carbon::now(),
                'descripcion'     => 'Credito A Favor de Cliente por exceso de Pago',
                'tipo_de_pago_id' => '8'
            ]);
            }
        else{
            if($credito>0){
                if($credito<$deuda){
                    $PagoDirecto = PagoDirecto::create([
                        'monto'           =>  $credito,
                        'reservacion_id'  => $this->id,
                        'fecha'           => Carbon::now(),
                        'descripcion'     => 'Credito A Favor',
                        'tipo_de_pago_id' => '8'
                    ]);
                    $this->cliente->credito = 0;
                    $this->cliente->save();
                }
                else{
                    $PagoDirecto = PagoDirecto::create([
                        'monto'           => $deuda,
                        'reservacion_id'  => $this->id,
                        'fecha'           => Carbon::now(),
                        'descripcion'     => 'Credito A Favor',
                        'tipo_de_pago_id' => '8'
                    ]);
                    $cliente->credito = $credito - $deuda;
                    $cliente->save();

                }

            }
            }
        return $this;

    }
    private function procesar()
    {
        $cliente = $this->cliente;
        $credito = $cliente->credito;
        if ($credito >= $this->montoTotal)
        {
            $PagoDirecto = PagoDirecto::create([
                'monto'           => $this->montoTotal,
                'reservacion_id'  => $this->id,
                'fecha'           => Carbon::now(),
                'descripcion'     => 'Credito A Favor',
                'tipo_de_pago_id' => '8'
            ]);
            $cliente->credito = $credito - $this->montoTotal;
            $cliente->save();
        } else
        {
            if ($credito > 0)
            {
                $PagoDirecto = PagoDirecto::create([
                    'monto'           =>  $credito,
                    'reservacion_id'  => $this->id,
                    'fecha'           => Carbon::now(),
                    'descripcion'     => 'Credito A Favor',
                    'tipo_de_pago_id' => '8'
                ]);
            }
            $cliente->credito = 0;
            $cliente->save();
        }
        return $this;
    }
}