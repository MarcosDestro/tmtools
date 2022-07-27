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

mix
    .postCss('resources/css/app.css', 'public/css/', [
        //
    ])
    .sass('resources/scss/styles.scss', 'public/css/')
    .sass('resources/scss/login.scss', 'public/css/')
    .sass('resources/scss/toolsall.scss', 'public/css/')
    .sass('resources/scss/createtools.scss', 'public/css/')
    // .copyDirectory('resources/svgs', 'public/svgs')
    ;
