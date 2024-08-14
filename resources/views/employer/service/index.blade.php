@extends('employer.layouts.master')
@section('title', 'Danh sách dịch vụ')
@section('content')

    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Mua dịch vụ</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href=''>Quản trị</a></li>
                        <li><span>Mua dịch vụ</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container panel-white">
                <h3 class="text-center mt-40 mb-15 wow animate__animated animate__fadeInUp">Bảng giá</h3>
                <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">
                    Chọn gói tin tốt nhất dành cho bạn
                </div>

                <div class="max-width-price">
                    <div class="block-pricing mt-70">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                                 data-wow-delay=".1s">
                                <div class="box-pricing-item" style="background-color: #fff">
                                    <h3>Cơ bản</h3>
                                    <div class="box-info-price"><span class="text-price color-brand-2">$19</span><span
                                            class="text-tháng">/tháng</span></div>
                                    <div class="border-bottom mb-30">
                                        <p class="text-desc-package font-sm color-text-paragraph mb-30">
                                            Dành cho hầu hết các doanh nghiệp muốn tối ưu
                                        </p>
                                    </div>
                                    <ul class="list-package-feature">
                                        <li>Cập nhật không giới hạn</li>
                                        <li>Custom designs &amp; features</li>
                                        <li>Quyền tùy chỉnh</li>
                                        <li>Quyền tùy chỉnh</li>
                                        <li>Phiếu hỗ trợ miễn phí</li>
                                    </ul>
                                    <div><a class="btn btn-border" href="#">Mua ngay</a></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                                 data-wow-delay=".2s">
                                <div class="box-pricing-item" style="background-color: #fff">
                                    <h3>Tiêu chuẩn</h3>
                                    <div class="box-info-price"><span
                                            class="text-price for-tháng display-tháng">$29</span><span
                                            class="text-tháng">/tháng</span></div>
                                    <div class="border-bottom mb-30">
                                        <p class="text-desc-package mb-30">
                                            Dành cho hầu hết các doanh nghiệp muốn tối ưu
                                        </p>
                                    </div>
                                    <ul class="list-package-feature">
                                        <li>Cập nhật không giới hạn</li>
                                        <li>Custom designs &amp; features</li>
                                        <li>Quyền tùy chỉnh</li>
                                        <li>Quyền tùy chỉnh</li>
                                        <li>Phiếu hỗ trợ miễn phí</li>
                                    </ul>
                                    <div><a class="btn btn-border" href="#">Mua ngay</a></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                                 data-wow-delay=".4s">
                                <div class="box-pricing-item" style="background-color: #fff">
                                    <h3>Doanh nghiệp</h3>
                                    <div class="box-info-price"><span
                                            class="text-price for-tháng display-tháng">$49</span><span
                                            class="text-tháng">/tháng</span></div>
                                    <div class="border-bottom mb-30">
                                        <p class="text-desc-package mb-30">
                                            Dành cho hầu hết các doanh nghiệp muốn tối ưu
                                        </p>
                                    </div>
                                    <ul class="list-package-feature">
                                        <li>Cập nhật không giới hạn</li>
                                        <li>Custom designs &amp; features</li>
                                        <li>Quyền tùy chỉnh</li>
                                        <li>Quyền tùy chỉnh</li>
                                        <li>Phiếu hỗ trợ miễn phí</li>
                                    </ul>
                                    <div><a class="btn btn-border" href="#">Mua ngay</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-employer.footer></x-employer.footer>
    </div>

@endsection


@push('css')
    <style>
        .block-pricing .list-package-feature li {
            display: inline-block;
            width: 100%;
            padding: 4px 0px 4px 35px;
            background: url({{ asset('assets/client/imgs/template/icons/check-circle.svg') }}) no-repeat left center;
            margin-bottom: 20px;
            font-size: 15px;
            line-height: 20px;
            color: #4F5E64;
        }
    </style>
@endpush

