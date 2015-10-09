	@include('templates.errors')
	<div class="row">
		{!!Form::horizontalModel($embarcacion,['url'=>URL::route('PanelAdministrativo.embarcaciones.update',$embarcacion->id),'role'=>'form','method'=>'PUT'])!!}
		@include('embarcaciones.admin.partials._form',['submit'=>'Modificar Embarcacion'])
		{!!Form::close()!!}
	</div>
