<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PrecioRequest;
use App\Paseo;
use App\Precio;
use App\TipoDePaseo;
use Illuminate\Http\Request;

class PreciosAdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $precios = Precio::all();
        $preciosTableStyle = [];
        foreach ($precios as $precio)
        {
            $array = [
                'Id'        => $precio->id,
                'Tipo de Paseo'=>$precio->tipoDePaseo->nombre,
                'Adulto'    => $precio->adulto,
                'Mayor'    => $precio->mayor,
                'Niño'    => $precio->nino,
                'Aplicar Desde'    => $precio->aplicar_desde->format('d-m-Y'),

            ];
            array_push($preciosTableStyle, $array);
        }

        return view('precios.admin.all', compact('preciosTableStyle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $tiposDePaseos = TipoDePaseo::lists('nombre', 'id');
        return view('precios.admin.create',compact('tiposDePaseos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PrecioRequest $request)
	{
		dd($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $precio = Precio::findOrFail($id);
        $tiposDePaseos = TipoDePaseo::lists('nombre', 'id');

        //dd($embarcacion);
        return view('precios.admin.edit', compact('precio','tiposDePaseos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
