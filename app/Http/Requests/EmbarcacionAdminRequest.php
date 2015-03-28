<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmbarcacionAdminRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::user()->nivelDeAcceso->permiso->editarEmbarcaciones;

	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'nombre'=>'required',
            'orden'=>'required',

            'abordajeMinimo'=>'required',
            'abordajeMaximo'=>'required',
            'abordajeNormal'=>'required',
            'lunes'=>'Boolean|required',
            'publico'=>'Boolean|required',
            'martes'=>'Boolean',
            'miercoles'=>'Boolean',
            'jueves'=>'Boolean',
            'viernes'=>'Boolean',
            'sabado'=>'Boolean',
            'domingo'=>'Boolean',
		];
	}

}
