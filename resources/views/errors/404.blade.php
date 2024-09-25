@extends('client.layouts.master')
@section('title', 'Notfound')
@section('content')
    <main class="main">
        <section class="pt-50 login-register">
            <div class="container">
                <div class="row login-register-cover pb-100">
                    <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                        <div class="text-center"><img class="w-75 mb-30"
                                                      src="{{asset('assets/client/imgs/template/404.svg')}}"
                                                      alt="JobBox">
                            <h2 class="mt-10 mb-5 text-brand-1">Đã xảy ra lỗi!</h2>
                            <p class="font-sm text-muted mb-30">Xin lỗi, nhưng chúng tôi không thể mở trang này.</p>
                        </div>

                        <div class="text-center mt-20"><a href="/">Quay lại trang chủ</a></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
