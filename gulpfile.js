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
        .copy('vendor/bower_components/bootstrap-sass-official/assets/images', 'resources/assets/sass/bootstrap')
        .copy('vendor/bower_components/jquery/dist', 'resources/js/jquery')
        .copy('vendor/bower_components/bootstrap-sass-official/assets/javascripts', 'resources/js/bootstrap')
        .copy('vendor/bower_components/bootstrap-datepicker/build', 'resources/assets/less/bootstrap-datepicker/buid')
        .copy('vendor/bower_components/bootstrap-datepicker/less', 'resources/assets/less/bootstrap-datepicker/less')
        .copy('vendor/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js', 'resources/js/bootstrap-datepicker/bootstrap-datepicker.js')
        .copy('vendor/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js', 'resources/js/bootstrap-datepicker/bootstrap-datepicker.es.js')

        .sass('sass.scss', 'resources/css')
        .less('less.less', 'resources/css')
        .scripts([
            'jquery/jquery.js',
            'bootstrap/bootstrap.js',
            'bootstrap-datepicker/bootstrap-datepicker.js',
            'bootstrap-datepicker/bootstrap-datepicker.es.js',
            'main.js'
        ])
        .styles([
            'less.css',
            'sass.css'

        ])
        .version(['css/all.css', 'js/all.js'])
        .copy('vendor/bower_components/bootstrap-sass-official/assets/fonts', 'public/assets/fonts')


});
