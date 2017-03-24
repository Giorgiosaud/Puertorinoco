<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\FechaEspecial
 *
 * @property integer $id
 * @property \Carbon\Carbon $fecha
 * @property string $clase
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Embarcacion[] $embarcaciones
 * @method static \Illuminate\Database\Query\Builder|\App\FechaEspecial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FechaEspecial whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FechaEspecial whereClase($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FechaEspecial whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FechaEspecial whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FechaEspecial whereUpdatedAt($value)
 * @method static \App\FechaEspecial futuro()
 */
class FechaEspecial extends Model {

	protected $table='fechas_especiales';
	protected $dates=['fecha'];
	protected $fillable=array(
		'fecha',
		'clase',
		'descripcion',
		);
	public function scopeFuturo($query)
	{
		return $query->where('fecha','>=',Carbon::now());
	}
	public function embarcaciones(){
		return $this->belongsToMany('App\Embarcacion','embarcacion_fecha_especial')->withTimestamps()->withPivot('activa');
	}
    public function getListaDeEmbarcacionesAttribute()
    {
        return $this->embarcaciones->lists('id');
    }
}
