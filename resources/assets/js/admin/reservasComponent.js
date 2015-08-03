var ReservacionesApp = angular.module('ReservacionesApp', []);
ReservacionesApp.controller('ControladorDeConsultaDeReservaciones', function ($scope, $http) {
    $scope.headers = ['Id', 'Nombre', 'Apellido', 'Telefono', 'Adultos', 'Mayores', 'Niños', 'Total Cupos En Reserva','Total', 'Pagado', 'Deuda', 'Hecha Por', 'Modificada Por'];
    $scope.reservacionesPorEmbarcacionyHora=reformatReservas(reservacionesPorEmbarcacionyHora);
    $scope.embarcaciones=embarcaciones;
    $scope.horarios=horarios;
    $scope.obtenerEmbarcacion=function(reservacionesPorEmbarcacion){
        return reservacionesPorEmbarcacion[Object.keys(reservacionesPorEmbarcacion)[0]][0].embarcacion.nombre;
    };
    $scope.obtenerPaseo=function(reservacionPorHora){
        return reservacionPorHora[0].paseo.horaDeSalida;

    };
    function getMontoPagado(reservacion){
        var montoPagado=0;
        reservacion.pagos.forEach(function(pago){
           montoPagado+=pago.monto;
        });
        return montoPagado;
    }
    function reformatReservas(reservacionesPorEmbarcacionyHora) {

        reservacionesPorEmbarcacionyHora.forEach(function (reservacionesPorHora) {
            Object.keys(reservacionesPorHora).forEach(function(key){
                reservacionesPorHora[key].forEach(function(reservacion){
                    reservacion.pagado = getMontoPagado(reservacion);
                    reservacion.deuda = reservacion.montoTotal - reservacion.pagado;
                    reservacion.fecha=reservacion.fecha.substring(0, 10);
                    reservacion.totalCupos=reservacion.adultos+reservacion.mayores+reservacion.ninos;
                    reservacion.url=editurl.replace("%7Bidreserva%7D",reservacion.id)
                });
            });
        });
        return reservacionesPorEmbarcacionyHora;
    };
});






