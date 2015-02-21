<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public function reservas()
    {
       return $this->hasMany('App\Reservacion');
    }

}
