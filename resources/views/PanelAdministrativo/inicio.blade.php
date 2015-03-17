@extends('templates.mainInterno')
@section('content')
	<div class="container">
		<div class="jumbotron">
			<div class="container">
				<h1>
					<h1>Hola, Bienvenid@ {{ Auth::user()->nombre }} al sistema de Reservas de Puertorinoco</h1>
					<h2>Aqui podras administrar las reservas realizadas</h2>


				</h1>
			</div>
		</div>
	</div>
@endsection
