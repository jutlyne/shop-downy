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

// mix.js('resources/js/app.js', 'public/js')
//     .styles(['resources/template/cnew/css/style.css'], 'public/cnew/css/style.css');

mix.js('resources/js/app.js', 'public/js')
    .styles(['resources/template/admin/css/font-awesome.css'],'public/admin/css/font-awesome.css');
