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

// Sufee
mix.styles([
    'resources/assets/sufee/css/normalize.css',
    'resources/assets/sufee/css/bootstrap.min.css',
    'resources/assets/sufee/css/font-awesome.min.css',
    'resources/assets/sufee/css/themify-icons.css',
    'resources/assets/sufee/css/flag-icon.min.css',
    'resources/assets/sufee/css/cs-skin-elastic.css',
    //'resources/assets/sufee/css/bootstrap-select.css',
    'resources/assets/sufee/scss/style.css',
], 'public/css/sufee.css');

mix.scripts([
    'resources/assets/sufee/js/vendor/jquery-2.1.4.min.js',
    'resources/assets/sufee/js/popper.min.js',
    'resources/assets/sufee/js/plugins.js',
    'resources/assets/sufee/js/main.js'
], 'public/js/sufee.js');

// Custom
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');