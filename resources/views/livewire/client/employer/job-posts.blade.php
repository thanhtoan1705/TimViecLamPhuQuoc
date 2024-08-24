<div>
    <div class="box-list-jobs display-list">
        @foreach($jobPosts as $job)
            <div class="col-xl-12 col-12">
                <div class="card-grid-2 hover-up"><span class="flash"></span>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card-grid-2-image-left">
                                <div class="image-box"><img
                                        src="{{ asset('storage/' . $job->employer->company_logo) }}"
                                        alt="jobBox" width="85px" height="85px"></div>
                                <div class="right-info"><a class="name-job" href="#">{{$job->employer->company_name}}</a><span
                                        class="location-small">{{$job->employer->address->province->name}}</span></div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                            <div class="pl-15 mb-15 mt-30">
                                @foreach($job->skills as $skill)
                                    <a class="btn btn-grey-small mr-5" href="#">{{$skill->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-block-info">
                        <h4><a href='job-details.html'>{{$job->title}}</a></h4>
                        <div class="mt-5">
                            <span class="card-briefcase">{{$job->jobType->name}}</span>
                            <span class="card-time"><span>{{ \Carbon\Carbon::parse($job->start_date)->diffForHumans() }}</span></span>
                        </div>
                        <p class="font-sm color-text-paragraph mt-10 text-truncate-2-lines">{{$job->description}}</p>
                        <div class="card-2-bottom mt-20">
                            <div class="row">
                                <div class="col-lg-7 col-7">
                                <span class="card-text-price">
                                    @if($job->salary_min == $job->salary_max || $job->salary_min <= 1000000 || $job->salary_max <= 1000000)
                                        {{ formatSalary($job->salary_min) }}
                                    @else
                                        {{ formatSalary($job->salary_min) }} - {{ formatSalary($job->salary_max) }}
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
    @php
        \Illuminate\Pagination\Paginator::useBootstrapFour();
    @endphp

    <div class="paginations">
        {{ $jobPosts->links('components.client.custom-pagination') }}
    </div>
</div>
