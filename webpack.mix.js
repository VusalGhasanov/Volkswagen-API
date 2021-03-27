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

mix.copyDirectory('resources/admin/css', 'public/admin/css');
mix.copyDirectory('resources/admin/js', 'public/admin/js');
mix.copyDirectory('resources/admin/assets', 'public/admin/assets');


