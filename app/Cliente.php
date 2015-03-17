<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Cliente
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $identificacion
 * @property string $email
 * @property string $telefono
 * @property integer $visitas
 * @property boolean $esAgencia
 * @property float $credito
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reservacion[] $reservas
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereApellido($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereIdentificacion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereTelefono($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereVisitas($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereEsAgencia($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereCredito($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cliente whereUpdatedAt($value)
 */
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
