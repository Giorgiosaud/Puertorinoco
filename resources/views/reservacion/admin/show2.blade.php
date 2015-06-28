@extends('templates.mainInterno')
@section('content')
    <style>
        [v-cloak] { display: none }
    </style>
    <div id="reservaciones" class="container-fluid">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Email address</label>
            <input v-model="search" name="search" placeholder="Escriba para Buscar" class="form-control">
        </div>
        <div class="table-responsive">

            <table class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th v-repeat="headers"><a href="#" v-on="click: sortBy(nombreReferencia)">@{{nombreColumna}}</a>
                    </th>
                </tr>
                </thead>
                <thead>
                <tr>
                    <th v-repeat="headers"><a href="#" v-on="click: sortBy(nombreReferencia)">@{{nombreColumna}}</a>
                    </th>
                </tr>
                </thead>

                <tr v-repeat="reservaciones
            | orderBy sortKey reverse
            | filterBy search
            |embarcacion Lancha" v-show="">
                    <td>@{{ id }}</td>
                    <td>@{{ nombre | capitalize }}</td>
                    <td>@{{ apellido | capitalize }}</td>
                    <td>@{{ telefono }}</td>
                    <td>@{{ adultos }}</td>
                    <td>@{{ mayores }}</td>
                    <td>@{{ ninos }}</td>
                    <td>@{{ cuposTotales  }}</td>
                    <td>@{{ montoTotal }}</td>
                    <td>@{{ deudaRestante }}</td>
                    <td>@{{ hechoPor }}</td>
                    <td>@{{ modificadoPor }}</td>
                    <td>@{{ fecha }}</td>
                    <td>@{{ hora }}</td>
                    <td>@{{ embarcacion }}</td>
                    <td>@{{ horaOrden }}</td>

                </tr>
            </table>

        </div>
    <pre>
        {{--@{{ $data | json}}--}}
{{--        @{{ $computed | json}}--}}
    </pre>
        {{--@if($reservaciones->count()>0)--}}
        {{--<div class="table-responsive">--}}
        {{--<table class="table table-bordered table-hover table-condensed">--}}
        {{--<tr>--}}
        {{--<th colspan="13"--}}
        {{--class="info text-center">{{ $fecha=$reservaciones[0]->fecha->format('d-m-Y') }}</th>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<th colspan="13"--}}
        {{--class="info text-center">{{ $embarcacion=$reservaciones[0]->embarcacion->nombre }}</th>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<th colspan="13" class="info text-center">{{ $paseo=$reservaciones[0]->paseo->horaDeSalida}}</th>--}}
        {{--</tr>--}}
        {{--@include('reservacion.admin.partials.headersTabla')--}}

        {{--@foreach($reservaciones as $reservacion)--}}
        {{--@if($embarcacion != $reservacion->embarcacion->nombre)--}}

        {{--<tr>--}}
        {{--<th colspan="13" class="info text-center">{{ $embarcacion=$reservacion->embarcacion->nombre--}}
        {{--}}</th>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<th colspan="13" class="info text-center">{{ $paseo=$reservacion->paseo->horaDeSalida}}</th>--}}
        {{--</tr>--}}
        {{--@include('reservacion.admin.partials.headersTabla')--}}
        {{--@endif--}}
        {{--@if($paseo != $reservacion->paseo->horaDeSalida)--}}
        {{--<tr>a</tr>--}}
        {{--<tr>--}}
        {{--<th colspan="13" class="info text-center">{{ $paseo=$reservacion->paseo->horaDeSalida}}</th>--}}
        {{--</tr>--}}
        {{--@include('reservacion.admin.partials.headersTabla')--}}

        {{--@endif--}}

        {{--<tr onclick="window.open('{{ URL::route('editarReservas',$reservacion->id,true)}}')">--}}
        {{--<td>{!!$reservacion->id!!}</td>--}}
        {{--<td>{!!$reservacion->cliente->nombre!!}</td>--}}
        {{--<td>{!!$reservacion->cliente->apellido!!}</td>--}}
        {{--<td>{!!$reservacion->cliente->telefono!!}</td>--}}
        {{--<td>{!!$reservacion->adultos!!}</td>--}}
        {{--<td>{!!$reservacion->mayores!!}</td>--}}
        {{--<td>{!!$reservacion->ninos!!}</td>--}}
        {{--<td>{!!$total=$reservacion->ninos+$reservacion->mayores+$reservacion->adultos!!}</td>--}}
        {{--<td>{!!$reservacion->montoTotalAPagar!!}</td>--}}
        {{--<td>{!!$reservacion->montoDeudaRestante!!}</td>--}}
        {{--<td>{!!$reservacion->hechoPor!!}</td>--}}
        {{--<td>{!!$reservacion->modificadoPor!!}</td>--}}
        {{--</tr>--}}

        {{--@endforeach--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--@else--}}
        {{--<h1>No Existen Reservas con los datos suministrados</h1>--}}
        {{--@endif--}}

    </div>
@endsection
@section('footer')
    @include('reservacion.admin.partials.vuejs')
@endsection