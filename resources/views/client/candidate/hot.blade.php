@extends('client.layouts.master')
@section('title', 'Ứng viên nổi bật')
@section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-company">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp">Các ứng viên nổi bật</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Hãy tìm các ứng viên ở đây, <br class="d-none d-xl-block">nơi mà các
                            nhà
                            tuyển dụng tuyển tìm kiếm
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container">
                <div class="content-page">
                    <div class="box-filters-job">
                        <div class="row">
                            <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Hiển thị <strong>41-60
                                    </strong>của <strong>944 </strong>công việc</span></div>
                            <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                <div class="display-flex2">
                                    <div class="box-border mr-10"><span class="text-sortby">Hiển thị:</span>
                                        <div class="dropdown dropdown-sort">
                                            <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static"><span>12</span><i
                                                    class="fi-rr-angle-small-down"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-light"
                                                aria-labelledby="dropdownSort">
                                                <li><a class="dropdown-item active" href="#">10</a></li>
                                                <li><a class="dropdown-item" href="#">12</a></li>
                                                <li><a class="dropdown-item" href="#">20</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-border"><span class="text-sortby">Lọc bởi:</span>
                                        <div class="dropdown dropdown-sort">
                                            <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static"><span>Ứng viên mới</span><i
                                                    class="fi-rr-angle-small-down"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-light"
                                                aria-labelledby="dropdownSort2">
                                                <li><a class="dropdown-item active" href="#">Ứng viên mới</a></li>
                                                <li><a class="dropdown-item" href="#">Ứng viên cũ</a></li>
                                                <li><a class="dropdown-item" href="#">Đánh giá</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-view-type"><a class='view-type' href='jobs-list.html'><img
                                                src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}"
                                                alt="jobBox"></a><a class='view-type' href='jobs-grid.html'><img
                                                src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}"
                                                alt="jobBox"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left">
                                    <div class="card-grid-2-image-rd online"><a href='candidate-details.html'>
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
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin tức</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Nhận tin tức, cập
                        nhật và mẹo mới nhất</p>
                </div>
            </div>
            <div class="container">
                <div class="mt-50">
                    <div class="box-swiper style-nav-top">
                        <div class="swiper-container swiper-group-3 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/homepage1/img-news1.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>News</a>
                                            </div>
                                            <h5><a href='blog-details.html'>21 mẹo phỏng vấn xin việc: Cách tạo ấn
                                                    tượng tốt</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc
                                                sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                các sản phẩm chăm sóc sức khỏe chất lượng cao với
                                                bao bì bền vững, mang tính biểu tượng.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user1.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh
                                                                    Toàn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 7</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">8 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/homepage1/img-news2.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>Sự
                                                    kiến</a></div>
                                            <h5><a href='blog-details.html'>39 điểm mạnh và điểm yếu để thảo luận một
                                                    cách
                                                    Phỏng vấn xin việc</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                sản phẩm chăm sóc sức khỏe chất lượng cao trong bao bì mang tính biểu
                                                tượng,
                                                bền vững.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user2.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh
                                                                    Toàn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 6</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">6 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/homepage1/img-news3.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>News</a>
                                            </div>
                                            <h5><a href='blog-details.html'>Câu hỏi phỏng vấn: Tại sao bạn không có
                                                    Bằng cấp?</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Tìm hiểu cách phản ứng nếu
                                                người phỏng vấn hỏi bạn tại sao bạn không có bằng cấp và đọc các câu trả
                                                lời
                                                ví dụ
                                                điều đó có thể giúp bạn chế tạo</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user3.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Khoa
                                                                    Nguyễn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 2</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">9 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="text-center"><a class='btn btn-brand-1 btn-icon-load mt--30 hover-up'
                                                href='blog-grid.html'>Tải thêm bài viết</a></div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png') }}" alt="joxBox">
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">Những điều mới sẽ luôn luôn<br> Cập nhật thường
                                xuyên</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading icon-send-letter">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-right.png') }}" alt="joxBox">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
