@extends('client.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="row cart-title">
                                <h2 style="margin-bottom: 50px">Việc làm đã lưu</h2>
                                @if($savedJobs && $savedJobs->count() > 0)
                                    @foreach($savedJobs as $job)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 cart-boder">
                                            <div class="card-grid-2 hover-up cart-body">
                                                <div class="card-grid-2-image-left"><span class="flash"></span>
                                                    <div class="image-box">
                                                        @if(!empty($job->employer->company_logo))
                                                            <img alt="jobBox" width="50px"
                                                                 src="{{ asset('storage/' . $job->employer->company_logo) }}">
                                                        @else
                                                            <img alt="jobBox" width="50px"
                                                                 src="{{ asset('default/logo.svg') }}">
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
                                                    <p class="font-sm color-text-paragraph mt-15">{!! Str::limit($job->description, 100) !!}</p>
                                                    <div class="mt-30">
                                                        @foreach($job->skills as $skill)
                                                            <a class='btn btn-grey-small mr-5'
                                                               href='#'>{{ $skill->name }}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-2-bottom mt-30">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6 align-content-center">
                                                                <span class=" text-sm">
                                                                    @if($job->salary_min == $job->salary_max || $job->salary_min <= 1000000 || $job->salary_max <= 1000000)
                                                                        {{ formatSalary($job->salary_min) }}
                                                                    @else
                                                                        {{ formatSalary($job->salary_min) }}
                                                                        - {{ formatSalary($job->salary_max) }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="col-lg-1 col-1 p-0 align-content-center">
                                                                <form
                                                                    action="{{ route('client.candidate.unsave', ['job_id' => $job->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button style="border: 0; background-color: white"
                                                                            type="submit"><i class="bi bi-heart-fill text-primary"
                                                                                             style="font-size: 16px; margin: 0"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class="col-lg-3 col-3 text-end">
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
                                @elseif(is_object($savedJobs) && $savedJobs->count() === 0)
                                    <p>Bạn chưa lưu công việc nào.</p>
                                @endif
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
    <style>
        .cart-title {
            display: flex;
            flex-wrap: wrap;
        }

        .cart-boder {
            display: flex;
            flex-direction: column;
        }

        .cart-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }
    </style>
@endsection
