let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(     'resources/assets/js/main/main.js', 'public/main/js/app.js')
   .sass(   'resources/assets/sass/main/main.scss', 'public/main/css/app.css')

    // COMPONENTS
   .sass(   'resources/assets/sass/main/components/comments.scss', 'public/main/css/')
   .sass(   'resources/assets/sass/main/components/likes.scss', 'public/main/css/')
   .sass(   'resources/assets/sass/main/components/users.scss', 'public/main/css/')
   .sass(   'resources/assets/sass/main/components/views.scss', 'public/main/css/')
   .sass(   'resources/assets/sass/main/components/services.scss', 'public/main/css/')

   .js(   'resources/assets/js/main/components/image_uploader.js', 'public/main/js/')
   .js(   'resources/assets/js/main/components/jq_hotkeys.js', 'public/main/js/')
   .js(   'resources/assets/js/main/components/wysiwyg.js', 'public/main/js/')

    // ADMIN
   .js(     'resources/assets/js/admin/admin.js', 'public/administrator/js')
   .sass(   'resources/assets/sass/admin/admin.scss', 'public/administrator/css');
