<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Paseo;
use App\TipoDePaseo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index(){
		return            view('paginas.inicio');

        // redirect()->route('crearReservacion');
	}
	public function tarifas(){
		$TiposDePaseos=TipoDePaseo::all();
		$fecha=Carbon::now();
		// $cosas=array();
		// foreach ($paseos as $paseo) {
			// array_push($cosas,$paseo->precios()->PrecioParaLaFecha($fecha));
		// }
		// return $cosas;
		return view ('paginas.tarifas',compact('TiposDePaseos','fecha'));
	}


}
