{{--<div id="preloader-active">--}}
{{--    <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--        <div class="preloader-inner position-relative">--}}
{{--            <div class="text-center"><img src="{{ asset('assets/employer/imgs/template/loading.gif') }}" alt="jobBox">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class='d-flex' href='index.html'><img alt="jobBox"
                                                                                  src="{{ asset('assets/employer/imgs/page/dashboard/logo.svg') }}"></a>
                </div>
                <span class="btn btn-grey-small ml-10">Admin area</span>
            </div>
            <div class="header-search">
                <div class="box-search">
                    <form action="#">
                        <input class="form-control input-search" type="text" name="keyword" placeholder="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="header-menu d-none d-md-block">
                <ul>
                    <li><a href="http://wp.alithemes.com/html/jobbox/demos/index.html">Trang chủ </a></li>
                    <li><a href="http://wp.alithemes.com/html/jobbox/demos/page-about.html">Giới thiệu </a></li>
                    <li><a href="http://wp.alithemes.com/html/jobbox/demos/page-contact.html">Liên hệ</a></li>
                </ul>
            </div>
            <div class="header-right">
                <div class="block-signin"><a class='btn btn-default icon-edit hover-up' href='post-job.html'>Đăng tuyển
                        dụng</a>
                    <div class="dropdown d-inline-block"><a class="btn btn-notify" id="dropdownNotify" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static"></a>
                        <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                            aria-labelledby="dropdownNotify">
                            <li><a class="dropdown-item active" href="#">10 thông báo</a></li>
                            <li><a class="dropdown-item" href="#">12 tin nhắn</a></li>
                            <li><a class="dropdown-item" href="#">20 trả lời</a></li>
                        </ul>
                    </div>
                    <div class="member-login"><img alt=""
                                                   src="{{ asset('assets/employer/imgs/page/dashboard/profile.png') }}">
                        <div class="info-member"><strong class="color-brand-1">Thanh Toàn</strong>
                            <div class="dropdown"><a class="font-xs color-text-paragraph-2 icon-down"
                                                     id="dropdownProfile" type="button" data-bs-toggle="dropdown"
                                                     aria-expanded="false" data-bs-display="static">Quản trị viên</a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                    aria-labelledby="dropdownProfile">
                                    <li><a class='dropdown-item' href='profile.html'>Hồ sơ</a></li>
                                    <li><a class='dropdown-item' href='my-resume.html'>Quản lý CV</a></li>
                                    <li><a class='dropdown-item' href='login.html'>Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
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
                        <ul class="main-menu">
                            <li><a class='dashboard2 active' href='index.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/dashboard.svg') }}"
                                        alt="jobBox"><span class="name">Dashboard</span></a>
                            </li>
                            <li><a class='dashboard2' href='candidates.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/candidates.svg') }}"
                                        alt="jobBox"><span class="name">Candidates</span></a>
                            </li>
                            <li><a class='dashboard2' href='recruiters.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/recruiters.svg') }}"
                                        alt="jobBox"><span class="name">Recruiters</span></a>
                            </li>
                            <li><a class='dashboard2' href='my-job-grid.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/jobs.svg') }}"
                                        alt="jobBox"><span class="name">My Jobs</span></a>
                            </li>
                            <li><a class='dashboard2' href='my-tasks-list.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/tasks.svg') }}" alt="jobBox"><span
                                        class="name">Tasks List</span></a>
                            </li>
                            <li><a class='dashboard2' href='profile.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/profiles.svg') }}"
                                        alt="jobBox"><span class="name">My Profiles</span></a>
                            </li>
                            <li><a class='dashboard2' href='my-resume.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/cv-manage.svg') }}"
                                        alt="jobBox"><span class="name">CV Manage</span></a>
                            </li>
                            <li><a class='dashboard2' href='settings.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/settings.svg') }}"
                                        alt="jobBox"><span class="name">Setting</span></a>
                            </li>
                            <li><a class='dashboard2' href='authentication.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/authentication.svg') }}"
                                        alt="jobBox"><span class="name">Authentication</span></a>
                            </li>
                            <li><a class='dashboard2' href='login.html'><img
                                        src="{{ asset('assets/employer/imgs/page/dashboard/logout.svg') }}"
                                        alt="jobBox"><span class="name">Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Work Preferences</a></li>
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Go Pro</a></li>
                        <li><a href="page-signin.html">Sign Out</a></li>
                    </ul>
                    <div class="mb-15 mt-15"><a class='btn btn-default icon-edit hover-up' href='post-job.html'>Post
                            Job</a></div>
                </div>
                <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
            </div>
        </div>
    </div>
</div>
