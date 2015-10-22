process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.sass('sass.scss', 'resources/assets/css/sass.css')
    .less('less.less', 'resources/assets/css/less.css')
    .styles([
        'select2/dist/css/select2.min.css'
        ], 'resources/assets/css/vendor.css', 'vendor/bower_components')
    .styles([
        'sass.css',
        'less.css',
        'vendor.css'
        ])
    .browserify(
        'sweetalert/dev/sweetalert.es6.js',
        'resources/assets/js/sweetalert', 'vendor/bower_components')
    .scripts([
        'jquery/dist/jquery.js',
        'bootstrap-switch/dist/js/bootstrap-switch.js',
        'select2/dist/js/select2.js',
        'select2/dist/js/i18n/es.js',
        'select2/dist/js/i18n/pt-BR.js',
        'select2/dist/js/i18n/en.js',
        'angular/angular.min.js',
        'angular-ui-router/release/angular-ui-router.min.js',
        'ngAnimate/js/angular-animate.min.js',
        'ngLocale-ve/angular-locale_es-ve.js',
        'materialize/dist/js/materialize.js'
        ], 'resources/assets/js', 'vendor/bower_components')

    .scripts(['all.js','bundle.js', 'main.js'])

    .scripts([
            'all.js',
            'bundle.js',
            'admin/reservasComponent.js',
            'admin/controller/ControladorDeConsultaDeReservaciones.js',
            'admin/controller/editarEmbarcacionesController.js',
            'admin/controller/embarcacionesController.js',
            'admin/controller/loginController.js',
            'admin/directives/tableDirectives.js',
        'main.js', 
        ], 'public/js/admin.js')

    .version(['css/all.css', 'js/all.js', 'js/admin.js'])
    .copy('vendor/bower_components/materialize/font', 'public/assets/fonts')
    .copy('vendor/bower_components/bootstrap-sass-official/assets/fonts', 'public/assets/fonts')
    .copy('vendor/bower_components/fontawesome/fonts', 'public/assets/fonts/fontawesome')
//

});
