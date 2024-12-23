@extends('client.layouts.master')
@section('title', 'Hồ sơ ứng viên  - '. $candidate->user->name)
@section('seo_title', 'Hồ sơ ứng viên  - '. $candidate->user->name)
@section('seo_description', $candidate->description)
@section('seo_keywords', $candidate->description)
@section('seo_image',  getStorageImageUrl($candidate->user->avatar_url, config('image.main-logo')))

@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/candidates/img.png') }}" alt="jobbox">
                </div>
                <div class="box-company-profile">
                    {{--                    @dd($candidate->user->image)--}}
                    <div class="image-compay" style="width: 100px;">
                        @if(isset($candidate->user->avatar_url) && $candidate->user->avatar_url)
                        @php
                            $avatarUrl = $candidate->user->avatar_url;
                            $isFullUrl = Str::startsWith($avatarUrl, ['http://', 'https://']);
                            $finalAvatarUrl = $isFullUrl ? $avatarUrl : asset('storage/' . $avatarUrl);
                        @endphp

                            <img alt="{{ $candidate->user->name }}" width="100px" height="100px" src="{{ $finalAvatarUrl }}">
                        @else
                            <img alt="jobBox" width="10px" src="{{ asset('default/user.png') }}">
                        @endif
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5>{{$candidate->user->name}}
                            </h5>
                            <p>

                                {{ $candidate->address->province->name ?? '' }}
                            </p>
                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{$candidate->major->name ?? ''}}</p>
                        </div>
{{--                        <div class="col-lg-4 col-md-12 text-lg-end"><a--}}
{{--                                class='btn btn-download-icon btn-apply btn-apply-big'--}}
{{--                                href=''>Tải xuống CV</a></div>--}}
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single bg-white p-4 rounded shadow-sm">
                            <div class="mb-5">
                                <h5 class="mt-0">Giới thiệu</h5>
                                <p>{{ limit_text($candidate->description, 1000) }}</p>
                            </div>
                            <!-- Học vấn / bằng cấp -->
                            <div class="mb-5">
                                <h5 class="mb-4 d-flex align-items-center">
                                    <span class="icon-container mr-3">
                                        <i class="fi-rr-graduation-cap"></i>
                                    </span>
                                    Học vấn / bằng cấp
                                </h5>
                                @foreach($candidate->educations as $education)
                                    <div class="timeline-item mb-4">
                                        <div class="timeline-content p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between mb-2">
                                                <h5 class="mb-0 mt-0">{{ $education->major_name }}</h5>
                                                <span class="text-muted">
                                                    {{ $education->start_date ? $education->start_date->format('m/Y') : '' }} -
                                                    {{ $education->end_date ? $education->end_date->format('m/Y') : 'Hiện tại' }}
                                                </span>
                                            </div>
                                            <p class="mb-1"><strong>Đơn vị đào tạo:</strong> {{ $education->institution_name }}</p>
                                            <p class="mb-0"><strong>Xếp loại:</strong> {{ $education->classification }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Kinh nghiệm làm việc -->
                            <div class="mb-5">
                                <h5 class="mb-4 d-flex align-items-center">
                                    <span class="icon-container mr-3">
                                        <i class="fi-rr-briefcase"></i>
                                    </span>
                                    Kinh nghiệm làm việc
                                </h5>
                                @foreach($candidate->workExperiences as $experience)
                                    <div class="timeline-item mb-4">
                                        <div class="timeline-content p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between mb-2">
                                                <h5 class="mb-0 mt-0">{{ $experience->position }}</h5>
                                                <span class="text-muted">
                                                     {{ $experience->start_date ? $experience->start_date->format('m/Y') : '' }} -
                                                    {{ $experience->end_date ? $experience->end_date->format('m/Y') : 'Hiện tại' }}
                                                </span>
                                            </div>
                                            <p class="mb-1"><strong>Công ty:</strong> {{ $experience->company_name }}</p>
                                            <p class="mb-0"><strong>Mô tả:</strong> {!! $experience->description !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Kỹ năng -->
                            <div class="mb-5">
                                <h5 class="mb-4 d-flex align-items-center">
                                    <span class="icon-container mr-3">
                                        <i class="fi-rr-star"></i>
                                    </span>
                                    Kỹ năng
                                </h5>
                                <div class="d-flex flex-wrap">
                                    @foreach($candidate->skills as $skill)
                                        <span class="badge bg-light text-dark m-1 p-2">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Ngôn ngữ -->
                            <div class="mb-5">
                                <h5 class="mb-4 d-flex align-items-center">
                                    <span class="icon-container mr-3">
                                        <i class="fi-rr-comment-alt"></i>
                                    </span>
                                    Ngôn ngữ
                                </h5>
                                <div class="row">
                                    @foreach($candidate->languageProficiencies as $language)
                                        <div class="col-md-6 mb-3">
                                            <div class="language-item p-3 bg-light rounded">
                                                <h5 class="mb-2 mt-0">{{ $language->language }}</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $language->getProgressPercentage() }}%;" aria-valuenow="{{ $language->getProgressPercentage() }}" aria-valuemin="0" aria-valuemax="100">{{ $language->proficiency_level }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <h5 class="f-18">Tổng quan</h5>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fa-solid fa-cake-candles"></i>
                                        </div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Sinh năm</span><strong
                                                class="small-heading">
                                                {{$candidate->date_of_birth ?? ''}}
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="bi bi-gender-ambiguous"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Giới tính</span>
                                            <strong class="small-heading">
                                                @if($candidate->gender)
                                                    @switch(strtolower($candidate->gender))
                                                        @case('male')
                                                            Nam
                                                            @break
                                                        @case('female')
                                                            Nữ
                                                            @break
                                                        @default
                                                            Khác
                                                    @endswitch
                                                @else
                                                    Không xác định
                                                @endif
                                            </strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Kinh nghiệm</span><strong
                                                class="small-heading">
                                                {{$candidate->experience->name ?? ''}}
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">
                                                Mức lương mong đợi
                                            </span>
                                            <strong
                                                class="small-heading">{{ $candidate->salary->name ?? ''}}
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="bi bi-mortarboard"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Trình độ học vấn</span>
                                            <strong class="small-heading">{{$candidate->degree->name ?? ''}}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="bi bi-geo-alt"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Vị trí</span>
                                            <strong class="small-heading">{{$candidate->address->district->name ?? ''}} , {{$candidate->address->province->name ?? ''}} </strong></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>Phone: {{$candidate->user->phone}}</li>
                                    <li>Email: {{$candidate->user->email}}</li>
                                </ul>
{{--                                <div class="mt-30"><a class='btn btn-send-message' href='page-contact.html'>Gửi tin</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="sidebar-border-bg bg-right"><span class="text-grey">Chúng tôi</span><span
                                class="text-hiring">đang tuyển dụng</span>
                            <p class="font-xxs color-text-paragraph mt-5"></p>
                            <div class="mt-15"><a class="btn btn-paragraph-2" href="#">Chi tiết</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('css')
<style>
    .icon-container {
        width: 40px;
        height: 40px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .icon-container i {
        font-size: 20px;
        color: #3498db;
    }
    .timeline-item {
        position: relative;
        padding-left: 20px;
    }
    .timeline-content {
        border-left: 3px solid #3498db;
    }
    .timeline-content:hover {
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease;
    }
    .badge {
        font-size: 0.9rem;
        font-weight: normal;
    }
    .language-item {
        border-left: 3px solid #3498db;
    }
    .progress {
        height: 15px;
    }
    .progress-bar {
        background-color: #3498db;
    }
</style>
@endpush
