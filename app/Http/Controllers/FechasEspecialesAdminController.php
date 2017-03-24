<?php namespace App\Http\Controllers;

use App\Embarcacion;
use App\FechaEspecial;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoDePaseo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FechasEspecialesAdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fechasEspeciales = FechaEspecial::all();
		$fechasEspecialesTableStyle = [];
		foreach ($fechasEspeciales as $fechaEspecial)
		{
			$array = [
			'Id'        => $fechaEspecial->id,
			'Fecha'    => $fechaEspecial->fecha->format('d-m-y'),

			'Clase'    => $fechaEspecial->clase,
			'Descripcion'    => $fechaEspecial->descripcion,
			];
			array_push($fechasEspecialesTableStyle, $array);
		}

		return view('fechasEspeciales.admin.all', compact('fechasEspecialesTableStyle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$embarcaciones=Embarcacion::lists('nombre','id')->all();
		return view('fechasEspeciales.admin.create',compact('embarcaciones'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$paseo=FechaEspecial::create($request->all());
		return redirect()->route('fechasEspeciales.admin.all');
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
		$tiposDePaseos=TipoDePaseo::lists('nombre','id')->all();
		$embarcaciones=Embarcacion::lists('nombre','id')->all();
		$fechaEspecial = FechaEspecial::findOrFail($id);
        //dd($fechaEspecial);
		return view('fechasEspeciales.admin.edit', compact('fechaEspecial','tiposDePaseos','embarcaciones'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$fechaEspecial = FechaEspecial::findOrFail($id);

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
