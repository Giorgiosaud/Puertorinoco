<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	@include('templates.assets.headers')
	<title>@yield('titulo','Catamaran Puertorinoco')</title>

	<link href="{!! elixir('css/all.css') !!}" rel="stylesheet">

	<!-- Fonts -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
@include('templates.assets.navInterno')
@yield('carrusel')
<div class="container-fluid">
    @include('flash::message')
	@yield('content')
</div>

<!-- Scripts -->
</body>
<footer>
	<script src="{!! elixir('js/all.js') !!}"></script>

	@yield('footer')
</footer>
</html>
