<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EstadoDelPago
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reservacion[] $reservas
 * @method static \Illuminate\Database\Query\Builder|\App\EstadoDelPago whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EstadoDelPago whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EstadoDelPago whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EstadoDelPago whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EstadoDelPago whereUpdatedAt($value)
 */
class EstadoDelPago extends Model {

	protected $table='estados_de_los_pagos';

	public function reservas(){
		return $this->hasMany('App\Reservacion');
	}

}
