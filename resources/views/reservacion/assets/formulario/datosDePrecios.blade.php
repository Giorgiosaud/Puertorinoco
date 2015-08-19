<div class="row" id="datosdePrecios">
	<div class="row" id="contnedorPrecios">
		<label class="col s4" for="precios">{!!Lang::get('formulario.Precios Por Persona:')!!} </label>

		<div id="precios" class="col s8">
			<div class="col s4">
				<div class="col s12">{!!Lang::get('formulario.Adultos')!!}: </div>

				<p class="col s12 precios"><span id="precioAdultos"></span></p>
			</div>
			<div class="col s4">
				<div class="col s12">{!!Lang::get('formulario.Mayores')!!}: </div>

				<p class="col s12 precios" id="precioMayores"><span id="precioMayores"></span></p>
			</div>
			<div class="col s4">
				<div class="col s12">{!!Lang::get('formulario.Niños')!!}: </div>

				<p class="col s12 precios" id="precioNinos"><span id="precioNinos"></span></p>
			</div>
		</div>
	</div>
</div>