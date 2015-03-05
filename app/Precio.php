<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model {

	//
    public function tipoDePaseo(){
        return $this->belongsTo('App\TipoDePaseo');
    }
    public function scopePrecioParaLaFecha($query,$fecha){
                return $query->where('aplicar_desde','<=',$fecha)->latest()->take(1)->get(array('adulto','mayor',
                    'nino'));
    }
}
