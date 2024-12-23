<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=0.25">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="google-site-verification" content="XsRpCat5KpVnXtsG9N5IB3w8UW8JrE65qslTl1bodKo" />
    {{--    <link rel="manifest" href="manifest.html" crossorigin>--}}
    <meta name="msapplication-config" content="browserconfig.html">
    <meta property="zalo-platform-site-verification" content="JzA3EvtD1M4Nshr2oFyHNKlAYmIdl5fRDJ0t" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/stylecd4e.css?version=4.1') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @production
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <!-- Load tất cả CSS từ manifest -->
    @foreach ($manifest as $entry)
        @if (isset($entry['css']))
            @foreach ($entry['css'] as $css)
                <link rel="stylesheet" href="{{ asset('build/'.$css) }}">
            @endforeach
        @endif
    @endforeach
    <!-- Load JS chính -->
    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
@else
    @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endproduction

    @livewireStyles
    @stack('css')
{{--    <title>@yield('title', 'Trang chủ')</title>--}}

    <!-- SEO -->

    @include('client.partials.seo')

    <!-- End SEO -->
    <style>
        .fl-wrapper {
            z-index: 2147483647 !important;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-6GL6HDNQL2"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-6GL6HDNQL2');
            </script>
</head>

<body>

<x-client.utilities></x-client.utilities>
<x-client.header></x-client.header>
<script src="{{ asset('assets/client/js/app.js')}}"></script>
@yield('content')
@if(!View::hasSection('hide_newsletter'))
    <x-client.newsletter></x-client.newsletter>
@endif
@if(!View::hasSection('hide_footer'))
    <x-client.footer></x-client.footer>
@endif

@stack('script')

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
  {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
<script src="{{ asset('assets/client/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
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
