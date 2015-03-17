<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TipoDePago
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $descripcion 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PagoDirecto[] $pagos 
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePago whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePago whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoDePago whereDescripcion($value)
 */
class TipoDePago extends Model {
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'descripcion',
    ];
	protected $table='tipos_de_pagos';

	function pagos(){
		return $this->hasMany('App\PagoDirecto','tipo_de_pago_id');
	}

}
