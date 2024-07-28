@extends('client.layouts.master')
@section('title', 'Tạo mật khẩu mới')

@section('content')
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
                                <li class="has-children"><a class='active' href='index.html'>Home</a>
                                    <ul class="sub-menu">
                                        <li><a href='index.html'>Home 1</a></li>
                                        <li><a href='index-2.html'>Home 2</a></li>
                                        <li><a href='index-3.html'>Home 3</a></li>
                                        <li><a href='index-4.html'>Home 4</a></li>
                                        <li><a href='index-5.html'>Home 5</a></li>
                                        <li><a href='index-6.html'>Home 6</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='jobs-grid.html'>Find a Job</a>
                                    <ul class="sub-menu">
                                        <li><a href='jobs-grid.html'>Jobs Grid</a></li>
                                        <li><a href='jobs-list.html'>Jobs List</a></li>
                                        <li><a href='job-details.html'>Jobs Details</a></li>
                                        <li><a href='job-details-2.html'>Jobs Details 2</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='companies-grid.html'>Recruiters</a>
                                    <ul class="sub-menu">
                                        <li><a href='companies-grid.html'>Recruiters</a></li>
                                        <li><a href='company-details.html'>Company Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='candidates-grid.html'>Candidates</a>
                                    <ul class="sub-menu">
                                        <li><a href='candidates-grid.html'>Candidates Grid</a></li>
                                        <li><a href='candidate-details.html'>Candidate Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='blog-grid.html'>Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href='page-about.html'>About Us</a></li>
                                        <li><a href='page-pricing.html'>Pricing Plan</a></li>
                                        <li><a href='page-contact.html'>Contact Us</a></li>
                                        <li><a href='page-register.html'>Register</a></li>
                                        <li><a href='page-signin.html'>Signin</a></li>
                                        <li><a href='page-reset-password.html'>Reset Password</a></li>
                                        <li><a href='page-content-protected.html'>Content Protected</a></li>
                                        <li><a href='page-404.html'>404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='blog-grid.html'>Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href='blog-grid.html'>Blog Grid</a></li>
                                        <li><a href='blog-grid-2.html'>Blog Grid 2</a></li>
                                        <li><a href='blog-details.html'>Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://wp.alithemes.com/html/jobbox/demos/dashboard"
                                        target="_blank">Dashboard</a></li>
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
                            <li><a href='page-signin.html'>Sign Out</a></li>
                        </ul>
                    </div>
                    <div class="site-copyright">Copyright 2022 &copy; JobBox.<br>Designed by AliThemes.</div>
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
                                <li class="has-children"><a class='active' href='index.html'>Home</a>
                                    <ul class="sub-menu">
                                        <li><a href='index.html'>Home 1</a></li>
                                        <li><a href='index-2.html'>Home 2</a></li>
                                        <li><a href='index-3.html'>Home 3</a></li>
                                        <li><a href='index-4.html'>Home 4</a></li>
                                        <li><a href='index-5.html'>Home 5</a></li>
                                        <li><a href='index-6.html'>Home 6</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='jobs-grid.html'>Find a Job</a>
                                    <ul class="sub-menu">
                                        <li><a href='jobs-grid.html'>Jobs Grid</a></li>
                                        <li><a href='jobs-list.html'>Jobs List</a></li>
                                        <li><a href='job-details.html'>Jobs Details</a></li>
                                        <li><a href='job-details-2.html'>Jobs Details 2</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='companies-grid.html'>Recruiters</a>
                                    <ul class="sub-menu">
                                        <li><a href='companies-grid.html'>Recruiters</a></li>
                                        <li><a href='company-details.html'>Company Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='candidates-grid.html'>Candidates</a>
                                    <ul class="sub-menu">
                                        <li><a href='candidates-grid.html'>Candidates Grid</a></li>
                                        <li><a href='candidate-details.html'>Candidate Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='blog-grid.html'>Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href='page-about.html'>About Us</a></li>
                                        <li><a href='page-pricing.html'>Pricing Plan</a></li>
                                        <li><a href='page-contact.html'>Contact Us</a></li>
                                        <li><a href='page-register.html'>Register</a></li>
                                        <li><a href='page-signin.html'>Signin</a></li>
                                        <li><a href='page-reset-password.html'>Reset Password</a></li>
                                        <li><a href='page-content-protected.html'>Content Protected</a></li>
                                        <li><a href='page-404.html'>404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href='blog-grid.html'>Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href='blog-grid.html'>Blog Grid</a></li>
                                        <li><a href='blog-grid-2.html'>Blog Grid 2</a></li>
                                        <li><a href='blog-details.html'>Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://wp.alithemes.com/html/jobbox/demos/dashboard"
                                        target="_blank">Dashboard</a></li>
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
                            <li><a href='page-signin.html'>Sign Out</a></li>
                        </ul>
                    </div>
                    <div class="site-copyright">Copyright 2022 &copy; JobBox.<br>Designed by AliThemes.</div>
                </div>
            </div>
        </div>
    </div>
    <main class="main">
        <section class="pt-100 login-register">
            <div class="container">
                <div class="row login-register-cover">
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="text-center">
                            <p class="font-sm text-brand-2">Quên mật khẩu</p>
                            <h2 class="mt-10 mb-5 text-brand-1">Tạo mật khẩu mới</h2>
                            <p class="font-sm text-muted mb-30">
                                Mật khẩu phải từ 8 ký tự kết hợp các ký tự a-z, số 0-9 và một số ký tự đặc biệt
                            </p>
                        </div>
                        <form class="login-register text-start mt-20" action="#">
                            <div class="form-group">
                                <input class="form-control" id="input-1" type="password" required=""
                                    name="password" placeholder="Mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="input-1" type="password" required=""
                                    name="re_password" placeholder="Nhập lại mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-brand-1 hover-up w-100" type="submit" name="continue">Xác
                                    nhận</button>
                            </div>
                            <div class="text-muted text-center"><a href='page-signin.html'>Đăng
                                    nhập</a></div>
                        </form>
                    </div>
                    <div class="img-1 d-none d-lg-block"><img class="shape-1"
                            src="{{ asset('assets/client/imgs/page/login-register/img-5.svg') }}" alt="JobBox"></div>
                    <div class="img-2"><img src="{{ asset('assets/client/imgs/page/login-register/img-3.svg') }}"
                            alt="JobBox"></div>
                </div>
            </div>
        </section>
    </main>
@endsection
