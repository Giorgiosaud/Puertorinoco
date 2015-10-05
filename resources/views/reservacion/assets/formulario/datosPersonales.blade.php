<div class="row" id="datosPersonales">
    <div class="row" id="cedulaForm">

        <label class="col s3 control-label" for="rifInicio">
            Identificacion:
        </label>

        <div class="col s3">
            {!!Form::select('rifInicio',array('V'=>'V','E'=>'E','J'=>'J','G'=>'G','E'=>'E','P'=>'Pasaporte'),'V',[
            'class'=>'col s12','id'=>'rifInicio'
            ])!!}
            {!! Form::label('rifInicio', 'Cedula: ') !!}
        </div>
        <div class="col s5">
            {!! Form::text('identificacion_number',Input::old('identificacion_number'),[
                'id'=>"identification",
                'placeholder'=>'Numero',
                'class'=>'form-control tienepopover',
                'data-container'=>'body',
                'data-toggle'=>'popover',
                'data-placement'=>'right',
                'data-content'=>'Ingrese solo su número de cedula o rif Válido',
                'data-original-title'=>"Introduzca Su Cedula"]
                ) !!}
        </div>
        <div class="col s1">
            <button class="btn btn-success" id="validarId" type="button">
                <i class="material-icons medium">done</i>
            </button>
        </div>
        {!! Form::hidden('identificacion',null,['id'=>'identificacion']) !!}
    </div>
    <div class="col s12" id="datosInternosCliente">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                {!! Form::text('nombre',Input::old('nombre'),['id'=>'nombre'])!!}
                {!! Form::label('nombre', 'Nombre: ') !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                {!! Form::text('apellido',Input::old('apellido'),['id'=>'apellido'])!!}
                {!! Form::label('apellido', 'Apellido: ') !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                {!! Form::email('email',Input::old('email'),['id'=>'email'])!!}
                {!! Form::label('email', 'Email: ') !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                {!! Form::text('telefono',Input::old('telefono'),['id'=>'telefono'])!!}
                {!! Form::label('telefono', 'Telefono: ') !!}
            </div>
        </div>
    </div>
</div>
