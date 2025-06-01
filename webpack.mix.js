const mix = require('laravel-mix');

// Compile SCSS to the location WordPress expects
mix.setPublicPath('.') // ✅ outputs directly in the theme folder
   .sass('src/scss/style.scss', 'css/theme-bootstrap4.min.css')
   .options({
     processCssUrls: false
   })
   .sourceMaps();
