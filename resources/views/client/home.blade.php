@extends('client.layouts.master')
{{--@section('title', 'Trang chủ')--}}
@section('content')
    <main class="main">
        <div class="bg-homepage1"></div>
        <section class="section-box">
            <div class="banner-hero hero-1">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-xl-11 col-lg-12">
                            <div class="block-banner">
                                <h1 style="font-size: 30px;"
                                    class="heading-banner wow animate__animated animate__fadeInUp">VIỆC LÀM PHÚ QUỐC
                                    <br class="d-none d-lg-block">

                                </h1>
                                <h3 style="font-size: 20px;">
                                    Tuyển Dụng Việc Làm Tại Phú Quốc
                                    Và Khu Vực Miền Nam
                                </h3>

                                <div class="row mt-10">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="search-description">
                                            <div
                                                class="section-description_top fw-700 d-flex align-items-center justify-content-between">
                                                <div class="section-description_title d-flex align-items-center">
                                                    <svg style="width: 40px;" viewBox="0 0 60 60" fill="#00aef0"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill="#F89D20"
                                                              d="m27.9 16.1c2.2 0 3.9 1.8 3.9 3.9 0 2.2-1.7 4.7-3.9 4.7s-3.9-2.5-3.9-4.7c-.1-2.1 1.7-3.9 3.9-3.9zm9.1 20.4h-18.3c-.6 0-1.1-.5-1-1.1.5-5.1 4.9-9.1 10.2-9.1s9.6 4 10.2 9.1c0 .6-.5 1.1-1.1 1.1z"></path>
                                                        <path
                                                            d="m52.7 46.7-6.6-6.7c2.3-3.5 3.7-7.6 3.7-12.1 0-12.1-9.8-21.9-21.9-21.9s-21.9 9.8-21.9 21.9 9.8 21.9 21.9 21.9c4.5 0 8.7-1.4 12.1-3.7l6.6 6.6c1.7 1.7 4.4 1.7 6.1 0 1.7-1.6 1.7-4.4 0-6zm-24.8-1.4c-9.6 0-17.4-7.8-17.4-17.4s7.8-17.4 17.4-17.4 17.4 7.8 17.4 17.4-7.8 17.4-17.4 17.4z"></path>
                                                    </svg>
                                                    <span style="font-size: 16px;" class="fw-bold text-primary">
                                                        Việc làm hôm nay:
                                                    </span>
                                                </div>
                                                <div style="font-size: 16px;" class=" ml-2 text-primary fw-bold">
                                                    {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                                </div>
                                            </div>
                                            <div
                                                class="section-description_bottom mt-2 fw-700 d-flex align-items-center justify-content-between">
                                                <h3 class="fs-inherit my-0 fw-500 d-flex align-items-center justify-content-between">
                                                    <span style="font-size: 16px;" class="pl-5">
                                                        Việc làm đang tuyển
                                                    </span>
                                                    <a style="font-size: 16px;" href="#"
                                                       class="text-primary ml-5">
                                                        {{ !empty($jobPostCountAll) ? number_format($jobPostCountAll) : '0' }}
                                                    </a>
                                                </h3>
                                                <div class="section-description_divider"></div>
                                                <h3 class="section-description_item fs-inherit my-0 fw-500 d-flex align-items-center justify-content-between">
                                                    <span style="font-size: 16px;" class="section-description_title">
                                                        Việc làm hôm nay
                                                    </span>
                                                    <a style="font-size: 16px;" href="#"
                                                       class="text-primary ml-5">
                                                        {{ !empty($jobPostCountToday) ? number_format($jobPostCountToday) : '0' }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <x-client.search></x-client.search>
{{--                                <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp"--}}
{{--                                     data-wow-delay=".3s"><strong>Tìm kiếm phổ biến:</strong><a--}}
{{--                                        href="#">Designer</a>, <a href="#">Web</a>, <a--}}
{{--                                        href="#">IOS</a>, <a href="#">Developer</a>, <a--}}
{{--                                        href="#">PHP</a>, <a href="#">Senior</a>, <a--}}
{{--                                        href="#">Engineer</a></div>--}}
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-12 d-none d-xl-block col-md-6">
                            <div class="banner-imgs">
                                <div class="block-1 shape-1"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/banner1.png') }}">
                                </div>
                                <div class="block-2 shape-2"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/banner2.png') }}">
                                </div>
                                <div class="block-3 shape-3"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/icon-top-banner.png') }}">
                                </div>
                                <div class="block-4 shape-3"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/icon-bottom-banner.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Nhà tuyển dụng hàng đầu</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Khám phá bước đi
                        sự nghiệp tiếp theo ca bạn, hợp đồng biểu diễn tự do hoặc thực tập</p>
                </div>
                <div class="box-swiper mt-50">
                    <div class="swiper-container-1 swiper-group-1 swiper">
                        <div class="swiper-wrapper">
                            @foreach($topEmployers as $employer)
                                <div class="swiper-slide">
                                    <div class="employer-banner"
                                         style="background-image: url('{{ asset('storage/' . ($employer->company_photo_cover ?? 'default/company-cover.jpg')) }}')">
                                        <div class="banner-content">
                                            <div class="employer-info">
                                                <div class="logo">
                                                    <img
                                                        src="{{ getStorageImageUrl($employer->company_logo, config('image.square-logo')) }}"
                                                        alt="{{ $employer->company_name }}">
                                                </div>
                                                <div class="info">
                                                    <a href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                        <h3 class="company-name-highlight">{{ $employer->company_name ?? '' }}</h3>
                                                    </a>
                                                    <p class="text-white">{{ $employer->address->province->name ?? '' }}</p>
                                                </div>
                                            </div>

                                            <div class="job-listing">
                                                @foreach($employer->job_post->take(2) as $job)
                                                    <div class="job-item">
                                                        <div class="job-details">
                                                            <h4>
                                                                <a href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}">
                                                                    {{ $job->title }}
                                                                </a>
                                                            </h4>
                                                            <div class="job-meta">
                                                                <span class="job-type">
                                                                    <i class="bi bi-briefcase"></i>
                                                                    {{ optional($job->jobType)->name }}
                                                                </span>
                                                                <span class="salary">
                                                                    <i class="bi bi-cash"></i>
                                                                    {{ optional($job->salary)->name }}
                                                                </span>
                                                                <span class="location">
                                                                    <i class="bi bi-geo-alt"></i>
                                                                    {{ $employer->address->province->name ?? '' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @if($employer->job_post->count() > 2)
                                                    <div class="hidden-jobs" style="display: none;">
                                                        @foreach($employer->job_post->slice(2) as $job)
                                                            <div class="job-item">
                                                                <div class="job-details">
                                                                    <h4>
                                                                        <a href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}">
                                                                            {{ $job->title }}
                                                                        </a>
                                                                    </h4>
                                                                    <div class="job-meta">
                                                                        <span class="job-type">
                                                                            <i class="bi bi-briefcase"></i>
                                                                            {{ optional($job->jobType)->name }}
                                                                        </span>
                                                                        <span class="salary">
                                                                            <i class="bi bi-cash"></i>
                                                                            {{ optional($job->salary)->name }}
                                                                        </span>
                                                                        <span class="location">
                                                                            <i class="bi bi-geo-alt"></i>
                                                                            {{ optional($job->address)->city_name }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="apply-btn">
                                                                    <a href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}"
                                                                       class="btn btn-apply">Ứng tuyển</a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    @if($employer->job_post->count() > 2)
                                                        <div class="text-center mt-3">
                                                            <a class="btn-view-more"
                                                               href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                                Xem thêm</a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Công việc trong ngày</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm kiếm và kết
                        nối
                        với ứng viên phù hợp nhanh hơn. </p>
                    <div class="list-tabs mt-40">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($jobpost as $categoryName => $item)
                                <li>
                                    <a class=" {{ $loop->first ? 'active' : '' }}"
                                       id="nav-tab-job-{{ $loop->index + 1 }}"
                                       href="#tab-job-{{ $loop->index + 1 }}" data-bs-toggle="tab"
                                       role="tab" aria-controls="tab-job-{{ $loop->index + 1 }}"
                                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        @if(isset($item->job_category) && $item->job_category->image)
                                            <img alt="jobBox" width="50px"
                                                 src="{{ asset('storage/' . $item->job_category->image) }}">
                                        @else
                                            <img alt="jobBox" width="50px"
                                                 src="{{ asset('default/logo.svg') }}">
                                        @endif
                                        {{ $categoryName }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-70">
                    <div class="tab-content" id="myTabContent-1">
                        @foreach($jobpost as $categoryName => $posts)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                 id="tab-job-{{ $loop->index + 1 }}" role="tabpanel"
                                 aria-labelledby="tab-job-{{ $loop->index + 1 }}">
                                <div class="row">
                                    @foreach($posts as $post)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <!-- Desktop View -->
                                            <div class="card-grid-2 hover-up d-none d-md-flex">
                                                <div class="card-grid-2-image-left">
                                                    <div class="d-flex justify-content-around label-jobbox ms-1">
                                                            <span class="flash"></span>
                                                    </div>
                                                    <div class="image-box">
                                                        @php
                                                            $company_logo = getStorageImageUrl($post->employer->company_logo ?? '', 'default/square-logo.svg');
                                                        @endphp
                                                        <img alt="{{ $post->title }}" width="50px"
                                                             src="{{ $company_logo }}">
                                                    </div>
                                                    <div class="right-info pe-3" style="">
                                                        <a class='name-job'
                                                           href='{{ route('client.employer.single', ['slug' => $post->employer->slug]) }}'>
                                                            @if (in_array(2, $post->package_labels))
                                                                <span class="VLhot">hot</span>
                                                            @endif

                                                            @if (in_array(1, $post->package_labels))
                                                                <span class="VLgap">gấp</span>
                                                            @endif
                                                            {{ $post->employer->company_name }}
                                                        </a>
                                                        <span class="location-small">
                                                        {{ $post->employer->address->province->name ?? '' }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h6>
                                                        <a href='{{route('client.job.single', ['jobSlug' => $post->slug])}}'>
                                                            {{ limit_text($post->title, 65) }}
                                                        </a>
                                                    </h6>
                                                    <div class="mt-5"><span
                                                            class="card-briefcase">{{ $post->jobType->name  }}</span><span
                                                            class="card-time">{{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="description font-sm color-text-paragraph mt-15">
                                                        {{ limit_text($post->description, 120) }}
                                                    </p>
                                                    <div class="mt-30">
                                                        @foreach($post->skills as $key => $skill)
                                                            <a class='btn btn-grey-small mr-5'
                                                               href=''>{{ $skill->name }}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-2-bottom mt-30">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6 align-content-center">
                                                                <span class="text-sm font-bold">
                                                                    {{ $post->salary->name }}
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-1 col-1 p-0 align-content-center">
                                                                @php
                                                                    $isSaved = in_array($post->id, $savedJobIds);
                                                                @endphp
                                                                @if ($isSaved)
                                                                    <!-- Nút bỏ lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.unsave', ['job_id' => $post->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button
                                                                            style="border: 0; background-color: white"
                                                                            type="submit">
                                                                            <i class="bi bi-heart-fill text-danger"
                                                                               style="font-size: 16px; margin: 0"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <!-- Nút lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.saveJob', ['job_id' => $post->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button
                                                                            style="border: 0; background-color: white"
                                                                            type="submit">
                                                                            <i class="bi bi-heart"
                                                                               style="font-size: 16px; margin: 0"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-3 col-3 text-end">
                                                                <a href="{{route('client.job.single', ['jobSlug' => $post->slug])}}"
                                                                   class="btn btn-apply-now">
                                                                    Ứng tuyển
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Mobile View -->
                                            <div class="card-grid-2 hover-up d-md-none mobile-job-card">
                                                <div class="mobile-job-content">
                                                    <div class="company-logo">
                                                        @php
                                                            $company_logo = getStorageImageUrl($post->employer->company_logo, config('image.square-logo'));
                                                        @endphp
                                                        <img src="{{ $company_logo }}" alt="{{ $post->title }}">
                                                    </div>

                                                    <div class="job-info">
                                                        <h3 class="job-title m-0 font-bold">
                                                            <a class="font-bold"
                                                               href="{{route('client.job.single', ['jobSlug' => $post->slug])}}">
                                                                {{ limit_text($post->title, 65) }}
                                                            </a>
                                                        </h3>

                                                        <div class="company-namee font-bold">
                                                            <a href="{{ route('client.employer.single', ['slug' => $post->employer->slug]) }}">{{ $post->employer->company_name ?? '' }}</a>
                                                        </div>

                                                        <div class="job-meta-info">
                                                            <span class="job-salary font-bold">
                                                                {{ $post->salary->name }}
                                                            </span>
                                                            <span class="job-location font-bold">
                                                                {{ $post->employer->address->province->name ?? ''}}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Nút tim -->
                                                    <div class="save-job">
                                                        @php
                                                            $isSaved = in_array($post->id, $savedJobIds);
                                                        @endphp
                                                        @if ($isSaved)
                                                            <form
                                                                action="{{ route('client.candidate.unsave', ['job_id' => $post->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="save-button">
                                                                    <i class="bi bi-heart-fill text-primary"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('client.candidate.saveJob', ['job_id' => $post->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="save-button">
                                                                    <i class="bi bi-heart"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <div class="best-jobs-header wow animate__animated animate__fadeInUp">
                        <h2 class="section-title mb-10">
                            <span class="featured-icon">
                                <i class="bi bi-star-fill"></i>
                            </span>
                            VIỆC LÀM TỐT NHẤT
                        </h2>
                        <p class="font-lg color-text-paragraph-2">Những cơ hội việc làm hấp dẫn từ các nhà tuyển dụng
                            hàng đầu</p>
                    </div>
                </div>

                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-1 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <div class="swiper-slide h-auto">
                                <div class="row m-0">
                                    {{-- @dd($bestJobs) --}}
                                    @foreach($bestJobs->groupBy('employer_id')->take(3) as $employerJobs)
                                        @php
                                            $firstJob = $employerJobs->first();
                                            $employer = $firstJob->employer;
                                        @endphp
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="job-card h-100">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        @php
                                                            $company_img = getStorageImageUrl($employer->company_logo, config('image.square-logo'));
                                                        @endphp
                                                        <img src="{{ $company_img }}"
                                                             alt="{{ $employer->company_name ?? '' }}">
                                                    </div>
                                                    <div class="company-details">
                                                        <a href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                            <h3 class="company-name">{{ $employer->company_name ?? '' }}</h3>
                                                        </a>
                                                        <p class="company-address">{{ $employer->address->province->name ?? '' }}</p>
                                                        <div class="company-meta">
                                                            <span class="employee-count">
                                                                <i class="bi bi-people"></i>
                                                                {{ $employer->company_size ?? '100-200' }}
                                                            </span>
                                                            <span class="company-industry">
                                                                <i class="bi bi-briefcase"></i>
                                                                {{ $firstJob->job_category->name ?? 'Kinh doanh dịch vụ' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="job-listings">
                                                    @foreach($employerJobs->take(2) as $position)
                                                        <div class="job-position">
                                                            <div class="position-info">
                                                                @php
                                                                    $isSaved = in_array($position->id, $savedJobIds);
                                                                @endphp
                                                                @if ($isSaved)
                                                                    <!-- Nút bỏ lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                        method="POST"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="btn-save-job"
                                                                                style="border: 0; background: none; padding: 0;">
                                                                            <i class="bi bi-heart-fill text-danger"
                                                                               style="font-size: 16px;"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <!-- Nút lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                        method="POST"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="btn-save-job"
                                                                                style="border: 0; background: none; padding: 0;">
                                                                            <i class="bi bi-heart"
                                                                               style="font-size: 16px;"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                                <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                   class="position-title">
                                                                    {{ limit_text($position->title, 20) }}
                                                                </a>
                                                            </div>
                                                            <div class="position-meta">
                                                                <span class="salary">
                                                                    <i class="bi bi-cash"></i>
                                                                    {{ $position->salary->name }}
                                                                </span>
                                                                <span class="deadline">
                                                                    <i class="bi bi-clock"></i>
                                                                    {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    @if($employerJobs->count() > 2)
                                                        <div class="hidden-positions" style="display: none;">
                                                            @foreach($employerJobs->slice(2) as $position)
                                                                <div class="job-position">
                                                                    <div class="position-info">
                                                                        @php
                                                                            $isSaved = in_array($position->id, $savedJobIds);
                                                                        @endphp
                                                                        @if ($isSaved)
                                                                            <!-- Nút bỏ lưu -->
                                                                            <form
                                                                                action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        class="btn-save-job"
                                                                                        style="border: 0; background: none; padding: 0;">
                                                                                    <i class="bi bi-heart-fill text-danger"
                                                                                       style="font-size: 16px;"></i>
                                                                                </button>
                                                                            </form>
                                                                        @else
                                                                            <!-- Nút lưu -->
                                                                            <form
                                                                                action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        class="btn-save-job"
                                                                                        style="border: 0; background: none; padding: 0;">
                                                                                    <i class="bi bi-heart"
                                                                                       style="font-size: 16px;"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                        <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                           class="position-title">
                                                                            {{ limit_text($position->title, 25) }}
                                                                        </a>
                                                                    </div>
                                                                    <div class="position-meta">
                                                                        <span class="salary">
                                                                            <i class="bi bi-cash"></i>
                                                                            {{ $position->salary->name }}
                                                                        </span>
                                                                        <span class="deadline">
                                                                            <i class="bi bi-clock"></i>
                                                                            {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button class="btn-view-more"
                                                                    onclick="togglePositions(this)">
                                                                Xem thêm {{ $employerJobs->count() - 2 }} vị trí khác
                                                                <i class="bi bi-chevron-down"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if($bestJobs->groupBy('employer_id')->count() > 3)
                                <div class="swiper-slide h-auto">
                                    <div class="row m-0">
                                        @foreach($bestJobs->groupBy('employer_id')->skip(3)->take(3) as $employerJobs)
                                            @php
                                                $firstJob = $employerJobs->first();
                                                $employer = $firstJob->employer;
                                            @endphp
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="job-card h-100">
                                                    <div class="company-info">
                                                        <div class="company-logo">
                                                            @php
                                                                $company_img = getStorageImageUrl($employer->company_logo, config('image.square-logo'));
                                                            @endphp
                                                            <img src="{{ $company_img }}"
                                                                 alt="{{ $employer->company_name ?? '' }}">
                                                        </div>
                                                        <div class="company-details">
                                                            <a href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                                <h3 class="company-name">{{ $employer->company_name ?? '' }}</h3>
                                                            </a>
                                                            <p class="company-address">{{ $firstJob->address }}</p>
                                                            <div class="company-meta">
                                                                <span class="employee-count">
                                                                    <i class="bi bi-people"></i>
                                                                    {{ $employer->company_size ?? '100-200' }}
                                                                </span>
                                                                <span class="company-industry">
                                                                    <i class="bi bi-briefcase"></i>
                                                                    {{ $firstJob->job_category->name ?? 'Kinh doanh dịch vụ' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="job-listings">
                                                        @foreach($employerJobs->take(2) as $position)
                                                            <div class="job-position">
                                                                <div class="position-info">
                                                                    @php
                                                                        $isSaved = in_array($position->id, $savedJobIds);
                                                                    @endphp
                                                                    @if ($isSaved)
                                                                        <!-- Nút bỏ lưu -->
                                                                        <form
                                                                            action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                            method="POST"
                                                                            style="display: inline-block;">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                    class="btn-save-job"
                                                                                    style="border: 0; background: none; padding: 0;">
                                                                                <i class="bi bi-heart-fill text-danger"
                                                                                   style="font-size: 16px;"></i>
                                                                            </button>
                                                                        </form>
                                                                    @else
                                                                        <!-- Nút lưu -->
                                                                        <form
                                                                            action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                            method="POST"
                                                                            style="display: inline-block;">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                    class="btn-save-job"
                                                                                    style="border: 0; background: none; padding: 0;">
                                                                                <i class="bi bi-heart"
                                                                                   style="font-size: 16px;"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                    <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                       class="position-title">
                                                                        {{ limit_text($position->title, 25) }}
                                                                    </a>
                                                                </div>
                                                                <div class="position-meta">
                                                                    <span class="salary">
                                                                        <i class="bi bi-cash"></i>
                                                                        @if($position->salary_min == $position->salary_max)
                                                                            {{ formatSalary($position->salary_min) }}
                                                                        @else
                                                                            {{ formatSalary($position->salary_min) }}
                                                                            - {{ formatSalary($position->salary_max) }}
                                                                        @endif
                                                                    </span>
                                                                    <span class="deadline">
                                                                        <i class="bi bi-clock"></i>
                                                                        {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                        @if($employerJobs->count() > 2)
                                                            <div class="hidden-positions" style="display: none;">
                                                                @foreach($employerJobs->slice(2) as $position)
                                                                    <div class="job-position">
                                                                        <div class="position-info">
                                                                            @php
                                                                                $isSaved = in_array($position->id, $savedJobIds);
                                                                            @endphp
                                                                            @if ($isSaved)
                                                                                <!-- Nút bỏ lưu -->
                                                                                <form
                                                                                    action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                                    method="POST"
                                                                                    style="display: inline-block;">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                            class="btn-save-job"
                                                                                            style="border: 0; background: none; padding: 0;">
                                                                                        <i class="bi bi-heart-fill text-danger"
                                                                                           style="font-size: 16px;"></i>
                                                                                    </button>
                                                                                </form>
                                                                            @else
                                                                                <!-- Nút lưu -->
                                                                                <form
                                                                                    action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                                    method="POST"
                                                                                    style="display: inline-block;">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                            class="btn-save-job"
                                                                                            style="border: 0; background: none; padding: 0;">
                                                                                        <i class="bi bi-heart"
                                                                                           style="font-size: 16px;"></i>
                                                                                    </button>
                                                                                </form>
                                                                            @endif
                                                                            <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                               class="position-title">
                                                                                {{ limit_text($position->title, 25) }}
                                                                            </a>
                                                                        </div>
                                                                        <div class="position-meta">
                                                                            <span class="salary">
                                                                                <i class="bi bi-cash"></i>
                                                                                @if($position->salary_min == $position->salary_max)
                                                                                    {{ formatSalary($position->salary_min) }}
                                                                                @else
                                                                                    {{ formatSalary($position->salary_min) }}
                                                                                    - {{ formatSalary($position->salary_max) }}
                                                                                @endif
                                                                            </span>
                                                                            <span class="deadline">
                                                                                <i class="bi bi-clock"></i>
                                                                                {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="text-center mt-3">
                                                                <button class="btn-view-more"
                                                                        onclick="togglePositions(this)">
                                                                    Xem thêm {{ $employerJobs->count() - 2 }} vị trí khác
                                                                    <i class="bi bi-chevron-down"></i>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next-1"></div>
                    <div class="swiper-button-prev swiper-button-prev-1"></div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <div class="best-jobs-header wow animate__animated animate__fadeInUp">
                        <h2 class="section-title mb-10">
                            <span class="featured-icon">
                                <i class="bi bi-lightning-fill"></i>
                            </span>
                            VIỆC LÀM GẤP
                        </h2>
                        <p class="font-lg color-text-paragraph-2">Những vị trí cần tuyển gấp từ nhà tuyển dụng</p>
                    </div>
                </div>

                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-1 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <div class="swiper-slide h-auto">
                                <div class="row m-0">
                                    @foreach($hasteJobs->groupBy('employer_id')->take(3) as $employerJobs)
                                        @php
                                            $firstJob = $employerJobs->first();
                                            $employer = $firstJob->employer;
                                        @endphp
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="job-card h-100">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        @php
                                                            $company_img = getStorageImageUrl($employer->company_logo, config('image.square-logo'));

                                                        @endphp
                                                        <img src="{{ $company_img }}"
                                                             alt="{{ $employer->company_name ?? '' }}">
                                                    </div>
                                                    <div class="company-details">
                                                        <a href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                            <h3 class="company-name">{{ $employer->company_name ?? '' }}</h3>
                                                        </a>
                                                        <p class="company-address">{{ $employer->address->province->name ?? '' }}</p>
                                                        <div class="company-meta">
                                                            <span class="employee-count">
                                                                <i class="bi bi-people"></i>
                                                                {{ $employer->company_size ?? '100-200' }}
                                                            </span>
                                                            <span class="company-industry">
                                                                <i class="bi bi-briefcase"></i>
                                                                {{ $firstJob->job_category->name ?? 'Kinh doanh dịch vụ' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="job-listings">
                                                    @foreach($employerJobs->take(2) as $position)
                                                        <div class="job-position">
                                                            <div class="position-info">
                                                                @php
                                                                    $isSaved = in_array($position->id, $savedJobIds);
                                                                @endphp
                                                                @if ($isSaved)
                                                                    <!-- Nút bỏ lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                        method="POST"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="btn-save-job"
                                                                                style="border: 0; background: none; padding: 0;">
                                                                            <i class="bi bi-heart-fill text-danger"
                                                                               style="font-size: 16px;"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <!-- Nút lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                        method="POST"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="btn-save-job"
                                                                                style="border: 0; background: none; padding: 0;">
                                                                            <i class="bi bi-heart"
                                                                               style="font-size: 16px;"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                                <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                   class="position-title">
                                                                    {{ limit_text($position->title, 25) }}
                                                                </a>
                                                            </div>
                                                            <div class="position-meta">
                                                                <span class="salary">
                                                                    <i class="bi bi-cash"></i>
                                                                    {{ $position->salary->name }}
                                                                </span>
                                                                <span class="deadline">
                                                                    <i class="bi bi-clock"></i>
                                                                    {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    @if($employerJobs->count() > 2)
                                                        <div class="hidden-positions" style="display: none;">
                                                            @foreach($employerJobs->slice(2) as $position)
                                                                <div class="job-position">
                                                                    <div class="position-info">
                                                                        @php
                                                                            $isSaved = in_array($position->id, $savedJobIds);
                                                                        @endphp
                                                                        @if ($isSaved)
                                                                            <!-- Nút bỏ lưu -->
                                                                            <form
                                                                                action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        class="btn-save-job"
                                                                                        style="border: 0; background: none; padding: 0;">
                                                                                    <i class="bi bi-heart-fill text-danger"
                                                                                       style="font-size: 16px;"></i>
                                                                                </button>
                                                                            </form>
                                                                        @else
                                                                            <!-- Nút lưu -->
                                                                            <form
                                                                                action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        class="btn-save-job"
                                                                                        style="border: 0; background: none; padding: 0;">
                                                                                    <i class="bi bi-heart"
                                                                                       style="font-size: 16px;"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                        <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                           class="position-title">
                                                                            {{ limit_text($position->title, 25) }}
                                                                        </a>
                                                                    </div>
                                                                    <div class="position-meta">
                                                                        <span class="salary">
                                                                            <i class="bi bi-cash"></i>
                                                                            {{ $position->salary->name }}
                                                                        </span>
                                                                        <span class="deadline">
                                                                            <i class="bi bi-clock"></i>
                                                                            {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button class="btn-view-more"
                                                                    onclick="togglePositions(this)">
                                                                Xem thêm {{ $employerJobs->count() - 2 }} vị trí khác
                                                                <i class="bi bi-chevron-down"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="swiper-slide h-auto">
                                <div class="row m-0">
                                    @foreach($hasteJobs->groupBy('employer_id')->skip(3)->take(3) as $employerJobs)
                                        @php
                                            $firstJob = $employerJobs->first();
                                            $employer = $firstJob->employer;
                                        @endphp
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="job-card h-100">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        @php
                                                            $company_img = getStorageImageUrl($employer->company_logo, config('image.square-logo'));

                                                        @endphp
                                                        <img src="{{ $company_img }}"
                                                             alt="{{ $employer->company_name ?? '' }}">
                                                    </div>
                                                    <div class="company-details">
                                                        <a href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                            <h3 class="company-name">{{ $employer->company_name ?? '' }}</h3>
                                                        </a>
                                                        <p class="company-address">{{ $firstJob->address }}</p>
                                                        <div class="company-meta">
                                                            <span class="employee-count">
                                                                <i class="bi bi-people"></i>
                                                                {{ $employer->company_size ?? '100-200' }}
                                                            </span>
                                                            <span class="company-industry">
                                                                <i class="bi bi-briefcase"></i>
                                                                {{ $firstJob->job_category->name ?? 'Kinh doanh dịch vụ' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="job-listings">
                                                    @foreach($employerJobs->take(2) as $position)
                                                        <div class="job-position">
                                                            <div class="position-info">
                                                                @php
                                                                    $isSaved = in_array($position->id, $savedJobIds);
                                                                @endphp
                                                                @if ($isSaved)
                                                                    <!-- Nút bỏ lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                        method="POST"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="btn-save-job"
                                                                                style="border: 0; background: none; padding: 0;">
                                                                            <i class="bi bi-heart-fill text-danger"
                                                                               style="font-size: 16px;"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <!-- Nút lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                        method="POST"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="btn-save-job"
                                                                                style="border: 0; background: none; padding: 0;">
                                                                            <i class="bi bi-heart"
                                                                               style="font-size: 16px;"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                                <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                   class="position-title">
                                                                    {{ limit_text($position->title, 25) }}
                                                                </a>
                                                            </div>
                                                            <div class="position-meta">
                                                                <span class="salary">
                                                                    <i class="bi bi-cash"></i>
                                                                    @if($position->salary_min == $position->salary_max)
                                                                        {{ formatSalary($position->salary_min) }}
                                                                    @else
                                                                        {{ formatSalary($position->salary_min) }}
                                                                        - {{ formatSalary($position->salary_max) }}
                                                                    @endif
                                                                </span>
                                                                <span class="deadline">
                                                                    <i class="bi bi-clock"></i>
                                                                    {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    @if($employerJobs->count() > 2)
                                                        <div class="hidden-positions" style="display: none;">
                                                            @foreach($employerJobs->slice(2) as $position)
                                                                <div class="job-position">
                                                                    <div class="position-info">
                                                                        @php
                                                                            $isSaved = in_array($position->id, $savedJobIds);
                                                                        @endphp
                                                                        @if ($isSaved)
                                                                            <!-- Nút bỏ lưu -->
                                                                            <form
                                                                                action="{{ route('client.candidate.unsave', ['job_id' => $position->id]) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        class="btn-save-job"
                                                                                        style="border: 0; background: none; padding: 0;">
                                                                                    <i class="bi bi-heart-fill text-danger"
                                                                                       style="font-size: 16px;"></i>
                                                                                </button>
                                                                            </form>
                                                                        @else
                                                                            <!-- Nút lưu -->
                                                                            <form
                                                                                action="{{ route('client.candidate.saveJob', ['job_id' => $position->id]) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        class="btn-save-job"
                                                                                        style="border: 0; background: none; padding: 0;">
                                                                                    <i class="bi bi-heart"
                                                                                       style="font-size: 16px;"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                        <a href="{{ route('client.job.single', ['jobSlug' => $position->slug]) }}"
                                                                           class="position-title">
                                                                            {{ limit_text($position->title, 25) }}
                                                                        </a>
                                                                    </div>
                                                                    <div class="position-meta">
                                                                        <span class="salary">
                                                                            <i class="bi bi-cash"></i>
                                                                            @if($position->salary_min == $position->salary_max)
                                                                                {{ formatSalary($position->salary_min) }}
                                                                            @else
                                                                                {{ formatSalary($position->salary_min) }}
                                                                                - {{ formatSalary($position->salary_max) }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="deadline">
                                                                            <i class="bi bi-clock"></i>
                                                                            {{ \Carbon\Carbon::parse($position->end_date)->format('d/m') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button class="btn-view-more"
                                                                    onclick="togglePositions(this)">
                                                                Xem thêm {{ $employerJobs->count() - 2 }} vị trí khác
                                                                <i class="bi bi-chevron-down"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next-1"></div>
                    <div class="swiper-button-prev swiper-button-prev-1"></div>
                </div>
            </div>
        </section>
        <section class="section-box overflow-visible mt-100 mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-image-job"><img class="img-job-1" alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/homepage1/img-chart.png') }}"><img
                                class="img-job-2" alt="jobBox"
                                src="{{ asset('assets/client/imgs/page/homepage1/controlcard.png') }}">
                            <figure class="wow animate__animated animate__fadeIn"><img alt="jobBox"
                                                                                       src="{{ asset('assets/client/imgs/page/homepage1/img1.png') }}">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-job-inner"><span class="color-text-mutted text-32">Hàng triệu việc làm.
                            </span>
                            <h2 class="text-52 wow animate__animated animate__fadeInUp">Tìm người phù hợp với bạn</h2>
                            <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">Tìm kiếm tất
                                cả các vị trí mở trên web. Nhận ước tính lương cá nhân của riêng bạn. Đọc đánh giá về
                                hơn 600.000 công ty trên toàn thế giới. Công việc phù hợp đang ở ngoài kia.
                            </div>
                            <div class="mt-40">
                                <div class="wow animate__animated animate__fadeInUp"><a class='btn btn-default'
                                                                                        href="{{route('client.job.index')}}">Tìm
                                        kiếm
                                        công việc</a><a class='btn btn-link'
                                                        href="{{route('client.job.index')}}">Hơn nữa</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box overflow-visible mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">25</span><span> K+</span></h1>
                            <h5>Các trường hợp đã hoàn thành</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào<br
                                    class="d-none d-lg-block"> mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">17</span><span> +</span></h1>
                            <h5>Văn phòng của chúng tôi</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào <br
                                    class="d-none d-lg-block">mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">86</span><span> +</span></h1>
                            <h5>Người có tay nghề</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng t��i luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào <br
                                    class="d-none d-lg-block">mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">28</span><span> +</span></h1>
                            <h5>Chúc mừng khách hàng</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào <br
                                    class="d-none d-lg-block">mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <div class="best-jobs-header wow animate__animated animate__fadeInUp">
                        <h2 class="section-title mb-10">
                                <span class="featured-icon">
                                    <i class="bi bi-star-fill"></i>
                                </span>
                            Top ngành nghề nổi bật
                        </h2>
                        <p class="font-lg color-text-paragraph-2">Những ngành nghề có nhiều lượt tuyển dụng</p>
                    </div>
                </div>

                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-1 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <div class="swiper-slide h-auto">
                                <div class="row">
                                    @foreach($hotJobCategories as $hotJobCategory)
                                        @php
                                            $img = getStorageImageUrl($hotJobCategory->image, config('image.square-logo'));
                                        @endphp
                                        <div class="col-md-3 mb-25">
                                            <a href="{{ route('client.job.index', array_merge(request()->all(), ['categories' => array_merge(request('categories', []), [$hotJobCategory->id])])) }}" class="job-card">
                                                <div class="text-center">
                                                    <img alt="Sản xuất" class="lazy entered loaded" data-ll-status="loaded" src="{{ $img }}">
                                                </div>
                                                <div class="job-title">
                                                    {{ $hotJobCategory->name }}
                                                </div>
                                                <div class="job-count">
                                                    {{ $hotJobCategory->total_job_posts }} việc làm
                                                </div>
                                            </a>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <script src="{{ asset('assets/client/js/plugins/counterup.js') }}"></script>
    </main>

@endsection

@push('script')
    <script>
        function togglePositions(button) {
            const card = button.closest('.job-card');
            const hiddenPositions = card.querySelector('.hidden-positions');
            const isHidden = hiddenPositions.style.display === 'none';

            hiddenPositions.style.display = isHidden ? 'block' : 'none';
            button.innerHTML = isHidden ?
                'Thu gọn <i class="bi bi-chevron-up"></i>' :
                `Xem thêm ${hiddenPositions.children.length} vị trí khác <i class="bi bi-chevron-down"></i>`;
        }
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/client/css/home/home.css') }}">


@endpush
