<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PagoDirecto
 *
 * @property integer $id 
 * @property string $fecha 
 * @property string $descripcion 
 * @property integer $tipo_de_pago_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Pago[] $pagos 
 * @property-read \App\TipoDePago $tipo 
 * @method static \Illuminate\Database\Query\Builder|\App\PagoDirecto whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PagoDirecto whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PagoDirecto whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PagoDirecto whereTipoDePagoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PagoDirecto whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PagoDirecto whereUpdatedAt($value)
 */
class PagoDirecto extends Model {


    protected $table = 'pagos_directos';
    protected $fillable = [
        'fecha',
        'monto',
        'descripcion',
        'tipo_de_pago_id',
    ];

    public function pagos()
    {
        return $this->morphMany('App\Pago', 'pago');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoDePago', 'tipo_de_pago_id');
    }

}
