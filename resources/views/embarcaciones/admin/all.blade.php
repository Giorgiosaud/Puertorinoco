@extends('templates.mainInterno')
@section('content')
	<div class="table-responsive">
		{!!Table::withContents($embarcacionesTableStyle)
		->callback('Accion', function ($field, $row) {
		return Button::primary('Editar '.$row['Nombre'])->asLinkTo(route('PanelAdministrativo.embarcaciones.edit', $row['Id']))->block();
		})
		->callback('Borrar', function ($field, $row) {
		$return=Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['PanelAdministrativo.embarcaciones.destroy', $row['Id']]]);
		$return.=Form::Submit('Borrar ',[ 'class' => 'btn btn-danger']);
		$return.=Form::close();

		return $return;


		})
		->callback('Público',function($field,$row){
		if($row['Público']==1){
		return 'Activo';
		}
		return 'Inactivo';
		})
		->callback('Lunes',function($field,$row){
		if($row['Lunes']==1){
		return 'Activo';
		}

		return 'Inactivo';


		})
		->callback('Martes',function($field,$row){
		if($row['Martes']==1){
		return 'Activo';
		}
		return 'Inactivo';

		})
		->callback('Miercoles',function($field,$row){
		if($row['Miercoles']==1){
		return 'Activo';
		}
		return 'Inactivo';

		})
		->callback('Jueves',function($field,$row){
		if($row['Jueves']==1){
		return 'Activo';
		}
		return 'Inactivo';
		})
		->callback('Viernes',function($field,$row){
		if($row['Viernes']==1){
		return 'Activo';
		}
		return 'Inactivo';
		})
		->callback('Sábado',function($field,$row){
		if($row['Sábado']==1){
		 return 'Activo';
		}
		return 'Inactivo';

		})
		->callback('Domingo',function($field,$row){
		if($row['Domingo']==1){
		return 'Activo';
		}
		return='Inactivo';
		})
		->hover()->render()
		!!}

	</div>
	{!!Button::primary('Nueva Embarcacion')->asLinkTo(route('PanelAdministrativo.embarcaciones.create'))->block()!!}
@endsection
