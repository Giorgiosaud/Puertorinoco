<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoDelPago extends Model {

	protected $table='estados_de_los_pagos';

	public function reservas(){
		return $this->hasMany('App\Reservacion');
	}

}
