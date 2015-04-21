<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mercadopago;
use Illuminate\Http\Request;
use jorgelsaud\Mercadopago\MP;

class MercadopagoController extends Controller {

	public function success(Request $request){
        dd($request->all());
        //get('https://api.mercadolibre.com/merchant_orders/'.$request->input('collection_id').'?access_token='
        //    .MP::obtenerAccessToken());

        //dd($request->all());
    }
    public function failure(){

    }
    public function pending(){

    }

}
