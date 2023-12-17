const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
//     .scripts([
//         'vendor/laravel-websockets/js/...other_files.js',
//     ], 'public/js/websockets-dashboard.js');

// mix.js('resources/js/app.js', 'public/js')
//    .postCss('resources/css/app.scss', 'public/css')
//    .scripts([
//        'vendor/beyondcode/laravel-websockets/resources/js/websockets-dashboard.js',
//    ], 'public/js/websockets-dashboard.js');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.scss', 'public/css')
   .js('path/to/websockets-dashboard.js', 'public/js') // Include the new file
   .version();