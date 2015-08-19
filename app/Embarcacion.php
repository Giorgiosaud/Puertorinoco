<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Embarcacion
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property boolean $publico
 * @property integer $abordajeMinimo
 * @property integer $abordajeMaximo
 * @property integer $abordajeNormal
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property boolean $lunes
 * @property boolean $martes
 * @property boolean $miercoles
 * @property boolean $jueves
 * @property boolean $viernes
 * @property boolean $sabado
 * @property boolean $domingo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reservacion[] $reservas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Paseo[] $paseos
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FechaEspecial[] $fechasEspeciales
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereOrden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion wherePublico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereAbordajeMinimo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereAbordajeMaximo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereAbordajeNormal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereLunes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereMartes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereMiercoles($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereJueves($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereViernes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereSabado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Embarcacion whereDomingo($value)
 */
class Embarcacion extends Model {

    protected $casts = [
        'publico' => 'boolean'
    ];
    protected $fillable = [
        'nombre',
        'orden',
        'publico',
        'abordajeMinimo',
        'abordajeMaximo',
        'abordajeNormal',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
    ];
    protected $table = 'embarcaciones';

    public function reservas()
    {
        return $this->hasMany('App\Reservacion');
    }

    public function paseos()
    {
        return $this->belongsToMany('App\Paseo', 'embarcacion_paseo')->withTimestamps();
    }


    public function fechasEspeciales()
    {
        return $this->belongsToMany('App\FechaEspecial', 'embarcacion_fecha_especial')
            ->withTimestamps()->withPivot('activa');
    }
    public function obtenerDiasLaborablesDeLaSemana(){
        foreach($this as $embarcacion){
            return 'estas';
        }
    }

}
