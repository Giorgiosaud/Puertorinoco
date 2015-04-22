@extends('templates.mainInterno')
@section('content')

		<div class="table-responsive">
			{!!Table::withContents($fechasEspecialesTableStyle)
			->callback('Accion', function ($field, $row) {
			return Button::primary('Editar el '.$row['Fecha'])->asLinkTo(route('PanelAdministrativo.fechasEspeciales.edit', $row['Id']))->block();
			})
			->callback('Borrar', function ($field, $row) {
			$return=Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['PanelAdministrativo.fechasEspeciales.destroy', $row['Id']]]);
			$return.=Form::Submit('Borrar ',[ 'class' => 'btn btn-danger']);
			$return.=Form::close();

			return $return;


			})
			->hover()->render()
			!!}

		</div>
		{!!Button::primary('Nueva Fecha')->asLinkTo(route('PanelAdministrativo.fechasEspeciales.create'))->block()!!}
@endsection
