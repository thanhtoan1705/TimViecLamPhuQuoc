@extends('client.layouts.master')
@section('title', 'Trang Việc Làm')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-single banner-single-bg">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp"><span
                                class="color-brand-2">22 Công Việc</span> Có Sẵn Ngay Bây Giờ</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Khám phá cơ hội việc làm tuyệt vời và tìm kiếm công việc phù hợp với
                            bạn.<br class="d-none d-xl-block">Ứng tuyển ngay để bắt đầu sự nghiệp của bạn!?
                        </div>
                        <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".2s">
                            <form>
                                <div class="box-industry">
                                    <select class="form-input mr-10 select-active input-industry">
                                        <option value="0">Ngành</option>
                                        <option value="1">Software</option>
                                        <option value="2">Finance</option>
                                        <option value="3">Recruting</option>
                                        <option value="4">Management</option>
                                        <option value="5">Advertising</option>
                                        <option value="6">Development</option>
                                    </select>
                                </div>
                                <select class="form-input mr-10 select-active">
                                    <option value="">Vị Trí</option>
                                    <option value="AG">An Giang</option>
                                    <option value="BV">Bà Rịa - Vũng Tàu</option>
                                    <option value="BK">Bắc Kạn</option>
                                    <option value="BG">Bắc Giang</option>
                                    <option value="BN">Bắc Ninh</option>
                                    <option value="BT">Bến Tre</option>
                                    <option value="BD">Bình Dương</option>
                                    <option value="BP">Bình Phước</option>
                                    <option value="BĐ">Bình Định</option>
                                    <option value="BV">Bình Thuận</option>
                                    <option value="BL">Bạc Liêu</option>
                                    <option value="CM">Cà Mau</option>
                                    <option value="CT">Cần Thơ</option>
                                    <option value="CA">Cao Bằng</option>
                                    <option value="ĐN">Đà Nẵng</option>
                                    <option value="ĐL">Đắk Lắk</option>
                                    <option value="ĐN">Đắk Nông</option>
                                    <option value="ĐB">Điện Biên</option>
                                    <option value="ĐN">Đồng Nai</option>
                                    <option value="ĐT">Đồng Tháp</option>
                                    <option value="GL">Gia Lai</option>
                                    <option value="HG">Hà Giang</option>
                                    <option value="HM">Hà Nam</option>
                                    <option value="HT">Hà Tĩnh</option>
                                    <option value="HD">Hải Dương</option>
                                    <option value="HP">Hải Phòng</option>
                                    <option value="HG">Hậu Giang</option>
                                    <option value="HN">Hà Nội</option>
                                    <option value="HB">Hòa Bình</option>
                                    <option value="HY">Hưng Yên</option>
                                    <option value="KH">Khánh Hòa</option>
                                    <option value="KG">Kiên Giang</option>
                                    <option value="KT">Kon Tum</option>
                                    <option value="LC">Lai Châu</option>
                                    <option value="LD">Lâm Đồng</option>
                                    <option value="LS">Lạng Sơn</option>
                                    <option value="LC">Lào Cai</option>
                                    <option value="LA">Long An</option>
                                    <option value="NB">Nam Định</option>
                                    <option value="NA">Nghệ An</option>
                                    <option value="NB">Ninh Bình</option>
                                    <option value="NT">Ninh Thuận</option>
                                    <option value="PY">Phú Yên</option>
                                    <option value="PT">Phú Thọ</option>
                                    <option value="QB">Quảng Bình</option>
                                    <option value="QN">Quảng Nam</option>
                                    <option value="QN">Quảng Ngãi</option>
                                    <option value="QN">Quảng Ninh</option>
                                    <option value="QT">Quảng Trị</option>
                                    <option value="ST">Sóc Trăng</option>
                                    <option value="SL">Sơn La</option>
                                    <option value="TĐ">Tây Ninh</option>
                                    <option value="TN">Thái Nguyên</option>
                                    <option value="TB">Thái Bình</option>
                                    <option value="TH">Thanh Hóa</option>
                                    <option value="TTH">Thừa Thiên Huế</option>
                                    <option value="TG">Tiền Giang</option>
                                    <option value="TV">Trà Vinh</option>
                                    <option value="TQ">Tuyên Quang</option>
                                    <option value="VL">Vĩnh Long</option>
                                    <option value="VP">Vĩnh Phúc</option>
                                    <option value="YB">Yên Bái</option>
                                    <option value="HCM">Hồ Chí Minh</option>
                                </select>
                                <div class="box-industry">
                                    <select class="form-input mr-10 select-active input-industry">
                                        <option value="0">Mức lương</option>
                                        <option value="1">Software</option>
                                        <option value="2">Finance</option>
                                        <option value="3">Recruting</option>
                                        <option value="4">Management</option>
                                        <option value="5">Advertising</option>
                                        <option value="6">Development</option>
                                    </select>
                                </div>
                                <div class="box-industry">
                                    <select class="form-input mr-10 select-active input-industry">
                                        <option value="0">Kinh nghiệm</option>
                                        <option value="1">Software</option>
                                        <option value="2">Finance</option>
                                        <option value="3">Recruting</option>
                                        <option value="4">Management</option>
                                        <option value="5">Advertising</option>
                                        <option value="6">Development</option>
                                    </select>
                                </div>
                                <input class="form-input input-keysearch mr-10" type="text" placeholder="Từ khóa... ">
                                <button class="btn btn-default btn-find font-sm">Tìm Kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5"><span
                                            class="text-small text-showing">Hiển thị<strong>41-60 </strong> trên <strong>944 </strong>việc làm</span>
                                    </div>
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
                                            <div class="box-border"><span class="text-sortby">Sắp xếp:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static"><span>Bài Mới Nhất</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort2">
                                                        <li><a class="dropdown-item active" href="#">Bài Mới Nhất</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Bài Cũ Nhất</a></li>
                                                        <li><a class="dropdown-item" href="#">Bài Đánh Giá</a></li>
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
                                @for($i=0; $i < 15; $i++)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left"><span class="flash"></span>
                                                <div class="image-box"><img
                                                        src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                        alt="jobBox"></div>
                                                <div class="right-info"><a class='name-job' href='company-details.html'>LinkedIn</a><span
                                                        class="location-small">Phú Quốc</span></div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6><a href='job-details.html'>Thiết kế UI / UX fulltime</a></h6>
                                                <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                        class="card-time">4<span> phút trước</span></span></div>
                                                <p class="font-sm color-text-paragraph mt-15">
                                                    Chúng tôi cần một ProductManger kinh nghiệm, thành thạo APS.net và
                                                    Figma để quản lý và phát triển sản phẩm
                                                </p>
                                                <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                      href='jobs-grid.html'>Adobe XD</a><a
                                                        class='btn btn-grey-small mr-5'
                                                        href='jobs-grid.html'>Figma</a><a
                                                        class='btn btn-grey-small mr-5'
                                                        href='jobs-grid.html'>Photoshop</a>
                                                </div>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7"><span
                                                                class="card-text-price">$500</span><span
                                                                class="text-muted">/Giờ</span></div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                 data-bs-target="#ModalApplyJobForm">Áp dụng
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
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Bộ lọc nâng cao<a class="link-reset" href="#">Làm mới</a></h5>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style select-style-icon">
                                        <select class="form-control form-icons select-active">
                                            <option>Cần Thơ</option>
                                            <option>Hồ Chí Minh</option>
                                            <option>Hà Nội</option>
                                            <option>Phú Quốc</option>
                                        </select><i class="fi-rr-marker"></i>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Ngành</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">All</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">180</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Software</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Finance</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Recruting</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">43</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Management</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Advertising</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-25">Mức Lương</h5>
                                    <div class="list-checkbox pb-20">
                                        <div class="row position-relative mt-10 mb-20">
                                            <div class="col-sm-12 box-slider-range">
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>
                                        <div class="box-number-money">
                                            <div class="row mt-30">
                                                <div class="col-sm-6 col-6"><span
                                                        class="font-sm color-brand-1">$0</span></div>
                                                <div class="col-sm-6 col-6 text-end"><span
                                                        class="font-sm color-brand-1">$500</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-20">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">All</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">145</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">$0k - $20k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">$20k - $40k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">37</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">$40k - $60k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">75</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">$60k - $80k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">98</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">$80k - $100k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">14</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$100k - $200k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">25</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Từ khóa phổ biến</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Software</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Developer</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">45</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Web</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">57</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Chức vụ</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Senior</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Junior</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">35</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Fresher</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Kinh nghiệm làm việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Thực tập</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Entry Level</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">87</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Mức giữa</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Giám đốc</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">45</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Điều Hành</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Kết hợp</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">89</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Tại chỗ/Từ xa</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Tại chỗ</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Từ xa</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Hỗn hợp</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">58</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Việc làm đã đăng</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Tất cả</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">78</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">1 ngày</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">7 ngày</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">30 ngày</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Loại công việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Toàn thời gian</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">25</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span class="text-small">Bán thời gian</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">64</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Công việc từ xa</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">78</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">Làm việc tự do</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">97</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-start">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin tức và Blog</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Nhận tin tức, cập
                        nhật và mẹo mới nhất</p>
                </div>
            </div>
            <div class="container">
                <div class="mt-50">
                    <div class="box-swiper style-nav-top">
                        <div class="swiper-container swiper-group-3 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                @for($i=0; $i < 5; $i++)
                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                            <div class="text-center card-grid-3-image"><a href="#">
                                                    <figure><img alt="jobBox"
                                                                 src="{{ asset('assets/client/imgs/page/homepage1/img-news1.png') }}">
                                                    </figure>
                                                </a></div>
                                            <div class="card-block-info">
                                                <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>Tin
                                                        tức</a></div>
                                                <h5><a href='blog-details.html'>21 Mẹo phỏng vấn xin việc: Làm thế nào
                                                        để tạo ấn tượng tuyệt vời</a></h5>
                                                <p class="mt-10 color-text-paragraph font-sm">
                                                    Sứ mệnh của chúng tôi là tạo ra công ty chăm sóc sức khỏe bền vững
                                                    bằng cách tạo ra các sản phẩm
                                                    chăm sóc sức khỏe chất lượng cao trong bao bì bền vững, mang tính
                                                    biểu tượng.
                                                </p>
                                                <div class="card-2-bottom mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-6">
                                                            <div class="d-flex"><img class="img-rounded"
                                                                                     src="{{ asset('assets/client/imgs/page/homepage1/user1.png') }}"
                                                                                     alt="jobBox">
                                                                <div class="info-right-img"><span
                                                                        class="font-sm font-bold color-brand-1 op-70">Trần Thanh Duy</span><br><span
                                                                        class="font-xs color-text-paragraph-2">06 tháng 9</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 text-end col-6 pt-15"><span
                                                                class="color-text-paragraph-2 font-xs">8  phút trước</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
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
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png') }}" alt="joxBox"></div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">Những điều mới sẽ luôn<br> được cập nhật thường
                                xuyên</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Nhập email của bạn ở đây">
                                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
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
