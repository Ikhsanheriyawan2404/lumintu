<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>CV. Lumintu SIP</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/magnific-popup.css') }}">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/slick.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/LineIcons.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/font-awesome.min.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }}">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            @include('landing.layouts.navbar')
        </div>

        <div id="home" class="header-hero bg_cover"
            style="background-image: url({{ asset('assets/landing/images/banner-bg.svg') }})">
            @include('landing.layouts.header')
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    @yield('content')

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area pt-120">
        @include('landing.layouts.footer')
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="{{ asset('assets/landing/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/vendor/modernizr-3.7.1.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/bootstrap.min.js') }}"></script>

    <!--====== Plugins js ======-->
    <script src="{{ asset('assets/landing/js/plugins.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('assets/landing/js/slick.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('assets/landing/js/ajax-contact.js') }}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('assets/landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.counterup.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('assets/landing/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('assets/landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/scrolling-nav.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('assets/landing/js/wow.min.js') }}"></script>

    <!--====== Particles js ======-->
    <script src="{{ asset('assets/landing/js/particles.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('assets/landing/js/main.js') }}"></script>

</body>

</html>
