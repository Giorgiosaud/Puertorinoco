<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDePago extends Model {
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'descripcion',
    ];
	protected $table='tipos_de_pagos';

	function pagos(){
		return $this->hasMany('App\PagoDirecto','tipo_de_pago_id');
	}

}
