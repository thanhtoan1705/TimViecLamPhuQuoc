@extends('client.layouts.master')
@section('title', 'Thông Báo Phỏng Vấn')
@section('content')
    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="box-content">
                                <div class="box-heading">
                                    <div class="box-title">
                                        <h3 class="mb-35">Thông Báo Phỏng Vấn</h3>
                                    </div>
                                </div>
                                <div class="interview-wrapper">
                                    @if($interviews && $interviews->count() > 0)
                                        <div id="interview-list">
                                            @foreach($interviews->take(2) as $interview)
                                                <div class="interview-item {{ $interview->status === 'pending' ? 'unread' : '' }} bdrd-10 mb-15">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 mb-md-0 mb-3">
                                                            <div class="interview-company text-center">
                                                                <div class="interview-logo mx-auto mb-2">
                                                                    <img
                                                                        src="{{ getStorageImageUrl($interview->employer->company_logo, config('image.square-logo')) }}"
                                                                        alt="Company Logo">
                                                                </div>
                                                                <div class="interview-company-name">
                                                                    <a href="{{ route('client.employer.single', $interview->employer->slug) }}" class="text-brand-1 font-sm">{{ $interview->employer->company_name }}</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 col-md-7 col-sm-6">
                                                            <div class="interview-content">
                                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                                    <h5 class="interview-heading mb-0">
                                                                        <i class="bi bi-calendar-event me-1"></i>
                                                                        {{ $interview->title }}
                                                                    </h5>
                                                                    <span
                                                                        class="interview-status bg-{{ $interview->status_color }} text-white">
                                                                        {{ $interview->status_text }}
                                                                    </span>
                                                                </div>

                                                                <div class="interview-job mb-3">
                                                                    <a href="{{ route('client.job.single', $interview->job_post->slug) }}" class="text-dark">
                                                                        <i class="bi bi-briefcase me-1"></i>
                                                                        {{ $interview->job_post->title }}
                                                                    </a>
                                                                </div>

                                                                <div class="interview-info">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="interview-time">
                                                                                <i class="bi bi-clock me-1"></i>
                                                                                {{ $interview->start_time->format('H:i - d/m/Y') }}
                                                                                <span class="text-muted">({{ $interview->duration }} phút)</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            @if($interview->interview_type === 'offline')
                                                                                <div class="interview-location">
                                                                                    <i class="bi bi-geo-alt me-1"></i>
                                                                                    {{ $interview->location }}
                                                                                </div>
                                                                            @else
                                                                                <div class="interview-type">
                                                                                    <i class="bi bi-camera-video me-1"></i>
                                                                                    Phỏng vấn trực tuyến
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if($interview->description)
                                                                    <div class="interview-description mt-2">
                                                                        <p class="font-sm color-text-paragraph mb-0">
                                                                            {!! $interview->description !!}
                                                                        </p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-md-3 col-sm-3 align-content-around">
                                                            <div class="interview-actions text-end">
                                                                @if($interview->interview_type === 'online' && $interview->status === 'pending')
                                                                    <a href="{{ $interview->zoom_join_url }}"
                                                                       target="_blank"
                                                                       class="interview-btn btn-primary w-100 mb-2">
                                                                        <i class="bi bi-camera-video-fill me-1"></i>
                                                                        Tham gia
                                                                    </a>
                                                                @elseif($interview->interview_type === 'offline' && $interview->status === 'pending')
                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($interview->location) }}"
                                                                       target="_blank"
                                                                       class="interview-btn btn-primary w-100 mb-2">
                                                                        <i class="bi bi-geo-alt-fill me-1"></i>
                                                                        Bản đồ
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if($interviews->count() > 2)
                                            <div id="hidden-interviews" style="display: none;">
                                                @foreach($interviews->skip(2) as $interview)
                                                    <div class="interview-item {{ $interview->status === 'pending' ? 'unread' : '' }} bdrd-10 mb-15">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 col-sm-3 mb-md-0 mb-3">
                                                                <div class="interview-company text-center">
                                                                    <div class="interview-logo mx-auto mb-2">
                                                                        <img
                                                                            src="{{ getStorageImageUrl($interview->employer->company_logo, config('image.square-logo')) }}"
                                                                            alt="Company Logo">
                                                                    </div>
                                                                    <div class="interview-company-name">
                                                                        <a href="{{ route('client.employer.single', $interview->employer->slug) }}"
                                                                           class="text-brand-1 font-sm">{{ $interview->employer->company_name }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-8 col-md-7 col-sm-6">
                                                                <div class="interview-content">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h5 class="interview-heading mb-0">
                                                                            <i class="bi bi-calendar-event me-1"></i>
                                                                            {{ $interview->title }}
                                                                        </h5>
                                                                        <span
                                                                            class="interview-status bg-{{ $interview->status_color }} text-white">
                                                                            {{ $interview->status_text }}
                                                                        </span>
                                                                    </div>

                                                                    <div class="interview-job mb-3">
                                                                        <a href="{{ route('client.job.single', $interview->job_post->slug) }}" class="text-dark">
                                                                            <i class="bi bi-briefcase me-1"></i>
                                                                            {{ $interview->job_post->title }}
                                                                        </a>
                                                                    </div>

                                                                    <div class="interview-info">
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-2">
                                                                                <div class="interview-time">
                                                                                    <i class="bi bi-clock me-1"></i>
                                                                                    {{ $interview->start_time->format('H:i - d/m/Y') }}
                                                                                    <span class="text-muted">({{ $interview->duration }} phút)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 mb-2">
                                                                                @if($interview->interview_type === 'offline')
                                                                                    <div class="interview-location">
                                                                                        <i class="bi bi-geo-alt me-1"></i>
                                                                                        {{ $interview->location }}
                                                                                    </div>
                                                                                @else
                                                                                    <div class="interview-type">
                                                                                        <i class="bi bi-camera-video me-1"></i>
                                                                                        Phỏng vấn trực tuyến
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    @if($interview->description)
                                                                        <div class="interview-description mt-2">
                                                                            <p class="font-sm color-text-paragraph mb-0">
                                                                                {!! $interview->description !!}
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 col-md-3 col-sm-3 align-content-around">
                                                                <div class="interview-actions text-end">
                                                                    @if($interview->interview_type === 'online' && $interview->status === 'pending')
                                                                        <a href="{{ $interview->zoom_join_url }}"
                                                                           target="_blank"
                                                                           class="interview-btn btn-primary w-100 mb-2">
                                                                            <i class="bi bi-camera-video-fill me-1"></i>
                                                                            Tham gia
                                                                        </a>
                                                                    @elseif($interview->interview_type === 'offline' && $interview->status === 'pending')
                                                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($interview->location) }}"
                                                                           target="_blank"
                                                                           class="interview-btn btn-primary w-100 mb-2">
                                                                            <i class="bi bi-geo-alt-fill me-1"></i>
                                                                            Bản đồ
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="text-center mt-4" id="load-more-container">
                                                <button type="button" class="interview-btn btn-primary" id="load-more-btn">
                                                    <i class="bi bi-eye me-1"></i>
                                                    Xem thêm {{ $interviews->count() - 2 }} lịch phỏng vấn
                                                </button>
                                            </div>

                                            <div class="text-center mt-4" id="show-less-container" style="display: none;">
                                                <button type="button" class="interview-btn btn-outline-primary" id="show-less-btn">
                                                    <i class="bi bi-eye-slash me-1"></i>
                                                    Thu gọn
                                                </button>
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-center">
                                            <p>Bạn chưa có thông báo phỏng vấn nào.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="paginations">
                                {{ $interviews->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script src="{{ asset('assets/client/js/candidate/interview.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/client/css/candidate/interview.css') }}">
@endpush



