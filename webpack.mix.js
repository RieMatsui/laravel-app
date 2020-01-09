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

mix.js('resources/assets/js/app.js', 'public/js/app.js')
   .js('resources/assets/js/bootstrap.js', 'public/js/bootstrap.js')
   .js('resources/assets/js/logout.js', 'public/js/logout.js')
   .js('resources/assets/js/task.js', 'public/js/task.js')
   .sass('resources/assets/scss/app.scss', 'public/css/app.css')
   .sass('resources/assets/scss/reset.scss', 'public/css/reset.css')
   .sass('resources/assets/scss/style.scss', 'public/css/style.css')
   ;
