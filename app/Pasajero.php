<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model {

	//
    public function reserva(){
        return $this->belongsTo('App\Reservacion','reservacion_id');
    }
}
