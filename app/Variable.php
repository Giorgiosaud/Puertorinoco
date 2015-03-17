<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Variable
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $valor 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Variable whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Variable whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Variable whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Variable whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Variable whereUpdatedAt($value)
 * @method static \App\Variable diasDeLaSemana()
 */
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
