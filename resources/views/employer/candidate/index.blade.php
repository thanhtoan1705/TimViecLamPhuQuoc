@extends('employer.layouts.master')
@section('title', 'Gợi ý ứng viên')
@section('content')

    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Gợi ý ứng viên</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href='index.html'>Quản trị</a></li>
                        <li><span>Gợi ý ứng viên</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user2.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Cody Fisher</h5>
                                                    </a><span class="font-xs color-text-mutted">Python developer</span>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user3.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Jerome Bell</h5>
                                                    </a><span class="font-xs color-text-mutted">Content Manager</span>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user4.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Jane Cooper</h5>
                                                    </a><span class="font-xs color-text-mutted">Network</span>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user5.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Floyd Miles</h5>
                                                    </a><span class="font-xs color-text-mutted">Photo Editing</span>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user6.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Devon Lane</h5>
                                                    </a><span class="font-xs color-text-mutted">Online Marketing</span>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user7.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Jerome Bell</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user8.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Eleanor</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user9.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Theresa</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user10.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Robert Fox</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user11.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Cameron</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user12.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Jacob Jones</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user13.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Court Henry</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user14.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Hawkins</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user15.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5>Howard</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online"><a
                                                        href='candidate-details.html'>
                                                        <figure><img alt="jobBox"
                                                                     src="{{ asset('assets/client/imgs/page/candidates/user1.png') }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-profile pt-10"><a href='candidate-details.html'>
                                                        <h5> Alexander</h5>
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
                                                <p class="font-xs color-text-paragraph-2">Tôi chuyên về PHP với khả năng
                                                    tối ưu mã
                                                    và
                                                    tích hợp các công nghệ như MySQL, HTML, CSS và JavaScript để tạo ra
                                                    các ứng dụng
                                                    web
                                                    mạnh mẽ và linh hoạt.</p>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-start"><a class='btn btn-tags-sm mb-10 mr-5'
                                                                               href='jobs-grid.html'>Figma</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Adobe XD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>PSD</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>App</a><a
                                                            class='btn btn-tags-sm mb-10 mr-5'
                                                            href='jobs-grid.html'>Digital</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                                <div class="paginations">
                                    <ul class="pager">
                                        <li><a class="pager-prev" href="#"></a></li>
                                        <li><a class="pager-number" href="#">1</a></li>
                                        <li><a class="pager-number" href="#">2</a></li>
                                        <li><a class="pager-number" href="#">3</a></li>
                                        <li><a class="pager-number" href="#">4</a></li>
                                        <li><a class="pager-number" href="#">5</a></li>
                                        <li><a class="pager-number active" href="#">6</a></li>
                                        <li><a class="pager-number" href="#">7</a></li>
                                        <li><a class="pager-next" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content apply-job-form">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body pl-30 pr-30 pt-50">
                        <div class="text-center">
                            <p class="font-sm text-brand-2">Job Application </p>
                            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
                            <p class="font-sm text-muted mb-30">Please fill in your information and send it to the
                                employer. </p>
                        </div>
                        <form class="login-register text-start mt-20 pb-30" action="#">
                            <div class="form-group">
                                <label class="form-label" for="input-1">Full Name *</label>
                                <input class="form-control" id="input-1" type="text" required="" name="fullname"
                                       placeholder="Steven Job">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-2">Email *</label>
                                <input class="form-control" id="input-2" type="email" required="" name="emailaddress"
                                       placeholder="stevenjob@gmail.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="number">Contact Number *</label>
                                <input class="form-control" id="number" type="text" required="" name="phone"
                                       placeholder="(+01) 234 567 89">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="des">Description</label>
                                <input class="form-control" id="des" type="text" required="" name="Description"
                                       placeholder="Your description...">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="file">Upload Resume</label>
                                <input class="form-control" id="file" name="resume" type="file">
                            </div>
                            <div class="login_footer form-group d-flex justify-content-between">
                                <label class="cb-container">
                                    <input type="checkbox"><span
                                        class="text-small">Agree our terms and policy</span><span
                                        class="checkmark"></span>
                                </label><a class="text-muted" href="page-contact.html">Lean more</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job
                                </button>
                            </div>
                            <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact
                                    Us</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-employer.footer></x-employer.footer>
    </div>

@endsection
