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


// tailwindcssは使っていない。windowsはエラーがでるのを確認、ubuntuでは問題なし

/*
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
*/

if (mix.inProduction()) {
    mix.version();
}
mix.copy('node_modules/bootstrap/dist', 'public/bootstrap');
mix.copy('node_modules/jquery/dist', 'public/jquery');
mix.copy('node_modules/chart.js/dist', 'public/chartjs/');

mix.copy('node_modules/js-cookie/dist', 'public/js-cookie/');





