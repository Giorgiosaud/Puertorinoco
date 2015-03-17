<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ElementoDelMenu
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $nivel
 * @property integer $id_padre
 * @property string $url
 * @property string $descripcion
 * @property boolean $publico
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereNivel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereIdPadre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu wherePublico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ElementoDelMenu whereUpdatedAt($value)
 */
class ElementoDelMenu extends Model {

	//
    protected $table='elementos_de_menu';


}
