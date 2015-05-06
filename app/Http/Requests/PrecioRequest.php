<?php namespace App\Http\Requests;

class PrecioRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->nivelDeAcceso->permiso->editarPrecios;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "tipo_de_paseo_id"=>'required',
            "adulto"=>'required',
            "mayor"=>'required',
            "nino"=>'required',
            "aplicar_desde"=>'required|date',
        ];
    }

}
