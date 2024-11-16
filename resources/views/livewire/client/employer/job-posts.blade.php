<div>
    <div class="box-list-jobs display-list">
        @foreach($jobPosts as $job)
            <div class="col-xl-12 col-12">
                <div class="card-grid-2 hover-up"><span class="flash"></span>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card-grid-2-image-left">
                                <div class="image-box">
                                    <a href="{{ route('client.employer.single', ['slug' => $job->employer->slug]) }}">
                                        <img
                                            src="{{ getStorageImageUrl($job->employer->company_logo, config('image.square-logo')) }}"
                                            alt="jobBox" width="60px" height="60px">
                                    </a>
                                </div>
                                <div class="right-info">
                                    <a class="name-job" href="{{ route('client.employer.single', ['slug' => $job->employer->slug]) }}">{{$job->employer->company_name}}</a>
                                    <span
                                        class="location-small">{{$job->employer->address->province->name ?? ''}}</span>
                                </div>
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
                        <h4><a href='{{ route('client.job.single', ['jobSlug' => $job->slug]) }}'>{{$job->title}}</a>
                        </h4>
                        <div class="mt-5">
                            <span class="card-briefcase">{{$job->jobType->name}}</span>
                            <span class="card-time"><span>{{ \Carbon\Carbon::parse($job->start_date)->diffForHumans() }}</span></span>
                        </div>
                        <p class="font-sm color-text-paragraph mt-10 text-truncate-2-lines">
                            {{ limit_text($job->description, 240) }}
                        </p>
                        <div class="card-2-bottom mt-20">
                            <div class="row">
                                <div class="col-lg-7 col-7">
                                <span class="card-text-price">
                                    {{ $job->salary->name }}
                                </span>
                                </div>

                                <div class="col-lg-5 col-5 text-end">
                                    <a class="btn btn-apply-now" href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}">Ứng tuyển
                                    </a>
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
