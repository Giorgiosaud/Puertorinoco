<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paseo extends Model {

    public function reservas()
    {
        return $this->hasMany('App\Reservacion');
    }

    public function embarcaciones()
    {
        return $this->belongsToMany('App\Embarcacion', 'embarcacion_paseo')->withTimestamps();
    }

    public function tipoDePaseo()
    {
        return $this->belongsTo('App\TipoDePaseo');
    }
}
