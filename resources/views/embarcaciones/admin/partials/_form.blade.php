<div class="row">
	<div class="col s12">
		<div class="card blue darken-1 white-text">
			<div class="card-content">
				<div class="row"><span class="card-title">{!!$titulo!!}</span></div>
				<div class="row">
					<div class="col s12 m6">
						{!! Form::label('nombre', 'Nombre de la Embarcacion: ',['class'=>'white-text']) !!}
						{!! Form::text('nombre') !!}	
					</div>
					<div class="col s12 m6">
						{!! Form::label('orden', 'Orden a Mostrar Embarcacion: ',['class'=>'white-text']) !!}
						{!! Form::text('orden') !!}
					</div>
					<div class="col s12 m6">
						{!!	Form::label('abordajeMinimo', 'Minimo de Personas para Abordar: ',['class'=>'white-text']) !!}
						{!! Form::text('abordajeMinimo') !!}
					</div>
					<div class="col s12 m6">
						{!! Form::label('abordajeNormal', 'Cupos Publico en General Disponibles para Reservar: ',['class'=>'white-text']) !!}
						{!!Form::text('abordajeNormal') !!}
					</div>
					<div class="col s12 m6">
						{!! Form::label('abordajeMaximo', 'Maximo posible para Reservar: ',['class'=>'white-text']) !!}
						{!! Form::text('abordajeMaximo') !!}
					</div>
					<div class="col s12 m6">
						{!!	Form::label('publico', 'Embarcacion de uso Público: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text" class="white-text">
								No
								{!! Form::checkbox('publico',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Si
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col s12">
		<div class="card blue darken-1">
			<div class="card-content">
				<div class="row"><span class="card-title">Dias Disponibles a la Semana</span></div>
				<div class="row">
					{!! Form::hidden('lunes',0)!!}
					{!! Form::hidden('martes',0)!!}
					{!! Form::hidden('miercoles',0)!!}
					{!! Form::hidden('jueves',0)!!}
					{!! Form::hidden('viernes',0)!!}
					{!! Form::hidden('sabado',0)!!}
					{!! Form::hidden('domingo',0)!!}
					<div class="col s4 m4">
						{!!Form::label('lunes', 'Lunes: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('lunes',1,false,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
					<div class="col s4 m4">
						{!!Form::label('martes', 'Martes: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('martes',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
					<div class="col s4 m4">
						{!!Form::label('miercoles', 'Miercoles: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('miercoles',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
					<div class="col s4 m4">
						{!!Form::label('jueves', 'Jueves: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('jueves',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
					<div class="col s4 m4">
						{!!Form::label('viernes', 'Viernes: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('viernes',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
					<div class="col s4 m4">
						{!!Form::label('sabado', 'Sabado: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('sabado',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
					<div class="col s4 m4">
						{!!Form::label('domingo', 'Domingo: ',['class'=>'white-text']) !!}
						<div class="switch">
							<label class="white-text">
								Inactivo
								{!! Form::checkbox('domingo',1,null,['class'=>'btswitch'])!!}
								<span class="lever"></span>
								Activo
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12 center-align">
		<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
			{{$submit}}
		</button>
	</div>
</div>
</div>
