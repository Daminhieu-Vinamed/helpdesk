const mix = require('laravel-mix');
mix.sass('resources/scss/admin/add-style.scss', 'public/css/admin/')
    .sass('resources/scss/client/add-style.scss', 'public/css/client/')
mix.js('resources/js/client/ticket.js', 'public/js/client/')
    .js('resources/js/admin/client.js', 'public/js/admin/')
    .js('resources/js/admin/ticket.js', 'public/js/admin/')
    .js('resources/js/admin/question.js', 'public/js/admin/')
    .setPublicPath('public');