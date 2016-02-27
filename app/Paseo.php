<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Paseo
 *
 * @property integer $id
 * @property string $horaDeSalida
 * @property string $nombre
 * @property string $orden
 * @property boolean $publico
 * @property boolean $lunes
 * @property boolean $martes
 * @property boolean $miercoles
 * @property boolean $jueves
 * @property boolean $viernes
 * @property boolean $sabado
 * @property boolean $domingo
 * @property string $descripcion
 * @property integer $tipo_de_paseo_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reservacion[] $reservas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Embarcacion[] $embarcaciones
 * @property-read \App\TipoDePaseo $tipoDePaseo
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereHoraDeSalida($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereOrden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo wherePublico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereLunes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereMartes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereMiercoles($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereJueves($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereViernes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereSabado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereDomingo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereTipoDePaseoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Paseo whereUpdatedAt($value)
 */
class Paseo extends Model {

    protected $fillable = [
        'horaDeSalida',
        'nombre',
        'orden',
        'publico',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
        'tipo_de_paseo_id',
    ];

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

    /**
     * devuelve lista de id de las embarcaciones de el paseo seleccionado
     * @return array
     */
    public function getListaDeEmbarcacionesAttribute()
    {
        return $this->embarcaciones->lists('id');
    }
    public function getHoraSalidaToEventAttribute(){
        $hora=intval(substr($this->horaDeSalida,0,2));
        if($hora<8){
            $ret='T'.($hora+12).':00';
            return $ret;
        }
        $ret='T'.($hora).':00';
        return $ret;
    }
        
}
