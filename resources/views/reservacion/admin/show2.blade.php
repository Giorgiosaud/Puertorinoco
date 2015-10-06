@extends('templates.mainInterno')
@section('content')
<div id="reservaciones" ng-app="ReservacionesApp" class="container-fluid" ng-cloak>
    <div ng-controller="ControladorDeConsultaDeReservaciones" ng-cloak>
        <h1 ng-hide="reservacionesPorEmbarcacionyHora.length">No Hay Reservas</h1>
        <div ng-repeat="reservacionesPorEmbarcacion in reservacionesPorEmbarcacionyHora">

            <div ng-repeat="reservacionPorHora in reservacionesPorEmbarcacion" class="table-responsive"
            ng-init="reservacionPorHora.totales={}">

            <table class="bordered striped highlight centered responsive-table">
                <tr >
                    <th colspan="@{{ headers.length}}" class="center-align blue lighten-3" >
                        @{{obtenerEmbarcacion(reservacionesPorEmbarcacion)}}
                    </th>
                </tr>
                <tr>
                    <th colspan="@{{ headers.length}}" class="center-align blue lighten-4">
                        @{{obtenerPaseo(reservacionPorHora)}}
                    </th>
                </tr>
                <tr>
                    <th ng-repeat="cabecera in headers">
                        @{{cabecera}}
                    </th>
                </tr>
                <tr ng-repeat="reservacion in reservacionPorHora"
                ng-init="
                reservacionPorHora.totales.totalCupos=reservacionPorHora.totales.totalCupos+reservacion.totalCupos;
                reservacionPorHora.totales.adultos=reservacionPorHora.totales.adultos+reservacion.adultos;
                reservacionPorHora.totales.mayores=reservacionPorHora.totales.mayores+reservacion.mayores;
                reservacionPorHora.totales.ninos=reservacionPorHora.totales.ninos+reservacion.ninos;

                ">
                <td><a href="@{{ reservacion.url }}" target="_blank">@{{ reservacion.id}}</a></td>
                <td>@{{ reservacion.cliente.nombre}}</td>
                <td>@{{ reservacion.cliente.apellido}}</td>
                <td>@{{ reservacion.cliente.telefono}}</td>
                <td>@{{ reservacion.adultos}}</td>
                <td>@{{ reservacion.mayores}}</td>
                <td>@{{ reservacion.ninos}}</td>
                <td>@{{ reservacion.totalCupos}}</td>
                <td>@{{ reservacion.montoTotal | currency}}</td>
                <td>@{{ reservacion.pagado | currency}}</td>
                <td>@{{ reservacion.deuda | currency}}</td>
                <td>@{{ reservacion.hechoPor}}</td>
                <td>@{{ reservacion.modificadoPor}}</td>
            </tr>
            <tfoot>
                <tr class="center-align blue lighten-2">
                    <td colspan="4">
                        Totales
                    </td>
                    <td>
                        @{{ reservacionPorHora.totales.adultos}}
                    </td>
                    <td>
                        @{{ reservacionPorHora.totales.mayores}}
                    </td>
                    <td>

                        @{{ reservacionPorHora.totales.ninos}}
                    </td>
                    <td colspan="@{{ headers.length}}" >

                        @{{ reservacionPorHora.totales.totalCupos}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
</div>
@endsection
@section('footer')
@stop
