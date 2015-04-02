<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pasajero
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $identificacion
 * @property string $email
 * @property string $telefono
 * @property integer $reservacion_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Reservacion $reserva
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereApellido($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereIdentificacion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereTelefono($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereReservacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pasajero whereUpdatedAt($value)
 */
class Pasajero extends Model {

    protected $fillable = [
        'nombre',
        'apellido',
        'identificacion',
        'email',
        'telefono',
        'reservacion_id',
    ];

    //
    public function reserva()
    {
        return $this->belongsTo('App\Reservacion', 'reservacion_id');
    }
}
