let mix = require('laravel-mix');

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

mix.js('src/resources/assets/js/ajtarragona.js', 'src/public/js')
	.sass('src/resources/assets/sass/ajtarragona.scss', 'src/public/css')
	.copyDirectory('src/resources/assets/img', 'src/public/img');
	//.copyDirectory('fonts', 'src/public/fonts');


