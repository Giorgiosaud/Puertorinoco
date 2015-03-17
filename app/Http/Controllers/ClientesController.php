<?php namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests;

class ClientesController extends Controller {


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function obtenerDatos($identificacion)
    {
        //dd($identificacion);
        $cliente = Cliente::whereIdentificacion($identificacion)->get([
            'nombre',
            'apellido',
            'email',
            'telefono',
            'visitas',
            'esAgencia',
            'credito'
            ])->first();
        //return $cliente;
        if (is_null($cliente))
        {
            $cliente['nombre'] = '';
            $cliente['apellido'] = '';
            $cliente['email'] = '';
            $cliente['telefono'] = '';
            $cliente['visitas'] = '';
            $cliente['esAgencia'] = '';
            $cliente['credito'] = '';
        }


        return $cliente;

    }

}
