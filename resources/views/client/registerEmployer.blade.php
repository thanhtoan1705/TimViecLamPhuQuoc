@extends('client.layouts.master')
@section('title', 'Đăng Ký')
@section('content')
    <main class="main">
        <section class="pt-100 login-register">
            <div class="container">
                <div class="row login-register-cover">
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="text-center">
                            <h2 class="mt-10 mb-5 text-brand-1">Đăng ký nhà tuyển dụng </h2>
                            <h5 class="mt-10 mb-5 text-brand-1">Bắt đầu miễn phí hôm nay</h5>
                            <p class="font-sm text-muted mb-30">Truy cập tất cả tính năng. Không cần thẻ tín dụng</p>
                            <button class="btn social-login hover-up mb-20"><img
                                    src="{{asset('assets/client/imgs/template/icons/icon-google.svg')}}"
                                    alt="jobbox"><strong>Đăng nhập với
                                    Google</strong></button>
                            <div class="divider-text-center"><span>hoặc tiếp tục với</span></div>
                        </div>
                        <form class="login-register text-start mt-20" action="#">
                            <div class="form-group">
                                <label class="form-label" for="input-1">Họ và tên *</label>
                                <input class="form-control" id="input-1" type="text" required="" name="fullname">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-2">Email *</label>
                                <input class="form-control" id="input-2" type="email" required="" name="emailaddress">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-3">Tên công ty *</label>
                                <input class="form-control" id="input-3" type="text" required="" name="companyName">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-4">Mật khẩu *</label>
                                <input class="form-control" id="input-4" type="password" required="" name="password">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-5">Nhập lại mật khẩu *</label>
                                <input class="form-control" id="input-5" type="password" required="" name="re-password">
                            </div>
                            <div class="login_footer form-group d-flex justify-content-between">
                                <label class="cb-container">
                                    <input type="checkbox"><span class="text-small">Đồng ý các điều khoản và chính sách của chúng
                  tôi</span><span class="checkmark"></span>

                            </div>
                            <div class="form-group">
                                <button class="btn btn-brand-1 hover-up w-100" type="submit" name="register">Đăng ký
                                </button>
                            </div>
                            <div class="text-muted text-center">Đã có tài khoản <a href="{{ route('loginEmployer')}}">Đăng
                                    nhập</a>
                            </div>
                        </form>
                    </div>
                    <div class="img-1 d-none d-lg-block"><img class="shape-1"
                                                              src="{{asset('assets/client/imgs/page/login-register/img-1.svg')}}"
                                                              alt=" JobBox"></div>
                    <div class="img-2"><img src="{{asset('assets/client/imgs/page/login-register/img-2.svg')}}"
                                            alt="JobBox">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
