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

/*
 |--------------------------------------------------------------------------
 | B A S E L I N E   C S S
 |--------------------------------------------------------------------------
 |
 */
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


/*
 |--------------------------------------------------------------------------
 | B A S E L I N E   J S
 |--------------------------------------------------------------------------
 |
 */
mix.scripts([
    'resources/assets/lib/jquery/jquery.min.js',
    'resources/assets/lib/tether/js/tether.min.js',
    'resources/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js',
    'resources/assets/lib/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/js/template/app.min.js',
    'resources/assets/js/template/app-charts-sparkline.js',
], 'public/js/base.js');


/*
 |--------------------------------------------------------------------------
 | P R O J E C T 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/project/main.js',
], 'public/js/project/project.js');



/*
 |--------------------------------------------------------------------------
 | D A T A   M A S T E R S   -   U S E R S 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/master/user/main.js',
], 'public/js/master/user.js');


/*
 |--------------------------------------------------------------------------
 | D A T A   M A S T E R S   -   C O M P A N I E S 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/master/company/main.js',
], 'public/js/master/company.js');


/*
 |--------------------------------------------------------------------------
 | D A T A   M A S T E R S   -   I T E M S   -   I T E M S 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/master/item/item/main.js',
], 'public/js/master/item.js');


/*
 |--------------------------------------------------------------------------
 | D A T A   M A S T E R S   -   I T E M S   -   D E T A I L S 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/master/item/detail/main.js',
], 'public/js/master/detail.js');


/*
 |--------------------------------------------------------------------------
 | D A T A   M A S T E R S   -   I T E M S   -   F I N I S H I N G S 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/master/item/finishing/main.js',
], 'public/js/master/finishing.js');


/*
 |--------------------------------------------------------------------------
 | D A T A   M A S T E R S   -   R O O M S 
 |--------------------------------------------------------------------------
 |
 */
mix.js([
    'resources/assets/js/vue-instances/master/room/main.js',
], 'public/js/master/room.js');
