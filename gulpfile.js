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
    mix.less('app.less');
o
    mix.styles([
        'bootstrap/dist/css/bootstrap.min.css',
        'bootstrap/dist/css/bootstrap-theme.min.css',
        'fullcalendar/dist/css/fullcalendar.min.css',
        'parsleyjs/dist/css/fullcalendar.min.css',
    ], null, 'resources/assets/bower')

    //mix.scripts([
    //    '../assets/bower/jquery/dist/jquery.js',
    //    '../assets/bower/bootstrap/dist/js/bootstrap.js'
    //], 'public/js.vendor.js')
});
