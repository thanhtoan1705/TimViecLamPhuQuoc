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
                        <li><a class="{{ request()->is('/') ? 'active' : '' }}" href='/'>Trang chủ</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.job.index') ? 'active' : '' }}" href='{{route('client.job.index')}}'>Việc làm</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.employer.index') ? 'active' : '' }}" href='{{route('client.employer.index')}}'>Công ty</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.candidate.hot') ? 'active' : '' }}" href='{{route('client.candidate.hot')}}'>Ứng viên</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.post.index') ? 'active' : '' }}" href='{{route('client.post.index')}}'>Tin tức</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.client.about') ? 'active' : '' }}" href='{{route('client.client.about')}}'>Giới thiệu</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.pricing.index') ? 'active' : '' }}" href='{{route('client.pricing.index')}}'>Bảng giá</a>
                        </li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right d-flex align-items-center">
                @if(auth()->check())
                    <div class="dropdown me-3">
                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell-fill"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-3" style="width: 500px; max-height: 450px; overflow-y: auto;">
                            <h5 class="mb-2">Thông báo</h5>
                            @php
                                $notifications = auth()->user()->notifications->take(3);
                            @endphp
                            @if ($notifications->isEmpty())
                                <p class="text-muted">Bạn chưa có thông báo nào.</p>
                            @else
                                @foreach ($notifications as $notification)
                                    <li class="d-flex justify-content-between align-items-center" style="background-color: #ffffff; border: none; padding: 20px; border-radius: 10px; margin-bottom: 15px; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                                        <div style="display: flex; align-items: center;">
                                            <i class="bi bi-bell-fill" style="background-color: #007bff; padding: 10px; border-radius: 50%; font-size: 20px; display: inline-flex; justify-content: center; align-items: center; transition: background-color 0.3s; color: white;"></i>
                                            <span style="font-size: 14px; color: #495057; font-weight: 500; margin-left: 10px;">{{ $notification->data['message'] ?? '' }}</span>
                                        </div>
                                        <div style="content: ''; position: absolute; top: 0; left: 0; height: 100%; width: 5px; background: linear-gradient(180deg, #00c6ff, #007bff); transition: width 0.3s ease;"></div>
                                    </li>
                                @endforeach
                                    <div class="d-flex justify-content-center mt-3">
                                        <a href="{{ route('client.candidate.notification') }}" class="btn btn-primary">Xem thêm</a>
                                    </div>
                            @endif
                        </ul>

                    </div>

                    <div id="loginContainer" class="login-container">
                        <button id="loginButton" class='btn btn-default btn-shadow hover-up'>Tài khoản</button>
                        <div id="loginButtons" class="login-buttons" style="display: none;">
                            <a class='btn btn-default btn-shadow hover-up'
                               href="{{route('client.candidate.profile')}}">Hồ sơ</a>
                            <a class='btn btn-default btn-shadow hover-up'
                               href="{{route('client.candidate.logout')}}">Đăng xuất</a>
                        </div>
                    </div>
                @else
                    <div id="loginContainer" class="login-container">
                        <button id="loginButton" class='btn btn-default btn-shadow hover-up'>Đăng nhập</button>
                        <div id="loginButtons" class="login-buttons" style="display: none;">
                            <a class='btn btn-default btn-shadow hover-up'
                               href="">Tuyển dụng</a>
                            <a class='btn btn-default btn-shadow hover-up'
                               href="{{ route('client.candidate.login') }}">Ứng viên</a>
                        </div>
                    </div>
                @endif
            </div>
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
                            <li class="has-children"><a class='active' href='/'>Trang chủ</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.job.index')}}'>Việc làm</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.employer.index')}}'>Công ty</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.post.index')}}'>Tin tức</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.client.about')}}'>Giới thiệu</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.pricing.index')}}'>Bảng giá</a>
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
                            <li class="has-children"><a href='{{route('client.job.index')}}'>Việc làm</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.employer.index')}}'>Công ty</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.post.index')}}'>Tin tức</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.client.about')}}'>Giới thiệu</a>
                            </li>
                            <li class="has-children"><a href='{{route('client.pricing.index')}}'>Bảng giá</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Tài khoản của bạn</h6>
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
