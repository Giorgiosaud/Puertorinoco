<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

	protected $fillable=['monto','reservacion_id','created_at','updated_at'];
    public function pago()
    {
        return $this->morphTo();
    }
}
