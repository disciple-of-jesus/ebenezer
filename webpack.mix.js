let mix = require('laravel-mix');

mix.js('resources/scripts/echo.js', 'public/dist')
    .copy('resources/scripts/serviceworker.js', 'public/serviceworker.js')
    .sass('resources/styles/app.scss', 'public/dist');