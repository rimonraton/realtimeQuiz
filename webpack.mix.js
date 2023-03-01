const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/quizapp.js').vue()
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
		], 'public/js/theme-site.js')
		.styles([
		    'public/Landing/assets/vendor/bootstrap/css/bootstrap.css',
		    'public/Landing/assets/vendor/boxicons/css/boxicons.min.css',
		    'public/Landing/assets/vendor/owl.carousel/assets/owl.carousel.min.css',
		    'public/Landing/assets/css/style.css',
		    'public/Landing/assets/css/landing.css'
		], 'public/css/theme-site.css')
		.scripts([
		    'public/Admin/assets/libs/jquery/dist/jquery.min.js',
		    'public/Admin/assets/extra-libs/taskboard/js/jquery-ui.min.js',
		    'public/Admin/assets/libs/popper.js/dist/umd/popper.min.js',
		    'public/Admin/assets/libs/bootstrap/dist/js/bootstrap.min.js',
		    'public/Admin/dist/js/app.min.js',
		    'public/Admin/dist/js/app.init.js',
		    'public/Admin/dist/js/app-style-switcher.js',
		    'public/Admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js',
		    'public/Admin/assets/extra-libs/sparkline/sparkline.js',
		    'public/Admin/dist/js/waves.js',
		    'public/Admin/dist/js/sidebarmenu.js',
		    'public/Admin/dist/js/custom.min.js',
		    'public/Admin/assets/libs/chartist/dist/chartist.min.js',
		    'public/Admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js',
		    'public/Admin/assets/libs/d3/dist/d3.min.js',
		    'public/Admin/assets/libs/c3/c3.min.js',
		    'public/Admin/assets/libs/jvectormap/jquery-jvectormap.min.js',
		    'public/Admin/assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js',
		    'public/Admin/dist/js/pages/dashboards/dashboard2.js',
		    'public/Admin/assets/libs/datatables/media/js/jquery.dataTables.min.js',
		    'public/Admin/dist/js/pages/datatable/custom-datatable.js',
		    'public/Admin/assets/libs/moment/min/moment.min.js',
		    'public/Admin/dist/js/pages/datatable/datatable-basic.init.js',
		    'public/Admin/assets/libs/fullcalendar/dist/fullcalendar.min.js',
		    'public/Admin/dist/js/pages/calendar/cal-init.js',
		    'public/Admin/assets/libs/sweetalert2/dist/sweetalert2.all.min.js',
		    'public/Admin/assets/extra-libs/sweetalert2/sweet-alert.init.js',
		    'public/Admin/assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js',
		    'public/Admin/assets/extra-libs/toastr/dist/build/toastr.min.js',
		    'public/Admin/assets/extra-libs/toastr/toastr-init.js',
		    'public/Admin/assets/libs/nestable/jquery.nestable.js'
		], 'public/js/theme-admin.js')
		.styles([
		    'public/Admin/assets/libs/chartist/dist/chartist.min.css',
		    'public/Admin/dist/js/pages/chartist/chartist-init.css',
		    'public/Admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css',
		    'public/Admin/assets/libs/c3/c3.min.css',
		    'public/Admin/assets/libs/jvectormap/jquery-jvectormap.css',
		    'public/Admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css',
		    'public/Admin/dist/css/style.min.css',
		    'public/Admin/assets/libs/fullcalendar/dist/fullcalendar.min.css',
		    'public/Admin/assets/libs/sweetalert2/dist/sweetalert2.min.css',
		    'public/Admin/assets/extra-libs/taskboard/css/lobilist.css',
		    'public/Admin/assets/extra-libs/toastr/dist/build/toastr.min.css',
		    'public/Admin/assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'
		], 'public/css/theme-admin.css');
