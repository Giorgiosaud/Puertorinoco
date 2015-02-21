<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

	protected $fillable=['monto'];
    public function pago()
    {
        return $this->morphTo();
    }
}
