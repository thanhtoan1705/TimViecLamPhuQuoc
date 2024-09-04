<section class="section-box-2">
    <div class="container">
        <div class="banner-hero banner-image-single"><img
                src="{{ asset('assets/client/imgs/page/candidates/img.png') }}"
                alt="jobbox"><a class="btn-editor" href="#"></a></div>
        <div class="box-company-profile">
            <div class="image-compay">
                @if(isset($candidate->image) && $candidate->user->image)
                    <img alt="jobBox" width="50px" src="{{ asset('storage/' . $candidate->user->image) }}">
                @else
                    <img alt="jobBox" width="50px" src="{{ asset('path/to/default/image.png') }}">
                @endif
            </div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">

                    <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{$candidate->major->name}}</p>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end"><a
                        class='btn btn-download-icon btn-apply btn-apply-big'
                        href=''>Tải xuống CV</a></div>
            </div>
        </div>
        <div class="border-bottom pt-10 pb-10"></div>
    </div>
</section>


