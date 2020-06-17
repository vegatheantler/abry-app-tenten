const mix = require('laravel-mix');
require('mix-tailwindcss');

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
	.js('resources/admin/main.js', 'public/dist/admin')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/admin/sass/main.scss', 'public/dist/admin')
	.tailwind('./tailwind.config.js')
	.version();
