require('dotenv').config();
const webpack = require('webpack');
const path = require('path');
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').vue();
mix.sass('resources/sass/app.scss', 'public/css');


mix.alias({
    '@': path.join(__dirname, 'resources/js'),
});
mix.browserSync({
    proxy: process.env.APP_URL,
    open: false,
});
mix.webpackConfig ({
    plugins: [
        // vue esm-bundler
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
        }),
    ],
})
