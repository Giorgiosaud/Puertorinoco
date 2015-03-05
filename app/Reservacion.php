<?php namespace App;

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

    public function scopeReservasDeLaFecha($query, $fecha)
    {
        return $query->whereFecha($fecha);
    }

    public function scopePasajerosReservadosDeLaFecha($query, $fecha)
    {
        return $query->whereFecha($fecha)->sum('adultos') + $query->whereFecha($fecha)->sum('mayores') + $query->whereFecha
        ($fecha)->sum('ninos');
    }
    public function scopePasajerosReservadosDeLaFechaEmbarcacionyPaseo($query, $fecha,$embarcacion_id,$paseo_id)
    {
        return $query->whereFecha($fecha)
            ->whereEmbarcacionId($embarcacion_id)
            ->wherePaseoId($paseo_id)
            ->sum('adultos') + $query->whereFecha($fecha)->whereEmbarcacionId($embarcacion_id)->wherePaseoId($paseo_id)->sum('mayores') + $query->whereFecha($fecha)->whereEmbarcacionId($embarcacion_id)->wherePaseoId($paseo_id)->sum('ninos');    }

    public function actualizaMontoTotal()
    {
        $precio = $this->paseo->tipoDePaseo->precios()->PrecioParaLaFecha($this->fecha)->first();
        $montoAPagar = ($precio->adulto * $this->adultos) + ($precio->mayor * $this->mayores) +
            ($precio->nino * $this->ninos);
        $this->attributes['montoTotal'] = $montoAPagar;
        $this->save();

        return $this;

    }

    public function scopeObtenerVecesQueSeRepite($query, $fecha, $clienteId, $embarcacionId, $paseoId)
    {
        return $cantidad = $query->whereFecha($fecha)->whereClienteId($clienteId)->whereEmbarcacionId
        ($embarcacionId)->wherePaseoId($paseoId);
    }

    public function getmontoTotalAPagarAttribute(){
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0) {
            return number_format($tmpmonto, 2, ',', '.')." Bs.";
        } else {
            return 0;
        }
    }
    public function getmontoSinIvaAttribute(){
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0) {
            $tmpmonto=$tmpmonto/1.12;
            return number_format($tmpmonto, 2, ',', '.')." Bs.";
        } else {
            return 0;
        }
    }
    public function getmontoIVAAttribute(){
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0) {
            $tmpmonto=$tmpmonto-($tmpmonto/1.12);
            return number_format($tmpmonto, 2, ',', '.')." Bs.";
        } else {
            return 0;
        }
    }
    public function getmontoServicioAttribute(){
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0) {
            $tmpmonto=$tmpmonto*0.1;
            return number_format($tmpmonto, 2, ',', '.')." Bs.";
        } else {
            return 0;
        }
    }
    public function getmontoConServicioAttribute(){
        $tmpmonto = $this->attributes['montoTotal'];
        if ($tmpmonto > 0) {
            $tmpmonto=$tmpmonto*1.1;
            return number_format($tmpmonto, 2, ',', '.')." Bs.";
        } else {
            return 0;
        }
    }


}
