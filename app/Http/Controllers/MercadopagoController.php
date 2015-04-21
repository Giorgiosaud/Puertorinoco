<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Mercadopago as MercadopagoModel;
use Illuminate\Http\Request;


class MercadopagoController extends Controller {

    public function success(Request $request)
    {
       // dd($request->all());
        $d = \Mercadopago::get_payment($request->input('collection_id'));
        dd($d['response']);
        if ($d['status'] == 200)
        {
            $mp = $this->BuscarMercadopagoOCrearlo($d);
        }

        return 'pago aceptado';

    }

    public function failure()
    {

    }

    public function pending()
    {

    }

    /**
     * @param $respuestaMercadoPago
     */
    private function BuscarMercadopagoOCrearlo($respuestaMercadoPago)
    {
        $mp = MercadopagoModel::where('idMercadoPago',$respuestaMercadoPago['response']['collection']['id'])->get();
        if($mp->count()>0){
            return $mp;
        }
        $mp=new MercadopagoModel();
        $mp->idMercadoPago =$respuestaMercadoPago['response']['collection']['id'];
        $mp->site_id = $respuestaMercadoPago['response']['collection']['site_id'];
        $mp->operation_type = $respuestaMercadoPago['response']['collection']['operation_type'];
        $mp->order_id = $respuestaMercadoPago['response']['collection']['order_id'];
        $mp->external_reference = $respuestaMercadoPago['response']['collection']['external_reference'];
        $mp->status = $respuestaMercadoPago['response']['collection']['status'];
        $mp->status_detail = $respuestaMercadoPago['response']['collection']['status_detail'];
        $mp->payment_type = $respuestaMercadoPago['response']['collection']['payment_type'];
        $mp->date_created = $respuestaMercadoPago['response']['collection']['date_created'];
        $mp->last_modified = $respuestaMercadoPago['response']['collection']['last_modified'];
        $mp->date_approved = $respuestaMercadoPago['response']['collection']['date_approved'];
        $mp->money_release_date = $respuestaMercadoPago['response']['collection']['money_release_date'];
        $mp->currency_id = $respuestaMercadoPago['response']['collection']['currency_id'];
        $mp->transaction_amount = $respuestaMercadoPago['response']['collection']['transaction_amount'];
        $mp->shipping_cost = $respuestaMercadoPago['response']['collection']['shipping_cost'];
        //$mp->finance_charge=$d['response']['collection']['finance_charge'];
        $mp->total_paid_amount = $respuestaMercadoPago['response']['collection']['total_paid_amount'];
        $mp->net_received_amount = $respuestaMercadoPago['response']['collection']['net_received_amount'];
        $mp->reason = $respuestaMercadoPago['response']['collection']['reason'];
        $mp->payerId = $respuestaMercadoPago['response']['collection']['payer']['id'];
        $mp->payerfirst_name = $respuestaMercadoPago['response']['collection']['payer']['first_name'];
        $mp->payerlast_name = $respuestaMercadoPago['response']['collection']['payer']['last_name'];
        $mp->payeremail = $respuestaMercadoPago['response']['collection']['payer']['email'];
        $mp->payernickname = $respuestaMercadoPago['response']['collection']['payer']['nickname'];
        $mp->phonearea_code = $respuestaMercadoPago['response']['collection']['payer']['phone']['area_code'];
        $mp->phonenumber = $respuestaMercadoPago['response']['collection']['payer']['phone']['number'];
        $mp->phoneextension = $respuestaMercadoPago['response']['collection']['payer']['phone']['extension'];
        $mp->identificationType = $respuestaMercadoPago['response']['collection']['payer']['identification']['type'];
        $mp->identificationNumber = $respuestaMercadoPago['response']['collection']['payer']['identification']['number'];
        $mp->collectorid = $respuestaMercadoPago['response']['collection']['collector']['id'];
        $mp->collectorfirst_name = $respuestaMercadoPago['response']['collection']['collector']['first_name'];
        $mp->collectorlast_name = $respuestaMercadoPago['response']['collection']['collector']['last_name'];
        $mp->collectoremail = $respuestaMercadoPago['response']['collection']['collector']['email'];
        $mp->collectornickname = $respuestaMercadoPago['response']['collection']['collector']['nickname'];
        $mp->collectorphonearea_code = $respuestaMercadoPago['response']['collection']['collector']['phone']['area_code'];
        $mp->collectorphonenumber = $respuestaMercadoPago['response']['collection']['collector']['phone']['number'];
        $mp->collectorphoneextension = $respuestaMercadoPago['response']['collection']['collector']['phone']['extension'];

        return $mp->save();
    }

}
