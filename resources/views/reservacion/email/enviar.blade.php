<html>
<body>
	<script type="application/ld+json">
		{
  "@context": "http://schema.org",
  "@type": "EventReservation",
  "reservationNumber": "{!! $reservacion->id!!}",
  "modifiedTime":"{!!$reservacion->created_at!!}",
  "modifyReservationUrl":"http://www.puertorinoco.com",
  "reservationStatus": "http://schema.org/Confirmed",
  "underName": {
  	"@type": "Person",
  	"name": "{!! $reservacion->cliente->nombre!!} {!! $reservacion->cliente->apellido!!}"
  },
  "reservationFor": {
  	"@type": "Event",
  	"name": "Paseo En {!! $reservacion->embarcacion->nombre!!} a las {!!$reservacion->paseo->horaDeSalida!!}",
  	"startDate": "{!!$reservacion->fecha->format('Y-m-d')!!}{!!$reservacion->paseo->HoraSalidaToEvent!!}",
  	"performer":"{!! $reservacion->cliente->nombre!!} {!! $reservacion->cliente->apellido!!}",
  	"location": {
  		"@type": "Place",
  		"name": "Casa Bote",
  		"address": {
  			"@type": "PostalAddress",
  			"streetAddress": "Club Nautico Caroni",
  			"addressLocality": "Ciudad Guayana",
  			"addressRegion": "BO",
  			"postalCode": "8050",
  			"addressCountry": "VE"
  		}
  	}
  }
}
</script>
@include('reservacion.assets.reservacionMail')

</html>
