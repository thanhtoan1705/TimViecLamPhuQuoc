@extends('client.layouts.master')
@section('title', 'Chi tiết nhà tuyển dụng')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/company/img.png') }}" alt="jobBox"></div>
                <div class="box-company-profile">
                    <div class="image-compay"><img src="{{ asset('assets/client/imgs/page/company/company.png') }}"
                                                   alt="jobBox"></div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">FPOLY <span
                                    class="card-location font-regular ml-20">Cái răng, Cần Thơ</span>
                            </h5>
                            <p class="mt-5 font-md color-text-paragraph-2 mb-15">Sứ mệnh của chúng tôi là làm cho cuộc
                                sống làm việc trở nên đơn giản</p>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a class='btn btn-call-icon btn-apply btn-apply-big'
                                                                       href='page-contact.html'>Liên hệ</a></div>
                    </div>
                </div>
                <div class="box-nav-tabs mt-40 mb-5">
                    <ul class="nav" role="tablist">
                        <li><a class="btn btn-border aboutus-icon mr-15 mb-5 active" href="#tab-about"
                               data-bs-toggle="tab"
                               role="tab" aria-controls="tab-about" aria-selected="true">Về chúng tôi</a></li>
                        <li><a class="btn btn-border recruitment-icon mr-15 mb-5" href="#tab-recruitments"
                               data-bs-toggle="tab" role="tab" aria-controls="tab-recruitments"
                               aria-selected="false">Tuyển dụng</a></li>
                        <li><a class="btn btn-border people-icon mb-5" href="#tab-people" data-bs-toggle="tab"
                               role="tab"
                               aria-controls="tab-people" aria-selected="false">Mọi người</a></li>
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
                                <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                     aria-labelledby="tab-about">
                                    <h4>Chào mừng đến với nhóm AliStudio</h4>
                                    <p>Nhóm Thiết kế AliStudio có tầm nhìn thiết lập một nền tảng đáng tin cậy cho phép
                                        các doanh nghiệp hoạt động
                                        hiệu quả và lành mạnh trong một thế giới mọi thứ kỹ thuật số và từ xa, mô hình
                                        và quy chuẩn công việc thay
                                        đổi liên tục cũng như nhu cầu về khả năng phục hồi của tổ chức.
                                    </p>
                                    <p>
                                        Ứng viên lý tưởng sẽ có kỹ năng sáng tạo mạnh mẽ và danh mục công việc thể hiện
                                        niềm đam mê của họ đối với thiết kế minh họa và kiểu chữ.
                                        Ứng viên này sẽ có kinh nghiệm làm việc với nhiều nền tảng thiết kế khác nhau
                                        như dạng kỹ thuật số và dạng in.
                                    </p>
                                    <h4>Kiến thức, kỹ năng và kinh nghiệm cần thiết</h4>
                                    <ul>
                                        <li>
                                            Một danh mục đầu tư thể hiện hành trình của khách hàng được cân nhắc kỹ
                                            lưỡng và hoàn hảo
                                        </li>
                                        <li>
                                            Hơn 5 năm kinh nghiệm trong ngành thiết kế tương tác và/hoặc thiết kế trực
                                            quan
                                        </li>
                                        <li>Kỹ năng giao tiếp tuyệt vời</li>
                                        <li>Nhận thức được các xu hướng về di động, truyền thông và cộng tác</li>

                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab-recruitments" role="tabpanel"
                                     aria-labelledby="tab-recruitments">
                                    <h4>Tuyển dụng</h4>
                                    <p>
                                        Nhóm Thiết kế AliStudio có tầm nhìn thiết lập một nền tảng đáng tin cậy cho phép
                                        các doanh nghiệp hoạt
                                        động hiệu quả và lành mạnh trong một thế giới mọi thứ kỹ thuật số và từ xa, mô
                                        hình và quy chuẩn công việc
                                        thay đổi liên tục cũng như nhu cầu về khả năng phục hồi của tổ chức.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tab-people" role="tabpanel" aria-labelledby="tab-people">
                                    <h4>Mọi người</h4>
                                    <p>Nhóm Thiết kế AliStudio có tầm nhìn thiết lập một nền tảng đáng tin cậy cho phép
                                        các doanh nghiệp hoạt
                                        động hiệu quả và lành mạnh trong một thế giới mọi thứ kỹ thuật số và từ xa, mô
                                        hình và quy chuẩn công việc
                                        thay đổi liên tục cũng như nhu cầu về khả năng phục hồi của tổ chức.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="box-related-job content-page">
                            <h5 class="mb-30">Việc làm mới nhất</h5>
                            <div class="box-list-jobs display-list">
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
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
                                                    class="card-time"><span>5</span><span> phút trước</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">$800</span><span
                                                            class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
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
                                                    class="card-time"><span>6</span><span> phút trước</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">$250</span><span
                                                            class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
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
                                                    class="card-time"><span>6</span><span> phút trước</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span
                                                            class="card-text-price">$250</span><span
                                                            class="text-muted">/Giờ</span></div>
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
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <div class="sidebar-info pl-0"><span
                                            class="sidebar-company">FPT Software</span><span
                                            class="card-location">Cần Thơ</span></div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.3150609575905!2d-87.6235655!3d41.886080899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2ca8b34afe61%3A0x6caeb5f721ca846!2s205%20N%20Michigan%20Ave%20Suit%20810%2C%20Chicago%2C%20IL%2060601%2C%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1658551322537!5m2!1svi!2s"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Lĩnh vực công ty</span><strong
                                                class="small-heading">Kế toán / Tài chính</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Địa chỉ</span><strong
                                                class="small-heading">Cái Răng, Cần Thơ</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Mức lương</span><strong
                                                class="small-heading">10 - 15 triệu</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Thành viên kể từ</span>
                                            <strong class="small-heading">06/05/2023</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Ngày đăng
                                            </span><strong class="small-heading">4 ngày trước</strong>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>Ninh Kiều, Cần Thơ</li>
                                    <li>Điện thoại: (+84) 336.216.546</li>
                                    <li>Email: contact@fpoly.com</li>
                                </ul>
                                <div class="mt-30"><a class='btn btn-send-message' href='page-contact.html'>Gửi tin</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-border-bg bg-right"><span class="text-grey">Chúng tôi</span><span
                                class="text-hiring">Đang tuyển dụng</span>
                            <p class="font-xxs color-text-paragraph mt-5">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Recusandae architecto</p>
                            <div class="mt-15"><a class='btn btn-paragraph-2' href='page-contact.html'>Xem thêm</a>
                            </div>
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
