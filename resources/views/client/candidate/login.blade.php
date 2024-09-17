@extends('client.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <main class="main">
        <section class="pt-100 login-register">
            <div class="container">
                <div class="row login-register-cover">
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="text-center">
                            <p class="font-sm text-brand-2">Chào mừng trở lại! </p>
                            <h2 class="mt-10 mb-5 text-brand-1">Đăng nhập ứng viên</h2>
                            <p class="font-sm text-muted mb-30">Truy cập các tính năng không cần thẻ tính dụng</p>
                            <a href="{{ route('client.login.facebook') }}" class="btn social-login hover-up mb-20">
                                <img src="{{asset('assets/client/imgs/template/icons/facebook.svg')}}" alt="jobbox">
                                <strong>Đăng nhập Facebook</strong>
                            </a>
                            <button class="btn social-login hover-up mb-20">
                                <a href="{{ route('client.auth.google') }}">
                                    <img src="{{ asset('assets/client/imgs/template/icons/icon-google.svg') }}"
                                         alt="Google Login">
                                    <strong>Đăng nhập Google</strong>
                                </a>
                            </button>

                            <div class="divider-text-center"><span>hoặc tiếp tục với</span></div>
                        </div>
                        <form class="login-register text-start mt-20" method="post"
                              action="{{ route('client.candidate.login.post') }}">

                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="input-1">Tài khoản Email *</label>
                                <input class="form-control" id="input-1" type="text" required="" name="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-4">Mật khẩu *</label>
                                <input class="form-control" id="input-4" type="password" required="" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="login_footer form-group d-flex justify-content-between">
                                <label class="cb-container">
                                    <input type="checkbox" name="remember_loginremember_login"><span class="text-small">Ghi nhớ đăng nhập<i></i></span><span
                                        class="checkmark"></span>
                                </label><a class='text-muted' href='page-contact.html'>Quên mật khẩu</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Đăng nhập
                                </button>
                            </div>
                            <div class="text-muted text-center">Chưa có tài khoản?
                                <a href="{{ route('client.candidate.register') }}">
                                    Đăng ký
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="img-1 d-none d-lg-block"><img class="shape-1"
                                                              src="{{ asset('assets/client/imgs/page/login-register/img-4.svg') }}"
                                                              alt="JobBox"></div>
                    <div class="img-2"><img src="{{ asset('assets/client/imgs/page/login-register/img-3.svg')}}"
                                            alt="JobBox"></div>
                </div>
            </div>
        </section>
    </main>
@endsection
