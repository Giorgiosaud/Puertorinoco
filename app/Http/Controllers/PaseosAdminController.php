<?php namespace App\Http\Controllers;

use App\Embarcacion;
use App\Http\Requests;
use App\Http\Requests\PaseosAdminRequest;
use App\Paseo;
use App\TipoDePaseo;

class PaseosAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paseos = Paseo::all();
        $paseosTableStyle = [];
        foreach ($paseos as $paseo)
        {
            $array = [
                'Id'        => $paseo->id,
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
                'Domingo'   => $paseo->Domingo,
            ];
            array_push($paseosTableStyle, $array);
        }

        return view('paseos.admin.all', compact('paseosTableStyle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tiposDePaseos=TipoDePaseo::lists('nombre','id');
        $embarcaciones=TipoDePaseo::lists('nombre','id');

        return view('paseos.admin.create',compact('tiposDePaseos','embarcaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PaseosAdminRequest $request)
    {
        $paseo=Paseo::create($request->all());
        $paseo->embarcaciones()->sync($request->input('lista_de_embarcaciones'));
        return redirect()->route('PanelAdministrativo.paseos.index');
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
        $tiposDePaseos=TipoDePaseo::lists('nombre','id');
        $embarcaciones=Embarcacion::lists('nombre','id');

        $paseo = Paseo::findOrFail($id);
        return view('Paseos.admin.edit', compact('paseo','tiposDePaseos','embarcaciones'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id,PaseosAdminRequest $request)
    {
        $paseo = Paseo::findOrFail($id);

        $paseo->update($request->all());
        $paseo->embarcaciones()->sync($request->input('lista_de_embarcaciones'));
        return redirect()->route('PanelAdministrativo.paseos.index');
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

}
