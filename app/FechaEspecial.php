<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaEspecial extends Model {

	protected $table='fechas_especiales';
	protected $dates=['fecha'];
	public function embarcaciones(){
		return $this->belongsToMany('App\Embarcacion','embarcacion_fecha_especial')->withTimestamps()->withPivot('activa');
	}
}
