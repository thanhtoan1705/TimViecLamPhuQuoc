@extends('employer.layouts.master')
@section('title', 'Gợi ý ứng viên')
@section('content')

    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Tài khoản của tôi</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href='index.html'>Quản trị</a></li>
                        <li><span>Tài khoản của tôi</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <h6 class="color-text-paragraph-2">Cập nhật hồ sơ</h6>
                                <div class="box-profile-image">
                                    <div class="img-profile"><img
                                            src="{{ asset('assets/employer/imgs/page/profile/img-profile.png')}}"
                                            alt="jobBox"></div>
                                    <div class="info-profile"><a class="btn btn-default">Cập nhật ảnh đại diện</a><a
                                            class="btn btn-link">Xóa</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Họ và tên *</label>
                                            <input class="form-control" type="text" placeholder="Steven Job">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control" type="text" placeholder="stevenjob@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Số điện thoại</label>
                                            <input class="form-control" type="text" placeholder="01 - 234 567 89">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Website Công ty</label>
                                            <input class="form-control" type="text"
                                                   placeholder="https://alithemes.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Giới thiệu công ty</label>
                                            <textarea class="form-control" name="message" rows="5">We are AliThemes , a creative and dedicated group of individuals who love web development almost as much as we love our customers. We are passionate team with the mission for achieving the perfection in web design.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Kinh nghiệm</label>
                                            <input class="form-control" type="text" placeholder="1 - 5 năm">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Trình độ học vấn</label>
                                            <input class="form-control" type="text" placeholder="Đại Học">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Ngôn ngữ</label>
                                            <input class="form-control" type="text" placeholder="English, Tiếng Việt">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Thể loại </label>
                                            <input class="form-control" type="text" placeholder="UI/UX designer">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-10">
                                            <button class="btn btn-default btn-brand icon-tick">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <h6 class="color-text-paragraph-2">Thông tin liên hệ</h6>
                                <div class="row mt-30">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Quốc gia</label>
                                            <input class="form-control" type="text" placeholder="Việt Nam">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">City</label>
                                            <input class="form-control" type="text" placeholder="ABC">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Địa chỉ đầy dủ</label>
                                            <input class="form-control" type="text"
                                                   placeholder="123 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Tìm trên bản đồ</label>
                                            <input class="form-control" type="text"
                                                   placeholder="123 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Kinh Độ</label>
                                            <input class="form-control" type="text" placeholder="41.881832">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Vĩ Độ</label>
                                            <input class="form-control" type="text" placeholder=" -87.623177">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Google Map</label>
                                            <div class="box-map">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4187.813553619058!2d105.75832080014202!3d9.982605485322898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1723623702299!5m2!1svi!2s"
                                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-0">
                                            <button class="btn btn-default btn-brand icon-tick">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Mạng xã hội</h5><a class="menudrop" id="dropdownMenu3" type="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false"
                                                       data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                    aria-labelledby="dropdownMenu3">
                                    <li><a class="dropdown-item active" href="#">Thêm mới</a></li>
                                    <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                                    <li><a class="dropdown-item" href="#">Hành động</a></li>
                                </ul>
                            </div>
                            <div class="panel-body pt-20">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Facebook</label>
                                            <input class="form-control" type="text"
                                                   placeholder="https://www.facebook.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Twitter</label>
                                            <input class="form-control" type="text" placeholder="https://twitter.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Instagram</label>
                                            <input class="form-control" type="text"
                                                   placeholder="https://www.instagram.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-0">
                                            <button class="btn btn-default btn-brand icon-tick">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Kỹ Năng</h5><a class="menudrop" id="dropdownMenu3" type="button"
                                                   data-bs-toggle="dropdown" aria-expanded="false"
                                                   data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                    aria-labelledby="dropdownMenu3">
                                    <li><a class="dropdown-item active" href="#">Thêm Mới</a></li>
                                    <li><a class="dropdown-item" href="#">Cài Đặt</a></li>
                                    <li><a class="dropdown-item" href="#">Hành động</a></li>
                                </ul>
                            </div>
                            <div class="panel-body pt-20">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <input class="form-control icon-search-right" type="text"
                                                   placeholder="E.g. Angular, Laravel...">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-20"><a class="btn btn-tag tags-link">Figma<span></span></a><a
                                                class="btn btn-tag tags-link">Adobe XD<span></span></a><a
                                                class="btn btn-tag tags-link">NextJS<span></span></a><a
                                                class="btn btn-tag tags-link">React<span></span></a><a
                                                class="btn btn-tag tags-link">App<span></span></a><a
                                                class="btn btn-tag tags-link">Digital<span></span></a><a
                                                class="btn btn-tag tags-link">NodeJS<span></span></a></div>
                                        <div class="mt-30 mb-40"><span class="info-icon font-sm color-text-paragraph-2">You can add up to 15 skills</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-0">
                                            <button class="btn btn-default btn-brand icon-tick">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-employer.footer></x-employer.footer>
    </div>

@endsection
