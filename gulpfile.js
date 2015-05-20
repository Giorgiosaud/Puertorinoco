var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.copy('vendor/bower_components/bootstrap-sass-official/assets/stylesheets', 'resources/assets/sass/bootstrap')
        .copy('vendor/bower_components/fontawesome/scss', 'resources/assets/sass/fontawesome')
        .copy('vendor/bower_components/bootstrap-sass-official/assets/images', 'resources/assets/sass/bootstrap')
        .copy('vendor/bower_components/jquery/dist', 'resources/js/jquery')
        .copy('vendor/bower_components/bootstrap-sass-official/assets/javascripts', 'resources/js/bootstrap')
        .copy('vendor/bower_components/bootstrap-datepicker/build', 'resources/assets/less/bootstrap-datepicker/buid')
        .copy('vendor/bower_components/bootstrap-datepicker/less', 'resources/assets/less/bootstrap-datepicker/less')
        .copy('vendor/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js', 'resources/js/bootstrap-datepicker/bootstrap-datepicker.js')
        .copy('vendor/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js', 'resources/js/bootstrap-datepicker/bootstrap-datepicker.es.js')
        .copy('vendor/bower_components/bootstrap-switch/src/less/bootstrap3', 'resources/assets/less/bootstrap-switch')

        .copy('vendor/bower_components/bootstrap-switch/src/coffee', 'resources/assets/coffee/bootstrap-switch')

        .sass('sass.scss', 'resources/css')
        .less('less.less', 'resources/css')
        .coffee('bootstrap-switch/bootstrap-switch.coffee', 'resources/js/bootstrap-switch')
        .scripts([
            'jquery/jquery.js',
            'bootstrap/bootstrap.js',
            'bootstrap-datepicker/bootstrap-datepicker.js',
            'bootstrap-datepicker/bootstrap-datepicker.es.js',
            'bootstrap-switch/bootstrap-switch.js',
            'select2/select2.js',
            'select2/i18n/es.js',
            'main.js',
        ],null,'resources/js')
        .styles([
            'less.css',
            'select2/select2.css',
            'sass.css',


        ],null,'resources/css')
        .version(['css/all.css', 'js/all.js'])
        .copy('vendor/bower_components/bootstrap-sass-official/assets/fonts', 'public/assets/fonts')
        .copy('vendor/bower_components/fontawesome/fonts', 'public/assets/fonts/fontawesome')


});
