@extends('client.layouts.master')
@section('title', 'Chi tiết ứng viên')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/candidates/img.png') }}" alt="jobbox">
                </div>
                <div class="box-company-profile">
                    <div class="image-compay"><img
                            src="{{ asset('assets/client/imgs/page/candidates/candidate-profile.png') }}" alt="jobbox">
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">Nguyễn Lê Anh Khoa<span
                                    class="card-location font-regular ml-20">Cần Thơ</span>
                            </h5>
                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">UI/UX Designer. Front end Developer</p>
                            <div class="mt-10 mb-15"><img
                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}" alt="jobbox"><img
                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}" alt="jobbox"><img
                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}" alt="jobbox"><img
                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}" alt="jobbox"><img
                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}" alt="jobbox"><span
                                    class="font-xs color-text-mutted ml-10">(66)</span><img class="ml-30"
                                                                                            src="{{ asset('assets/client/imgs/page/candidates/verified.png') }}"
                                                                                            alt="jobbox"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a
                                class='btn btn-download-icon btn-apply btn-apply-big'
                                href='page-contact.html'>Tải xuống CV</a></div>
                    </div>
                </div>
                <div class="box-nav-tabs mt-40 mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border aboutus-icon mr-15 mb-5 active" href="#tab-short-bio"
                               data-bs-toggle="tab" role="tab" aria-controls="tab-short-bio" aria-selected="true">Short
                                Bio</a></li>
                        <li><a class="btn btn-border recruitment-icon mr-15 mb-5" href="#tab-skills"
                               data-bs-toggle="tab"
                               role="tab" aria-controls="tab-skills" aria-selected="false">Kĩ năng</a></li>
                        <li><a class="btn btn-border people-icon mb-5" href="#tab-work-experience" data-bs-toggle="tab"
                               role="tab" aria-controls="tab-work-experience" aria-selected="false">Working
                                Experience</a>
                        </li>
                    </ul>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                     aria-labelledby="tab-short-bio">
                                    <h4>Giới thiệu</h4>
                                    <p>
                                        Xin chào! Tên tôi là Alan Walker. Tôi là một nhà thiết kế đồ họa,
                                        tôi rất đam mê và tận tâm với công việc của mình.
                                        Với 20 năm kinh nghiệm làm nhà thiết kế đồ họa chuyên nghiệp,
                                        tôi đã có được những kỹ năng và kiến ​​thức cần thiết để giúp dự án của bạn
                                        thành công.
                                    </p>


                                    <p></p>
                                    <h4>Kinh nghiệm làm việc</h4>
                                    <ul>
                                        <li>
                                            Một danh mục đầu tư thể hiện hành trình của khách hàng được cân nhắc kỹ
                                            lưỡng và hoàn hảo
                                        </li>
                                        <li>
                                            Hơn 5 năm kinh nghiệm trong ngành thiết kế tương tác và/hoặc thiết kế trực
                                            quan
                                        </li>
                                        <li>
                                            Khả năng tạo các nguyên mẫu, mô hình thiết kế có độ bóng cao và các tạo phẩm
                                            giao tiếp khác
                                        </li>

                                    </ul>
                                    <h4>Giáo dục</h4>
                                    <ul>
                                        <li>Cao đẳng FPT</li>

                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab-skills" role="tabpanel" aria-labelledby="tab-skills">
                                    <h4>Skills</h4>
                                    <p></p>Xin chào! Tên tôi là Alan Walker. Tôi là một nhà thiết kế đồ họa, tôi rất đam
                                    mê và tận tâm với công việc của mình. Với 20 năm kinh nghiệm làm nhà thiết kế đồ họa
                                    chuyên nghiệp, tôi đã có được những kỹ năng và kiến thức cần thiết để giúp dự án của
                                    bạn thành công.

                                </div>
                                <div class="tab-pane fade" id="tab-work-experience" role="tabpanel"
                                     aria-labelledby="tab-work-experience">
                                    <h4>Kinh nghiệm làm việc</h4>

                                </div>
                            </div>
                        </div>
                        <div class="box-related-job content-page">
                            <h3 class="mb-30">Lịch sử công việc</h3>
                            <div class="box-list-jobs display-list">
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                            class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img
                                                            src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                            alt="jobBox"></div>
                                                    <div class="right-info"><a class="name-job" href="#">Quora
                                                            JSC</a><span
                                                            class="location-small">Cần Thơ</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                                                  href="#">Adobe XD</a><a
                                                        class="btn btn-grey-small mr-5"
                                                        href="#">Figma</a></div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href='job-details.html'>Senior System Engineer</a></h4>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time"><span>5</span><span> ngày trước</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">Trạng thái:<span
                                                                class="text-success"> Thành công</span></span></div>
                                                    <div class="col-lg-5 col-5 text-end"><a class='btn btn-apply-now'
                                                                                            href='job-details.html'>Xem
                                                            chi tiết</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                            class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img
                                                            src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                            alt="jobBox"></div>
                                                    <div class="right-info"><a class="name-job"
                                                                               href="#">Nintendo</a><span
                                                            class="location-small">Cần Thơ</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                                                  href="#">Adobe XD</a><a
                                                        class="btn btn-grey-small mr-5"
                                                        href="#">Figma</a></div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href='job-details.html'>Products Manager</a></h4>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time"><span>6</span><span> ngày trước</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">Trạng thái:<span
                                                                class="text-success"> Thành công</span></span></div>
                                                    <div class="col-lg-5 col-5 text-end"><a class='btn btn-apply-now'
                                                                                            href='job-details.html'>Xem
                                                            chi tiết</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                            class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img
                                                            src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                            alt="jobBox"></div>
                                                    <div class="right-info"><a class="name-job"
                                                                               href="#">Periscope</a><span
                                                            class="location-small">Cần Thơ</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                                                  href="#">Adobe XD</a><a
                                                        class="btn btn-grey-small mr-5"
                                                        href="#">Figma</a></div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href='job-details.html'>Lead Quality Control QA</a></h4>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time"><span>6</span><span> ngày trước</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">Trạng thái:<span
                                                                class="text-success"> Thành công</span></span></div>
                                                    <div class="col-lg-5 col-5 text-end"><a class='btn btn-apply-now'
                                                                                            href='job-details.html'>Xem
                                                            chi tiết</a></div>
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
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <h5 class="f-18">Tổng quan</h5>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Kinh nghiệm</span><strong
                                                class="small-heading">
                                                2 năm
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">
                                                Mức lương mong đợi
                                            </span>
                                            <strong class="small-heading">$1k - $3k</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Ngôn ngữ</span><strong
                                                class="small-heading">Anh, Nhật</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Trình độ học vấn</span>
                                            <strong class="small-heading">Đại học</strong></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>Cần Thơ</li>
                                    <li>Phone: 0336216546</li>
                                    <li>Email: nguyenleanhkhoa.dev@gmail.com</li>
                                </ul>
                                <div class="mt-30"><a class='btn btn-send-message' href='page-contact.html'>Gửi tin</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-border-bg bg-right"><span class="text-grey">Chúng tôi</span><span
                                class="text-hiring">đang tuyển dụng</span>
                            <p class="font-xxs color-text-paragraph mt-5"></p>
                            <div class="mt-15"><a class="btn btn-paragraph-2" href="#">Chi tiết</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Component newsletter -->
        <x-client.newsletter/>
        <!-- End component newsletter -->
    </main>
@endsection
