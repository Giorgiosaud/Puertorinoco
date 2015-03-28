<?php namespace App\Http\Requests;

class ConsultarReservacionRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->nivelDeAcceso->permiso->consultarReservas;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_de_reserva' => 'exists:reservaciones,id',
            'fecha'             => 'date|required_without:numero_de_reserva',
            'horas'             => 'array',
            'embarcaciones'     => 'array',
        ];
    }

}
