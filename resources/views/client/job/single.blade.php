@extends('client.layouts.master')
@section('title', 'Chi tiết tin tuyển dụng')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/job-single/thumb.png') }}" alt="jobBox">
                </div>
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h3>Kỹ sư phần mềm, toàn thời gian</h3>
                        <div class="mt-0 mb-15">
                            <span class="card-briefcase">Toàn thời gian</span>
                            <span class="card-time">3 giờ trước</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end">
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal"
                             data-bs-target="#ModalApplyJobForm">Ứng tuyển ngay
                        </div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="job-overview">
                            <h5 class="border-bottom pb-15 mb-30">Thông tin việc làm</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/industry.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description industry-icon mb-10">Ngành nghề</span><strong
                                            class="small-heading">
                                            Cơ khí / Tự động hóa / Ô tô, Dân dụng / Xây dựng</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/job-level.svg') }}"
                                            alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description joblevel-icon mb-10">Cấp độ
                                        </span><strong class="small-heading">Có kinh nghiệm</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/salary.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description salary-icon mb-10">Lương</span><strong
                                            class="small-heading">$800 -
                                            $1000</strong></div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/experience.svg') }}"
                                            alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description experience-icon mb-10">Kinh nghiệm</span><strong
                                            class="small-heading">1 -
                                            2 năm</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/job-type.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description jobtype-icon mb-10">
                                            Loại công việc
                                        </span><strong class="small-heading">Full time</strong>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/deadline.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description mb-10">Thời hạn ứng tuyển</span><strong
                                            class="small-heading">10/08/2024</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/updated.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description jobtype-icon mb-10">Đã cập nhật</span><strong
                                            class="small-heading">10/07/2024</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('assets/client/imgs/page/job-single/location.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description mb-10">Địa chỉ</span><strong
                                            class="small-heading">Cần Thơ</strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single">
                            <h4>Chào mừng đến với Cao đẳng FPT</h4>
                            <p>
                                Nhóm Thiết kế AliStudio có tầm nhìn thiết lập một nền tảng đáng tin cậy cho phép các
                                doanh nghiệp hoạt
                                động hiệu quả và lành mạnh trong một thế giới mọi thứ kỹ thuật số và từ xa, mô hình và
                                quy chuẩn công
                                việc thay đổi liên tục cũng như nhu cầu về khả năng phục hồi của tổ chức.
                            </p>

                            <h4>Kiến thức, kỹ năng và kinh nghiệm cần thiết</h4>
                            <ul>
                                <li>Một danh mục đầu tư thể hiện hành trình của khách hàng được cân nhắc kỹ lưỡng và
                                    hoàn hảo.
                                </li>
                                <li>Hơn 5 năm kinh nghiệm trong ngành thiết kế tương tác và/hoặc thiết kế trực quan.
                                </li>
                                <li>Kỹ năng giao tiếp tuyệt vời.</li>
                                <li>Nhận thức được các xu hướng về di động, truyền thông và cộng tác.</li>
                                <li>Khả năng tạo ra các nguyên mẫu thiết kế, mô phỏng và các tài liệu giao tiếp khác có
                                    độ hoàn thiện cao.
                                </li>
                                <li>Khả năng định phạm vi và ước lượng công việc một cách chính xác và ưu tiên các nhiệm
                                    vụ và mục tiêu một cách độc lập.
                                </li>
                                <li>Lịch sử ảnh hưởng đến việc phát hành sản phẩm thông qua công việc của bạn.</li>
                                <li>Bằng Cử nhân về Thiết kế (hoặc lĩnh vực liên quan) hoặc kinh nghiệm chuyên môn tương
                                    đương.
                                </li>
                                <li>Thành thạo trong nhiều công cụ thiết kế như Figma, Photoshop, Illustrator và
                                    Sketch.
                                </li>
                            </ul>
                            <h4>Kinh nghiệm Ưu tiên</h4>
                            <ul>
                                <li>Thiết kế trải nghiệm người dùng cho phần mềm / dịch vụ doanh nghiệp.</li>
                                <li>Tạo và áp dụng các nguyên tắc thiết kế và mẫu tương tác đã được thiết lập.</li>
                                <li>Đồng bộ hoặc ảnh hưởng đến tư duy thiết kế với các nhóm làm việc ở các địa điểm khác
                                    nhau.
                                </li>
                            </ul>
                            <h4>Nhà Thiết kế Sản phẩm</h4>
                            <p><strong>Kiến thức về sản phẩm:</strong> Hiểu sâu về công nghệ và tính năng của lĩnh vực
                                sản phẩm mà bạn được chỉ định.</p>
                            <p><strong>Nghiên cứu:</strong> Cung cấp những ảnh hưởng và thông tin chi tiết về con người
                                và kinh doanh cho sản phẩm.</p>
                            <p><strong>Thành phẩm:</strong> Tạo ra các thành phẩm cho lĩnh vực sản phẩm của bạn (ví dụ
                                như phân tích đối thủ cạnh tranh, luồng người dùng, bản vẽ phác thảo mức độ thấp, bản vẽ
                                hoàn thiện mức độ cao, nguyên mẫu, v.v.) giải quyết các vấn đề thực sự của người dùng
                                thông qua trải nghiệm người dùng.</p>
                            <p><strong>Giao tiếp:</strong> Truyền đạt kết quả của các hoạt động UX trong lĩnh vực sản
                                phẩm của bạn cho đội ngũ thiết kế, các đối tác liên chức năng trong lĩnh vực sản phẩm
                                của bạn, và các thành viên khác trong đội ngũ Superformula bằng ngôn ngữ rõ ràng, đơn
                                giản hóa sự phức tạp.</p>
                        </div>
                        <div class="author-single"><span>FPT POLYTECHNIC</span></div>
                        <div class="single-apply-jobs">
                            <div class="row align-items-center">
                                <div class="col-md-5"><a class="btn btn-default mr-15" href="#">Ứng tuyển</a><a
                                        class="btn btn-border" href="#">Lưu công việc</a></div>
                                <div class="col-md-7 text-lg-end social-share">
                                    <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Chia sẻ </h6><a
                                        class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-fb.svg') }}"></a><a
                                        class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-tw.svg') }}"></a><a
                                        class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                           src="{{ asset('assets/client/imgs/template/icons/share-red.svg') }}"></a><a
                                        class="d-inline-block d-middle" href="#"><img alt="jobBox"
                                                                                      src="{{ asset('assets/client/imgs/template/icons/share-whatsapp.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure><img alt="jobBox"
                                                 src="{{ asset('assets/client/imgs/page/job-single/avatar.png') }}">
                                    </figure>
                                    <div class="sidebar-info"><span class="sidebar-company">AliThemes</span><span
                                            class="card-location">Cần Thơ</span><a class="link-underline mt-15"
                                                                                   href="#">02 việc làm đang mở</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.3150609575905!2d-87.6235655!3d41.886080899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2ca8b34afe61%3A0x6caeb5f721ca846!2s205%20N%20Michigan%20Ave%20Suit%20810%2C%20Chicago%2C%20IL%2060601%2C%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1658551322537!5m2!1svi!2s"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <ul class="ul-disc">
                                    <li>Cái Răng Cần Thơ</li>
                                    <li>Điện thoại: 0336216544</li>
                                    <li>Email: contact@fpoly.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Công việc tương tự</h6>
                            <div class="sidebar-list-job">
                                <ul>
                                    @for($i=0; $i < 8; $i++)
                                        <li>
                                            <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                                <div class="image"><a href=''><img
                                                            src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                            alt="jobBox"></a></div>
                                                <div class="info-text">
                                                    <h5 class="font-md font-bold color-brand-1"><a href=''>UI /
                                                            UX Designer
                                                            fulltime</a></h5>
                                                    <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>3 </span><span> giờ trước</span></span>
                                                    </div>
                                                    <div class="mt-5">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h6 class="card-price">$250<span>/Giờ</span></h6>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <span class="card-briefcase">Cần Thơ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endfor

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-left">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Việc làm nổi bật</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                        Nhận tin tức, cập nhật và mẹo mới nhất
                    </p>
                </div>
                <div class="mt-50">
                    <div class="box-swiper style-nav-top">
                        <div class="swiper-container swiper-group-4 swiper">
                            <div class="swiper-wrapper pb-10 pt-5">
                                @for($i=0; $i < 5; $i++)
                                    <div class="swiper-slide">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left"><span class="flash"></span>
                                                <div class="image-box"><img
                                                        src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                        alt="jobBox">
                                                </div>
                                                <div class="right-info"><a class='name-job' href='company-details.html'>Quora
                                                        JSC</a><span class="location-small">Cần Thơ</span></div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                                <div class="mt-5"><span class="card-briefcase">Part time</span>
                                                    <span class="card-time">
                                                    5<span> giờ trước</span>
                                                </span>
                                                </div>
                                                <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit
                                                    amet,
                                                    consectetur adipisicing
                                                    elit. Recusandae architecto eveniet, dolor quo repellendus
                                                    pariatur.</p>
                                                <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                      href='job-details.html'>PHP</a><a
                                                        class='btn btn-grey-small mr-5'
                                                        href='job-details.html'>Android </a>
                                                </div>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7"><span
                                                                class="card-text-price">$800</span><span
                                                                class="text-muted">/Giờ</span></div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                 data-bs-target="#ModalApplyJobForm">
                                                                ỨNG TUYỂN
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                        <div class="swiper-button-next swiper-button-next-4"></div>
                        <div class="swiper-button-prev swiper-button-prev-4"></div>
                    </div>
                    <div class="text-center"><a class="btn btn-grey" href="#">Xem thêm</a></div>
                </div>
            </div>
        </section>

        <!-- Component newsletter -->
        <x-client.newsletter/>
        <!-- End component newsletter -->

    </main>
@endsection

