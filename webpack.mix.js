let mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/dist')
    .sass('resources/styles/app.scss', 'public/dist')
    .vue();