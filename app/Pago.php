<?php namespace App;

use App\Traits\procesarPago;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Pago
 *
 * @property integer $id
 * @property float $monto
 * @property integer $pago_id
 * @property integer $reservacion_id
 * @property string $pago_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \pago $detalles
 * @property-read \App\Reservacion $reserva
 * @method static \Illuminate\Database\Query\Builder|\App\Pago whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pago whereMonto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pago wherePagoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pago whereReservacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pago wherePagoType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pago whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pago whereUpdatedAt($value)
 */
class Pago extends Model {

    use procesarPago;
    protected $fillable = ['monto', 'pago_id', 'pago_type', 'reservacion_id', 'created_at', 'updated_at'];

    public function detalles()
    {
        return $this->morphTo('pago');
    }

    public function reserva()
    {
        return $this->belongsTo('App\Reservacion', 'reservacion_id');
    }
    public function getMontoPagadoAttribute(){
        $monto = $this->attributes['monto'];
        return number_format($monto, 2, ',', '.') . " Bs.";

    }
}
