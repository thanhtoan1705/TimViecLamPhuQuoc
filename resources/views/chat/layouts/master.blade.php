<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/chatvia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Sep 2024 08:46:43 GMT -->

<head>

    <meta charset="utf-8" />
    <title>@yield('title', 'Chat')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive Bootstrap 5 Chat App" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/chat/images/favicon.ico')}}">

    <!-- magnific-popup css -->
    <link href="{{asset('assets/chat/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/chat/libs/owl.carousel/assets/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/chat/libs/owl.carousel/assets/owl.theme.default.min.css')}}">

    {{-- @livewireStyles --}}
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/chat/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/chat/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/chat/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body>


    <div class="layout-wrapper d-lg-flex">

        <x-chat.sidebar></x-chat.sidebar>
        {{-- @livewire('chat.sidebar-menu') --}}

        <div class="chat-leftsidebar me-lg-1 ms-lg-0">
            <div class="tab-content">
                @yield('content')
            </div>
        </div>

        <x-chat.user-chat></x-chat.user-chat>

    </div>
    <!-- end  layout wrapper -->
    {{-- @livewireScripts --}}
    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/chat/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/chat/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/chat/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/chat/libs/node-waves/waves.min.js')}}"></script>

    <!-- Magnific Popup-->
    <script src="{{asset('assets/chat/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- owl.carousel js -->
    <script src="{{asset('assets/chat/libs/owl.carousel/owl.carousel.min.js')}}"></script>

    <!-- page init -->
    <script src="{{asset('assets/chat/js/pages/index.init.js')}}"></script>

    <script src="{{asset('assets/chat/js/app.js')}}"></script>

</body>

<!-- Mirrored from themesbrand.com/chatvia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Sep 2024 08:46:49 GMT -->

</html>
