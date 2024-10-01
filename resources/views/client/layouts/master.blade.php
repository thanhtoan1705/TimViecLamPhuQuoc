<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jobbox-html.netlify.app/frontend/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jun 2024 11:15:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
{{--    <link rel="manifest" href="manifest.html" crossorigin>--}}
    <meta name="msapplication-config" content="browserconfig.html">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/client/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/stylecd4e.css?version=4.1') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    @livewireStyles
    @stack('css')
    <title>@yield('title', 'Trang chủ')</title>
</head>
<body>
    <x-client.utilities></x-client.utilities>
{{--    <div id="preloader-active">--}}
{{--        <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--            <div class="preloader-inner position-relative">--}}
{{--                <div class="text-center"><img src="{{ asset('assets/client/imgs/template/loading.gif') }}"--}}
{{--                        alt="jobBox"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <x-client.header></x-client.header>
    <script src="{{ asset('assets/client/js/app.js')}}"></script>
    @yield('content')
    <x-client.newsletter></x-client.newsletter>
    <x-client.footer></x-client.footer>

    @stack('script')

    @livewireScripts
{{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
    <script src="{{ asset('assets/client/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-3.6.0.min.js') }}"></script>
{{--    <script src="{{ asset('assets/client/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>--}}
    <script src="{{ asset('assets/client/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/client/js/main8c94.js?v=4.1') }}"></script>
{{--    <script src="{{ asset('assets/js/noUISlider.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/slider.js') }}"></script>--}}
</body>

<!-- Mirrored from jobbox-html.netlify.app/frontend/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jun 2024 11:15:59 GMT -->
</html>
