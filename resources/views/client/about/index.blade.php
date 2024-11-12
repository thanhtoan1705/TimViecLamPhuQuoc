@extends('client.layouts.master')
@section('title', 'Về chúng tôi')

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
                            Chúng tôi luôn sẵn sàng hỗ trợ bạn từ việc tìm kiếm cơ hội
                            việc làm đến chuẩn bị phỏng vấn và tư vấn nghề nghiệp. Với Vieclamphuquoc, bạn sẽ nhận được sự hỗ trợ
                            chuyên nghiệp và chu đáo nhất.</p>
                    </div>
                    <div class="row mt-70">
                        @if(is_object($founders) && isset($founders))
                            @foreach($founders as $item)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                                    <div class="card-grid-4 text-center hover-up">
                                        <div class="image-top-feature">
                                            <figure>
                                                <img alt="jobBox"
                                                    src="{{ getStorageImageUrl($item->image, 'default/user.png') }}">
                                            </figure>
                                        </div>
                                        <div class="card-grid-4-info">
                                            <h5 class="mt-10">{{  $item->name }}</h5>
                                            <p class="font-xs color-text-paragraph-2 mt-5 mb-5">
                                                {{  $item->position }}
                                            </p>
                                            <div class="rate-reviews-small pt-5">
                                                <span>
                                                    <img
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                        alt="jobBox">
                                                </span>
                                                <span>
                                                    <img
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                        alt="jobBox">
                                                </span>
                                                <span>
                                                    <img
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                        alt="jobBox">
                                                </span>
                                                <span>
                                                    <img
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                        alt="jobBox">
                                                </span>
                                                <span>
                                                    <img
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                                        alt="jobBox">
                                                </span>
                                            </div>
                                            <span class="card-location">{{ $item->address }}</span>
                                            <div class="text-center mt-30">

                                                @if(isset($item->facebook))
                                                    <a class="share-facebook social-share-link"
                                                       href="{{ $item->facebook }}" target="_blank">
                                                    </a>
                                                @endif

                                                @if(isset($item->twitter))
                                                    <a class="share-twitter social-share-link"
                                                       href="{{ $item->twitter }}" target="_blank">
                                                    </a>
                                                @endif

                                                @if(isset($item->instagram))
                                                    <a class="share-instagram social-share-link"
                                                       href="{{ $item->instagram }}" target="_blank">
                                                    </a>
                                                @endif

                                                @if(isset($item->linkedin))
                                                    <a class="share-linkedin social-share-link"
                                                       href="{{ $item->linkedin }}" target="_blank">
                                                    </a>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
