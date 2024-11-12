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
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">Cách <span
                                        class="color-brand-2">dễ nhất</span><br class="d-none d-lg-block">để có được
                                    công
                                    việc mới của bạn</h1>
                                <div class="banner-description mt-20 wow animate__animated animate__fadeInUp"
                                     data-wow-delay=".1s">Mỗi tháng, hơn 3 triệu người tìm việc truy cập <br
                                        class="d-none d-lg-block">trang web để tìm việc, tạo ra hơn 140.000 <br
                                        class="d-none d-lg-block">đơn đăng ký mỗi ngày
                                </div>
                                <x-client.search></x-client.search>
                                <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp"
                                     data-wow-delay=".3s"><strong>Tìm kiếm phổ biến:</strong><a
                                        href="#">Designer</a>, <a href="#">Web</a>, <a
                                        href="#">IOS</a>, <a href="#">Developer</a>, <a
                                        href="#">PHP</a>, <a href="#">Senior</a>, <a
                                        href="#">Engineer</a></div>
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
                        sự nghiệp tiếp theo của bạn, hợp đồng biểu diễn tự do hoặc thực tập</p>
                </div>
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-1 swiper">
                        <div class="swiper-wrapper">
                            @foreach($topEmployers as $employer)
                                <div class="swiper-slide">
                                    <div class="employer-banner"
                                         style="background-image: url('{{ asset('storage/' . ($employer->company_photo_cover ?? 'default/company-cover.jpg')) }}')">
                                        <div class="banner-content">
                                            <div class="employer-info">
                                                <div class="logo">
                                                    <img
                                                        src="{{ asset('storage/' . ($employer->company_logo ?? 'default/company.png')) }}"
                                                        alt="{{ $employer->company_name }}">
                                                </div>
                                                <div class="info">
                                                    <a href="{{ route('client.employer.single', ['slug' => $employer->slug]) }}">
                                                        <h3 class="company-name">{{ $employer->company_name ?? '' }}</h3>
                                                    </a>
                                                    <p>{{ $employer->address->province->name ?? '' }}</p>
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
                                                        <div class="apply-btn">
                                                            <a href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}"
                                                               class="btn btn-apply">Ứng tuyển</a>
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
                                                                Xem thêm {{ $employer->job_post->count() - 2 }} việc
                                                                làm</a>
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
        <div class="mt-100"></div>
        <section class="section-box mt-80">
            <div class="section-box wow animate__animated animate__fadeIn">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tìm kiếm bằng danh
                            mục</h2>
                        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm công việc
                            hoàn hảo cho bạn&rsquo; khoảng hơn 800 việc làm mới mỗi ngày</p>
                    </div>
                    <div class="box-swiper mt-50">
                        <div class="swiper-container swiper-group-5 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                @foreach($jobCategories as $category)
                                    <div class="swiper-slide hover-up">
                                        <a class="m-1" href=''>
                                            <div class="item-logo">
                                                <div class="image-left">
                                                        @php
                                                            $category_img = getStorageImageUrl($category->image, 'default/square-logo.svg');
                                                        @endphp
                                                        <img alt="{{ $category->name }}" width="50px"
                                                        src="{{ $category_img }}">
                                                </div>
                                                <div class="text-info-right">
                                                    <h4 style="max-width: 130px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $category->name }}</h4>
                                                    <p class="font-xs">{{ $category->job_posts_count }}<span> công việc có sẵn</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section-box mb-30">
            <div class="container">
                <div class="box-we-hiring">
                    <div class="text-1"><span class="text-we-are">Chúng tôi là</span><span class="text-hiring">Ứng
                            tuyển</span></div>
                    <div class="text-2">Hãy cùng nhau&rsquo;s <span class="color-brand-1">làm việc</span> <br> &amp;
                        <span
                            class="color-brand-1">và khám phá</span> cơ hội
                    </div>
                    <div class="text-3">
                        <div class="btn btn-apply btn-apply-icon" data-bs-toggle="modal"
                             data-bs-target="#ModalApplyJobForm">Ứng tuyển ngay
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                                    <div class="d-flex justify-content-around label-jobbox">
                                                        @if (in_array(2, $post->package_labels))
                                                            <span class="VLhot">hot</span>
                                                        @endif

                                                        @if (in_array(1, $post->package_labels))
                                                            <span class="VLgap">gấp</span>
                                                        @endif

                                                        @if (!in_array(1, $post->package_labels) && !in_array(2, $post->package_labels))
                                                            <span class="flash"></span>
                                                        @endif
                                                    </div>
                                                    <div class="image-box">

                                                        @php
                                                            $blog_img = getStorageImageUrl($posts->first()->job_category->image, 'default/square-logo.svg');
                                                        @endphp

                                                        <img alt="{{ $post->title }}" width="50px"
                                                             src="{{ $blog_img }}">

                                                    </div>
                                                    <div class="right-info">
                                                        <a class='name-job'
                                                           href='{{ route('client.employer.single', ['slug' => $post->employer->slug]) }}'>{{ $post->employer->company_name }}</a>
                                                        <span class="location-small">
                                                        {{ $post->address }}
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
                                                                <button type="submit" class="save-button mt-20">
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
                                                            $company_img = getStorageImageUrl($employer->company_logo ?? '', 'default/company.png');
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
                                                            <span class="company-type">
                                                                <i class="bi bi-building"></i>
                                                                {{ $employer->company_type ?? 'Công ty TNHH' }}
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
                                                                    {{ $position->title }}
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
                                                                            {{ $position->title }}
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
                                                            $company_img = getStorageImageUrl($employer->company_logo ?? '', 'default/company.png');
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
                                                            <span class="company-type">
                                                                <i class="bi bi-building"></i>
                                                                {{ $employer->company_type ?? 'Công ty TNHH' }}
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
                                                                    {{ $position->title }}
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
                                                                            {{ $position->title }}
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
                                                            $company_img = getStorageImageUrl($employer->company_logo ?? '', 'default/company.png');
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
                                                            <span class="company-type">
                                                                <i class="bi bi-building"></i>
                                                                {{ $employer->company_type ?? 'Công ty TNHH' }}
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
                                                                    {{ $position->title }}
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
                                                                            {{ $position->title }}
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
                                                            $company_img = getStorageImageUrl($employer->company_logo ?? '', 'default/company.png');
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
                                                            <span class="company-type">
                                                                <i class="bi bi-building"></i>
                                                                {{ $employer->company_type ?? 'Công ty TNHH' }}
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
                                                                    {{ $position->title }}
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
                                                                            {{ $position->title }}
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
                                                                                        href='jobs-grid.html'>Tìm kiếm
                                        cong việc</a><a class='btn btn-link'
                                                        href='page-about.html'>Hơn nữa</a></div>
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
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
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
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Một số nhóm ngành hot</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm công việc yêu
                        thích của bạn và nhận đợi ích của chính mình</p>
                </div>
            </div>
            <div class="container">
                <div class="row mt-50">
                    @foreach($hotJobCategories as $hotJobCategory)
                        @php
                            if($hotJobCategory->image){
                               $img =  asset('storage/' . $hotJobCategory->image);
                            }else{
                                $img = asset('default/blog.jpg');
                            }
                        @endphp
                        <div class="
                                @if($loop->index == 0) col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12
                                @elseif($loop->index == 1) col-xl-4 col-lg-4 col-md-7 col-sm-12 col-12
                                @elseif($loop->index == 2) col-xl-5 col-lg-5 col-md-7 col-sm-12 col-12
                                @elseif($loop->index == 3) col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12
                                @elseif($loop->index == 4) col-xl-5 col-lg-5 col-md-7 col-sm-12 col-12
                                @else col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12
                                @endif
                                ">
                            <div class="card-image-top hover-up">
                                <a href='jobs-grid.html'>
                                    <div class="image" style="background-image: url('{{ $img }}');">
                                        <span class="lbl-hot">Hot</span>
                                    </div>
                                </a>
                                <div class="informations">
                                    <a href='jobs-grid.html'>
                                        <h5>{{ $hotJobCategory->name }}</h5>
                                    </a>
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <span class="text-14 color-text-paragraph-2">{{ $hotJobCategory->total_job_posts }} vị trí ứng tuyển</span>
                                        </div>
                                        <div class="col-lg-6 col-6 text-end">
                                            <span class="color-text-paragraph-2 text-14">{{ $hotJobCategory->total_employers }} công ty</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <x-client.blog></x-client.blog>
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
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-xl-3, .col-lg-4, .col-md-6 {
            display: flex;
            flex-direction: column;
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

        .description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;

            height: 63px;
            line-height: 20px;
        }

        .description:only-child {
            margin-bottom: 23px;
        }

        .card-block-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card-grid-2-image-left {
            padding: 10px 20px 15px 20px;
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
            position: relative;
            width: 100%;
        }

        .image-box {
            flex-shrink: 0;
        }

        .right-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            max-width: 70%;
        }

        .location-small {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;

            height: 42px;
            line-height: 20px;
        }


        .card-grid-2 .label-jobbox {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 5px;
        }

        .card-grid-2 .VLgap {
            background-color: #FFD700;
            color: #ffffff;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(255, 215, 0, 0.3);
        }

        .card-grid-2 .VLhot {
            background-color: #FF4444;
            color: white;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(255, 68, 68, 0.2);
        }

        .best-jobs-header {
            position: relative;
            margin-bottom: 30px;
        }

        .best-jobs-header .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #05264E;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .featured-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #FFE5D3, #FFF4ED);
            border-radius: 12px;
            margin-right: 5px;
        }

        .featured-icon i {
            font-size: 20px;
            color: #FF9837;
        }

        .best-jobs-header::after {
            content: '';
            display: block;
            width: 80px;
            height: 2px;
            background: #FF9837;
            margin: 15px auto 0;
        }

        .color-text-paragraph-2 {
            font-size: 16px;
            line-height: 1.6;
            color: #66789C;
            margin-top: 15px;
        }

        /* Animation cho icon */
        @keyframes starPulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        .featured-icon i {
            animation: starPulse 2s infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .best-jobs-header .section-title {
                font-size: 26px;
            }

            .featured-icon {
                width: 35px;
                height: 35px;
            }

            .featured-icon i {
                font-size: 18px;
            }

            .color-text-paragraph-2 {
                font-size: 14px;
            }
        }

        .job-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .company-info {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .company-logo {
            width: 100%;
            height: 80px;
            margin-right: 15px;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }

        /* .company-name {
            font-size: 16px;
            font-weight: 600;
            color: #005587;
            margin-bottom: 5px;
        } */

        .company-address {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .company-meta {
            display: flex;
            gap: 15px;
            font-size: 13px;
            color: #666;
        }

        .company-meta i {
            margin-right: 5px;
        }

        .job-position {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .position-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-save-job {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .position-title {
            color: #2d2d2d;
            text-decoration: none;
            font-weight: 500;
        }

        .position-title:hover {
            color: #005587;
        }

        .position-meta {
            display: flex;
            gap: 20px;
            font-size: 13px;
            color: #666;
        }

        .position-meta i {
            margin-right: 5px;
        }

        .salary {
            color: #00b14f;
        }

        .btn-view-more {
            background: none;
            border: none;
            color: #005587;
            font-size: 14px;
            cursor: pointer;
            padding: 5px 15px;
        }

        .btn-view-more:hover {
            text-decoration: underline;
        }

        .best-jobs-content .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .job-card {
            height: 100%;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .job-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .company-info {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .company-logo {
            width: 60px;
            height: 60px;
            min-width: 60px;
            margin-right: 15px;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .company-name {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .company-address {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .company-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 13px;
            color: #666;
        }

        .company-meta span {
            display: flex;
            align-items: center;
        }

        .company-meta i {
            margin-right: 5px;
        }

        .job-position {
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .job-position:last-child {
            border-bottom: none;
        }

        .position-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .position-title {
            color: #333;
            font-weight: 500;
            text-decoration: none;
        }

        .position-meta {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #666;
        }

        .salary {
            color: #00b14f;
        }

        .btn-view-more {
            background: none;
            border: none;
            color: #0d6efd;
            font-size: 14px;
            padding: 5px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 0 auto;
        }

        .btn-view-more:hover {
            text-decoration: underline;
        }

        .hidden-positions {
            transition: all 0.3s ease;
        }

        .job-position {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 992px) {
        }

        .swiper-slide {
            height: auto !important;
        }

        .job-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .job-listings {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .box-swiper {
            position: relative;
            margin: 0 -15px;
        }

        .swiper-wrapper {
            display: flex;
            align-items: stretch;
        }

        .row {
            height: 100%;
        }

        .btn-save-job {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-save-job:hover {
            /* Add your hover styles here */
        }

        .card-grid-2 .VLgap:hover,
        .card-grid-2 .VLhot:hover {
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }

        .card-grid-2 .VLgap:hover {
            background-color: #FFE44D;
        }

        .card-grid-2 .VLhot:hover {
            background-color: #FF3333;
        }

        .employer-banner {
            height: auto;
            min-height: 600px;
            background-size: cover;
            background-position: center;
            position: relative;
            border-radius: 16px;
            overflow: visible;
            margin: 15px;
        }

        .employer-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.95) 100%);
        }

        .banner-content {
            position: relative;
            padding: 30px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .employer-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .employer-info .logo {
            margin-bottom: 15px;
        }

        .employer-info .logo img {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .employer-info .info h3 {
            color: #ff9900;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .employer-info .info p {
            color: #666;
            font-size: 14px;
        }

        .job-listing {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 2;
            margin-top: 20px;
        }

        .job-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .job-item:last-child {
            border-bottom: none;
        }

        .job-item:hover {
            background: #f8f9fa;
        }

        .job-details h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .job-details h4 a {
            color: #333;
            text-decoration: none;
        }

        .job-details h4 a:hover {
            color: #ff9900;
        }

        .job-meta {
            display: flex;
            gap: 20px;
            font-size: 13px;
            color: #666;
        }

        .job-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .job-meta i {
            font-size: 14px;
            color: #999;
        }

        .btn-apply {
            background: #ff9900;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
        }

        .btn-apply:hover {
            background: #ff8800;
            transform: translateY(-2px);
            color: white;
        }

        /* Swiper navigation buttons */
        .swiper-button-next,
        .swiper-button-prev {
            background: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            top: 40%;
            z-index: 10;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 18px;
            color: #333;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .employer-banner {
                height: auto;
                min-height: 600px;
            }

            .job-item {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .job-meta {
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        /* Media query cho mobile */
        @media screen and (max-width: 767px) {
            .employer-banner .job-item .apply-btn {
                display: none; /* Ẩn nút ứng tuyển */
        }

            .employer-banner .job-item {
                padding: 10px 0; /* Giảm padding để layout gọn hơn */
            }

            .employer-banner .job-details {
                width: 100%; /* Để job details chiếm full width khi không có nút apply */
            }

            /* Điều chỉnh layout của job meta trên mobile */
            .employer-banner .job-meta {
                flex-wrap: wrap;
                gap: 8px;
            }

            .employer-banner .job-meta span {
                font-size: 12px; /* Giảm font size cho meta data */
            }
        }

        /* Thêm CSS cho mobile view */
        .mobile-job-card {
            margin-bottom: 15px;
        }

        .mobile-job-content {
            display: flex;
            position: relative;
        }

        .company-logo {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            margin-right: 15px;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .job-info {
            flex-grow: 1;
        }

        .job-title {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .job-title a {
            color: #333;
            text-decoration: none;
        }

        /* .company-name {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        } */

        .job-details {
            display: flex;
            gap: 10px;
            font-size: 13px;
            color: #888;
        }

        .save-job {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .save-button {
            background: none;
            border: none;
            padding: 5px;
            cursor: pointer;
        }

        .save-button i {
            font-size: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .mobile-job-card {
                box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            .job-details {
                flex-direction: column;
                gap: 5px;
            }
        }

        .job-meta-info {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .job-salary,
        .job-location {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 8px;
            border-radius: 6px;
            background-color: #f5f5f5;
            font-size: 13px;
            color: #666;
        }

        .job-salary i,
        .job-location i {
            font-size: 14px;
            color: #888;
        }

        .mobile-job-content {
            display: flex;
            position: relative;
            padding: 10px;
            background: #fff;
            border-radius: 10px;
        }

        .company-logo {
            width: 95px;
            height: 95px;
            flex-shrink: 0;
            margin-right: 15px;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .job-info {
            flex-grow: 1;
            padding-right: 40px; /* Space for save button */
        }

        .job-title {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .job-title a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
        }

        .company-namee {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .save-job {
            position: absolute;
            right: 15px;
            top: 15px;
        }

        .save-button {
            background: none;
            border: none;
            padding: 5px;
            cursor: pointer;
        }

        .save-button i {
            font-size: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {

            .job-meta-info {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 359px) {
            .job-meta-info {
                flex-direction: column;
            }

            .job-salary,
            .job-location {
                width: fit-content;
            }
        }
    </style>
@endpush
