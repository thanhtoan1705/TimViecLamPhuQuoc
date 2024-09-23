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
    <link rel="manifest" href="manifest.html" crossorigin>
    <meta name="msapplication-config" content="browserconfig.html">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/client/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/stylecd4e.css?version=4.1') }}" rel="stylesheet">

    @livewireStyles
    @stack('css')
    <title>@yield('title', 'Thanh toán')</title>
</head>
<body>

<x-client.header></x-client.header>
<script src="{{ asset('assets/client/js/app.js')}}"></script>
@yield('content')
<x-client.newsletter></x-client.newsletter>
<x-client.footer></x-client.footer>

@stack('script')

@livewireScripts
<script src="{{ asset('assets/client/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/client/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/client/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
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
</body>

</html>
