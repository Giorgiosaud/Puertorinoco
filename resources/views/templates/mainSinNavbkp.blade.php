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

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
@include('flash::message')
@yield('carrusel')
<div class="container">
	<ul class="language_bar_chooser">
		@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
			<li>
				<a rel="alternate" hreflang="{{$localeCode}}"
				   href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
					{!!$localeCode!!}
				</a>
			</li>
		@endforeach
	</ul>
</div>
@yield('content')

<!-- Scripts -->
<script src="{!! elixir('js/all.js') !!}"></script>
</body>
</html>
