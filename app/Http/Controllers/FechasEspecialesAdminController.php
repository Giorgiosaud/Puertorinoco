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
		// dd($request->all());
		$paseo=FechaEspecial::create($request->all());
		$embarcaciones=$request->input('lista_de_embarcaciones');
		foreach ($embarcaciones as $embaracionId){
			$paseo->embarcaciones()->attach($embaracionId,array('activa'=>$request->input('trabaja')));			
		}

		// $paseo->embarcaciones()->sync($request->input('lista_de_embarcaciones'));
		// dd($paseo);
		return redirect()->route('PanelAdministrativo.fechasEspeciales.index');
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
		// $embarcacionesSeleccionadas=$FechaEspecial->lists('nombre','id')->all();
        //dd($fechaEspecial);
		return view('fechasEspeciales.admin.edit', compact('fechaEspecial','tiposDePaseos','embarcaciones'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $req)
	{
		$fechaEspecial = FechaEspecial::findOrFail($id);
		$fechaEspecial->update($req->all());
		$embarcaciones=$req->input('lista_de_embarcaciones');
		foreach ($embarcaciones as $embaracionId){
			$fechaEspecial->embarcaciones()->sync(array($embaracionId=>array('activa'=>$req->input('trabaja'))));
		}
		return redirect()->route('PanelAdministrativo.fechasEspeciales.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$fechaEspecial=FechaEspecial::find($id);
        // dd($fechaEspecial->embarcaciones);
        $fechaEspecial->embarcaciones()->detach($fechaEspecial->embaraciones);
        $fechaEspecial->delete();
        //$embarcacion->destroy();
        return redirect()->route('PanelAdministrativo.fechasEspeciales.index');
	}

}
