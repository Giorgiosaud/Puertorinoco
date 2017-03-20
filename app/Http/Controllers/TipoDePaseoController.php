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
        // dd($TiposDePaseos);
        $TiposDepaseosTableStyle = [];
        foreach ($TiposDePaseos as $TipoDePaseo)
        {
            $array = [
                'Id'        => $TipoDePaseo->id,
                'Nombre'    => $TipoDePaseo->nombre,
                'Descripcion'    => $TipoDePaseo->descripcion,
            ];
            array_push($TiposDepaseosTableStyle, $array);
        }

        return view('TiposDePaseos.admin.all', compact('TiposDepaseosTableStyle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // $tiposDePaseos=TipoDePaseo::lists('nombre','id')->all();
        // dd($tiposDePaseos);
        // $embarcaciones=TipoDePaseo::lists('nombre','id')->all();
        // dd($embarcaciones);
        // $embarcacionesSeleccionadas=null;
        return view('TiposDePaseos.admin.create');
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
        $paseo=TipoDePaseo::create($request->all());
        return redirect()->route('PanelAdministrativo.tipoDePaseo.index');
        

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
        $TipoDePaseo = TipoDePaseo::findOrFail($id);
        return view('TiposDePaseos.admin.edit', compact('TipoDePaseo'));
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
        $paseo = TipoDePaseo::findOrFail($id);
        $paseo->update($request->all());
        
        return redirect()->route('PanelAdministrativo.tipoDePaseo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paseo = TipoDePaseo::findOrFail($id);
        $paseo->delete();
        return redirect()->route('PanelAdministrativo.tipoDePaseo.index');

    }
}
