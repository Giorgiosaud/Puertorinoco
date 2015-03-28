<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaseosAdminRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        return \Auth::user()->nivelDeAcceso->permiso->editarPaseos;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'horaDeSalida'=>'required',
            'nombre'=>'required',
            'orden'=>'required',
            'publico'=>'Boolean|required',
            'lunes'=>'Boolean|required',
            'martes'=>'Boolean',
            'miercoles'=>'Boolean',
            'jueves'=>'Boolean',
            'viernes'=>'Boolean',
            'sabado'=>'Boolean',
            'domingo'=>'Boolean',
		];
	}

}
