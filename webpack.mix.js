const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.disableSuccessNotifications();
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');
mix.options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js') ],
})
mix.version();
