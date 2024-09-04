@extends('client.layouts.master')
@section('title', 'Hồ sơ của tôi')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/candidates/img.png') }}"
                        alt="jobbox"><a class="btn-editor" href="#"></a></div>
                <div class="box-company-profile">
                    <div class="image-compay">
                        @if(isset($candidate->image) && $candidate->image)
                            <img alt="jobBox" width="85px" height="85px"
                                 src="{{ asset('storage/' . $candidate->image) }}">
                        @else
                            <img alt="jobBox" width="85px" height="85px"
                                 src="{{ asset('assets/client/imgs/page/candidates/candidate-profile.png') }}">
                        @endif
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5>{{$candidate->name}}</h5>
                            {{--                            @dd($candidate->candidate->major->name)--}}
                            {{--                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">@if ($candidate->candidate->major)--}}
                            {{--                                    <span>{{ $candidate->candidate->major->name }}</span>--}}
                            {{--                                @else--}}
                            {{--                                    <span>N/A</span>--}}
                            {{--                                @endif</p>--}}
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a
                                class='btn btn-download-icon btn-apply btn-apply-big'
                                href=''>Tải xuống CV</a></div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>

        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="box-nav-tabs nav-tavs-profile mb-5">
                            <ul class="nav" role="tablist">
                                <li><a class="btn btn-border aboutus-icon mb-20 active" href="#tab-my-profile"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-my-profile"
                                       aria-selected="true">My Profile</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="#tab-my-jobs"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-my-jobs"
                                       aria-selected="false">My Jobs</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs"
                                       aria-selected="false">Saved Jobs</a></li>
                            </ul>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="mt-20 mb-20"><a class="link-red" href="#">Delete Account</a></div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <div class="tab-content">
                                @livewire('client.candidate.profile')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png') }}" alt="joxBox"></div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-right.png') }}" alt="joxBox">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
@push('script')

@endpush
