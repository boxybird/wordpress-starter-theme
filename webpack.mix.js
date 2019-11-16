let mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.setPublicPath('./');

mix
  .js('resources/src/js/app.js', 'assets/')
  .postCss('resources/src/css/app.css', 'assets/', [
    require('tailwindcss'),
  ])
  .purgeCss({
    extensions: ['html', 'js', 'php', 'vue', 'twig']
  })
  .version();
