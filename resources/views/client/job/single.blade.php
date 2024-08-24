@extends('client.layouts.master')
@section('title', 'Chi tiết tin tuyển dụng')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single">
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $job->employer->company_photo_cover) }}" alt="jobBox">
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h3>{{$job->title}}</h3>
                        <div class="mt-0 mb-15">
                            <span class="card-briefcase">{{$job->jobType->name}}</span>
                            <span class="card-time"> {{ \Carbon\Carbon::parse($job->start_date)->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end">
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal"
                             data-bs-target="#ModalApplyJobForm">Ứng tuyển ngay
                        </div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="job-overview">
                            <h5 class="border-bottom pb-15 mb-30">Thông tin việc làm</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/industry.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description industry-icon mb-10">Ngành nghề</span>
                                        <strong class="small-heading">
                                        @foreach($job->majors as $key => $major)
                                            {{ $major->name }}{{ $key != $job->majors->count() - 1 ? ' / ' : '' }}
                                        @endforeach
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
                                                {{ formatSalary($job->salary_min) }} - {{ formatSalary($job->salary_max) }}
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
                                            class="text-description mb-10">Thời hạn ứng tuyển</span><strong
                                            class="small-heading">{{ \Carbon\Carbon::parse($job->end_date)->format('d/m/Y') }}</strong></div>
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
                                            class="small-heading">{{$job->employer->address->province->name}}</strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single">
                            {!! $job->description !!}
                        </div>
                        <div class="single-apply-jobs">
                            <div class="row align-items-center">
                                <div class="col-md-5"><a class="btn btn-default mr-15" href="#">Ứng tuyển</a><a
                                        class="btn btn-border" href="#">Lưu công việc</a></div>
                                <div class="col-md-7 text-lg-end social-share">
                                    <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Chia sẻ </h6><a
                                        class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-fb.svg') }}"></a><a
                                        class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-tw.svg') }}"></a><a
                                        class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-red.svg') }}"></a><a
                                        class="d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                      src="{{ asset('assets/client/imgs/template/icons/share-whatsapp.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure><img src="{{ asset('storage/' . $job->employer->company_logo) }}"
                                                 alt="jobBox" width="85px" height="85px">
                                    </figure>
                                    <div class="sidebar-info"><span class="sidebar-company">{{$job->employer->company_name}}</span><span
                                            class="card-location">Cần Thơ</span><a class="link-underline mt-15"
                                                                                   href="#"> {{ $jobsCount }} ứng tuyển vào công ty</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <div id="map" style="height: 200px; width: 100%;"></div>
                                </div>
                                <ul class="ul-disc">
                                    <li>{{$job->employer->address->street}}</li>
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
                                                <div class="image">
                                                    <a href="">
                                                        <img src="{{ asset('assets/client/imgs/brands/brand-1.png') }}" alt="jobBox">
                                                    </a>
                                                </div>
                                                <div class="info-text">
                                                    <h5 class="font-md font-bold color-brand-1">
                                                        <a href="{{ route('client.job.single', ['employerSlug' => $job->employer->slug, 'jobSlug' => $otherJob->slug]) }}">
                                                            {{ $otherJob->title }}
                                                        </a>
                                                    </h5>
                                                    <div class="mt-0">
                                                        <span class="card-briefcase">{{ $otherJob->jobType->name }}</span>
                                                        <span class="card-time">{{ \Carbon\Carbon::parse($otherJob->start_date)->diffForHumans() }}</span>
                                                    </div>
                                                    <div class="mt-5">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h6 class="card-price">{{ formatSalary($otherJob->salary_min) }}</h6>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <span class="card-briefcase">{{ $otherJob->employer->address->province->name }}</span>
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
                                                                src="{{ asset('storage/' . $relatedJob->employer->company_logo) }}"
                                                                alt="jobBox" width="85px" height="85px">
                                                        </div>
                                                        <div class="right-info"><a class='name-job' href='company-details.html'>{{$relatedJob->employer->company_name}}</a><span class="location-small">Cần Thơ</span></div>
                                                    </div>
                                                    <div class="card-block-info">
                                                        <h6><a href='{{ route('client.job.single', ['employerSlug' => $relatedJob->employer->slug, 'jobSlug' => $relatedJob->slug]) }}'>{{$relatedJob->title}}</a></h6>
                                                        <div class="mt-5"><span class="card-briefcase">{{$relatedJob->jobType->name}}</span>
                                                            <span class="card-time">
                                                                {{ \Carbon\Carbon::parse($relatedJob->start_date)->diffForHumans() }}
                                                        </span>
                                                        </div>
                                                        <p class="font-sm color-text-paragraph mt-15"> {!! $relatedJob->description !!}</p>
                                                        <div class="mt-30">
                                                            @foreach($relatedJob->skills as $key => $skill)
                                                                <a class='btn btn-grey-small mr-5'
                                                                   href=''>{{ $skill->name }}</a>
                                                            @endforeach
                                                        </div>
                                                        <div class="card-2-bottom mt-30">
                                                            <div class="row">
                                                                <div class="col-lg-7 col-7"><span
                                                                        class="card-text-price">@if($relatedJob->salary_min == $relatedJob->salary_max || $relatedJob->salary_min <= 1000000 || $relatedJob->salary_max <= 1000000)
                                                                            {{ formatSalary($relatedJob->salary_min) }}
                                                                        @else
                                                                            {{ formatSalary($relatedJob->salary_min) }} - {{ formatSalary($relatedJob->salary_max) }}
                                                                        @endif</span></div>
                                                                <div class="col-lg-5 col-5 text-end">
                                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                         data-bs-target="#ModalApplyJobForm">
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

        <!-- Component newsletter -->
        <x-client.newsletter/>
        <!-- End component newsletter -->

    </main>
@endsection
@push('css')
    <style>
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
    </style>
@endpush
@push('script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var lat = {{$job->employer->address->latitude}};
            var lon = {{$job->employer->address->longitude}};
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

            var marker = L.marker([lat, lon], { icon: customIcon }).addTo(map);

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

                    container.onclick = function(){
                        // Chuyển hướng sang Google Maps với vị trí đã định
                        window.open(`https://www.google.com/maps?q=${lat},${lon}&z=18`, '_blank');
                    };

                    return container;
                }
            });

            map.addControl(new ZoomToMapControl());
        });
    </script>

@endpush

