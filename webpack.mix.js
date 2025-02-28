let mix = require('laravel-mix');

mix
    .js('resources/scripts/app.js', 'public/dist')
    .sass('resources/styles/app.scss', 'public/dist')
    .vue();