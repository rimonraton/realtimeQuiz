const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
		.scripts([
		    'public/Landing/assets/vendor/jquery/jquery.min.js',
		    'public/Landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
		    'public/Landing/assets/vendor/jquery.easing/jquery.easing.min.js',
		    'public/Landing/assets/vendor/php-email-form/validate.js',
		    'public/Landing/assets/vendor/venobox/venobox.min.js',
		    'public/Landing/assets/vendor/waypoints/jquery.waypoints.min.js',
		    'public/Landing/assets/vendor/counterup/counterup.min.js',
		    'public/Landing/assets/vendor/owl.carousel/owl.carousel.min.js',
		    'public/Landing/assets/vendor/aos/aos.js',
		    'public/Landing/assets/js/main.js'
		], 'public/js/theme.js')
		.styles([
		    'public/Landing/assets/vendor/bootstrap/css/bootstrap.min.css',
		    'public/Landing/assets/vendor/icofont/icofont.min.css',
		    'public/Landing/assets/vendor/boxicons/css/boxicons.min.css',
		    'public/Landing/assets/vendor/venobox/venobox.css',
		    'public/Landing/assets/vendor/remixicon/remixicon.css',
		    'public/Landing/assets/vendor/owl.carousel/assets/owl.carousel.min.css',
		    'public/Landing/assets/vendor/aos/aos.css',
		    'public/Landing/assets/css/style.css',
		    'public/Landing/assets/css/landing.css'
		], 'public/css/theme.css');

