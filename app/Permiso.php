<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model {

    protected $fillable = ['esAgencia',
        'cuposExtra',
        'accesoEdicionDePagina',];

    //
    public function nivelDeAcceso()
    {
        return $this->hasMany('App\NivelDeAcceso');
    }
}
