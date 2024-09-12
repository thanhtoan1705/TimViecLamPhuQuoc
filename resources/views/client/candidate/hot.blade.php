@extends('client.layouts.master')
@section('title', 'Ứng viên nổi bật')
@section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-company">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp">Các ứng viên nổi bật</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Hãy tìm các ứng viên ở đây, <br class="d-none d-xl-block">nơi mà các
                            nhà
                            tuyển dụng tuyển tìm kiếm
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <livewire:client.candidate.candidate />
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin tức</h2>
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
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>News</a>
                                            </div>
                                            <h5><a href='blog-details.html'>21 mẹo phỏng vấn xin việc: Cách tạo ấn
                                                    tượng tốt</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc
                                                sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                các sản phẩm chăm sóc sức khỏe chất lượng cao với
                                                bao bì bền vững, mang tính biểu tượng.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user1.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh
                                                                    Toàn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 7</span></div>
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
                                                    kiến</a></div>
                                            <h5><a href='blog-details.html'>39 điểm mạnh và điểm yếu để thảo luận một
                                                    cách
                                                    Phỏng vấn xin việc</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                sản phẩm chăm sóc sức khỏe chất lượng cao trong bao bì mang tính biểu
                                                tượng,
                                                bền vững.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user2.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh
                                                                    Toàn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 6</span></div>
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
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>News</a>
                                            </div>
                                            <h5><a href='blog-details.html'>Câu hỏi phỏng vấn: Tại sao bạn không có
                                                    Bằng cấp?</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Tìm hiểu cách phản ứng nếu
                                                người phỏng vấn hỏi bạn tại sao bạn không có bằng cấp và đọc các câu trả
                                                lời
                                                ví dụ
                                                điều đó có thể giúp bạn chế tạo</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user3.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Khoa
                                                                    Nguyễn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 2</span></div>
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
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png') }}" alt="joxBox">
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">Những điều mới sẽ luôn luôn<br> Cập nhật thường
                                xuyên</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading icon-send-letter">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-right.png') }}" alt="joxBox">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
