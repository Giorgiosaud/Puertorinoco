<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\NivelDeAcceso
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $descripcion 
 * @property integer $permiso_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $usuario 
 * @property-read \App\Permiso $permiso 
 * @method static \Illuminate\Database\Query\Builder|\App\NivelDeAcceso whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NivelDeAcceso whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NivelDeAcceso whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NivelDeAcceso wherePermisoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NivelDeAcceso whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NivelDeAcceso whereUpdatedAt($value)
 */
class NivelDeAcceso extends Model {

	protected $table='niveles_de_acceso';

	public function usuario(){
		return $this->hasMany('App\User');
	}

	public function permiso(){
		return $this->belongsTo('App\Permiso','permiso_id');
	}
}
