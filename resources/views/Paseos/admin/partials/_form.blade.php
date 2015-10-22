@inject('embarcaciones','App\Embarcacion')
@inject('tiposDePaseos','App\TipoDePaseo')
<div class="row">
	<div class="col s12">
		<div class="card blue darken-1 white-text">
			<div class="card-content">
				<div class="row"><span class="card-title">{!!$titulo!!}</span></div>
				<div class="row">
					<div class="col m6 s12">
						{!! Form::label('nombre', 'Nombre del Paseo: ') !!}
						{!! Form::text('nombre') !!}
					</div>
					<div class="col m6 s12">
						{!! Form::label('horaDeSalida', 'hora de Salida Paseo: ') !!}
						{!! Form::text('horaDeSalida') !!}
					</div>
					<div class="col s12">
						{!! Form::label('descripcion', 'Descripcion del Paseo: ') !!}
						{!! Form::text('descripcion') !!}
					</div>
					<div class="col m6 s12">
						{!! Form::label('orden', 'Orden a Mostrar Paseo: ') !!}
						{!! Form::text('orden') !!}
					</div>
					<div class="col s12">
						{!! Form::label('tipo_de_paseo_id', 'Tipo de Paseo: ') !!}
						{!! Form::select('tipo_de_paseo_id',$tiposDePaseos->lists('nombre','id'),null,['class'=>'multiselector']) !!}
					</div>
					<div class="col s12">
						{!! Form::label('lista_de_embarcaciones', 'Embarcaciones: ') !!}
						{!! Form::select('lista_de_embarcaciones[]',$embarcaciones->lists('nombre','id'),null,['class'=>'multiselector','multiple']) !!}
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
                {!! Form::hidden('lunes',0)!!}
                {!! Form::hidden('martes',0)!!}
                {!! Form::hidden('miercoles',0)!!}
                {!! Form::hidden('jueves',0)!!}
                {!! Form::hidden('viernes',0)!!}
                {!! Form::hidden('sabado',0)!!}
                {!! Form::hidden('domingo',0)!!}
                {!! Form::hidden('publico',0)!!}

                <div class="row">
                    <div class="col s4 m4">
                        {!!Form::label('piblico', 'Publico: ',['class'=>'white-text']) !!}
                        <div class="switch">
                            <label class="white-text">
                                Privado
                                {!! Form::checkbox('publico',1,null,['class'=>'btswitch'])!!}
                                <span class="lever"></span>
                                Publico
                            </label>
                        </div>
                    </div>
                </div>
				<div class="row">

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