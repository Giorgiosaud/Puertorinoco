<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelDeAcceso extends Model {

	protected $table='niveles_de_acceso';

	public function usuario(){
		return $this->hasMany('App\User');
	}

	public function permiso(){
		return $this->belongsTo('App\Permiso','permiso_id');
	}
}
