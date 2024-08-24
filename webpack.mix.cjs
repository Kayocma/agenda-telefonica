const mix = require('laravel-mix');
const webpack = require('webpack');

mix.js('resources/js/app.js', 'public/js')
   .vue({ version: 3 })
   .sass('resources/sass/app.scss', 'public/css')
   .babelConfig({
       presets: ['@babel/preset-env']
   })
   .webpackConfig({
       resolve: {
           fallback: {
               "buffer": require.resolve("buffer/"),
               "process": require.resolve("process/browser")
           }
       },
       plugins: [
           new webpack.ProvidePlugin({
               Buffer: ['buffer', 'Buffer'],
               process: 'process/browser',
           }),
       ],
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
