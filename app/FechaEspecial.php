<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FechaEspecial extends Model {

	protected $table='fechas_especiales';
	protected $dates=['fecha'];
	public function scopeFuturo($query)
	{
		return $query->where('fecha','>=',Carbon::now());
	}
	public function embarcaciones(){
		return $this->belongsToMany('App\Embarcacion','embarcacion_fecha_especial')->withTimestamps()->withPivot('activa');
	}
}
