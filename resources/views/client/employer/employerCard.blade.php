<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
        <div class="image-box">
            <a href='{{ route('client.employer.single', ['slug' => $employer->slug]) }}'>
                @php
                    $company_logo = \App\Helper\Image\ImageHelper::getImageUrl($employer->company_logo, 'default/square-logo.svg');
                @endphp

                <img style="width: 50px; height: 50px"
                     src="{{ $company_logo }}"
                     alt="{{ $employer->company_name }}">


            </a>
        </div>
        <div class="info-text mt-10">
            <h5 class="font-bold"><a
                    href='{{ route('client.employer.single', ['slug' => $employer->slug]) }}'>{{ $employer->company_name }}</a>
            </h5>
            <span class="card-location">
                    {{ $employer->address->province->name ?? '' }}
            </span>
            <div class="mt-30">
                <a class='btn btn-grey-big' href='{{ route('client.employer.single', ['slug' => $employer->slug]) }}'>
                    <span>{{ $employer->job_post->count() }}</span><span> việc làm</span>
                </a>
            </div>
        </div>
    </div>
</div>
