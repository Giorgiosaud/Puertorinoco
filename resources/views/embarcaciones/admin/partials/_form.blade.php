{!!
		ControlGroup::generate(
		Form::label('nombre', 'Nombre de la Embarcacion: '),
		Form::text('nombre')
		)
		!!}
{!!
ControlGroup::generate(
Form::label('orden', 'Orden a Mostrar Embarcacion: '),
Form::text('orden')
)
!!}
{!!
ControlGroup::generate(
Form::label('abordajeMinimo', 'Minimo de Personas para Abordar: '),
Form::text('abordajeMinimo')
)
!!}
{!!
ControlGroup::generate(
Form::label('abordajeNormal', 'Cupos Publico en General Disponibles para Reservar: '),
Form::text('abordajeNormal')
)
!!}
{!!
ControlGroup::generate(
Form::label('abordajeMaximo', 'Maximo posible para Reservar: '),
Form::text('abordajeMaximo')
)
!!}
<div class="checkbox">
	{!!Form::hidden('publico',0)!!}
	{!!
	ControlGroup::generate(
	Form::label('publico', 'Embarcacion de uso Público: '),
	Form::checkbox('publico',1,null,['class'=>'btswitch'])
	)
	!!}
</div>
<h2>Dias Disponibles a la Semana</h2>
<div class="form-group">
	<div class="checkbox col-xs-3">
		{!!Form::hidden('lunes',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('lunes', 'Lunes: '),
		Form::checkbox('lunes',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	<div class="checkbox col-xs-3">
		{!!Form::hidden('martes',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('martes', 'Martes: '),
		Form::checkbox('martes',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	<div class="checkbox col-xs-3">
		{!!Form::hidden('miercoles',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('miercoles', 'Miercoles: '),
		Form::checkbox('miercoles',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	<div class="checkbox col-xs-3">
		{!!Form::hidden('jueves',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('jueves', 'Jueves: '),
		Form::checkbox('jueves',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	<div class="checkbox col-xs-3">
		{!!Form::hidden('viernes',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('viernes', 'Viernes: '),
		Form::checkbox('viernes',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	<div class="checkbox col-xs-3">
		{!!Form::hidden('sabado',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('sabado', 'Sabado: '),
		Form::checkbox('sabado',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	<div class="checkbox col-xs-3">
		{!!Form::hidden('domingo',0)!!}
		{!!
		ControlGroup::generate(
		Form::label('domingo', 'Domingo: '),
		Form::checkbox('domingo',1,null,['class'=>'btswitch'])
		)
		!!}
	</div>
	{!!Button::primary($submit)->large()->block()->submit()!!}

</div>
