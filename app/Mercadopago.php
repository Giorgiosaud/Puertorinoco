<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercadopago extends Model {
    protected $dates=[
        'date_created'
    ];
    public function pagos()
    {
        return $this->morphMany('App\Pago', 'pago');
    }
}
