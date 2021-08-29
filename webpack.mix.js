const mix = require('laravel-mix');

mix.css('resources/css/master.css','/css/app.css')
mix.css('resources/css/admin-master.css','/css/admin.css')
   .setPublicPath('public/assets/');

mix.js('resources/js/function.js', 'js')
   .js('resources/js/front/front-index.js','js')
   .js('resources/js/front/config-price.js','js')
   .js('resources/js/front/price.js','js')
   .js('resources/js/front/view-table-tarif.js','js')
   .setPublicPath('public/assets/');

// mix.copyDirectory('resources/admin/img', 'public/assets/admin/img' );

// if (mix.inProduction()) {
//     mix.version();
// }

