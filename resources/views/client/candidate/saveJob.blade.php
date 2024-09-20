@extends('client.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <main class="main">
        {{--        @dd($savedJobs)--}}
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
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

    </main>
@endsection
