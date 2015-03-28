<?php namespace App;

use App\Traits\ProcesarReservacion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Vari;

/**
 * Class Reservacion
 *
 * @package App
 * @property integer $id 
 * @property \Carbon\Carbon $fecha 
 * @property integer $cliente_id 
 * @property integer $embarcacion_id 
 * @property integer $paseo_id 
 * @property integer $estado_del_pago_id 
 * @property integer $adultos 
 * @property integer $mayores 
 * @property integer $ninos 
 * @property float $montoTotal 
 * @property boolean $confirmado 
 * @property string $hechoPor 
 * @property string $modificadoPor 
 * @property string $notas 
 * @property string $deleted_at 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \App\Cliente $cliente 
 * @property-read \App\Embarcacion $embarcacion 
 * @property-read \App\Paseo $paseo 
 * @property-read \App\EstadoDelPago $estadoDePago 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Pasajero[] $pasajeros 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Pago[] $pagos 
 * @property-read mixed $monto_total_a_pagar 
 * @property-read mixed $monto_sin_iva 
 * @property-read mixed $monto_i_v_a 
 * @property-read mixed $monto_servicio 
 * @property-read mixed $monto_con_servicio 
 * @property-read mixed $preference_data 
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereClienteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereEmbarcacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion wherePaseoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereEstadoDelPagoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereAdultos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereMayores($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereNinos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereMontoTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereConfirmado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereHechoPor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereModificadoPor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereNotas($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservacion whereUpdatedAt($value)
 * @method static \App\Reservacion reservasDeLaFecha($fecha)
 * @method static \App\Reservacion pasajerosReservadosDeLaFecha($fecha)
 * @method static \App\Reservacion pasajerosReservadosDeLaFechaEmbarcacionyPaseo($fecha, $embarcacion_id, $paseo_id)
 * @method static \App\Reservacion obtenerVecesQueSeRepite($fecha, $clienteId, $embarcacionId, $paseoId)
 */
class Reservacion extends Model {

    use ProcesarReservacion;

    /**
     * @var string
     */
    protected $table = 'reservaciones';
    /**
     * @var array
     */
    protected $fillable = [
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
    protected $relations = [
        'cliente',
        'paseo',
        'embarcacion',
    ];
    /**
     * @var array
     */
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
        return $query->whereFecha($fecha)->sum('adultos') + $query->whereFecha($fecha)->sum('mayores') + $query->whereFecha
        ($fecha)->sum('ninos');
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

    /**
     * @return int|string
     */
    public function getDeudaAttribute(){
        $totalAPagar=$this->attributes['montoTotal'];
        $totalPagado=$this->pagos->sum('monto');
        return $totalAPagar-$totalPagado;
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
    public function getmontDeudaRestanteAttribute()
    {
        $tmpmonto = $this->attributes['deudaRestante'];
            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
    }

    /**
     * @return mixed
     */
    public function getTotalPasajerosEnReserva()
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
            $tmpmonto = $tmpmonto / (1+(Vari::get('iva')/100));

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
            $tmpmonto = $tmpmonto - ($tmpmonto / (1+(Vari::get('iva')/100)));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return 0;
        }
    }

    public function getmontoPagadoAttribute(){
        return $this->pagos()->sum('monto');
    }

    /**
     * @return int|string
     */
    public function getmontoServicioAttribute()
    {
        $tmpmonto = $this->attributes['deudaRestante'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto * (Vari::get('servicio')/100);

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else
        {
            return  "0 Bs.";
        }
    }

    /**
     * @return int|string
     */
    public function getmontoConServicioAttribute()
    {
        $tmpmonto = $this->attributes['deudaRestante'];
        if ($tmpmonto > 0)
        {
            $tmpmonto = $tmpmonto * (1+(Vari::get('servicio')/100));

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
