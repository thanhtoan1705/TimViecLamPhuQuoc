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
                                        class="font-md color-text-paragraph-2" href="#">Đổi mật khẩu</a>
                                    <form action="{{ route('client.candidate.update_password') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row form-contact mt-3">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="font-sm mb-10 fw-bold">Mật khẩu cũ <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="old_password" type="password" >
                                                    <div class="text-danger col-sm-9 pro-top7">
                                                        @error('old_password')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-sm mb-10 fw-bold">Mật khẩu mới <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="new_password" type="password">
                                                    <div class="text-danger col-sm-9 pro-top7">
                                                        @error('new_password')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-sm mb-10 fw-bold">Nhập lại mật khẩu mới <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="new_password_confirmation" type="password">
                                                    <div class="text-danger col-sm-9 pro-top7">
                                                        @error('new_password_confirmation')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="box-button mt-15">
                                                    <button class="btn btn-apply-big font-md font-bold">
                                                        Cập nhật
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
