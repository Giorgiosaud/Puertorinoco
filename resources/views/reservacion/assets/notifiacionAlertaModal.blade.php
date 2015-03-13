
<div class="modal fade" id="advertencias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Advertencias</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-success">
					<span class="glyphicon glyphicon-thumbs-up"></span> Niños <strong>hasta 4 años</strong> Pasean
					gratis.
				</div>
				<div class="alert alert-warning" id="minimoPasajerosZarpe">
					<span class="glyphicon glyphicon-bullhorn"></span>
					Para zarpar se requiere un <strong> mínimo de ocho (8) pasajeros.</strong>
				</div>
				<div class="alert alert-danger" id="minimoPasajerosZarpe">
					<strong>ATENCION:</strong><br>
					<span class="glyphicon glyphicon-bullhorn"></span>
					<ol>
						<li>Debe Confirmar su asistencia en la barra de la Casabote al menos<strong> 30 minutos antes
							</strong> de la hora del zarpe.
						</li>
						<li>Les informamos que PUERTORINOCO CATAMARAN C.A. es una empresa privada que opera como
							concesionario,
							parcialmente en el Club privado CLUB NAUTICO CARONI. Como contraprestació
							n al Servicio del Catamarán, el Club ha decidido cobrar a nuestros usuarios en la puerta del
							Club,
							las siguientes cantidades:
						</li>
					</ol>

				</div>

				<div class="panel-group" id="PreciosClub">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#PreciosClub" href="#temporadaAlta">
									Temporada Alta:
								</a>
							</h4>
						</div>
						<div id="temporadaAlta" class="panel-collapse collapse @if(Vari::get('temporadaBaja')==0) in @endif ">
							<div class="panel-body">
								<ol>
									<li>
										Adultos: de 12 a 60 años, Bs. {!!Vari::get('adultosPagoClubTemporadaAlta')!!}
									</li>
									<li>
										Niños: de 6 A 11 años y mayores de 60 años, Bs.
										{!!Vari::get('ninosymayoresPagoClubTemporadaAlta')!!}
									</li>
									<li>
										Niños: de 1 A 5 años (1 por grupo de 5 personas) Gratis.
									</li>
								</ol>
							</div>
						</div>
					</div>
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#PreciosClub" href="#temporadaBaja">
									Temporada Baja:
								</a>
							</h4>
						</div>
						<div id="temporadaBaja" class="panel-collapse collapse  @if(Vari::get('temporadaBaja')) in @endif  ">
							<div class="panel-body">
								<ol>
									<li>
										Adultos: de 12 a 60 años, Bs. {!!Vari::get('adultosPagoClubTemporadaBaja')!!}
									</li>
									<li>
										Niños: de 6 A 11 años y mayores de 60 años, Bs.
										{!!Vari::get('ninosymayoresPagoClubTemporadaBaja')!!}
									</li>
									<li>
										Niños: de 1 A 5 años (1 por grupo de 5 personas) Gratis.
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>