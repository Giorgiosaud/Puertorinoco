<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model {

	protected $table='reservaciones';

	public function cliente(){
		return $this->belongsTo('App\Cliente');
	}
	public function embarcacion(){
		return $this->belongsTo('App\Embarcacion');
	}
	public function paseo(){
		return $this->belongsTo('App\Paseo');
	}
	public function estadoDePago(){
		return $this->belongsTo('App\EstadoDelPago','estado_del_pago_id');
	}
	public function pasajeros()
	{
		return $this->hasMany('App\Pasajero');
	}

}
