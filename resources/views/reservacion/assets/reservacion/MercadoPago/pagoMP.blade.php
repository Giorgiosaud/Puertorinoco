{{--{!!$mp->get_access_token()!!}--}}
@if($reservacion->montoTotal>0 && $otros['mercadopago'])
	<a href="{!! Mercadopago::create_preference_and_get_url($reservacion->PreferenceData)!!}" name="MP-Checkout" class="blue-L-Rn-VeOn" >Pagar</a>
@endif
