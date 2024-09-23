@extends('client.layouts.master')
@section('title', 'Chi tiết ứng viên')
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
                        @if(isset($candidate->avatar_url) && $candidate->user->avatar_url)
                            <img alt="jobBox" width="10px" src="{{ asset('storage/' . $candidate->user->avatar_url) }}">
                        @else
                            <img alt="jobBox" width="10px" src="{{ asset('storage/images/default.jpeg') }}">
                        @endif
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5>{{$candidate->user->name}}
                            </h5>
                            <p>
                                @foreach ($candidate->addresses as $address)
                                    {{ $address->street }},
                                    {{ $address->district->name }},
                                    {{ $address->province->name }}
                                    <br>
                                @endforeach
                            </p>
                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{$candidate->major->name}}</p>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a
                                class='btn btn-download-icon btn-apply btn-apply-big'
                                href=''>Tải xuống CV</a></div>
                    </div>
                </div>
                <div class="box-nav-tabs mt-40 mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border aboutus-icon mr-15 mb-5 active" href="#tab-short-bio"
                               data-bs-toggle="tab" role="tab" aria-controls="tab-short-bio" aria-selected="true">Short
                                Bio</a></li>
                        <li><a class="btn btn-border recruitment-icon mr-15 mb-5" href="#tab-skills"
                               data-bs-toggle="tab"
                               role="tab" aria-controls="tab-skills" aria-selected="false">Kĩ năng</a></li>
                    </ul>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                     aria-labelledby="tab-short-bio">
                                    <h4>Giới thiệu</h4>
                                    <p>
                                        {!! $candidate->description !!}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tab-skills" role="tabpanel" aria-labelledby="tab-skills">
                                    <h4>Kỹ năng</h4>
                                    <p>
                                        @foreach($candidate->skills as $key => $skill)
                                            <a class='btn btn-grey-small mr-5'
                                               href=''>{{ $skill->name }}</a>
                                        @endforeach
                                    </p>
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
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Kinh nghiệm</span><strong
                                                class="small-heading">
                                                {{$candidate->experience->name}}
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">
                                                Mức lương mong đợi
                                            </span>
                                            <strong
                                                class="small-heading">{{ $candidate->salary->name}}
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Trình độ học vấn</span>
                                            <strong class="small-heading">{{$candidate->degree->name}}</strong></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>@foreach ($candidate->addresses as $address)
                                            {{ $address->district->name }},
                                            {{ $address->province->name }}
                                            <br>
                                        @endforeach</li>
                                    <li>Phone: {{$candidate->user->phone}}</li>
                                    <li>Email: {{$candidate->user->email}}</li>
                                </ul>
                                <div class="mt-30"><a class='btn btn-send-message' href='page-contact.html'>Gửi tin</a>
                                </div>
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

        <!-- Component newsletter -->
        <x-client.newsletter/>
        <!-- End component newsletter -->
    </main>
@endsection
