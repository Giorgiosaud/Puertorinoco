<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model {
    protected $fillable=[
        'nombre',
        'valor'
    ];
	//
    public function scopeDiasDeLaSemana($query){
        return $query->whereNombre('Lunes')
            ->orWhere('nombre','Martes')
            ->orWhere('nombre','Miercoles')
            ->orWhere('nombre','Jueves')
            ->orWhere('nombre','Viernes')
            ->orWhere('nombre','Sabado')
            ->orWhere('nombre','Domingo');
    }
}
