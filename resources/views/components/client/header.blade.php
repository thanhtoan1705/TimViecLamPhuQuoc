<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                @php

                    $logo = getStorageImageUrl($settings->logo_website, config('image.main-logo'));
                @endphp
                <div style="width: 185px" class="header-logo"><a class='d-flex'
                                                                 href="{{ route('client.client.index') }}"><img
                            alt="{{ $settings->company_name }}"
                            src="{{ $logo }}"></a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <ul class="main-menu">
                            <li><a class="{{ request()->is('/') ? 'active' : '' }}" href='/'>Trang chủ</a>
                            </li>
                            <li><a class="{{ request()->routeIs('client.job.index') ? 'active' : '' }}"
                                   href='{{route('client.job.index')}}'>Việc làm</a>
                            </li>
                            <li><a class="{{ request()->routeIs('client.employer.index') ? 'active' : '' }}"
                                   href='{{route('client.employer.index')}}'>Công ty</a>
                            </li>
                            <li><a class="{{ request()->routeIs('client.candidate.hot') ? 'active' : '' }}"
                                   href='{{route('client.candidate.hot')}}'>Ứng viên</a>
                            </li>
                            <li><a class="{{ request()->routeIs('client.post.index') ? 'active' : '' }}"
                                   href='{{route('client.post.index')}}'>Tin tức</a>
                            </li>
                            <li><a class="{{ request()->routeIs('client.client.about') ? 'active' : '' }}"
                                   href='{{route('client.client.about')}}'>Giới thiệu</a>
                            </li>
                            <li><a class="{{ request()->routeIs('client.pricing.index') ? 'active' : '' }}"
                                   href='{{route('client.pricing.index')}}'>Bảng giá</a>
                            </li>
                        </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right d-none d-xl-flex align-items-center">
                @if(auth()->check() && auth()->user()->role == 'candidate')
                    <div class="dropdown me-3">
                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-bell-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-3"
                            style="width: 500px; max-height: 450px; overflow-y: auto;">
                            <h5 class="mb-2">Thông báo</h5>
                            @php
                                $notifications = auth()->user()->notifications->take(3);
                            @endphp
                            @if ($notifications->isEmpty())
                                <p class="text-muted">Bạn chưa có thông báo nào.</p>
                            @else
                                @foreach ($notifications as $notification)
                                    <li class="d-flex justify-content-between align-items-center"
                                        style="background-color: #ffffff; border: none; padding: 20px; border-radius: 10px; margin-bottom: 15px; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                                        <div style="display: flex; align-items: center;">
                                            <i class="bi bi-bell-fill"
                                               style="background-color: #007bff; padding: 10px; border-radius: 50%; font-size: 20px; display: inline-flex; justify-content: center; align-items: center; transition: background-color 0.3s; color: white;"></i>
                                            <span
                                                style="font-size: 14px; color: #495057; font-weight: 500; margin-left: 10px;">{{ $notification->data['message'] ?? '' }}</span>
                                        </div>
                                        <div
                                            style="content: ''; position: absolute; top: 0; left: 0; height: 100%; width: 5px; background: linear-gradient(180deg, #00c6ff, #007bff); transition: width 0.3s ease;"></div>
                                    </li>
                                @endforeach
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="{{ route('client.candidate.notification') }}" class="btn btn-primary">Xem
                                        thêm</a>
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
                        <!-- Nút mở modal -->
                        <button type="button" id="loginButton" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Đăng nhập
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" style="min-width: 850px">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title mx-auto text-white">ĐĂNG NHẬP HỆ THỐNG</h5>
                                        <button style="width: 30px;" type="button"
                                                class="close border-0 border-radius-5" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true" class="">
                                                    <i style="font-size: 16px" class="bi bi-x"></i>
                                                </span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-around">
                                        <div class="login-box p-3 bg-light">
                                            <h4 class="text-primary mb-2">Đăng nhập ứng viên</h4>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle"></i> + 1.500.000 công việc được cập
                                                    nhật thường xuyên
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Ứng tuyển công việc yêu thích
                                                    HOÀN TOÀN MIỄN PHÍ
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Hiển thị thông tin hồ sơ với nhà
                                                    tuyển dụng hàng đầu
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Nhận bản tin công việc phù hợp
                                                    định kỳ
                                                </li>
                                            </ul>
                                            <a href="{{ route('client.candidate.login') }}"
                                               class="btn btn-primary mt-2">Đăng nhập ứng viên</a>
                                        </div>

                                        <div class="login-box p-3 bg-light">
                                            <h4 class="text-warning mb-2">Đăng nhập nhà tuyển dụng</h4>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle"></i> + 3.000.000 ứng viên tiếp cận
                                                    thông tin tuyển dụng
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Không giới hạn tương tác với ứng
                                                    viên qua hệ thống nhắn tin nội bộ MIỄN PHÍ
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Quảng cáo thông tin giúp tin
                                                    tuyển dụng được phủ rộng
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Quảng cáo công ty trên Fanpage số
                                                    1 về việc làm - tuyển dụng
                                                </li>
                                            </ul>
                                            <a href="{{route('filament.employer.auth.login')}}"
                                               class="btn btn-warning text-white mt-2">Đăng
                                                nhập nhà tuyển dụng</a>
                                        </div>
                                    </div>
                                </div>
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
                <div class="mobile-account">
                    @if(auth()->check())
                        <h6 class="mb-10">Tài khoản của bạn</h6>
                        <ul class="mobile-menu font-heading">
                            @if(auth()->user()->role == 'candidate')
                                <li>
                                    <a href="{{ route('client.candidate.notification') }}">
                                        {{-- <i class="bi bi-bell-fill"></i>  --}}
                                        Thông báo
                                        <span
                                            class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                                    </a>
                                </li>
                                <li><a href="{{route('client.candidate.profile')}}">Hồ sơ</a></li>
                                <li><a href="{{route('client.candidate.logout')}}">Đăng xuất</a></li>
                            @else
                                <li><a href="{{route('client.employer.login')}}">Tuyển dụng</a></li>
                                <li><a href="{{route('client.candidate.login')}}">Ứng viên</a></li>
                            @endif
                        </ul>
                    @else
                        <h6 class="mb-10">Đăng nhập</h6>
                        <ul class="mobile-menu font-heading">
                            <li><a href="{{route('client.employer.login')}}">Đăng nhập Tuyển dụng</a></li>
                            <li><a href="{{route('client.candidate.login')}}">Đăng nhập Ứng viên</a></li>
                        </ul>
                    @endif
                </div>
                <hr>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class='active' href='/'>Trang chủ</a></li>
                            <li class="has-children"><a href='{{route('client.job.index')}}'>Việc làm</a></li>
                            <li class="has-children"><a href='{{route('client.employer.index')}}'>Công ty</a></li>
                            <li class="has-children"><a href='{{route('client.post.index')}}'>Tin tức</a></li>
                            <li class="has-children"><a href='{{route('client.client.about')}}'>Giới thiệu</a></li>
                            <li class="has-children"><a href='{{route('client.pricing.index')}}'>Bảng giá</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-body {
        display: flex;
        justify-content: space-around;
        align-items: stretch;
        gap: 10px;
        text-align: left;
        background-color: #eee;
    }

    .login-box {
        width: 49%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .login-box ul {
        flex: 1;
        margin-bottom: 10px;
    }

    .login-box a {
        align-self: center;
        width: 100%;
        text-align: center;
    }

    .list-unstyled li {
        margin: 5px 0;
    }

    .list-unstyled li i {
        font-size: 16px;
        margin-right: 5px;
        color: #0b5ed7;
    }
</style>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModalElement = document.getElementById('exampleModal');
            var myModal = new bootstrap.Modal(myModalElement);
            var closeButton = document.querySelector('.modal-header .close');

            myModalElement.addEventListener('shown.bs.modal', function () {
                var myInput = document.getElementById('myInput');
                if (myInput) myInput.focus();
            });

            closeButton.addEventListener('click', function () {
                myModal.hide();
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth <= 1200) {
                    myModal.hide();
                }
            });
        });
    </script>
@endpush
