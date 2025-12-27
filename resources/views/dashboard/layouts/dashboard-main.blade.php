<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UBSI | @yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    @yield('css')

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>

    <style>
        @keyframes slideFadeIn {
            0% {
                opacity: 0;
                transform: translateX(30px);
            }

            100% {
                opacity: 0.7;
                transform: translateX(0);
            }
        }

        .right-panel {
            min-height: calc(100vh - 55px);
        }

        .req-i {
            color: #dc3545;
        }

        .navbar .navbar-nav li>a .menu-icon {
            width: 35px;
        }
    </style>
</head>

<body>

    <aside id="left-panel" class="left-panel">
        @include('dashboard.partials.sidebar')
    </aside>

    <div id="right-panel" class="right-panel">
        @include('dashboard.partials.navbar')

        @yield('breadcrumbs')

        <div class="content">
            @yield('container')
        </div>

        <div class="clearfix"></div>
        @include('dashboard.partials.footer')
    </div>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('assets/js/init/weather-init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('assets/js/init/fullcalendar-init.js') }}"></script>


    <!--Local Stuff-->
    {{-- <script>
        let currentSlide = 1;
        const totalSlides = 4;

        function showSlide(slideNumber) {
            for (let i = 1; i <= totalSlides; i++) {
                const slide = document.getElementById(`slide${i}`);
                slide.style.display = (i === slideNumber) ? 'block' : 'none';
            }

            // Toggle tombol
            document.getElementById('nextBtn').style.display = (slideNumber === totalSlides) ? 'none' : 'inline-block';
            document.getElementById('submitBtn').style.display = (slideNumber === totalSlides) ? 'inline-block' : 'none';
        }

        function nextSlide(event) {
            event.preventDefault(); // Hindari submit form
            if (currentSlide < totalSlides) {
                currentSlide++;
                showSlide(currentSlide);
            }
        }

        function prevSlide(event) {
            event.preventDefault(); // Hindari submit form
            if (currentSlide > 1) {
                currentSlide--;
                showSlide(currentSlide);
            }
        }

        // Tampilkan slide pertama saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            showSlide(currentSlide);
        });
    </script> --}}

    <script>
        function autoDismissAlert(id, delay = 3000) {
            const alert = document.getElementById(id);
            if (!alert || alert.dataset.dismissed === 'true') return;

            // Tandai sudah dimulai
            alert.dataset.dismissed = 'true';

            // Jalankan auto-dismiss
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.style.display = 'none';
                    alert.remove(); // Penting: agar bisa muncul ulang
                }, 500);
            }, delay);
        }

        // Observer: pantau apakah alert muncul lagi
        const observer = new MutationObserver(() => {
            autoDismissAlert('error-alert'); // Panggil ulang jika muncul
            autoDismissAlert('success-alert');
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true,
        });

        // Panggil awal juga
        document.addEventListener('DOMContentLoaded', () => {
            autoDismissAlert('error-alert');
            autoDismissAlert('success-alert');
        });
    </script>

    @yield('scripts')
    <script src="https://kit.fontawesome.com/5f1e094195.js" crossorigin="anonymous"></script>
</body>

</html>
