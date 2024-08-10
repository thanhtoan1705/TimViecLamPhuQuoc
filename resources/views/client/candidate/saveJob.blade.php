@extends('client.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/candidates/img.png')}}" alt="jobbox"><a
                        class="btn-editor" href="#"></a></div>
                <div class="box-company-profile">
                    <div class="image-compay"><img
                            src="{{ asset('assets/client/imgs/page/candidates/candidate-profile.png')}}" alt="jobbox">
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">Thanh Tú <span class="card-location font-regular ml-20">Tp Cần Thơ</span>
                            </h5>
                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">Lập Trình Web</p>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a
                                class='btn btn-preview-icon btn-apply btn-apply-big' href='page-contact.html'>Xem
                                trước</a></div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="box-nav-tabs nav-tavs-profile mb-5">
                            <ul class="nav" role="tablist">
                                <li><a class="btn btn-border aboutus-icon mb-20 active" href="#tab-my-profile" data-bs-toggle="tab" role="tab" aria-controls="tab-my-profile" aria-selected="true">Thông tin của tôi</a></li>
                                <li><a class="btn btn-border mb-20" href="#tab-my-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-my-jobs" aria-selected="false"><i class="bi bi-bank" style="margin-right: 10px; font-size: 15px"></i>Nhà tuyển dụng đã xem hồ sơ</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Việc làm đã lưu</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Quản lý cv</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Đổi mật khẩu</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Thông báo</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Đăng xuất</a></li>
                            </ul>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="mt-20 mb-20"><a class="link-red" href="#">Delete Account</a></div>
                        </div>
                    </div> -->
                    <!-- tabcontent -->
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">

                            <div class="row">
                                <h2 style="margin-bottom: 50px">Việc làm đã lưu</h2>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png')}}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>FPT
                                                    Software Cần Thơ</a><span class="location-small">Cần Thơ</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Nhà thiết kế UI/UX toàn thời gian</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Toàn thời gian</span><span
                                                    class="card-time">4<span>2 giờ trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công
                                                ty cổ phần Phát triển đô thị Nam Hà Nội, Tập đoàn Thép Nguyễn Minh, Địa
                                                ốc Him Lam; Tập đoàn Pan, VietJet…</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Javascript</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">150k</span><span class="text-muted">/giờ</span>
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
        </section>
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png')}}" alt="joxBox"></div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-right.png')}}" alt="joxBox"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
