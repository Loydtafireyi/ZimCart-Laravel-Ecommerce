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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
   mix.scripts([
   		'public/frontend/js/jquery-3.5.1.min.js',
   		'public/frontend/js/bootstrap.min.js',
   		'public/frontend/js/jquery.slicknav.min.js',
   		'public/frontend/js/owl.carousel.min.js',
   		'public/frontend/js/jquery.nicescroll.min.js',
   		'public/frontend/js/jquery.zoom.min.js',
   		'public/frontend/js/jquery-ui.min.js',
   		'public/frontend/js/main.js'
   	], 'public/frontend/js/all.js');

   mix.styles([
   		'public/frontend/css/bootstrap.min.css',
   		'public/frontend/css/flaticon.css',
   		'public/frontend/css/slicknav.min.css',
   		'public/frontend/css/jquery-ui.min.css',
   		'public/frontend/css/owl.carousel.min.css',
   		'public/frontend/css/animate.css',
   		'public/frontend/css/style.css'
   	], 'public/frontend/css/all.css');
