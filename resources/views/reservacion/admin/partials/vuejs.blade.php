<script>
    var reservaciones = new Vue({
        el: '#reservaciones',
        data: {
            sortKey: '',
            reverse: false,
            headers: [
                {
                    nombreColumna: "Id",
                    nombreReferencia: 'id'
                },
                {
                    nombreColumna: "Nombre",
                    nombreReferencia: 'nombre'
                },
                {
                    nombreColumna: "Apellido",
                    nombreReferencia: 'apellido'
                },
                {
                    nombreColumna: "Telefono",
                    nombreReferencia: 'telefono'
                },
                {
                    nombreColumna: "Adultos",
                    nombreReferencia: 'adultos'
                },
                {
                    nombreColumna: "Mayores",
                    nombreReferencia: 'mayores'
                },
                {
                    nombreColumna: "Niños",
                    nombreReferencia: 'ninos'
                },
                {
                    nombreColumna: "Cupos Totales",
                    nombreReferencia: 'montoTotal'
                },
                {
                    nombreColumna: "Monto Total",
                    nombreReferencia: 'deudaRestante'
                },
                {
                    nombreColumna: "Deuda Restante",
                    nombreReferencia: 'id'
                },
                {
                    nombreColumna: "Hecha Por",
                    nombreReferencia: 'hechoPor'
                },
                {
                    nombreColumna: "Modificada Por",
                    nombreReferencia: 'modificadoPor'
                },
                {
                    nombreColumna: "Fecha",
                    nombreReferencia: 'fecha'
                },
                {
                    nombreColumna: "Hora",
                    nombreReferencia: 'hora'
                },
                {
                    nombreColumna: "Embarcacion",
                    nombreReferencia: 'embarcacion'
                },
                {
                    nombreColumna: "Orden",
                    nombreReferencia: 'horaOrden'
                },


            ],
            reservaciones: [
                @foreach($reservaciones as $reservacion)
                {
                    id:{!!$reservacion->id!!},
                    nombre: "{!!$reservacion->cliente->nombre!!}",
                    apellido: "{!!$reservacion->cliente->apellido!!}",
                    telefono: "{!!$reservacion->cliente->telefono!!}",
                    adultos:{!!$reservacion->adultos!!},
                    mayores:{!!$reservacion->mayores!!},
                    ninos:{!!$reservacion->ninos!!},
                    cuposTotales: "{!!$reservacion->totalPasajerosEnReserva!!}",
                    montoTotal: "{!!$reservacion->montoTotalAPagar!!}",
                    deudaRestante: "{!!$reservacion->montoDeudaRestante!!}",
                    hechoPor: "{!!$reservacion->hechoPor!!}",
                    modificadoPor: "{!!$reservacion->modificadoPor!!}",
                    fecha: "{!!$reservacion->fecha->formatLocalized('%D')!!}",
                    hora: "{!!$reservacion->paseo->horaDeSalida!!}",
                    embarcacion: "{!!$reservacion->embarcacion->nombre!!}",
                    horaOrden: "{!!$reservacion->paseo->orden!!}"

                },
                @endforeach
            ]


        },
        filters: {
            embarcacion: function (reservaciones, embarcacion) {
                return reservaciones.filter(function (reserva) {
                    return reserva.embarcacion == embarcacion;
                }.bind(this));
            }
        },
        methods: {
            sortBy: function (sortKey) {
                this.reverse = (this.sortKey == sortKey) ? !this.reverse : false;

                this.sortKey = sortKey;
            }
        },
        computed: {}
    });
</script>