@extends('client.layouts.master')
@section('title', 'Giới thiệu')

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
        <section class="section-box">
            <div class="breacrumb-cover bg-img-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="mb-10">Về chúng tôi</h2>
                            <p class="font-lg color-text-paragraph-2">Nhận tin tức, cập nhật và mẹo mới nhất</p>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <ul class="breadcrumbs mt-40">
                                <li><a class="home-icon" href="/">Trang chủ</a></li>
                                <li>Về chúng tôi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="post-loop-grid">
                <div class="container">
                    <div class="text-center">
                        <h6 class="f-18 color-text-mutted text-uppercase">CÔNG TY CHÚNG TÔI</h6>
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Về công ty chúng tôi</h2>
                        <p class="font-sm color-text-paragraph wow animate__animated animate__fadeInUp w-lg-50 mx-auto">
                            JobBox là nền tảng tìm kiếm việc làm hàng đầu, kết nối ứng viên với các nhà tuyển dụng uy tín.
                            Chúng tôi cung cấp dịch vụ tư vấn nghề nghiệp, hỗ trợ viết CV và chuẩn bị phỏng vấn, giúp bạn
                            tìm được công việc phù hợp nhanh chóng.</p>
                    </div>
                    <div class="row mt-70">
                        <div class="col-lg-6 col-md-12 col-sm-12"><img
                                src="{{ asset('assets/client/imgs/page/about/img-about2.png') }}" alt="joxBox"></div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3 class="mt-15">Chúng ta có thể làm gì?</h3>
                            <div class="mt-20">
                                <p class="font-md color-text-paragraph mt-20">Chúng tôi tại JobBox cam kết cung cấp các
                                    giải pháp toàn diện để hỗ trợ bạn trong quá
                                    trình tìm kiếm việc làm. Với nền tảng công nghệ tiên tiến, chúng tôi giúp bạn dễ dàng
                                    tìm kiếm và kết nối với những nhà tuyển dụng hàng đầu.</p>
                                <p class="font-md color-text-paragraph mt-20">Dịch vụ tư vấn nghề nghiệp của chúng tôi được
                                    thiết kế để cung cấp cho bạn những lời
                                    khuyên quý báu, giúp bạn xác định
                                    hướng đi phù hợp trong sự nghiệp.</p>
                                <p class="font-md color-text-paragraph mt-20">Chúng tôi còn hỗ trợ viết CV chuyên nghiệp,
                                    giúp hồ sơ
                                    của bạn nổi bật và thu hút sự chú ý từ nhà tuyển dụng. Đội ngũ chuyên gia của chúng tôi
                                    sẽ hướng dẫn bạn chuẩn bị cho các buổi phỏng vấn, giúp bạn tự tin và sẵn sàng đối mặt
                                    với mọi thử thách.</p>
                                <p class="font-md color-text-paragraph mt-20">Bằng cách hợp tác với JobBox, bạn sẽ nhận
                                    được sự hỗ trợ tận tâm và
                                    toàn diện để nắm bắt cơ hội và đạt được mục tiêu nghề nghiệp của mình.</p>
                            </div>
                            <div class="mt-30"><a class="btn btn-brand-1" href="#">Đọc Thêm</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-80">
            <div class="post-loop-grid">
                <div class="container">
                    <div class="text-center">
                        <h6 class="f-18 color-text-mutted text-uppercase">CÔNG TY CHÚNG TÔI</h6>
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Gặp đội của chúng tôi</h2>
                        <p class="font-sm color-text-paragraph w-lg-50 mx-auto wow animate__animated animate__fadeInUp">
                            Gặp gỡ đội ngũ chuyên gia tại JobBox, những người tận tâm và giàu kinh nghiệm trong lĩnh vực
                            tuyển dụng và phát triển sự nghiệp. Chúng tôi luôn sẵn sàng hỗ trợ bạn từ việc tìm kiếm cơ hội
                            việc làm đến chuẩn bị phỏng vấn và tư vấn nghề nghiệp. Với JobBox, bạn sẽ nhận được sự hỗ trợ
                            chuyên nghiệp và chu đáo nhất.</p>
                    </div>
                    <div class="row mt-70">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team1.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Arlene McCoy</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team2.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Floyd Miles</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">UI/UX Designer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>28</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team3.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Devon Lane</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team4.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Jerome Bell</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team5.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Theresa</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team6.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Cameron</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team7.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Jacob Jones</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 text-center hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobBox"
                                            src="{{ asset('assets/client/imgs/page/about/team8.png') }}"></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-10">Court Henry</h5>
                                    <p class="font-xs color-text-paragraph-2 mt-5 mb-5">Frontend Developer</p>
                                    <div class="rate-reviews-small pt-5"><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span><img
                                                src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                alt="jobBox"></span><span
                                            class="ml-10 color-text-mutted font-xs"><span>(</span><span>65</span><span>)</span></span>
                                    </div><span class="card-location">Việt Nam, Cần Thơ</span>
                                    <div class="text-center mt-30"><a class="share-facebook social-share-link"
                                            href="#"></a><a class="share-twitter social-share-link"
                                            href="#"></a><a class="share-instagram social-share-link"
                                            href="#"></a><a class="share-linkedin social-share-link"
                                            href="#"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-start">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin tức và Blog</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Nhận tin tức, cập
                        nhật và mẹo mới nhất</p>
                </div>
            </div>
            <div class="container">
                <div class="mt-50">
                    <div class="box-swiper style-nav-top">
                        <div class="swiper-container swiper-group-3 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/homepage1/img-news1.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>Tin
                                                    tức</a>
                                            </div>
                                            <h5><a href='blog-details.html'>21 mẹo phỏng vấn xin việc: Cách tạo ấn
                                                    tượng tốt</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo ra
                                                công ty chăm sóc sức khỏe bền vững nhất thế giới bằng cách tạo ra các sản
                                                phẩm chăm sóc sức khỏe chất lượng cao với bao bì bền vững, mang tính biểu
                                                tượng.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                src="{{ asset('assets/client/imgs/page/homepage1/user1.png') }}"
                                                                alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Sarah
                                                                    Harding</span><br><span
                                                                    class="font-xs color-text-paragraph-2">ngày 06 tháng
                                                                    9</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">8 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/homepage1/img-news2.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>Sự
                                                    kiện</a></div>
                                            <h5><a href='blog-details.html'>39 điểm mạnh và điểm yếu cần thảo luận trong
                                                    cuộc phỏng vấn xin việc</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo ra
                                                công ty chăm sóc sức khỏe bền vững nhất thế giới bằng cách tạo ra các sản
                                                phẩm chăm sóc sức khỏe chất lượng cao với bao bì bền vững, mang tính biểu
                                                tượng.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                src="{{ asset('assets/client/imgs/page/homepage1/user2.png') }}"
                                                                alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Steven
                                                                    Jobs</span><br><span
                                                                    class="font-xs color-text-paragraph-2">ngày 06 tháng
                                                                    9</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">6 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/homepage1/img-news3.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>Tin
                                                    tức</a>
                                            </div>
                                            <h5><a href='blog-details.html'>Câu hỏi phỏng vấn: Tại sao bạn không
                                                    có bằng cấp?</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Tìm hiểu cách trả lời nếu người
                                                phỏng vấn hỏi bạn tại sao
                                                bạn không có bằng cấp và đọc các câu trả lời ví dụ có thể
                                                giúp bạn thành thạo.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                src="{{ asset('assets/client/imgs/page/homepage1/user3.png') }}"
                                                                alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Wiliam
                                                                    Kend</span><br><span
                                                                    class="font-xs color-text-paragraph-2">ngày 06 tháng
                                                                    9</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">9 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="text-center"><a class='btn btn-brand-1 btn-icon-load mt--30 hover-up'
                            href='blog-grid.html'>Tải thêm bài viết</a></div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30 mb-40">
            <div class="container">
                <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Khách hàng hạnh phúc của chúng tôi
                </h2>
                <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">Khi nói đến
                    việc chọn đúng nhà cung cấp dịch vụ lưu trữ web, chúng tôi biết việc đó dễ dàng như thế nào<br
                        class="d-none d-lg-block"> is
                    là bị choáng ngợp bởi số lượng.</div>
                <div class="row mt-50">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-3 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-6 hover-up">
                                        <div class="card-text-desc mt-10">
                                            <p class="font-md color-text-paragraph">Khách hàng nói về JobBox: "JobBox đã
                                                giúp tôi tìm được công việc mơ ước một cách nhanh chóng và dễ dàng. Dịch vụ
                                                tư vấn nghề nghiệp và hỗ trợ viết CV của họ thực sự tuyệt vời. Tôi rất hài
                                                lòng với sự chuyên nghiệp và tận tâm của đội ngũ JobBox."</p>
                                        </div>
                                        <div class="card-image">
                                            <div class="image">
                                                <figure><img alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/about/user1.png') }}">
                                                </figure>
                                            </div>
                                            <div class="card-profile">
                                                <h6>Mark Adair</h6><span>Doanh nhân</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-6 hover-up">
                                        <div class="card-text-desc mt-10">
                                            <p class="font-md color-text-paragraph">Khách hàng nói về JobBox: "JobBox đã
                                                giúp tôi tìm được công việc mơ ước một cách nhanh chóng và dễ dàng. Dịch vụ
                                                tư vấn nghề nghiệp và hỗ trợ viết CV của họ thực sự tuyệt vời. Tôi rất hài
                                                lòng với sự chuyên nghiệp và tận tâm của đội ngũ JobBox."</p>
                                        </div>
                                        <div class="card-image">
                                            <div class="image">
                                                <figure><img alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/about/user2.png') }}">
                                                </figure>
                                            </div>
                                            <div class="card-profile">
                                                <h6>Mark Adair</h6><span>Doanh nhân</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-6 hover-up">
                                        <div class="card-text-desc mt-10">
                                            <p class="font-md color-text-paragraph">Khách hàng nói về JobBox: "JobBox đã
                                                giúp tôi tìm được công việc mơ ước một cách nhanh chóng và dễ dàng. Dịch vụ
                                                tư vấn nghề nghiệp và hỗ trợ viết CV của họ thực sự tuyệt vời. Tôi rất hài
                                                lòng với sự chuyên nghiệp và tận tâm của đội ngũ JobBox."</p>
                                        </div>
                                        <div class="card-image">
                                            <div class="image">
                                                <figure><img alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/about/user3.png') }}">
                                                </figure>
                                            </div>
                                            <div class="card-profile">
                                                <h6>Mark Adair</h6><span>Doanh nhân</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
