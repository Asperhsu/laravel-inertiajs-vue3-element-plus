const path = require('path');
const mix = require('laravel-mix');

mix.alias({
    '@': path.join(__dirname, 'resources/js'),
});

mix.js('resources/js/app.js', 'public/js').vue();

mix.sass('resources/sass/app.scss', 'public/css');
