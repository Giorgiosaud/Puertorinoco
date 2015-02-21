<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDePaseo extends Model {

	protected $table='tipos_de_paseos';
	public function precios(){
		return $this->hasMany('App\Precio');
	}
}
