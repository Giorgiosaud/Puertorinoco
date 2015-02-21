<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model {

	//
    public function tipoDePaseo(){
        return $this->belongsTo('App\TipoDePaseo');
    }
}
