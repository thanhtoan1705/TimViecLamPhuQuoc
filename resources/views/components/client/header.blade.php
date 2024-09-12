<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class='d-flex' href='index.html'><img alt="jobBox"
                                                                                  src="{{ asset('assets/client/imgs/template/jobhub-logo.svg') }}"></a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li><a class='active' href='/'>Trang chủ</a>
                        </li>
                        <li><a href='{{route('client.job.index')}}'>Việc làm</a>
                        </li>
                        <li><a href='{{route('client.employer.index')}}'>Công ty</a>
                        </li>
                        <li><a href='{{route('client.candidate.hot')}}'>Ứng viên</a>
                        </li>
                        <li><a href='{{route('client.post.index')}}'>Tin tức</a>
                        </li>
                        <li><a href='{{route('client.client.about')}}'>Giới thiệu</a>
                        </li>
                        <li><a href='{{route('client.pricing.index')}}'>Bảng giá</a>
                        </li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            @if(auth()->check())
                <div class="header-right">
                    <div id="loginContainer" class="login-container">

                        <a href="" id="loginButton" class='btn btn-default btn-shadow ml-40 hover-up'>Tài khoản</a>
{{--                        <div id="loginButtons" class="login-buttons" style="display: none;">--}}
{{--                            <a class='btn btn-default btn-shadow ml-40 hover-up'--}}
{{--                               href="">Quản lý</a>--}}
{{--                            <a class='btn btn-default btn-shadow ml-40 hover-up'--}}
{{--                               href="{{ route('client.candidate.logout') }}">Thoát</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            @else
                <div class="header-right">
                    <div id="loginContainer" class="login-container">
                        <button id="loginButton" class='btn btn-default btn-shadow ml-40 hover-up'>Đăng nhập</button>
                        <div id="loginButtons" class="login-buttons" style="display: none;">
                            <a class='btn btn-default btn-shadow ml-40 hover-up'
                               href="">Tuyển dụng</a>
                            <a class='btn btn-default btn-shadow ml-40 hover-up'
                               href="{{ route('client.candidate.login') }}">Ứng viên</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class='active' href='index.html'>Trang chủ</a>
                            </li>
                            <li class="has-children"><a href='jobs-grid.html'>Việc làm</a>
                            </li>
                            <li class="has-children"><a href='companies-grid.html'>Công ty</a>
                            </li>
                            <li class="has-children"><a href='candidates-grid.html'>Bài viết</a>
                            </li>
                            <li class="has-children"><a href='blog-grid.html'>Giới thiệu</a>
                            </li>
                            <li class="has-children"><a href='blog-grid.html'>Bảng giá</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Tài khoản của bạn</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Hồ hơ</a></li>
                        <li><a href="#">Công việc</a></li>
                        <li><a href="#">Cài đặt tài khoản</a></li>
                        <li><a href='page-signin.html'>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class='active' href='index.html'>Trang chủ</a>
                            </li>
                            <li class="has-children"><a href='jobs-grid.html'>Việc làm</a>
                            </li>
                            <li class="has-children"><a href='companies-grid.html'>Công ty</a>
                            </li>
                            <li class="has-children"><a href='candidates-grid.html'>Bài viết</a>
                            </li>
                            <li class="has-children"><a href='blog-grid.html'>Giới thiệu</a>
                            </li>
                            <li class="has-children"><a href='blog-grid.html'>Bảng giá</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Tài khoản của bản</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Hồ sơ</a></li>
                        <li><a href="#">Công việc</a></li>
                        <li><a href="#">Cài đặt tài khoản</a></li>
                        <li><a href='page-signin.html'>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
