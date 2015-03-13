<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model {

    protected $table = 'reservaciones';
    protected $fillable = [
        'fecha',
        'cliente_id',
        'embarcacion_id',
        'paseo_id',
        'adultos',
        'mayores',
        'ninos',

    ];
    protected $relations = [
        'cliente',
        'paseo',
        'embarcacion',
    ];
    protected $dates = [
        'fecha'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function embarcacion()
    {
        return $this->belongsTo('App\Embarcacion');
    }

    public function paseo()
    {
        return $this->belongsTo('App\Paseo');
    }

    public function estadoDePago()
    {
        return $this->belongsTo('App\EstadoDelPago', 'estado_del_pago_id');
    }

    public function pasajeros()
    {
        return $this->hasMany('App\Pasajero');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }

    public function scopeReservasDeLaFecha($query, $fecha)
    {
        return $query->whereFecha($fecha);
    }

    public function scopePasajerosReservadosDeLaFecha($query, $fecha)
    {
        return $query->whereFecha($fecha)->sum('adultos') + $query->whereFecha($fecha)->sum('mayores') + $query->whereFecha
        ($fecha)->sum('ninos');
    }

    public function scopePasajerosReservadosDeLaFechaEmbarcacionyPaseo($query, $fecha, $embarcacion_id, $paseo_id)
    {
        return $query->whereFecha($fecha)
            ->whereEmbarcacionId($embarcacion_id)
            ->wherePaseoId($paseo_id)
            ->sum('adultos') + $query->whereFecha($fecha)->whereEmbarcacionId($embarcacion_id)->wherePaseoId($paseo_id)->sum('mayores') + $query->whereFecha($fecha)->whereEmbarcacionId($embarcacion_id)->wherePaseoId($paseo_id)->sum('ninos');
    }

    public function actualizaMontoTotal()
    {
        $precio = $this->paseo->tipoDePaseo->precios()->PrecioParaLaFecha($this->fecha)->first();
        $montoAPagar = ($precio->adulto * $this->adultos) + ($precio->mayor * $this->mayores) +
            ($precio->nino * $this->ninos);
        $credito = $this->cliente->credito;
        if ($credito > $montoAPagar)
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
            $this->attributes['montoTotal'] = 0;
            $this->cliente->credito = $credito - $montoAPagar;
            $this->cliente->save();

            return $this->save();
        }
        if ($credito > 0)
        {
            $Pago = new Pago();
            $Pago->monto = $credito;
            $Pago->reservacion_id = $this->id;
            $PagoDirecto = PagoDirecto::create([
                'fecha'           => Carbon::now(),
                'descripcion'     => 'Credito A Favor',
                'tipo_de_pago_id' => '8'
            ]);
            $PagoDirecto->pagos()->save($Pago);
        }
        $this->attributes['montoTotal'] = $montoAPagar - $credito;
        $this->cliente->credito = 0;
        $this->cliente->save();
        $this->save();

        return $this;


    }

    public function scopeObtenerVecesQueSeRepite($query, $fecha, $clienteId, $embarcacionId, $paseoId)
    {
        $searcb = [
            'fecha'          => $fecha,
            'cliente_id'     => $clienteId,
            'embarcacion_id' => $embarcacionId,
            'paseo_id'       => $paseoId,
        ];

        return $query->where($searcb);
        //->whereFecha($fecha)->whereClienteId($clienteId)->whereEmbarcacionId
        //($embarcacionId)->wherePaseoId($paseoId);
    }

    public function getmontoTotalAPagarAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    public function getTotalPasajerosEnReserva()
    {
        return $this->attributes['adultos'] + $this->attributes['mayores'] + $this->attributes['ninos'];
    }

    public function getmontoSinIvaAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto / 1.12;

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    public function getmontoIVAAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto - ($tmpmonto / 1.12);

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    public function getmontoServicioAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto * 0.1;

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    public function getmontoConServicioAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto * 1.1;

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    public function getPreferenceDataAttribute()
    {

        $preference_data = [

            "items"              => [
                [
                    "title"       => "Paseo en " . $this->embarcacion->nombre,
                    "quantity"    => 1,
                    "currency_id" => "VEF",
                    "unit_price"  => $this->attributes['montoTotal'] * 1.1,
                    "description" => "Paquete completo reservado en " . $this->embarcacion->nombre,
                ],
            ],
            "payer"              => [
                [
                    "name"    => $this->cliente->nombre,
                    "surname" => $this->cliente->apellido,
                    "email"   => $this->cliente->email
                ]
            ],
            "back_urls"          => [
                "success" => "http://www.puertorinoco.com/reservas/mercadopago/notificaciones/sucess.php?idreserva=" . $this->id,
                "failure" => "http://www.puertorinoco.com/reservas/mercadopago/notificaciones/failure
                .php?idreserva=" . $this->id,
                "pending" => "http://www.puertorinoco.com/reservas/mercadopago/notificaciones/pending
                .php?idreserva=" . $this->id
            ],
            "payment_methods"    => [
                "excluded_payment_methods" => [],
                "excluded_payment_types"   => [
                    ["id" => "ticket"],
                    ["id" => "atm"]
                ]
            ],
            "external_reference" => $this->id
        ];

        return $preference_data;
    }


}
