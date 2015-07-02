<?php namespace App;

use App\Traits\ProcesarReservacion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vari;

class Reservacion extends Model {

    use ProcesarReservacion;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'reservaciones';
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'fecha',
        'cliente_id',
        'embarcacion_id',
        'paseo_id',
        'adultos',
        'mayores',
        'ninos',
        'modificadoPor',
        'hechoPor',

    ];
    /**
     * @var array
     */
    protected $with = ['cliente', 'embarcacion', 'paseo', 'estadoDePago'];
    protected $relations = [
        'cliente',
        'paseo',
        'embarcacion',
    ];
    /**
     * @var array
     */
    protected $softDelete = true;
    protected $dates = [
        'fecha'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function embarcacion()
    {
        return $this->belongsTo('App\Embarcacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paseo()
    {
        return $this->belongsTo('App\Paseo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoDePago()
    {
        return $this->belongsTo('App\EstadoDelPago', 'estado_del_pago_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasajeros()
    {
        return $this->hasMany('App\Pasajero');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }

    /**
     * @param $query
     * @param $fecha
     * @return mixed
     */
    public function scopeReservasDeLaFecha($query, $fecha)
    {
        return $query->whereFecha($fecha);
    }

    /**
     * @param $query
     * @param $fecha
     * @return mixed
     */
    public function scopePasajerosReservadosDeLaFecha($query, $fecha)
    {
        $cantidad = $query->whereFecha($fecha)->sum('adultos') + $query->whereFecha($fecha)->sum('mayores') +
            $query->whereFecha($fecha)->sum('ninos');

        return $cantidad;
    }

    /**
     * @param $query
     * @param $fecha
     * @param $embarcacion_id
     * @param $paseo_id
     * @return mixed
     */
    public function scopePasajerosReservadosDeLaFechaEmbarcacionyPaseo($query, $fecha, $embarcacion_id, $paseo_id)
    {
        return $query->whereFecha($fecha)
            ->whereEmbarcacionId($embarcacion_id)
            ->wherePaseoId($paseo_id)
            ->sum('adultos') + $query->whereFecha($fecha)->whereEmbarcacionId($embarcacion_id)->wherePaseoId($paseo_id)->sum('mayores') + $query->whereFecha($fecha)->whereEmbarcacionId($embarcacion_id)->wherePaseoId($paseo_id)->sum('ninos');
    }

    /**
     * @return Reservacion $this
     */


    /**
     * @param $query
     * @param $fecha
     * @param $clienteId
     * @param $embarcacionId
     * @param $paseoId
     * @return mixed
     */
    public function scopeObtenerVecesQueSeRepite($query, $fecha, $clienteId, $embarcacionId, $paseoId)
    {
        $search = [
            'fecha'          => $fecha,
            'cliente_id'     => $clienteId,
            'embarcacion_id' => $embarcacionId,
            'paseo_id'       => $paseoId,
        ];

        return $query->where($search);
    }

    /**
     * @return int|string
     */
    public function getDeudaAttribute()
    {
        $totalAPagar = $this->attributes['montoTotal'];
        $totalPagado = $this->pagos->sum('monto');

        return $totalAPagar - $totalPagado;
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

    public function getmontoPagadoAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'] - $this->deuda;

        if ($tmpmonto > 0)
        {
            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return "0 Bs.";
        }
    }

    public function getmontoDeudaRestanteAttribute()
    {
        $tmpmonto = $this->deuda;


        return number_format($tmpmonto, 2, ',', '.') . " Bs.";
    }

    /**
     * @return mixed
     */
    public function getTotalPasajerosEnReservaAttribute()
    {
        return $this->attributes['adultos'] + $this->attributes['mayores'] + $this->attributes['ninos'];
    }

    /**
     * @return int|string
     */
    public function getmontoSinIvaAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto / (1 + (Vari::get('iva') / 100));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    /**
     * @return int|string
     */
    public function getmontoIVAAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto - ($tmpmonto / (1 + (Vari::get('iva') / 100)));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }


    /**
     * @return int|string
     */
    public function getmontoServicioAttribute()
    {
        $tmpmonto = $this->deuda;
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto * (Vari::get('servicio') / 100);

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return "0 Bs.";
        }
    }

    /**
     * @return int|string
     */
    public function getmontoConServicioAttribute()
    {
        $tmpmonto = $this->deuda;
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto * (1 + (Vari::get('servicio') / 100));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return "0 Bs.";
        }
    }

    /**
     * @return array
     */
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
                "success" => "http://reservas.puertorinoco.com/success",
                "failure" => "http://reservas.puertorinoco.com/failure",
                "pending" => "http://reservas.puertorinoco.com/pending"
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

    public function newQuery($excludeDeleted = true)
    {
        $builder = new Builder($this->newBaseQueryBuilder());
        $builder->setModel($this)->with($this->with);
        return $builder;
    }


}
