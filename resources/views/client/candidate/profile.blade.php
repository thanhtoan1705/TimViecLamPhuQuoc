@extends('client.layouts.master')
@section('title', 'Hồ sơ của tôi')
@section('content')

    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="box-nav-tabs nav-tavs-profile mb-5">
                            <ul class="nav" role="tablist">
                                <li><a class="btn btn-border aboutus-icon mb-20 active" href="#tab-my-profile"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-my-profile"
                                       aria-selected="true">My Profile</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="#tab-my-jobs"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-my-jobs"
                                       aria-selected="false">My Jobs</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs"
                                       aria-selected="false">Saved Jobs</a></li>
                            </ul>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="mt-20 mb-20"><a class="link-red" href="#">Delete Account</a></div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel"
                                     aria-labelledby="tab-my-profile">
                                    <h3 class="mt-0 mb-15 color-brand-1">Tài khoản của tôi</h3><a
                                        class="font-md color-text-paragraph-2" href="#">Cập nhật hồ sơ</a>
                                    <div class="mt-35 mb-40 box-info-profie">
                                        <div class="image-profile"><img
                                                src="{{ asset('assets/client/imgs/page/candidates/candidate-profile.png') }}"
                                                alt="jobbox"></div>
                                        <a class="btn btn-apply">Cập nhật ảnh đại diện</a><a
                                            class="btn btn-link">Xóa</a>
                                    </div>
                                    <div class="row form-contact">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Tên đầy đủ *</label>
                                                <input class="form-control" type="text" value="Steven Job">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Email *</label>
                                                <input class="form-control" type="text" value="stevenjob@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Số điện thoại</label>
                                                <input class="form-control" type="text" value="01 - 234 567 89">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Tiểu sử</label>
                                                <textarea class="form-control" rows="4">We are AliThemes , a creative and dedicated group of individuals who love web development almost as much as we love our customers. We are passionate team with the mission for achieving the perfection in web design.</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Website cá nhân</label>
                                                <input class="form-control" type="url" value="https://alithemes.com/">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Tỉnh / Thành
                                                            phố</label>
                                                        <input class="form-control" type="text" value="United States">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Quận /
                                                            Huyện</label>
                                                        <input class="form-control" type="text" value="New York">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="font-sm color-text-mutted mb-10">Đại chỉ</label>
                                                        <input class="form-control" type="text" value="Mcallen">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-bottom pt-10 pb-10 mb-30"></div>
                                            <div class="box-agree mt-30">
                                                <label class="lbl-agree font-xs color-text-paragraph-2">
                                                    <input class="lbl-checkbox" type="checkbox" value="1">Đồng ý với
                                                    điều khoản
                                                </label>
                                            </div>
                                            <div class="box-button mt-15">
                                                <button class="btn btn-apply-big font-md font-bold">Lưu tất cả thay
                                                    đổi
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="box-skills">
                                                <h5 class="mt-0 color-brand-1">Kỹ năng</h5>
                                                <div class="form-contact">
                                                    <div class="form-group">
                                                        <input class="form-control search-icon" type="text" value=""
                                                               placeholder="E.g. Angular, Laravel...">
                                                    </div>
                                                </div>
                                                <div class="box-tags mt-30"><a
                                                        class="btn btn-grey-small mr-10">Figma<span
                                                            class="close-icon"></span></a><a
                                                        class="btn btn-grey-small mr-10">Adobe XD<span
                                                            class="close-icon"></span></a><a
                                                        class="btn btn-grey-small mr-10">NextJS<span
                                                            class="close-icon"></span></a><a
                                                        class="btn btn-grey-small mr-10">React<span
                                                            class="close-icon"></span></a><a
                                                        class="btn btn-grey-small mr-10">App<span
                                                            class="close-icon"></span></a><a
                                                        class="btn btn-grey-small mr-10">Digital<span
                                                            class="close-icon"></span></a><a
                                                        class="btn btn-grey-small mr-10">NodeJS<span
                                                            class="close-icon"></span></a></div>
                                                <div class="mt-40"><span
                                                        class="card-info font-sm color-text-paragraph-2">Bạn có thể thêm đến 15 kỹ năng</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png') }}" alt="joxBox"></div>
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
                                src="{{ asset('assets/client/imgs/template/newsletter-right.png') }}" alt="joxBox">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
