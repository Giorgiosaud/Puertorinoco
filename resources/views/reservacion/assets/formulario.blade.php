<div class="container-fluid">
	<div class="col-xs-12">
		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
					<li>{!!$error!!}</li>
				@endforeach
				<li>{!!$errors->count()!!}</li>
			</ul>
		@endif

		{!!Form::open([
		'id' => 'formularioDeReserva',
		'role'=>'form',
		'method'=>'POST',
		'class'=>'form-horizontal',
		'name'=>'formularioDeReserva'])
		!!}
		@if($errors->any())
			{!!Form::hidden('errores','hayErrores')!!}
			@endif

					<!-- Fecha Form Input -->
			<div class="jumbotron col-xs-12" id="loadingFormulario">
				<h1>{!!Lang::get('formulario.cargando')!!}<span class="cargandoFormulario glyphicon glyphicon-refresh
			glyphicon-refresh-animate"></span></h1>

				<div class="clearfix"></div>
			</div>
			@include('reservacion.assets.formulario.datosDelPaseo')
			@include('reservacion.assets.formulario.datosDePrecios')
			@include('reservacion.assets.formulario.datosPersonales')
			@include('reservacion.assets.formulario.datosDeCupo')
			@include('reservacion.assets.formulario.datosSaldosyMontos')
			@include('reservacion.assets.formulario.datosCondicionesyServicios')
			@include('reservacion.assets.formulario.datosDeSubmit')


			{!!Form::close()!!}
			<div class="clearfix"></div>
	</div>

</div>