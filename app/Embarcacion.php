<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Embarcacion extends Model {

	protected $table='embarcaciones';

	public function reservas(){
		return $this->hasMany('App\Reservacion');
	}
	public function paseos()
	{
		return $this->belongsToMany('App\Paseo','embarcacion_paseo')->withTimestamps();
	}
	public function fechasEspeciales(){
		return $this->belongsToMany('App\FechaEspecial','embarcacion_fecha_especial')
			->withTimestamps()->withPivot('activa');
	}

}
