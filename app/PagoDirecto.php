<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoDirecto extends Model {


    protected $table='pagos_directos';
    public function pagos()
    {
        return $this->morphMany('App\Pago', 'pago');
    }
    public function tipo(){
            return $this->belongsTo('App\TipoDePago','tipo_de_pago_id');
    }

}
