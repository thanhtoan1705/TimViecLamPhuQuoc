@extends('client/layouts/master')

@section('content')
    <div class="single-root-element">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card-grid-2 hover-up">
                    <div class="card-grid-2-image-left">
                        <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
                                <figure><img alt="jobBox"
                                             src="{{ asset('assets/client/imgs/page/candidates/user1.png') }}">
                                </figure>
                            </a></div>
                        <div class="card-profile pt-10"><a href='candidate-details.html'>
                                <h5>Thanh Toàn</h5>
                            </a><span class="font-xs color-text-mutted">UI/UX Designer</span>
                            <div class="rate-reviews-small pt-5"><span><img
                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                        alt="jobBox"></span><span><img
                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                        alt="jobBox"></span><span><img
                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                        alt="jobBox"></span><span><img
                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                        alt="jobBox"></span><span><img
                                        src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"
                                        alt="jobBox"></span><span
                                    class="ml-10 color-text-mutted font-xs">(65)</span></div>
                        </div>
                    </div>
                    <div class="card-block-info">
                        <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng tối ưu mã
                            và
                            tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra các ứng dụng
                            web
                            mạnh mẽ và linh hoạt.</p>
                        <div class="card-2-bottom card-2-bottom-candidate mt-30">
                            <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                       href='jobs-grid.html'>Figma</a><a
                                    class='btn btn-tags-sm mb-10 mr-5'
                                    href='jobs-grid.html'>Adobe XD</a><a class='btn btn-tags-sm mb-10 mr-5'
                                                                         href='jobs-grid.html'>PSD</a><a
                                    class='btn btn-tags-sm mb-10 mr-5'
                                    href='jobs-grid.html'>App</a><a class='btn btn-tags-sm mb-10 mr-5'
                                                                    href='jobs-grid.html'>Digital</a>
                            </div>
                        </div>
                        <div class="employers-info align-items-center justify-content-center mt-15">
                            <div class="row">
                                <div class="col-6"><span class="d-flex align-items-center"><i
                                            class="fi-rr-marker mr-5 ml-0"></i><span
                                            class="font-sm color-text-mutted">Phú Quốc</span></span>
                                </div>
                                <div class="col-6"><span
                                        class="d-flex justify-content-end align-items-center"><i
                                            class="fi-rr-clock mr-5"></i><span
                                            class="font-sm color-brand-1">100.000 VNĐ / giờ</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
