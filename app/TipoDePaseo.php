<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TipoDePaseo
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $descripcion 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Precio[] $precios 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Paseo[] $paseos 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Precio[] $paseoConPrecio 
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePaseo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePaseo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePaseo whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePaseo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePaseo whereUpdatedAt($value)
 */
class TipoDePaseo extends Model {
	protected $fillable = [
	'nombre',
	'descripcion',
	];
	protected $table='tipos_de_paseos';

	public function precios(){
		return $this->hasMany('App\Precio');
	}
	public function paseos(){
		return $this->hasMany('App\Paseo');
	}
	public function paseoConPrecio(){
		return $this->hasMany('App\Precio');
	}
}
