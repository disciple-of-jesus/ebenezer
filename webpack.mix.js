let mix = require('laravel-mix');

mix.copy('resources/scripts/serviceworker.js', 'public/serviceworker.js')
    .sass('resources/styles/app.scss', 'public/dist');