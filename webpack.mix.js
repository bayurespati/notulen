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
// mix.js('resources/js/app.js', 'public/js');
//		.sass('resources/sass/app.scss', 'public/css');

mix.js('resources/assets/js/app.js', 'public/js');

mix.styles([
	'resources/assets/lib/stroke-7/style.css',
    'resources/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css',
    'resources/assets/css/template.css',
    'resources/assets/lib/fuelux/css/wizard.css',
    'resources/assets/css/custom.css',
], 'public/css/base.css');

mix.styles([
    'resources/assets/css/animation.css',
    'resources/assets/css/loading.css',
    'resources/assets/loading-btn.css',
], 'public/css/animation.css');

mix.scripts([
    'resources/assets/lib/jquery/jquery.min.js',
    'resources/assets/lib/tether/js/tether.min.js',
    'resources/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js',
    'resources/assets/lib/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/js/template/app.min.js',
    'resources/assets/js/template/app-charts-sparkline.js',
], 'public/js/base.js');