@extends('client.layouts.master')
@section('title', 'Bảng giá đăng tin Vip')
@section('content')
    <main class="main">
        <section class="section-box">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="mb-10">Bảng giá</h2>
                            <p class="font-lg color-text-paragraph-2">Giá được xây dựng để phù hợp với các nhóm thuộc
                                mọi quy mô.</p>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <ul class="breadcrumbs mt-40">
                                <li><a class="home-icon" href="#">Trang chủ</a></li>
                                <li>Bảng giá</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-90">
            <div class="container">
                <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Bảng giá</h2>
                <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">Chọn gói
                    tin tốt nhất dành cho bạn
                </div>
                <div class="max-width-price">
                    <div class="block-pricing mt-70">
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                                     data-wow-delay=".1s">
                                    <div class="box-pricing-item">
                                        <h3>{{ $package -> title }}</h3>
                                        <div class="box-info-price d-flex">
                                            <h6 class="color-brand-2">{{ number_format($package->price, 0, ',', '.') }} VND</h6>
                                            <span class="text-tháng">/{{ $package->period }} ngày</span>
                                        </div>
                                        <div class="border-bottom mb-30">
                                            <p class="text-desc-package font-sm color-text-paragraph mb-30">
                                                Dành cho hầu hết các doanh nghiệp muốn tối ưu
                                            </p>
                                        </div>
                                        <ul class="features">
                                            <li>Được bảo hành dịch vụ</li>
                                            @if ($package->label != 0)
                                                <li>
                                                    @if ($package->label == 1)
                                                        Tin tuyển dụng được gắn nhãn GẤP vào tiêu đề tin.
                                                    @elseif ($package->label == 2)
                                                        Tin tuyển dụng được gắn nhãn HOT vào tiêu đề tin.
                                                    @endif
                                                </li>
                                            @endif
                                            @if (!($package->display_haste == 0 && $package->display_best == 0 && $package->display_top == 0))
                                                <li>
                                                    @if ($package->display_top == 1)
                                                        Đăng tin tuyển dụng với vị trí nổi bật.
                                                    @elseif ($package->display_best == 1)
                                                        Đăng tin tuyển dụng với vị trí tốt nhất.
                                                    @elseif ($package->display_haste == 1)
                                                        Đăng tin tuyển dụng với vị trí hàng đầu.
                                                    @endif
                                                </li>
                                            @endif
                                            <li>Đăng {{ $package->limit_job_post }} bản tin/tháng</li>
                                        </ul>
                                        <div><a class="btn btn-border" href="#">Mua ngay</a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-90 mb-50">
            <div class="container">
                <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Câu hỏi thường gặp</h2>
                <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">
                    Những câu hỏi phổ biến của khách hàng
                </div>
                <div class="row mt-50">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card-grid-border hover-up wow animate__animated animate__fadeIn">
                            <h4 class="mb-20">Tôi có mã khuyến mại hoặc giảm giá?</h4>
                            <p class="font-sm mb-20 color-text-paragraph">
                                Khách hàng rất quan trọng, khách hàng sẽ được khách hàng theo đuổi. Bạn có mức độ sống
                                mà chất độc tôn lên. Bạn có một chiếc xe tuyệt vời để bạn không có thời gian buồn bã.
                            </p>
                            <a class="link-arrow" href="#">Tiếp tục đọc</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card-grid-border hover-up wow animate__animated animate__fadeIn">
                            <h4 class="mb-20">Tôi có mã khuyến mại hoặc giảm giá?</h4>
                            <p class="font-sm mb-20 color-text-paragraph">
                                Khách hàng rất quan trọng, khách hàng sẽ được khách hàng theo đuổi. Bạn có mức độ sống
                                mà chất độc tôn lên. Bạn có một chiếc xe tuyệt vời để bạn không có thời gian buồn bã.
                            </p>
                            <a class="link-arrow" href="#">Tiếp tục đọc</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="section-box mt-30 mb-40">
            <div class="container">
                <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Cảm nhận của khách hàng</h2>
                <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">
                    Khi nói đến việc chọn đúng nhà cung cấp dịch vụ lưu trữ web, chúng tôi biết việc đó dễ dàng như thế
                    nào.<br class="d-none d-lg-block">
                </div>
                <div class="row mt-50">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-3 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-6 hover-up">
                                        <div class="card-text-desc mt-10">
                                            <p class="font-md color-text-paragraph">
                                                Khách hàng rất quan trọng, khách hàng sẽ được khách hàng theo đuổi.
                                                Bạn có mức độ sống mà chất độc tôn lên.
                                                Bạn có một chiếc xe tuyệt vời để bạn không có thời gian buồn bã.
                                            </p>
                                        </div>
                                        <div class="card-image">
                                            <div class="image">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/about/user1.png') }}">
                                                </figure>
                                            </div>
                                            <div class="card-profile">
                                                <h6>Khoa Nguyen</h6><span>Lập trình viên</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-6 hover-up">
                                        <div class="card-text-desc mt-10">
                                            <p class="font-md color-text-paragraph">
                                                Khách hàng rất quan trọng, khách hàng sẽ được khách hàng theo đuổi.
                                                Bạn có mức độ sống mà chất độc tôn lên.
                                                Bạn có một chiếc xe tuyệt vời để bạn không có thời gian buồn bã.
                                            </p>
                                        </div>
                                        <div class="card-image">
                                            <div class="image">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/about/user2.png') }}">
                                                </figure>
                                            </div>
                                            <div class="card-profile">
                                                <h6>Khoa Nguyen</h6><span>Lập trình viên</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-6 hover-up">
                                        <div class="card-text-desc mt-10">
                                            <p class="font-md color-text-paragraph">
                                                Khách hàng rất quan trọng, khách hàng sẽ được khách hàng theo đuổi.
                                                Bạn có mức độ sống mà chất độc tôn lên.
                                                Bạn có một chiếc xe tuyệt vời để bạn không có thời gian buồn bã.
                                            </p>
                                        </div>
                                        <div class="card-image">
                                            <div class="image">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/about/user3.png') }}">
                                                </figure>
                                            </div>
                                            <div class="card-profile">
                                                <h6>Khoa Nguyen</h6><span>Lập trình viên</span>
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

