const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue({ version: 3 })  // Especificando explicitamente a versão do Vue
   .sass('resources/sass/app.scss', 'public/css')
   .babelConfig({
       presets: ['@babel/preset-env']
   });

mix.options({
    processCssUrls: false,
    globalVueOptions: {
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false
    }
});

if (mix.inProduction()) {
    mix.version();
}
