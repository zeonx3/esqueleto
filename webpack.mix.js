const mix = require('laravel-mix');


mix.js('resources/js/routes','public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
