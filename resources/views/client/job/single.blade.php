@extends('client.layouts.master')
@section('title', 'Việc làm '. $job->title .' - '.  $job->employer->company_name)

@section('seo_title', 'Việc làm '. $job->title .' - '.  $job->employer->company_name)
@section('seo_description', $job->meta_description)
@section('seo_keywords', $job->meta_keywords)
@section('seo_image', getStorageImageUrl($job->employer->company_logo, config('image.main-logo')))

@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single">
                    <div class="img-container">
                        <img
                            src="{{ getStorageImageUrl($job->employer->company_photo_cover, 'default/photo-cover.png') }}"
                            alt="jobBox">
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h3>{{$job->title}}</h3>
                        <div class="mt-0 mb-15">
                            <span class="card-briefcase">{{$job->jobType->name}}</span>
                            <span
                                class="card-time"> {{ \Carbon\Carbon::parse($job->start_date)->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end">
                        <div class="btn">
                            <form action="{{ route('client.candidate.saveJob', ['job_id' => $job->id]) }}"
                                  method="POST">
                                @csrf
                                <button type="submit" class="btn btn-white border">Lưu lại</button>
                            </form>
                        </div>
                        <button class="btn btn-apply-icon btn-apply btn-apply-big hover-up btn-sm"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="{{ auth()->check() ? '#ModalApplyJobForm' : '#ModalLoginForm' }}">
                            Nộp hồ sơ
                        </button>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <style>
            .section-custom {
                border: thin solid #E0E6F7;
                border-radius: 8px;
                padding: 20px 30px 30px 30px;
                margin-bottom: 20px;
            }

            .section-custom h5{
                color:  #05264E;
                margin-top: 0px;
            }


        </style>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="job-overview mb-20">
                            <h5 class="border-bottom pb-15 mb-30 mt-0">Thông tin việc làm</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/industry.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description industry-icon mb-10">Ngành nghề</span>
                                        <strong class="small-heading">
                                            {{ $job->job_category->name ?? '' }}
                                        </strong>

                                    </div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/job-level.svg') }}"
                                            alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description joblevel-icon mb-10">Cấp độ
                                        </span><strong class="small-heading">{{$job->rank->name}}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/salary.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description salary-icon mb-10">Lương</span><strong
                                            class="small-heading">@if($job->salary_min == $job->salary_max || $job->salary_min <= 1000000 || $job->salary_max <= 1000000)
                                                {{ formatSalary($job->salary_min) }}
                                            @else
                                                {{ formatSalary($job->salary_min) }}
                                                - {{ formatSalary($job->salary_max) }}
                                            @endif</strong></div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/experience.svg') }}"
                                            alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description experience-icon mb-10">Kinh nghiệm</span><strong
                                            class="small-heading">
                                            {{$job->experience->name}}</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/job-type.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description jobtype-icon mb-10">
                                            Loại công việc
                                        </span><strong class="small-heading">{{$job->jobType->name}}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/deadline.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description mb-10">Thời hạn</span><strong
                                            class="small-heading">{{ \Carbon\Carbon::parse($job->end_date)->format('d/m/Y') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/updated.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description jobtype-icon mb-10">Đã cập nhật</span><strong
                                            class="small-heading">
                                            {{ \Carbon\Carbon::parse($job->start_date)->diffForHumans() }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/location.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description mb-10">Địa chỉ</span><strong
                                            class="small-heading">{{$job->employer->address->province->name ?? null}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single">


                            <div class="section-custom">
                                <h5 class="border-bottom pb-15 mb-30">Mô tả công việc</h5>
                                <p class="mt-5 mb-1">
                                    {!! $job->description !!}
                                </p>
                            </div>

                            <div>
                                <div class="section-custom mt-5">
                                    <h5 class="border-bottom pb-15 mb-30">Yêu cầu công việc</h5>
                                    <p class="mt-5">
                                        {!! $job->job_requirement !!}
                                    </p>
                                </div>
                            </div>


                            @if(isset($job->benefitJob))
                            <div class="section-custom">
                                <h5 class="border-bottom pb-15 mb-30">Quyền lợi được hưởng</h5>
                                <div class="row">
                                    @php
                                        // Lấy danh sách phúc lợi từ benefitJob, loại bỏ các giá trị false/null và các cột không cần thiết
                                        $benefits = collect($job->benefitJob->toArray())
                                            ->except(['id', 'created_at', 'updated_at', 'description']) // Loại bỏ các cột không cần thiết
                                            ->filter(function ($value) {
                                                return $value; // Loại bỏ những giá trị false/null
                                            })
                                            ->keys(); // Lấy danh sách các tên phúc lợi (các key)
                                    @endphp

                                    @foreach ($benefits as $benefit)
                                        <div class="col-md-4">
                                            <div class="benefit-item">
                                                <i class="{{ __('benefits.' . $benefit . '.icon') }}"></i>
                                                {{ __('benefits.' . $benefit . '.label') }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <p class="mt-5">
                                    {!! $job->benefitJob->description !!}
                                </p>
                            </div>

                            @endif

                            <div class="section-custom">
                                <h5 class="border-bottom pb-15 mb-30">Yêu cầu hồ sơ</h5>
                                <p class="mt-5 mb-1">
                                    {!! $job->cv_requirement !!}
                                </p>
                            </div>
                        </div>





                        <style>

                            .benefits-icons i {
                                margin-right: 10px;
                            }

                            .benefit-item {
                                display: flex;
                                align-items: center;
                                margin-bottom: 0.5rem;
                            }
                            .benefit-item i {
                                margin-right: 0.5rem;
                                color: #007bff;
                            }

                        </style>


                        <div class="single-apply-jobs">
                            <div class="row align-items-center">
                                <div class="col-md-5 d-flex align-content-center">
                                    <button class="btn btn-apply-icon btn-apply btn-apply-big hover-up btn-sm me-3"
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="{{ auth()->check() ? '#ModalApplyJobForm' : '#ModalLoginForm' }}">
                                        Nộp hồ sơ
                                    </button>
{{--                                    <button type="submit" class="btn btn-primary me-3">Nộp hồ sơ</button>--}}
                                    <form action="{{ route('client.candidate.saveJob', ['job_id' => $job->id]) }}"
                                          method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-white border">Lưu lại</button>
                                    </form>

                                </div>
                                <div class="col-md-7 text-lg-end social-share">
                                    <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Chia sẻ </h6><a
                                        class="mr-5 d-inline-block d-middle" target="_blank" href="{{ $shareUrls['facebook'] }}"><img alt="facebook"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-fb.svg') }}"></a><a
                                        class="mr-5 d-inline-block d-middle" target="_blank" href="{{ $shareUrls['twitter'] }}"><img alt="twitter"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-tw.svg') }}"></a><a
                                        class="mr-5 d-inline-block d-middle" target="_blank" href="{{ $shareUrls['reddit'] }}"><img alt="reddit"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-red.svg') }}"></a><a
                                        class="d-inline-block d-middle" target="_blank" href="{{ $shareUrls['whatsapp'] }}"><img alt="whatsapp"
                                                                                      src="{{ asset('assets/client/imgs/template/icons/share-whatsapp.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure>
                                        <img src="{{ getStorageImageUrl($job->employer->company_logo, config('image.square-logo'))}}"
                                                 alt="jobBox" width="85px" height="85px">
                                    </figure>
                                    <div class="sidebar-info">
                                        <a href="{{ route('client.employer.single', ['slug' => $job->employer->slug]) }}">
                                            <span class="sidebar-company">{{$job->employer->company_name}}</span>
                                        </a>
                                        <span class="card-location">Cần Thơ</span>
                                        <a class="link-underline mt-15"
                                           href="{{ route('client.employer.single', ['slug' => $job->employer->slug]) }}"> {{ $jobsCount }}
                                            ứng tuyển vào công ty</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <div id="map" style="height: 200px; width: 100%;"></div>
                                </div>
                                <ul class="ul-disc">
                                    <li>Địa chỉ: {{$job->employer->address->street ?? null}}
                                        , {{$job->employer->address->ward->name ?? null}}
                                        , {{$job->employer->address->district->name ?? null}}
                                        , {{$job->employer->address->province->name ?? null}}
                                    </li>
                                    <li>Điện thoại: {{$job->employer->company_phone}}</li>
                                    <li>Email: {{$job->employer->user->email}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Việc làm cùng công ty</h6>
                            <div class="sidebar-list-job">
                                <ul>
                                    @foreach($otherJobs as $otherJob)
                                        <li>
                                            <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                                <div class="image" style="width: 50px; height: 50px;">
                                                    <a href="{{ route('client.job.single', ['jobSlug' => $otherJob->slug]) }}">
                                                        <img src="{{ getStorageImageUrl($otherJob->employer->company_logo, config('image.square-logo')) }}"
                                                             alt="jobBox">
                                                    </a>
                                                </div>
                                                <div class="info-text">
                                                    <h5 class="font-md font-bold color-brand-1">
                                                        <a href="{{ route('client.job.single', ['jobSlug' => $otherJob->slug]) }}">{{ limit_text($otherJob->title, 30) }}</a>
                                                    </h5>
                                                    <div class="mt-0">
                                                        <span
                                                            class="card-briefcase">{{ $otherJob->jobType->name }}</span>
                                                        <span
                                                            class="card-time">{{ \Carbon\Carbon::parse($otherJob->start_date)->diffForHumans() }}</span>
                                                    </div>
                                                    <div class="mt-5">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h6 class="card-price">{{ $otherJob->salary->name }}</h6>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <span
                                                                    class="card-briefcase">{{ $otherJob->employer->address->province->name ?? '' }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-left">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Gợi ý việc làm</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                        Nhận tin tức, cập nhật và mẹo mới nhất
                    </p>
                </div>
                <div class="mt-50">
                    <div class="box-swiper style-nav-top">
                        <div class="swiper-container swiper-group-4 swiper">
                            <div class="swiper-wrapper pb-10 pt-5">
                                @foreach($relatedJobs as $relatedJob)
                                    <div class="swiper-slide">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left"><span class="flash"></span>
                                                <div class="image-box"><img
                                                        src="{{ getStorageImageUrl($relatedJob->employer->company_logo, config('image.square-logo')) }}"
                                                        alt="jobBox" width="85px" height="85px">
                                                </div>
                                                <div class="right-info"><a class='name-job'
                                                                           href='{{ route('client.employer.single', ['slug' => $relatedJob->employer->slug]) }}'>{{$relatedJob->employer->company_name}}</a><span
                                                        class="location-small">Cần Thơ</span></div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6>
                                                    <a href="{{ route('client.job.single', ['jobSlug' => $relatedJob->slug]) }}">{{ limit_text($relatedJob->title, 30)}}</a>
                                                </h6>
                                                <div class="mt-5"><span
                                                        class="card-briefcase">{{ limit_text($relatedJob->jobType->name, 30)}}</span>
                                                    <span class="card-time">
                                                                {{ \Carbon\Carbon::parse($relatedJob->start_date)->diffForHumans() }}
                                                        </span>
                                                </div>
                                                <p class="font-sm color-text-paragraph mt-15"> {!! limit_text($relatedJob->description, 110) !!}</p>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7"><span
                                                                class="card-text-price">
                                                                {{ $relatedJob->salary->name  }}
                                                            </span></div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                 data-bs-target="{{ auth()->check() ? '#ModalApplyJobForm' : '#ModalLoginForm' }}">
                                                                ỨNG TUYỂN
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-button-next-4"></div>
                        <div class="swiper-button-prev swiper-button-prev-4"></div>
                    </div>
                    <div class="text-center"><a class="btn btn-grey" href="#">Xem thêm</a></div>
                </div>
            </div>
        </section>
        @if(auth()->check())
        <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content apply-job-form">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body pl-30 pr-30 pt-50">
                        <div class="text-center">
                            <p class="font-sm text-brand-2">Nộp Hồ Sơ</p>
                            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Bắt đầu sự nghiệp của bạn ngay hôm nay</h2>
                            <p class="font-sm text-muted mb-30">Vui lòng điền thông tin của bạn và gửi cho nhà tuyển dụng.
                            </p>
                        </div>
                        @livewire('client.candidate.apply-job', ['jobId' => $job->id])

                    </div>
            </div>
        </div>
        @else
        <div class="modal fade" id="ModalLoginForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" style="max-width: 1000px;">
                <div class="modal-content">
                    <div class="p-0">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="bg-primary h-100 d-flex flex-column justify-content-center"
                                     style="background: linear-gradient(135deg, #3a8ffe 0%, #0048db 100%); min-height: 600px;">
                                    <div class="text-center px-5">
                                        <img src="{{ asset('assets/client/imgs/page/login-register/img-4.svg') }}"
                                             alt="Login"
                                             class="img-fluid mb-4"
                                             style="max-width: 85%;">
                                        <h2 class="text-white mb-3 fs-2">Chào mừng bạn trở lại!</h2>
                                        <p class="text-white-50 fs-6">
                                            Đăng nhập để khám phá hàng ngàn cơ hội việc làm hấp dẫn
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-30">
                                    <button type="button"
                                            class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>

                                    <div class="text-center mb-4">
                                        <h3 class="text-brand-1 mb-2 fs-3">Đăng nhập để ứng tuyển</h3>
                                        <p class="text-muted">Truy cập vào tài khoản của bạn</p>
                                    </div>

                                    <div class="d-grid gap-3 mb-4">
                                        <a href="{{ route('client.login.facebook') }}"
                                           class="btn btn-outline-primary hover-up py-2 d-flex align-items-center justify-content-center">
                                            <img src="{{asset('assets/client/imgs/template/icons/facebook.svg')}}"
                                                 alt="facebook" class="me-2" height="24">
                                            <span>Đăng nhập với Facebook</span>
                                        </a>
                                        <a href="{{ route('client.auth.google', ['previous_url' => url()->current()]) }}"
                                           class="btn btn-outline-danger hover-up py-2 d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('assets/client/imgs/template/icons/icon-google.svg') }}"
                                                 alt="google" class="me-2" height="24">
                                            <span>Đăng nhập với Google</span>
                                        </a>
                                    </div>

                                    <div class="position-relative mb-4">
                                        <hr class="text-muted">
                                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                            hoặc đăng nhập với
                                        </span>
                                    </div>

                                    <form class="login-register" method="post" action="{{ route('client.candidate.login.post') }}">
                                        @csrf
                                        <input type="hidden" name="previous_url" value="{{ url()->current() }}">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="email">Email của bạn</label>
                                            <input class="form-control"
                                                   id="email"
                                                   type="email"
                                                   required
                                                   name="email"
                                                   placeholder="name@example.com">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="password">Mật khẩu</label>
                                            <input class="form-control"
                                                   id="password"
                                                   type="password"
                                                   required
                                                   name="password"
                                                   placeholder="Nhập mật khẩu">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                       class="form-check-input" style="height: 16px;"
                                                       id="remember"
                                                       name="remember_login">
                                                <label class="form-check-label small" for="remember">
                                                    Ghi nhớ
                                                </label>
                                            </div>
                                            <a href="{{route('client.reset')}}" class="text-primary small">Quên mật khẩu?</a>
                                        </div>

                                        <div class="d-grid mb-3">
                                            <button class="btn btn-primary hover-up py-2 p-15" type="submit">
                                                Đăng nhập ngay
                                            </button>
                                        </div>
                                    </form>

                                    <div class="text-center mt-4">
                                        <p class="mb-0">Chưa có tài khoản?
                                            <a href="{{ route('client.candidate.register') }}" class="text-primary">
                                                Đăng ký ngay
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </main>
@endsection
@push('css')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .card-grid-2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
            height: 100%;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* File Upload Button */
        input[type="file"] {
            display: none;
        }

        .btn-default {
            background-color: #007bff;
            color: #fff;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-default:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Label for File Upload */
        label[for="file-upload"] {
            display: block;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            cursor: pointer;
            text-align: center;
            border: 2px dashed #007bff;
            padding: 20px;
            border-radius: 6px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        label[for="file-upload"]:hover {
            background-color: #eef7ff;
            border-color: #0056b3;
        }

        textarea#des:focus {
            border-color: #0056b3;
            outline: none;
        }

        /* Small Help Text */
        small.text-muted {
            font-size: 12px;
            color: #666;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            label[for="file-upload"] {
                padding: 15px;
                font-size: 16px;
            }

            .btn-default, button[type="submit"] {
                padding: 10px 15px;
                font-size: 14px;
            }
        }


        .custom-control {
            background-color: white;
            border-radius: 4px;
            padding: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #007bff;
        }

        .custom-control:hover {
            text-decoration: underline;
        }

        .text-truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 3.6em; /* 1.8em per line for example, adjust based on your line-height */
            line-height: 1.8em; /* Adjust this value according to your font size */
        }

        .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: #0048db;
            box-shadow: 0 0 0 0.2rem rgba(0,72,219,0.25);
        }

        .btn-outline-primary, .btn-outline-danger {
            border-width: 2px;
            border-radius: 8px;
            height: 48px; /* Đặt chiều cao cố định cho nút */
        }

        .btn-outline-primary img, .btn-outline-danger img {
            margin-top: -2px; /* Điều chỉnh vị trí icon nếu cần */
        }

        .btn-outline-primary span, .btn-outline-danger span {
            line-height: 24px; /* Căn chỉnh chiều cao line cho text */
        }

        .hover-up {
            transition: all 0.3s ease;
        }

        .hover-up:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.12);
        }

        .text-brand-1 {
            color: #0048db;
        }

        /* Animation cho modal */
        .modal.fade .modal-dialog {
            transform: scale(0.8);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .modal-dialog {
                max-width: 90% !important;
            }
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-label {
            cursor: pointer;
            user-select: none;
        }

        .small {
            font-size: 0.875rem;
        }
    </style>
@endpush
@push('script')
    <script>
        document.getElementById('drop-zone').addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.add('dragover');
        });

        document.getElementById('drop-zone').addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('dragover');
        });

        document.getElementById('drop-zone').addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('dragover');

            // Lấy file từ sự kiện drop
            var files = e.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('file-upload').files = files;
                updateFileName(document.getElementById('file-upload')); // Cập nhật tên file
            }
        });

        function updateFileName(input) {
            var fileName = input.files[0].name;
            document.getElementById('file-name').innerText = fileName;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var lat = {{$job->employer->address->latitude ?? null}};
            var lon = {{$job->employer->address->longitude ?? null}};
            var map = L.map('map', {
                center: [lat, lon],
                zoom: 16,
                zoomControl: false
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var customIcon = L.icon({
                iconUrl: '{{ asset('assets/client/imgs/page/vitri.png') }}',
                iconSize: [38, 38],
                iconAnchor: [22, 38],
                popupAnchor: [0, -38]
            });

            var marker = L.marker([lat, lon], {icon: customIcon}).addTo(map);

            var apiKey = '3497af00b0434dc0ac2c08b62bd21f3e';
            var apiUrl = `https://api.geoapify.com/v1/geocode/reverse?lat=${lat}&lon=${lon}&format=json&apiKey=${apiKey}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data && data.results && data.results.length > 0) {
                        var locationName = data.results[0].formatted;
                        marker.bindPopup(`<b>${locationName}</b>`).openPopup();
                    } else {
                        marker.bindPopup("<b>Không thể lấy tên vị trí</b>").openPopup();
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi gọi API:', error);
                    marker.bindPopup("<b>Lỗi khi lấy tên vị trí</b>").openPopup();
                });

            // Thêm nút tùy chỉnh để mở bản đồ lớn hơn
            var ZoomToMapControl = L.Control.extend({
                options: {
                    position: 'topleft'
                },

                onAdd: function (map) {
                    var container = L.DomUtil.create('div', 'custom-control');
                    container.innerHTML = 'Xem bản đồ lớn hơn';

                    container.onclick = function () {
                        // Chuyển hướng sang Google Maps với vị trí đã định
                        window.open(`https://www.google.com/maps?q=${lat},${lon}&z=18`, '_blank');
                    };

                    return container;
                }
            });

            map.addControl(new ZoomToMapControl());
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Debug để kiểm tra modal có được khởi tạo không
        const loginModal = new bootstrap.Modal(document.getElementById('ModalLoginForm'));

        // Thêm event listener cho nút trigger
        document.querySelectorAll('[data-bs-target="#ModalLoginForm"]').forEach(button => {
            button.addEventListener('click', function() {
                loginModal.show();
            });
        });
    });
    </script>

@endpush

