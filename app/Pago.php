<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

	protected $fillable=['monto','reservacion_id','created_at','updated_at'];
    public function detalles()
    {
        return $this->morphTo('pago');
    }
    public function reserva(){
        return $this->belongsTo('App\Reservacion','reservacion_id');
    }
}
