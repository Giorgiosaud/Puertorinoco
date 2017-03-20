@extends('templates.mainInterno')
@section('content')

		<div class="table-responsive">
			{!!Table::withContents($TiposDepaseosTableStyle)
			->callback('Accion', function ($field, $row) {
			return Button::primary('Editar '.$row['Nombre'])->asLinkTo(route('PanelAdministrativo.tipoDePaseo.edit', $row['Id']))->block();
			})
			->callback('Borrar', function ($field, $row) {
			$return=Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['PanelAdministrativo.tipoDePaseo.destroy', $row['Id']]]);
			$return.=Form::Submit('Borrar ',[ 'class' => 'btn btn-danger']);
			$return.=Form::close();

			return $return;


			})
			->hover()->render()
			!!}

		</div>
		{!!Button::primary('Nuevo Tipo de Paseo')->asLinkTo(route('PanelAdministrativo.tipoDePaseo.create'))->block()!!}

@endsection
