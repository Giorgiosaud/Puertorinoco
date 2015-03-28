<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModificarPaseoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'fecha'=>'required|date',
            'embarcacion_id'=>'required|exists:embarcaciones,id',
            'id'=>'required|exists:reservaciones,id',
            'paseo_id'=>'required|exists:paseos,id',
            'adultos'=>'integer',
            'mayores'=>'integer',
            'ninos'=>'integer',
		];
	}

}
