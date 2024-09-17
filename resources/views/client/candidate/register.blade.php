@extends('client.layouts.master')
@section('title', 'Đăng Ký')
@section('content')
    <main class="main">
        <section class="pt-100 login-register">
            <div class="container">
                <div class="row login-register-cover">
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="text-center">
                            <h2 class="mt-10 mb-5 text-brand-1">Đăng ký ứng viên </h2>
                            <h5 class="mt-10 mb-5 text-brand-1">Bắt đầu miễn phí hôm nay</h5>
                            <p class="font-sm text-muted mb-30">Truy cập tất cả tính năng. Không cần thẻ tín dụng</p>
                            <button class="btn social-login hover-up mb-20"><img
                                    src="{{asset('assets/client/imgs/template/icons/icon-google.svg')}}"
                                    alt="jobbox"><strong>Đăng nhập với
                                    Google</strong></button>
                            <a href="{{ route('client.login.facebook') }}" class="btn social-login hover-up mb-20">
                                <img src="{{asset('assets/client/imgs/template/icons/facebook.svg')}}" alt="jobbox">
                                <strong>Đăng nhập Facebook</strong>
                            </a>
                            <div class="divider-text-center"><span>hoặc tiếp tục với</span></div>
                        </div>
                        <form class="login-register text-start mt-20" method="post" action="{{ route('client.candidate.register.post') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="input-1">Họ và tên *</label>
                                <input class="form-control" value="{{ old('name') }}" id="input-1" type="text"  name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-2">Email *</label>
                                <input class="form-control" value="{{ old('email') }}" id="input-2" type="email"  name="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-4">Mật khẩu *</label>
                                <input class="form-control" value="{{ old('passwords') }}" id="input-4" type="password"  name="passwords">
                                @error('passwords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-5">Nhập lại mật khẩu *</label>
                                <input class="form-control" value="{{ old('confirm-password') }}" id="input-5" type="password"  name="confirm-password">
                                @error('confirm-password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="login_footer form-group d-flex justify-content-between">
                                <label class="cb-container">
                                    <input type="checkbox" name="term">
                                    <span class="text-small">Đồng ý các điều khoản và chính sách của chúngtôi</span>
                                    <span class="checkmark"></span>
                                    @error('term')
                                    <br><span class="text-danger">{{ $message }}</span>
                                    @enderror

                            </div>
                            <div class="form-group">
                                <button class="btn btn-brand-1 hover-up w-100" type="submit" name="register">Đăng ký
                                </button>
                            </div>
                            <div class="text-muted text-center">Đã có tài khoản?
                                <a href="{{ route('client.candidate.login') }}">
                                    Đăng nhập
                                </a>
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
