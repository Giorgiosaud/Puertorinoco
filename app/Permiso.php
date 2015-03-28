<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Permiso
 *
 * @property integer $id
 * @property boolean $esAgencia
 * @property boolean $cuposExtra
 * @property boolean $DisponibilidadTotalDeEmbarcaciones
 * @property boolean $DisponibilidadTotalDePaseos
 * @property boolean $accesoEdicionDePagina
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\NivelDeAcceso[] $nivelDeAcceso
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereEsAgencia($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereCuposExtra($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereDisponibilidadTotalDeEmbarcaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereDisponibilidadTotalDePaseos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereAccesoEdicionDePagina($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permiso whereUpdatedAt($value)
 */
class Permiso extends Model {

    protected $casts = [
        'esAgencia'                          => 'boolean',
        'cuposExtra'                         => 'boolean',
        'DisponibilidadTotalDeEmbarcaciones' => 'boolean',
        'DisponibilidadTotalDePaseos'        => 'boolean',
        'accesoEdicionDePagina'              => 'boolean',
        'editarEmbarcaciones'                => 'boolean',
        'editarPaseos'                       => 'boolean',
        'consultarReservas'                  => 'boolean',

    ];
    protected $fillable = [
        'esAgencia',
        'cuposExtra',
        'accesoEdicionDePagina',
        'DisponibilidadTotalDeEmbarcaciones',
        'DisponibilidadTotalDePaseos',
        'editarEmbarcaciones',
        'editarPaseos',
        'consultarReservas',];

    //
    public function nivelDeAcceso()
    {
        return $this->hasMany('App\NivelDeAcceso');
    }
}
