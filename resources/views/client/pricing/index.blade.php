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
                <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">
                    Chọn gói tin tốt nhất dành cho bạn
                </div>
                <div class="max-width-price">
                    <div class="block-pricing mt-70">
                        <div class="row justify-content-center">
                            @foreach($packages as $package)
                                @php
                                    $purchased = $userPackages->filter(function ($userPackage) use ($package) {
                                        return $userPackage->packages_id == $package->id;
                                    })->isNotEmpty();
                                    $canPurchase = $package->display_best == 1
                                        ? $packages->where('display_best', 1)->count() < 6
                                        : ($package->display_top == 1
                                            ? $packages->where('display_top', 1)->count() < 6
                                            : true);
                                @endphp
                                <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                                     data-wow-delay=".{{ $loop->iteration }}s">
                                    <div class="pricing-card">
                                        <div class="pricing-header">
                                            @if($package->display_best)
                                                <div class="popular-label">Phổ biến nhất</div>
                                            @endif
                                            <h3 class="text-brand">{{ $package->title }}</h3>
                                            <div class="box-info-price">
                                                <span
                                                    class="text-price">{{ number_format($package->price, 0, ',', '.') }}</span>
                                                <span class="text-month">VND/{{ $package->period }} ngày</span>
                                            </div>
                                            <div class="pricing-description">
                                                <p>{{ $package->description ?? 'Gói dịch vụ phù hợp cho doanh nghiệp của bạn' }}</p>
                                            </div>
                                        </div>

                                        <div class="pricing-content">
                                            <ul class="features-list">
                                                <li>
                                                    <i class="fi-rs-check"></i>
                                                    Đăng thêm {{ $package->limit_job_post }} tin tuyển dụng
                                                </li>

                                                @if ($package->label != 0)
                                                    <li>
                                                        <i class="fi-rs-check"></i>
                                                        @if ($package->label == 1)
                                                            <span class="text-danger">GẤP</span> - Nổi bật với nhãn
                                                            "GẤP"
                                                        @elseif ($package->label == 2)
                                                            <span class="text-warning">HOT</span> - Nổi bật với nhãn
                                                            "HOT"
                                                        @endif
                                                    </li>
                                                @endif

                                                @if ($package->display_top == 1)
                                                    <li><i class="fi-rs-check"></i> Hiển thị ưu tiên trên đầu trang</li>
                                                @endif

                                                @if ($package->display_best == 1)
                                                    <li><i class="fi-rs-check"></i> Vị trí hiển thị tốt nhất</li>
                                                @endif

                                                @if ($package->display_haste == 1)
                                                    <li><i class="fi-rs-check"></i> Ưu tiên hiển thị hàng đầu</li>
                                                @endif

                                                <li><i class="fi-rs-check"></i> Hỗ trợ 24/7</li>
                                                <li><i class="fi-rs-check"></i> Bảo hành dịch vụ</li>
                                            </ul>
                                        </div>

                                        <div class="pricing-button">
                                            <form action="{{ route('client.employer.payment') }}" method="GET">
                                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                <button type="submit"
                                                        class="btn btn-border hover-up w-100"
                                                        @if(!$canPurchase) disabled @endif
                                                        style="@if(!$canPurchase) opacity: 0.5; cursor: not-allowed; @endif">
                                                    @if(!$canPurchase)
                                                        Đã đủ số lượng
                                                    @else
                                                        {{ $purchased ? 'Gia hạn' : 'Đăng ký' }}
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
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

@push('css')
    <style>
        .pricing-card {
            height: 100%;
            min-height: 700px;
            background: #fff;
            border: 1px solid #e0e6f7;
            border-radius: 16px;
            position: relative;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .pricing-card.active {
            border-color: #3C65F5;
            box-shadow: 0 10px 30px rgba(60, 101, 245, 0.1);
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }

        .pricing-header {
            padding: 40px 30px 20px;
            border-bottom: 1px solid #e0e6f7;
        }

        .popular-label {
            position: absolute;
            top: 15px;
            right: -42px;
            background: linear-gradient(to right, #3C65F5, #6084FF);
            color: #fff;
            padding: 5px 40px;
            transform: rotate(45deg);
            font-size: 12px;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(60, 101, 245, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 1;
            white-space: nowrap;
            width: 170px;
            text-align: center;
        }

        .text-price {
            font-size: 25px !important;
            font-weight: bold;
            color: #05264E;
            line-height: 1;
        }

        .text-month {
            font-size: 16px;
            color: #66789C;
        }

        .pricing-description {
            margin-top: 15px;
            color: #4F5E64;
        }

        .pricing-content {
            flex: 1;
            padding: 30px;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .features-list li {
            padding: 10px 0;
            color: #4F5E64;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .features-list i {
            color: #3C65F5;
            font-size: 16px;
        }

        .pricing-button {
            padding: 0 30px 40px;
            margin-top: auto;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-brand {
            background-color: #3C65F5;
            color: #fff;
        }

        .btn-border {
            border: 1px solid #3C65F5;
            color: #3C65F5;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Đảm bảo các cột trong row có chiều cao bằng nhau */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-xl-4 {
            display: flex;
            margin-bottom: 30px;
        }

        .pricing-card:has(.popular-label) {
            border: 2px solid #3C65F5;
        }

        .pricing-card:has(.popular-label):hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(60, 101, 245, 0.15);
        }
    </style>
@endpush

