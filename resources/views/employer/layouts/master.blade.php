<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jobbox-html.netlify.app/dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2024 12:19:45 GMT -->
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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/employer/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/employer/css/stylecd4e.css?version=4.1') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>@yield('title', 'Nhà Tuyển Dụng')</title>
    @stack('css')
</head>
<body>
<x-employer.header></x-employer.header>
<main class="main">
    <x-employer.sidebar></x-employer.sidebar>
    @yield('content')

</main>
@stack('script')
<script src="{{ asset('assets/employer/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/jquery.circliful.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/charts/index.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/charts/xy.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/charts/Animated.js') }}"></script>
<script src="{{ asset('assets/employer/js/plugins/armcharts5-script.js') }}"></script>
<script src="{{ asset('assets/employer/js/main8c94.js?v=4.1') }}"></script>
</body>

<!-- Mirrored from jobbox-html.netlify.app/dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2024 12:20:22 GMT -->
</html>
