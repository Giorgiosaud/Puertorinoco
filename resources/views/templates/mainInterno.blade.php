<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    @include('templates.assets.headers')
    <title>@yield('titulo','Catamaran Puertorinoco')</title>

    <link href="{!! elixir('css/all.css') !!}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <!-- Scripts -->
</body>
<footer>
    <script src="{!! elixir('js/admin.js') !!}"></script>
    @yield('footer')

    @include('footer')


</footer>
</html>
