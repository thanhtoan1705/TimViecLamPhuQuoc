@extends('client.layouts.master')
@section('title', 'Trang chủ')
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
                                                    @if(isset($category->image))
                                                        <img alt="jobBox" width="50px"
                                                             src="{{ asset('storage/' . $category->image) }}">
                                                    @else
                                                        <img alt="jobBox" width="50px"
                                                             src="{{ asset('path/to/default/image.png') }}">
                                                    @endif
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
                                                 src="{{ asset('path/to/default/image.png') }}">
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
                                            <div class="card-grid-2 hover-up">
                                                <div class="card-grid-2-image-left"><span class="flash"></span>
                                                    <div class="image-box">
                                                        @if(isset($posts->first()->job_category->image))
                                                            <img alt="jobBox" width="50px"
                                                                 src="{{ asset('storage/' . $posts->first()->job_category->image) }}">
                                                        @else
                                                            <img alt="jobBox" width="50px"
                                                                 src="{{ asset('path/to/default/image.png') }}">
                                                        @endif
                                                    </div>
                                                    <div class="right-info"><a class='name-job'
                                                                               href='company-details.html'>{{ $categoryName }}</a><span
                                                            class="location-small">
                                                            {{ $post->address }}
                                                        </span></div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h6><a href='job-details.html'>{{ $post->title }}</a></h6>
                                                    <div class="mt-5"><span
                                                            class="card-briefcase">{{ $post->jobType->name  }}</span><span
                                                            class="card-time">{{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</span>
                                                    </div>
                                                    <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;  white-space: normal;"
                                                       class="font-sm color-text-paragraph mt-15">
                                                        {{ $post->description }}
                                                    </p>
                                                    <div class="mt-30">
                                                        @foreach($post->skills as $key => $skill)
                                                            <a class='btn btn-grey-small mr-5'
                                                               href=''>{{ $skill->name }}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-2-bottom mt-30">
                                                        <div class="row">
                                                            {{--                                                            card-text-price--}}
                                                            <div class="col-lg-7 col-7"><span class=" text-sm">
                                                                    @if($post->salary_min == $post->salary_max || $post->salary_min <= 1000000 || $post->salary_max <= 1000000)
                                                                        {{ formatSalary($post->salary_min) }}
                                                                    @else
                                                                        {{ formatSalary($post->salary_min) }} - {{ formatSalary($post->salary_max) }}
                                                                    @endif
                                                                </span></div>
                                                            <div class="col-lg-5 col-5 text-end">
                                                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                     data-bs-target="#ModalApplyJobForm">Ứng tuyển
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
                        @endforeach
                    </div>
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
                            <h2 class="text-52 wow animate__animated animate__fadeInUp">Tìm người phù hợp
                                với bạnt&rsquo;s <span class="color-brand-2">Với</span> bạn</h2>
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
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Nhà tuyển dụng hàng đầu</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Khám phá bước đi
                        sự nghiệp tiếp theo của bạn, hợp đồng biểu diễn tự do hoặc thực tập</p>
                </div>
            </div>
            <div class="container">
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-1 swiper-style-2 swiper">
                        <div class="swiper-wrapper pt-5">
                            <div class="swiper-slide">
                                @foreach($topEmployers as $topEmployer)
                                    <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                            <div class="item-logo">
                                                <div class="image-left"><img alt="jobBox"
                                                                             src="{{ asset('storage/' . $topEmployer->company_logo) }}">
                                                </div>
                                                <div class="text-info-right">
                                                    <h4>{{$topEmployer['company_name']}}</h4><img alt="jobBox"
                                                                                                  src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                        alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                        alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                        alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                        alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                        class="font-xs color-text-mutted ml-10"><span>(</span><span>68</span><span>)</span></span>
                                                </div>
                                                <div class="text-info-bottom mt-5"><span
                                                        class="font-xs color-text-mutted icon-location">
                                                        @if(isset($topEmployer->employer->address->ward->name))
                                                            {{$topEmployer->employer->address->ward->name}}, {{$topEmployer->employer->address->district->name}}, {{$topEmployer->employer->address->district->province->name}}
                                                        @endif

                                                    </span><span
                                                        class="font-xs color-text-mutted float-end mt-5">{{$topEmployer->total_jobs}}<span> Công việc hiện có</span></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
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
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Một số nhóm ngành hot</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm công việc yêu
                        thích của bạn và nhận được
                        lợi ích của chính mình</p>
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
        <script src="</main>{{ asset('assets/client/js/plugins/counterup.js"></script>
    </main>
@endsection
