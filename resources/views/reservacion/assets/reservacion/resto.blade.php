<tr id="opcionesDePago">

	@if($totalCuposEnPaseo>=$reservacion->boat->abordajeminimo)
		<td colspan="2" id="pagoOnline">
			<table class="table">
				<tr class="success">
					<th colspan="2">
						<strong>Pagar Directamente desde Esta Pagina.</strong>
					</th>
				</tr>
				<tr>
					<td>
						<strong>Monto Sin IVA: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoSinIva}}
					</td>
				<tr>
					<td>
						<strong>IVA: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoIva }}
					</td>
				</tr>
				@if($creditoUsado>0)
					<tr>
						<td>
							<strong>Giftcard: Bs. </strong>
						</td>
						<td>
							{{ number_format($creditoUsado, 2, ',', '.')." Bs." }}
						</td>
					</tr>

					<tr>
						<td>
							<strong>
								Saldo Final Cliente: Bs.
							</strong>
						</td>
						<td>
							{{ number_format($reservacion->client->credit, 2, ',', '.')." Bs." }}
						</td>
					</tr>
				@endif
				<tr>
					<td>
						<strong>Sub Total: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoTotalAPagarEscrito }}
					</td>
				</tr>
				<tr>
					<td>
						<strong>Servicio: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoServicioEscrito}}
					</td>
				</tr>
				<tr>
					<td>
						<strong>Total: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoConServicioEscrito}}
					</td>
				</tr>
				@if($reservacion->montoConServicioEscrito>0)
					<tr class="hidden-print">
						<td colspan="2" class="text-center">
							<a href="{{ $linkmp }}" name="MP-Checkout" class="lightblue-ar-s-ov" mp-mode="modal"
							   onreturn="execute_my_onreturn">Pagar</a>
							</a>
						</td>
					</tr>
					@endif
					</tr>
			</table>
		</td>
	@else
		<td colspan="2" id="sinPagoOnline">
			<table class="table" id="pagoOnlineNo">
				<tr class="success">
					<th colspan="2">
						<strong>
							Pago Online.
						</strong>
					</th>
				</tr>
				<tr class="warning">
					<td id="noMp" class="alert alert-warning">
						Debido a la <strong>cantidad de pasajeros que tenemos en este Zarpe hasta el
							momento</strong> no puede realizar el pago en la pagina. Por favor contactenos para
						realizar el pago por transferencia ya que la cantidad minima para zarpar
						en {{ $reservacion->boat->name }} es de {{ $reservacion->boat->abordajeminimo }}
						personas.
					</td>
				</tr>
			</table>
		</td>
	@endif
	<td colspan="4" id="tablapagoOficina">
		<table class="table" id="pagoOficina">
			<tr class="success">
				<th colspan="2">
					<strong>
						Pagar En Nuestras Oficinas o Realice Transferencia.
					</strong>
				</th>
			</tr>
			<tr>
				<td>
					<strong>
						Monto Sin IVA: Bs.
					</strong>
				</td>
				<td>
					{{ $reservacion->montoSinIva}}
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						IVA: Bs.
					</strong>
				</td>
				<td>
					{{ $reservacion->montoIva}}
				</td>
			</tr>
			@if($creditoUsado>0)
				<tr>
					<td>
						<strong>Giftcard: Bs. </strong>
					</td>
					<td>
						{{ number_format($creditoUsado, 2, ',', '.')." Bs." }}
					</td>
				</tr>

				<tr>
					<td>
						<strong>
							Saldo Final Cliente: Bs.
						</strong>
					</td>
					<td>
						{{ number_format($reservacion->client->credit, 2, ',', '.')." Bs." }}
					</td>
				</tr>
			@endif
			<tr>
				<td>
					<strong>
						Total: Bs.
					</strong>
				</td>
				<td>
					{{ $reservacion->montoTotalAPagarEscrito }}
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						Cuenta Corriente:
					</strong>
				</td>
				<td>
					Banesco: 0134-0348-18-3481078323
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						A nombre de:
					</strong>
				</td>
				<td>
					<strong>
						Puertorinoco Catamaran,c.a.
					</strong>
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						R.I.F.
					</strong>
				</td>
				<td>
					J-29704016-1
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="6">
		<strong>
			Para que esta reservación sea válida, debe cancelar el monto indicado en las próximas 24 Horas, de
			lo contrario será anulada.
		</strong>
	</td>
</tr>
<tr>
	<td colspan="6">
		Puede pagar en nuestras oficinas ubicadas en la Av. Las Américas, Edif. Amazonas, Mz. 1 Ofc. 4. Con
		cheque conformable, o tarjeta de débito o con una trasferencia o depósito en la cuenta bancaria:
	</td>
</tr>
<tr>
	<td colspan="6">
		Notificar su depósito, transferencia o pago con Gift Card a través de los numeros telefonicos:
		0286-923-3147/0286-923-5289
		<a href="mailto:info@puertorinoco.com">
			info@puertorinoco.com
		</a>
	</td>
</tr>
<tr>
	<td colspan="6" id="mini">
		<strong>
			ATENCION:
		</strong></br>
		Les informamos que PUERTORINOCO CATAMARAN C.A. es una empresa privada que opera como concesionario,
		parcialmente en el Club privado, CLUB NAUTICO CARONI. Como contraprestaci&oacute;
		n al Servicio del Catamarán, el Club ha decidido cobrar a nuestros usuarios en la puerta del Club, las
		siguientes cantidades:
	</td>
</tr>
<tr class="hidden-print">
	<th colspan="3">
		<strong>
			Temporada Alta:
		</strong>
	</th>
	<th colspan="3">
		<strong>
			Temporada Baja:
		</strong>
	</th>
</tr>
<tr class="hidden-print">
	<td colspan="3">
		Adultos: de 12 a 60
		años,  {{ Variable::where('name','=','adultosPagoClubTemporadaAlta')->first()->value }} Bs.</br>
		Niños: de 6 A 11 años y mayores de 60
		años, {{ Variable::where('name','=','ninosymayoresPagoClubTemporadaAlta')->first()->value }} Bs.</br>
		Niños: de 1 A 5 años (1 por grupo de 5 personas) Gratis.
	</td>
	<td colspan="3">
		Adultos: de 12 a 60
		años, {{ Variable::where('name','=','adultosPagoClubTemporadaBaja')->first()->value }} Bs.</br>
		Niños: de 6 A 11 años y mayores de 60
		años, {{ Variable::where('name','=','ninosymayoresPagoClubTemporadaBaja')->first()->value }} Bs.</br>
		Niños: de 1 A 5 años (1 por grupo de 5 personas) Gratis.
	</td>
</tr>
<tr class="hidden-print">
	<td colspan="6">
		El pago de esa tarifa al Club le permite a usted y a su grupo familiar, utilizar todas las instalaciones
		del Club ( Piscinas, Canchas, restaurantes, sal&oacute;n de juegos, Masajes etc ) el d&iacute;
		a de su viaje.
	</td>
</tr>