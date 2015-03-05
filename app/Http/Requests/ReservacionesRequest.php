<?php namespace App\Http\Requests;

class ReservacionesRequest extends Request {

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
            "fecha"                 => ['required'],
            "embarcacion_id"        => ['required','exists:embarcaciones,id'],
            "paseo_id"              => ['required','exists:paseos,id'],
            "rifInicio"             => ['required'],
            "identificacion_number" => ['required'],
            "identificacion"        => ['required','alpha_dash'],
            "nombre"                => ['required','min:3'],
            "apellido"              => ['required','min:3'],
            "email"                 => ['required','email'],
            "telefono"              => ['required'],
            "adultos"               => ['required','integer'],
            "mayores"               => ['required','integer'],
            "ninos"                 => ['required','integer'],
            "condiciones"           => ['required','accepted'],
        ];
    }

}
