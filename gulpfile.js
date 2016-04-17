var elixir = require('laravel-elixir');
var argv = require('yargs').argv;
require('laravel-elixir-imagemin');

elixir.config.assetsPath = 'source/_assets';
elixir.config.publicPath = 'source';

elixir(function(mix) {
    var env = argv.e || argv.env || 'local';

    mix.sass('main.scss')
        .scripts([
            './node_modules/jquery/dist/jquery.js',
            './node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
            './node_modules/highlightjs/highlight.pack.js',
            './node_modules/jquery.backstretch/jquery.backstretch.min.js',
            'main.js'
        ])
        .imagemin()
        .copy(
            './node_modules/bootstrap-sass/assets/fonts/bootstrap/**',
            'source/fonts'
        )
        .copy('./node_modules/font-awesome/fonts/**', elixir.config.publicPath + '/fonts')
        .exec('jigsaw build --env=' + env, ['./source/*', './source/**/*', '!./source/_assets/**/*'])
        .browserSync({
            server: { baseDir: 'build_' + env },
            proxy: null,
            files: [ 'build_' + env + '/**/*' ]
        });
});
