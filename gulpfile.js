var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

var config = {
    assets_path: './resources/assets',
    build_path: 'public/build',
};

//-------------------------- configuration paths -----------------

// local dos componentes
config.node_modules_dir = '/node_modules';
config.bower_path = config.assets_path +'/..'+ config.node_modules_dir;

// libs js
config.vendor_path_js = [
    '/../../../'+ config.node_modules_dir + '/jquery/dist/jquery.js',
    '/../../../'+ config.node_modules_dir + '/bootstrap/dist/js/bootstrap.js',
];

config.app_path_js = [
    'main.js',
];

// libs css
config.vendor_path_css = [
    '/../../../'+ config.node_modules_dir + '/bootstrap/dist/css/bootstrap.css',
    '/../../../'+ config.node_modules_dir + '/bootstrap/dist/css/bootstrap-theme.css',
    '/../../../'+ config.node_modules_dir + '/font-awesome/css/font-awesome.css',
];

// font
config.build_path_fonts = config.build_path +'/fonts';
config.vendor_path_fonts = [
    '.'+ config.node_modules_dir + '/bootstrap/fonts',
    '.'+ config.node_modules_dir + '/font-awesome/fonts',
];


//-------------------------- elixir -----------------


elixir(function(mix) {
    mix.copy(config.vendor_path_fonts, config.build_path_fonts)
        .scripts(config.vendor_path_js, 'public/js/vendor.js')
        .browserify(config.app_path_js, 'public/js/app.js')
        .scripts(['../../../public/js/vendor.js', '../../../public/js/app.js'])
        .styles(config.vendor_path_css.concat(['.']))
        .version(['js/all.js', 'css/all.css']);
});

