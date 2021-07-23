const mix = require('laravel-mix');
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .stylus('resources/stylus/app.styl', 'public/css');

mix.override(webpackConfig => {
    webpackConfig.module.rules.push({
        test: /\.pug$/,
        oneOf: [
            // this applies to <template lang="pug"> in Vue components
            { resourceQuery: /^\?vue/, use: ['vue-indent-pug-loader'] },
            // this applies to pug imports inside JavaScript
            { use: ['raw-loader', 'vue-indent-pug-loader'] }
        ]
    });
});
mix.browserSync("http://live.test:8000");
mix.disableNotifications();


