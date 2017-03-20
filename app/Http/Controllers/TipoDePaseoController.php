<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\TipoDePaseo;
use Illuminate\Http\Request;

class TipoDePaseoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TiposDePaseos = TipoDePaseo::all();
        dd($TiposDePaseos);
        $paseosTableStyle = [];
        foreach ($TiposDePaseos as $TipoDePaseo)
        {
            $array = [
                'Id'        => $TipoDePaseo->id,
                'Hora de Salida'    => $paseo->horaDeSalida,
                'Nombre'    => $paseo->nombre,
                'Descripcion'    => $paseo->descripcion,
                'Tipo'    => $paseo->tipoDePaseo->nombre,
                'Orden'=>$paseo->orden,
                'Público'   => $paseo->publico,
                'Lunes'     => $paseo->lunes,
                'Martes'    => $paseo->martes,
                'Miercoles' => $paseo->miercoles,
                'Jueves'    => $paseo->jueves,
                'Viernes'   => $paseo->viernes,
                'Sábado'    => $paseo->sabado,
                'Domingo'   => $paseo->domingo,
            ];
            array_push($paseosTableStyle, $array);
        }

        return view('Paseos.admin.all', compact('paseosTableStyle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
