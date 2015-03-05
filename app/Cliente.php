<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $fillable=[
        'nombre',
        'apellido',
        'identificacion',
        'email',
        'telefono',
    ];
    public function reservas()
    {
       return $this->hasMany('App\Reservacion');
    }

}
