<?php namespace App\Http\Controllers;

use App\FechaEspecial;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
		//
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
