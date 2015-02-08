var elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

var paths = {
    "assets": "./resources/assets/",
    "jquery": "./vendor/bower_components/jquery/",
    "bootstrap": "./vendor/bower_components/bootstrap-sass-official/assets/",
    "highlightjs": "./vendor/bower_components/highlightjs/",
    "fontawesome": "./vendor/bower_components/font-awesome/"
}

elixir(function(mix) {
    mix
        .sass("app.scss", "public/css/", {includePaths: [
            paths.bootstrap + 'stylesheets/',
            paths.fontawesome + 'scss/'
        ]})
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.highlightjs + "highlight.pack.js",
            paths.assets + "js/libraries/jquery.backstretch.min.js",
            paths.assets + "js/app.js"
        ], "public/js/app.js", "./")
        .version(["public/css/app.css", "public/js/app.js"])
        .copy(paths.bootstrap + "fonts/bootstrap/**", "public/build/fonts")
        .copy(paths.fontawesome + "fonts/**", "public/build/fonts")
        .copy(paths.highlightjs + "styles/solarized_dark.css", "public/css/solarized_dark.css")
        .imagemin()
        .phpUnit()
        .phpSpec();
});
