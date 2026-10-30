const mix = require('laravel-mix');
const tailwindcss = require('@tailwindcss/postcss');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [tailwindcss()])
    .options({
        processCssUrls: false,
        autoprefixer: false,
    })
    .version();

mix.disableSuccessNotifications();
