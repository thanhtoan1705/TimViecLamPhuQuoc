@extends('client.layouts.master')
@section('title', 'Trang Liên hệ')
@section('content')
    <main class="main">
        <section class="section-box">
            <div class="breacrumb-cover bg-img-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="mb-10">Liên hệ</h2>
                            <p class="font-lg color-text-paragraph-2">Nhận tin tức, cập nhật và mẹo mới nhất</p>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <ul class="breadcrumbs mt-40">
                                <li><a class="home-icon" href="{{ route('client.client.index') }}">Trang chủ</a></li>
                                <li>Liên hệ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb-40">
                        <h3 class="mt-5 mb-10">Liên hệ với chúng tôi</h3>

                        <form class="contact-form-style mt-30" id="contact-form" action="" method="post">
                            @csrf
                            <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <input value="{{ old('name') }}" class="font-sm color-text-paragraph-2" name="name" placeholder="Họ và tên" type="text">

                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <input value="{{ old('phone') }}" class="font-sm color-text-paragraph-2" name="phone" placeholder="Số điện thoại" type="text">

                                        @error('phone')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <input value="{{ old('email') }}" class="font-sm color-text-paragraph-2" name="email" placeholder="Email" type="email">

                                        @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea class="font-sm color-text-paragraph-2" name="message" placeholder="Nội dung liên hệ">{{old('message')}}</textarea>

                                        @error('message')
                                            <span class="text-danger">
                                                    {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="submit btn btn-send-message" type="submit">
                                        Liên hệ
                                    </button>

                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                    <div class="col-lg-5 text-center d-none d-lg-block">
                        @if(isset($settings->map))
                            <div style="max-width: 100%; height: 550px">
                                {!! $settings->map !!}
                            </div>
                        @else
                            <img src="" alt="">
                        @endif

                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-80">
            <div class="container">
                <div class="box-info-contact">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <a href="#">
                                <img style="width: 180px" src="{{ getStorageImageUrl($settings->logo_website, 'default/main-logo.svg') }}" alt="joxBox">
                            </a>
                            <div class="font-sm color-text-paragraph">

                                <br> {{ $settings->slogan }}
                                <br> Website: <a href="{{ $settings->website }}">{{ $settings->website }}</a>
                            </div>
                            <a class="text-uppercase color-brand-2 link-map" href="#">Xem bản đồ</a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <h6>Địa chỉ</h6>
                            <p class="font-sm color-text-paragraph mb-20">{{ $settings->transaction_office }}</p>
                            <h6>Đơn vị chủ quản</h6>
                            <p class="font-sm color-text-paragraph mb-20">{{ $settings->company_name }} </p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <h6>Số điện thoại</h6>
                            <p class="font-sm color-text-paragraph mb-20">{{ $settings->hotline }}</p>
                            <h6>Email</h6>
                            <p class="font-sm color-text-paragraph mb-20">
                                <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <h6>Nhà tuyển dụng liên hệ</h6>
                            <p class="font-sm color-text-paragraph mb-20">{{ $settings->hotline_sales }}</p>
                            <h6>Ứng viên liên hệ</h6>
                            <p class="font-sm color-text-paragraph mb-20">{{ $settings->hotline_technical }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@push('style')
    <style>

        .card-grid-3-image img {
            max-width: 100% !important;
            max-height: 220px !important;
            object-fit: cover !important;
            border-radius: 8px;
        }
    </style>
@endpush
