<section class="section-box-2">
    <div class="container">
        <div class="banner-hero banner-image-single"><img
                src="{{ asset('assets/client/imgs/page/candidates/img.png') }}"
                alt="jobbox"><a class="btn-editor" href="#"></a></div>
        <div class="box-company-profile">
            <div class="image-compay" style="width: 85px !important; height:85px !important">
                    <img alt="jobBox" width="50px" src="{{ getStorageImageUrl(Auth::user()->avatar_url, config('avatar')) }}">
            </div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">

                    <p class="mt-0 font-md color-text-paragraph-2 mb-15">
                        {{ isset($candidate->major->name) ? $candidate->major->name : 'bạn chưa có chuyên ngành' }}
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end"><a
                        class='btn btn-download-icon btn-apply btn-apply-big'
                        href=''>Tải xuống CV</a></div>
            </div>
        </div>
        <div class="border-bottom pt-10 pb-10"></div>
    </div>
</section>


