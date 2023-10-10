const mix = require('laravel-mix');
mix.copy(
    "node_modules/bootstrap/dist/css/bootstrap.css",
    "public/css/bootstrap.css"
);
mix.copy(
    "node_modules/bootstrap/dist/js/bootstrap.bundle.js",
    "public/js/bootstrap.js"
);

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
