var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.styles([
        '/bower/bootstrap/dist/css/bootstrap.min.css',
        '/bower/bootstrap/dist/css/bootstrap-theme.min.css',
        '/bower/fullcalendar/dist/fullcalendar.min.css',
        '/bower/parsleyjs/src/parsley.css',
        'less/app.less'
    ], null, 'resources/assets');

    mix.scripts([
        '/bower/jquery/dist/jquery.min.js',
        '/bower/bootstrap/dist/js/bootstrap.min.js',
        '/bower/moment/moment.js',
        '/bower/parsleyjs/dist/parsley.min.js',
        '/bower/fullcalendar/dist/fullcalendar.min.js',
        '/js/main.js'
    ], null, 'resources/assets')
});