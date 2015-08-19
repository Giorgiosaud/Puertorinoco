<div class="container">

<div class="row">
    <div class="col s12">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{!!$error!!}</li>
                @endforeach
                <li>{!!$errors->count()!!}</li>
            </ul>
        @endif

    </div>
</div>
<div class="row">


    {!!Form::open([
    'id' => 'formularioDeReserva',
    'role'=>'form',
    'method'=>'POST',
    'class'=>'form-horizontal',
    'name'=>'formularioDeReserva',
    'novalidate'])
    !!}
    @if($errors->any())
        {!!Form::hidden('errores','hayErrores')!!}
    @endif
    @include('reservacion.assets.formulario.datosDelPaseo')
    @include('reservacion.assets.formulario.datosDePrecios')
    @include('reservacion.assets.formulario.datosPersonales')
    @include('reservacion.assets.formulario.datosDeCupo')
    @include('reservacion.assets.formulario.datosSaldosyMontos')
    @include('reservacion.assets.formulario.datosCondicionesyServicios')
    @include('reservacion.assets.formulario.datosDeSubmit')
</div>
<!-- Fecha Form Input -->




{!!Form::close()!!}
<div class="clearfix"></div>
</div>

</div>