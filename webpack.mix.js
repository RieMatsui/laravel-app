const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/assets/js/app.js')
    .js('resources/assets/js/bootstrap.js', 'public/assets/js/bootstrap.js')
    .js('resources/assets/js/logout.js', 'public/assets/js/logout.js')
    .js('resources/assets/js/task.js', 'public/assets/js/task.js')
    .sass('resources/assets/scss/app.scss', 'public/assets/css/app.css')
    .sass('resources/assets/scss/reset.scss', 'public/assets/css/reset.css')
    .sass('resources/assets/scss/style.scss', 'public/assets/css/style.css')
    ;
