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

mix.js('resources/assets/js/app.js', 'public/js')
	.copy('resources/themes/dark-admin/vendor/jquery/jquery.min.js', 'public/js/jquery.min.js')
   // .sass('resources/assets/sass/app.scss', 'public/css');
	.styles([
	    'resources/themes/dark-admin/vendor/bootstrap/css/bootstrap.min.css',
	    'resources/themes/dark-admin/css/style.default.css',
	    'resources/themes/dark-admin/css/custom.css'
	], 'public/css/app.css')
	.scripts([
		'resources/assets/js/popper.js',
	    'resources/themes/dark-admin/vendor/bootstrap/js/bootstrap.min.js',
	    'resources/assets/js/modules.js'
	], 'public/js/vendor.js')
	.version();