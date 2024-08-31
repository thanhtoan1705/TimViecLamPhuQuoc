@extends('client.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <main class="main">
        {{--        @dd($savedJobs)--}}
        <x-client.cadidate-header></x-client.cadidate-header>
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
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">

                            <div class="row">
                                <h2 style="margin-bottom: 50px">Việc làm đã lưu</h2>
                                @foreach($savedJobs as $job)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left"><span class="flash"></span>
                                                <div class="image-box">
                                                    @if(isset($job->company_logo) && $job->employer->company_logo)
                                                        <img alt="jobBox" width="50px"
                                                             src="{{ asset('storage/' . $job->employer->company_logo) }}">
                                                    @else
                                                        <img alt="jobBox" width="50px"
                                                             src="{{ asset('storage/images/default.jpeg') }}">
                                                    @endif
                                                </div>
                                                <div class="right-info"><a class='name-job'
                                                                           href=''>{{ $job->employer->company_name }}</a><span
                                                        class="location-small">{{ $job->address }}</span>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6><a href='job-details.html'>{{ $job->title }}</a>
                                                </h6>
                                                <div class="mt-5"><span
                                                        class="card-briefcase">{{ $job->jobType->name }}</span><span
                                                        class="card-time">{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                                                </div>
                                                <p class="font-sm color-text-paragraph mt-15">{{ Str::limit($job->description, 100) }}</p>
                                                <div class="mt-30">
                                                    @foreach($job->skills as $skill)
                                                        <a class='btn btn-grey-small mr-5'
                                                           href='#'>{{ $skill->name }}</a>
                                                    @endforeach
                                                </div>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7">
                                                            <span style="font-size: 15px;" class="card-text-price">
                                                                @if($job->salary_min == $job->salary_max || $job->salary_min <= 1000000 || $job->salary_max <= 1000000)
                                                                    {{ formatSalary($job->salary_min) }}
                                                                @else
                                                                    {{ formatSalary($job->salary_min) }}
                                                                    - {{ formatSalary($job->salary_max) }}
                                                                @endif
                                                            </span>
                                                        </div>
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
                        <div class="paginations">
                            {{ $savedJobs->links('vendor.pagination.custom') }}
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
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png')}}" alt="joxBox"></div>
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
                                src="{{ asset('assets/client/imgs/template/newsletter-right.png')}}" alt="joxBox"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
