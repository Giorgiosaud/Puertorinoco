<?php namespace App\Http\Controllers;

use App\ClasesDeApoyo\TableHeaders;
use App\Embarcacion;
use App\Http\Requests;
use App\Http\Requests\EmbarcacionAdminRequest;

class EmbarcacionesAdminController extends Controller {

    function __construct()
    {
        $this->middleware('App\Http\Middleware\Autentificacion');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $embarcaciones = Embarcacion::all();
        $embarcacionesTableStyle = [];
        foreach ($embarcaciones as $embarcacion)
        {
            $array = [
                'Id' => $embarcacion->id,
                'Nombre'=>$embarcacion->nombre,
                'Público'=>$embarcacion->publico,
                'Abordaje Minimo'=>$embarcacion->abordajeMinimo,
                'Abordaje Normal'=>$embarcacion->abordajeMaximo,
                'Abordaje Maximo'=>$embarcacion->abordajeNormal,
                'Lunes'=>$embarcacion->lunes,
                'Martes'=>$embarcacion->martes,
                'Miercoles'=>$embarcacion->miercoles,
                'Jueves'=>$embarcacion->jueves,
                'Viernes'=>$embarcacion->viernes,
                'Sábado'=>$embarcacion->sabado,
                'Domingo'=>$embarcacion->Domingo,


            ];
            array_push($embarcacionesTableStyle, $array);
        }
        return view('embarcaciones.admin.all', compact('embarcacionesTableStyle'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('embarcaciones.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(EmbarcacionAdminRequest $request)
    {
        $embarcacion=Embarcacion::create($request->all());
        return redirect()->route('PanelAdministrativo.embarcaciones.index');
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
        $embarcacion = Embarcacion::findOrFail($id);

        //dd($embarcacion);
        return view('embarcaciones.admin.edit', compact('embarcacion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, EmbarcacionAdminRequest $request)
    {
        $embarcacion = Embarcacion::findOrFail($id);

        $embarcacion->update($request->all());

        return redirect()->route('PanelAdministrativo.embarcaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Embarcacion::destroy($id);
        //dd($embarcacion);
        //$embarcacion->destroy();
        return redirect()->route('PanelAdministrativo.embarcaciones.index');

    }

}
