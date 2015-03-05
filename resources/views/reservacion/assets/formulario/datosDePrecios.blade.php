<div class="form-group" id="datosdePrecios">
	<div class="form-group" id="contnedorPrecios">
		<label class="col-xs-4 control-label" for="precios">{!!Lang::get('formulario.Precios Por Persona:')!!} </label>

		<div id="precios" class="col-xs-8">
			<div class="col-xs-4">
				<label for="Adultos" class="col-xs-12 control-label">{!!Lang::get('formulario.Adultos')!!}: </label>

				<p class="form-control-static col-xs-12 precios"><span id="precioAdultos"></span></p>
			</div>
			<div class="col-xs-4">
				<label for="3eraEdad" class="col-xs-12 control-label">{!!Lang::get('formulario.Mayores')!!}: </label>

				<p class="form-control-static col-xs-12 precios" id="precioMayores"><span id="precioMayores"></span></p>
			</div>
			<div class="col-xs-4">
				<label for="ninos" class="col-xs-12 control-label">{!!Lang::get('formulario.Niños')!!}: </label>

				<p class="form-control-static col-xs-12 precios" id="precioNinos"><span id="precioNinos"></span></p>
			</div>
		</div>
	</div>
</div>