var elixir = require('laravel-elixir'),
    liveReload = require('gulp-livereload'),
    clean = require('rimraf'),
    gulp = require('gulp');

var config = {
    assets_path: './resources/assets',
    build_path: './public/build'
};

// local dos componentes
config.bower_path = config.assets_path + '/../bower_components';

// libs js
config.build_path_js = config.build_path +'/js';
config.build_vendor_path_js = config.build_path_js + '/vendor';
config.vendor_path_js = [
    config.bower_path + '/jquery/dist/jquery.min.js',
    config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
    config.bower_path + '/angular/angular.min.js',
    config.bower_path + '/angular-route/angular-route.min.js',
    // config.bower_path + '/angular-resource/angular-resource.min.js',
    config.bower_path + '/angular-animate/angular-animate.min.js',
    // config.bower_path + '/angular-messages/angular-messages.min.js',
    config.bower_path + '/angular-bootstrap/ui-bootstrap-tpls.min.js',
    // config.bower_path + '/angular-strap/dist/modules/navbar.min.js',
    config.bower_path + '/angular-cookies/angular-cookies.min.js',
    // config.bower_path + '/query-string/query-string.js',
    config.bower_path + '/angular-oauth2/dist/angular-oauth2.min.js',
    // config.bower_path + '/ng-file-upload/ng-file-upload.min.js',
    config.bower_path + '/angular-http-auth/src/http-auth-interceptor.js',
    // config.bower_path + '/angularUtils-pagination/dirPagination.js',
    config.bower_path + '/pusher-js/dist/web/pusher.js',
    config.bower_path + '/pusher-angular/lib/pusher-angular.min.js',
    config.bower_path + '/angular-ui-notification/dist/angular-ui-notification.min.js',
];

// libs css
config.build_path_css = config.build_path +'/css';
config.build_vendor_path_css = config.build_path_css + '/vendor';
config.vendor_path_css = [
    config.bower_path + '/bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap-theme.min.css',
    config.bower_path + '/angular-ui-notification/dist/angular-ui-notification.min.css',
];

// html
config.build_path_html = config.build_path +'/views';

// font
config.build_path_fonts = config.build_path +'/fonts';
config.build_vendor_path_fonts = config.build_path_fonts + '/vendor';
config.vendor_path_fonts = [
    config.bower_path + '/bootstrap/fonts/*',
    config.bower_path + '/font-awesome/fonts/*',
];

// images
config.build_path_images = config.build_path +'/images';

// copiar arquivos de font
gulp.task('copy-fonts', function(){
    gulp.src([
        config.assets_path + '/fonts/**/*'
    ])
        .pipe(gulp.dest(config.build_path_fonts))
        .pipe(liveReload());

    gulp.src(config.vendor_path_fonts)
        .pipe(gulp.dest(config.build_vendor_path_fonts))
        .pipe(liveReload());
});

// copiar arquivos de image
gulp.task('copy-images', function(){
    gulp.src([
        config.assets_path + '/images/**/*'
    ])
        .pipe(gulp.dest(config.build_path_images))
        .pipe(liveReload());
});

// copiar arquivos de estilo
gulp.task('copy-html', function(){
    gulp.src([
        config.assets_path + '/js/views/**/*.html'
    ])
        .pipe(gulp.dest(config.build_path_html))
        .pipe(liveReload());
});

// copiar arquivos de estilo
gulp.task('copy-styles', function(){
    gulp.src([
        config.assets_path + '/css/**/*.css'
    ])
        .pipe(gulp.dest(config.build_path_css))
        .pipe(liveReload());

    gulp.src(config.vendor_path_css)
        .pipe(gulp.dest(config.build_vendor_path_css))
        .pipe(liveReload());
});

// copiar arquivos de script
gulp.task('copy-scripts', function(){
    gulp.src([
        config.assets_path + '/js/**/*.js'
    ])
        .pipe(gulp.dest(config.build_path_js))
        .pipe(liveReload());

    gulp.src(config.vendor_path_js)
        .pipe(gulp.dest(config.build_vendor_path_js))
        .pipe(liveReload());
});

// limpa todos arquivos do diretório
gulp.task('clean-build-folder', function(){
    clean.sync(config.build_path);
});

gulp.task('default', ['clean-build-folder'], function(){
    gulp.start('copy-html', 'copy-fonts', 'copy-images');
    elixir(function(mix){
        mix.styles(config.vendor_path_css.concat([config.assets_path + '/css/**/*.css']),
            'public/css/all.css', config.assets_path);
        mix.scripts(config.vendor_path_js.concat([config.assets_path + '/js/**/*.js']),
            'public/js/all.js', config.assets_path);
        mix.version(['js/all.js', 'css/all.css']);
    });
});

// executa e monitora as tarefas
gulp.task('watch-dev',['clean-build-folder'], function(){
    liveReload.listen();
    gulp.start('copy-styles', 'copy-scripts', 'copy-html', 'copy-fonts', 'copy-images');
    gulp.watch(config.assets_path + '/**', [
        'copy-styles', 'copy-scripts', 'copy-html', 'copy-fonts', 'copy-images'
    ]);
});