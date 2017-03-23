var elixir = require('laravel-elixir'),
    gulp = require('gulp');

var config = {
    assets_path: './resources/assets',
    build_path: './public/build',
};

//-------------------------- configuration paths -----------------

// local dos componentes
config.bower_dir = '/bower_components';
config.bower_path = config.assets_path +'/..'+ config.bower_dir;

// libs js
config.vendor_path_js = [
    '/../../'+ config.bower_dir + '/jquery/dist/jquery.js',
    '/../../'+ config.bower_dir + '/bootstrap/dist/js/bootstrap.js',
    '/../../'+ config.bower_dir + '/vue/dist/vue.js',
];

// libs css
config.vendor_path_css = [
    '/../../'+ config.bower_dir + '/bootstrap/dist/css/bootstrap.css',
    '/../../'+ config.bower_dir + '/bootstrap/dist/css/bootstrap-theme.css',
];

// font
config.build_path_fonts = config.build_path +'/fonts';
config.vendor_path_fonts = [
    config.bower_path + '/bootstrap/fonts/*',
    config.bower_path + '/font-awesome/fonts/*',
];

// images
config.build_path_images = config.build_path +'/images';


//-------------------------- tasks -----------------


// copiar arquivos de font
gulp.task('copy-fonts', function(){
    gulp.src(config.vendor_path_fonts)
        .pipe(gulp.dest(config.build_path_fonts));
});

// copiar arquivos de image
gulp.task('copy-images', function(){
    gulp.src([
        config.assets_path + '/images/**/*'
    ])
        .pipe(gulp.dest(config.build_path_images));
});


//-------------------------- elixir -----------------


elixir(function(mix) {
    gulp.start('copy-fonts', 'copy-images');
    mix.scripts(config.vendor_path_js.concat(['.']))
        .styles(config.vendor_path_css.concat(['.']))
        .version(['js/all.js', 'css/all.css']);
});

