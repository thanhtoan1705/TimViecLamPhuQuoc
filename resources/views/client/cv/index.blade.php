@extends('client.layouts.master')
@section('title', 'Quản lý CV')

@section('content')
    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
                    <div class="col-lg-9">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title ms-5">CV đã tạo trên Jobbox</h5>
                                    <button class="btn btn-success rounded-pill"><i class="bi bi-plus"></i> Tạo mới
                                    </button>
                                </div>
                                <div class="text-center mt-4">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MTN2bQzCBeBpWdpYUrMHeuQsx3NA7kyMTw&s"
                                        alt="CV Icon" class="img-fluid" style="width: 100px;">
                                    <p class="mt-3">Bạn chưa tạo CV nào</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title ms-5">CV đã tải lên Jobbox</h5>
                                    <button class="btn btn-success rounded-pill"><i class="bi bi-upload"></i> Tạo
                                        mới
                                    </button>
                                </div>
                                <div class="text-center mt-4">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MTN2bQzCBeBpWdpYUrMHeuQsx3NA7kyMTw&s"
                                        alt="CV Icon" class="img-fluid" style="width: 100px;">
                                    <p class="mt-3">Bạn chưa tải lên CV nào</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title ms-5">Jobbox Profile</h5>
                                    <button class="btn btn-success rounded-pill"><i class="bi bi-plus"></i> Tạo mới
                                    </button>
                                </div>
                                <div class="text-center mt-4">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MTN2bQzCBeBpWdpYUrMHeuQsx3NA7kyMTw&s"
                                        alt="CV Icon" class="img-fluid" style="width: 100px;">
                                    <p class="mt-3">Bạn chưa tạo Jobbox Profile</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="mt-2 mb-15 color-brand-1">Việc làm phù hợp với bạn</h3>
                            <p class="mb-3 font-md">Để nhận được gợi ý việc làm chính xác hơn, hãy <a
                                    class="font-md color-text-paragraph-2" href="#"> tùy chỉnh cài đặt gợi ý việc
                                    làm.</a></p>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-6.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job' href='company-details.html'>Quora
                                                JSC</a><span class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                class="card-time">5<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='job-details.html'>PHP</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='job-details.html'>Android</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-7.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Nintendo</a><span
                                                class="location-small">An
                                                Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Products Manager</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5' href='job-details.html'>ASP
                                                .Net</a><a class='btn btn-grey-small mr-5'
                                                           href='job-details.html'>Figma</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-4.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Dailymotion</a><span
                                                class="location-small">An
                                                Thới,
                                                Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Typescript</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>Java</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-5.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Linkedin</a><span
                                                class="location-small">An
                                                Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                class="card-time">4<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, </p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Angular</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-8.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Periscope</a><span
                                                class="location-small">An
                                                Thới, Phú
                                                Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='job-details.html'>iOS</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='job-details.html'>Laravel</a><a class='btn btn-grey-small mr-5'
                                                                                      href='job-details.html'>Golang</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-1.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>LinkedIn</a><span
                                                class="location-small">An
                                                Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                class="card-time">4<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, </p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Adobe
                                                XD</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Figma</a><a
                                                class='btn btn-grey-small mr-5' href='jobs-grid.html'>Photoshop</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-2.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job' href='company-details.html'>Adobe
                                                Ilustrator</a><span class="location-small">An Thới, Phú Quốc</span>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                class="card-time">5<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>React</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>NodeJS</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                                src="{{ asset('assets/client/imgs/brands/brand-3.png') }}" alt="jobBox">
                                        </div>
                                        <div class="right-info"><a class='name-job' href='company-details.html'>Bing
                                                Search</a><span class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Python</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                href='jobs-grid.html'>Photoshop</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                        VNĐ</span><span class="text-muted">/Giờ</span></div>
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
        </section>

    </main>
@endsection
