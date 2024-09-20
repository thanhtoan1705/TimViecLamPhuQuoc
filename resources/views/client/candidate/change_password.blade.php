@extends('client.layouts.master')
@section('title', 'Hồ sơ của tôi')
@section('content')

    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
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

    </main>

@endsection
