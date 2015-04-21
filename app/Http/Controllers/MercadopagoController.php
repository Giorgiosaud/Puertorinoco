<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MercadopagoController extends Controller {

	public function success(Request $request){
        dd($request->all());
    }
    public function failure(){

    }
    public function pending(){

    }

}
