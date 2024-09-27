<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
        <div class="image-box">
            <a href=''>
                <img style="width: 50px; height: 50px"
                     src="{{ asset('storage/' . $employer->company_logo) }}"
                     alt="jobBox">
            </a>
        </div>
        <div class="info-text mt-10">
            <h5 class="font-bold"><a href=''>{{ $employer->company_name }}</a></h5>
            <span class="card-location">
                @foreach ($employer->addresses as $address)
                    {{ $address->district->name }},
                    {{ $address->province->name }}<br>
                @endforeach
            </span>
            <div class="mt-30">
                <a class='btn btn-grey-big' href=''>
                    <span>{{ $employer->job_post->count() }}</span><span> việc làm</span>
                </a>
            </div>
        </div>
    </div>
</div>
