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
            $reserva->carcularMontoTotal($reserva);
        });
        static::created(function ($reserva)
        {
            $reserva->finalizarCreacion();
        });
        static::updating(function ($reserva)
        {
            $reserva->carcularMontoTotal($reserva);
        });
        static::updated(function ($reserva)
        {
            $reserva->finalizarActualizacion($reserva);
        });
    }

    /**
     * @param $reserva
     */
    private function carcularMontoTotal($reserva)
    {
        $precio = Paseo::find($reserva['paseo_id'])->tipoDePaseo->precios()->PrecioParaLaFecha($reserva['fecha'])->first();
        $reserva['montoTotal'] = ($precio->adulto * $reserva['adultos']) + ($precio->mayor * $reserva['mayores']) +
            ($precio->nino * $reserva['ninos']);
    }

    /**
     * @return $this
     */
    private function finalizarCreacion()
    {
        $credito = $this->cliente->credito;
        if ($credito > 0)
        {
            $this->usarCreditoCliente();
        }

        return $this;
    }

    /**
     * @return $this
     */
    private function usarCreditoCliente()
    {
        $credito = $this->cliente->credito;
        $montoAPagar = $this->montoTotal;
        if ($credito > $montoAPagar)
        {
            $this->generarPagoConCreditoDeCliente($montoAPagar);

            return $this;
        }
        $this->generarPagoConCreditoDeCliente($credito);

        return $this;

    }

    /**
     * @param $montoAPagar
     */
    private function generarPagoConCreditoDeCliente($monto)
    {
        PagoDirecto::create([
            'fecha'           => Carbon::now(),
            'monto'           => $monto,
            'descripcion'     => 'Uso de credito del cliente',
            'reservacion_id'  => $this->id,
            'tipo_de_pago_id' => 8
        ]);
    }

    /**
     * @return $this
     */
    private function finalizarActualizacion()
    {
        $deuda = $this->deuda;
        if ($deuda > 0 && $this->cliente->credito > 0)
        {
            $this->usarCreditoCliente();
        }
        if ($deuda < 0)
        {
            $this->generarPagoConCreditoDeCliente($deuda);
        }

        return $this;

    }
}