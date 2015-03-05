<?php namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests;

class ClientesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

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
