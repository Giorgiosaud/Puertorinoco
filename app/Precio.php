<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Precio
 *
 * @property integer $id 
 * @property float $adulto 
 * @property float $mayor 
 * @property float $nino 
 * @property string $aplicar_desde 
 * @property integer $tipo_de_paseo_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \App\TipoDePaseo $tipoDePaseo 
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereAdulto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereMayor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereNino($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereAplicarDesde($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereTipoDePaseoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Precio whereUpdatedAt($value)
 * @method static \App\Precio precioParaLaFecha($fecha)
 */
class Precio extends Model {

	//
    protected $dates=[
        'aplicar_desde',
    ];
    protected $fillable=[
      'adulto',
        'mayor',
        'nino',
        'aplicar_desde',
        'tipo_de_paseo_id',
    ];
    public function tipoDePaseo(){
        return $this->belongsTo('App\TipoDePaseo');
    }
    public function scopePrecioParaLaFecha($query,$fecha){
                return $query->where('aplicar_desde','<=',$fecha)->latest()->take(1)->get(array('adulto','mayor',
                    'nino'));
    }
}
