{!!Form::open(array('url'=>URL::route('variables.store'),'role'=>'form','files'=>true))!!}
<legend>Cree Su Variable</legend>
<!-- Nombre Form Input -->
<div class="form-group">
	{!! Form::label('nombre','Nombre')!!}
	{!!Form::text('nombre', null,['class'=>'form-control'])!!}
	@if ($errors->has('nombre'))
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			{!! $errors->first('nombre') !!}
		</div>
	@endif
</div>
<!-- Valor Form Input -->
<div class="form-group">
	{!! Form::label('valor','Valor')!!}
	{!!Form::text('valor', null,['class'=>'form-control'])!!}
	@if ($errors->has('valor'))
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			{!! $errors->first('valor') !!}
		</div>
	@endif
</div>
<!-- Imagen Form Input -->
<div class="form-group">
	{!! Form::label('imagen','Imagen')!!}
	{!!Form::file('imagen', null,['class'=>'form-control'])!!}
	@if ($errors->has('imagen'))
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			{!! $errors->first('imagen') !!}
		</div>
	@endif
</div>

{!!Form::submit('Crear',['class'=>"btn btn-primary"])!!}
{!!Form::close()!!}
