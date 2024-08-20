const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue({ version: 3 })  // Especificando explicitamente a versão do Vue
   .sass('resources/sass/app.scss', 'public/css')
   .babelConfig({
       presets: ['@babel/preset-env']
   });

mix.options({
    processCssUrls: false
});

if (mix.inProduction()) {
    mix.version();
}
