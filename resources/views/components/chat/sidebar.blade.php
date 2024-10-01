<!-- Start left sidebar-menu -->
<div class="side-menu flex-lg-column me-lg-1 ms-lg-0">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{route('client.chat.chat')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/chat/images/logo.svg')}}" alt="" height="30">
            </span>
        </a>

        <a href="{{route('client.chat.chat')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/chat/images/logo.svg')}}" alt="" height="30">
            </span>
        </a>
    </div>
    <!-- end navbar-brand-box -->

    <!-- Start side-menu nav -->
    <div class="flex-lg-column my-auto">
        <ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Hồ sơ">
                <a class="nav-link {{ request()->routeIs('client.chat.profile') ? 'active' : '' }}" id="pills-user-tab" href="{{route('client.chat.profile')}}" role="tab">
                    <i class="ri-user-2-line"></i>
                </a>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Tin nhắn">
                <a class="nav-link {{ request()->routeIs('client.chat.chat') ? 'active' : '' }}" id="pills-chat-tab" href="{{route('client.chat.chat')}}" role="tab">
                    <i class="ri-message-3-line"></i>
                </a>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Nhóm">
                <a class="nav-link {{ request()->routeIs('client.chat.group') ? 'active' : '' }}" id="pills-groups-tab" href="{{route('client.chat.group')}}" role="tab">
                    <i class="ri-group-line"></i>
                </a>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Liên hệ">
                <a class="nav-link {{ request()->routeIs('client.chat.contact') ? 'active' : '' }}" id="pills-contacts-tab" href="{{route('client.chat.contact')}}" role="tab">
                    <i class="ri-contacts-line"></i>
                </a>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Cài đặt">
                <a class="nav-link {{ request()->routeIs('client.chat.setting') ? 'active' : '' }}" id="pills-setting-tab" href="{{route('client.chat.setting')}}" role="tab">
                    <i class="ri-settings-2-line"></i>
                </a>
            </li>
            <li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('assets/chat/images/users/avatar-1.jpg')}}" alt="" class="profile-user rounded-circle">
                </a>
                <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('client.chat.profile')}}">Hồ sơ <i class="ri-profile-line float-end text-muted"></i></a>
                    <a class="dropdown-item" href="{{route('client.chat.setting')}}">Cài đặt <i class="ri-settings-3-line float-end text-muted"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Đăng xuất <i class="ri-logout-circle-r-line float-end text-muted"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <!-- end side-menu nav -->

    <div class="flex-lg-column d-none d-lg-block">
        <ul class="nav side-menu-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link light-dark-mode" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Tối / Sáng">
                    <i class='ri-sun-line theme-mode-icon'></i>
                </a>
            </li>

            <li class="nav-item btn-group dropup profile-user-dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('assets/chat/images/users/avatar-1.jpg')}}" alt="" class="profile-user rounded-circle">
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('client.chat.profile')}}">Hồ sơ <i class="ri-profile-line float-end text-muted"></i></a>
                    <a class="dropdown-item" href="{{route('client.chat.setting')}}">Cài đặt <i class="ri-settings-3-line float-end text-muted"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="auth-login.html">Đăng xuất <i class="ri-logout-circle-r-line float-end text-muted"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <!-- Side menu user -->
</div>
<!-- end left sidebar-menu -->
