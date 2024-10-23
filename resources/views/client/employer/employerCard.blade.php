<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
        <div class="image-box">
            <a href='{{ route('client.employer.single', ['slug' => $employer->slug]) }}'>
                @if(isset($employer->company_logo) && !is_null($employer->company_logo))
                    <img style="width: 50px; height: 50px"
                         src="{{ asset('storage/' . $employer->company_logo) }}"
                         alt="jobBox">
                @else
                    <img style="width: 50px; height: 50px"
                         src="{{ asset('default/logo.svg') }}"
                         alt="jobBox">
                @endif





            </a>
        </div>
        <div class="info-text mt-10">
            <h5 class="font-bold"><a
                    href='{{ route('client.employer.single', ['slug' => $employer->slug]) }}'>{{ $employer->company_name }}</a>
            </h5>
            <span class="card-location">
                @foreach ($employer->addresses as $address)
                    {{ $address->district->name }},
                    {{ $address->province->name }}<br>
                @endforeach
            </span>
            <div class="mt-30">
                <a class='btn btn-grey-big' href='{{ route('client.employer.single', ['slug' => $employer->slug]) }}'>
                    <span>{{ $employer->job_post->count() }}</span><span> việc làm</span>
                </a>
            </div>
        </div>
    </div>
</div>
