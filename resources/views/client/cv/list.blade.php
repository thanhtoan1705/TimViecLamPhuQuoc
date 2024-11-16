@extends('client.layouts.master')
@section('title', 'Mẫu CV')

@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-single banner-single-bg">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp">Mẫu CV Chuyên Nghiệp</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">
                            Chọn mẫu CV phù hợp để tạo ấn tượng tốt với nhà tuyển dụng
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container">
                <div class="row">
                    <div class="box-filters-job">
                        <div class="row">
                            <div class="col-xl-6 col-lg-5">
                                <span
                                    class="text-small text-showing">Hiển thị <strong>{{ $templates->firstItem() }}-{{ $templates->lastItem() }}</strong> của <strong>{{ $templates->total() }}</strong> mẫu CV</span>
                            </div>
                            <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                <div class="display-flex2">
                                    <form method="GET" action="{{ route('client.cv.list') }}">
                                        <div class="box-border mr-10">
                                            <span class="text-sortby">Hiển thị:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-display="static">
                                                    <span>{{ $perPage }}</span><i class="fi-rr-angle-small-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort">
                                                    <li><a class="dropdown-item {{ $perPage == 5 ? 'active' : '' }}"
                                                           href="#"
                                                           onclick="document.querySelector('select[name=perPage]').value='5'; this.closest('form').submit();">5</a>
                                                    </li>
                                                    <li><a class="dropdown-item {{ $perPage == 10 ? 'active' : '' }}"
                                                           href="#"
                                                           onclick="document.querySelector('select[name=perPage]').value='10'; this.closest('form').submit();">10</a>
                                                    </li>
                                                    <li><a class="dropdown-item {{ $perPage == 20 ? 'active' : '' }}"
                                                           href="#"
                                                           onclick="document.querySelector('select[name=perPage]').value='20'; this.closest('form').submit();">20</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box-border">
                                            <span class="text-sortby">Sắp xếp theo:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-display="static">
                                                <span>
                                                    @if ($sortBy == 'newest')
                                                        Mới nhất
                                                    @elseif ($sortBy == 'oldest')
                                                        Cũ nhất
                                                    @endif
                                                </span>
                                                    <i class="fi-rr-angle-small-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort2">
                                                    <li>
                                                        <a class="dropdown-item {{ $sortBy == 'newest' ? 'active' : '' }}"
                                                           href="#"
                                                           onclick="document.querySelector('select[name=sortBy]').value='newest'; this.closest('form').submit();">Mới
                                                            nhất</a></li>
                                                    <li>
                                                        <a class="dropdown-item {{ $sortBy == 'oldest' ? 'active' : '' }}"
                                                           href="#"
                                                           onclick="document.querySelector('select[name=sortBy]').value='oldest'; this.closest('form').submit();">Cũ
                                                            nhất</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <select name="perPage" class="d-none">
                                            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                        </select>
                                        <select name="sortBy" class="d-none">
                                            <option value="newest" {{ $sortBy == 'newest' ? 'selected' : '' }}>Mới
                                                nhất
                                            </option>
                                            <option value="oldest" {{ $sortBy == 'oldest' ? 'selected' : '' }}>Cũ nhất
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($templates as $template)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card-grid-2 hover-up">
                                <div class="">
                                    <div class="image-box">
                                        <img src="{{ asset('storage/' . $template->template_image) }}"
                                             alt="{{ $template->template_name }}" class="w-100">
                                        <div class="overlay-buttons">
                                            <a href="#" class="p-0 btn btn-preview p-md-1" data-bs-toggle="modal"
                                               data-bs-target="#previewModal{{ $template->id }}">
                                                <i class="fi-rr-eye"></i> Xem trước
                                            </a>
                                            @php
                                                $hasExistingCV = false;
                                                if (Auth::check()) {
                                                    $hasExistingCV = \App\Models\UserCv::where('user_id', Auth::id())
                                                                              ->where('template_id', $template->id)
                                                                              ->exists();
                                                }
                                            @endphp
                                            @if(Auth::check())
                                                @if($hasExistingCV)
                                                    <a href="#" class="p-0 btn btn-use p-md-1"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#chooseCreateTypeModal{{ $template->id }}">
                                                        <i class="fi-rr-pencil"></i> Dùng mẫu
                                                    </a>
                                                @else
                                                    <a href="{{ route('client.cv.show', ['id' => $template->id]) }}"
                                                       class="p-0 btn btn-use p-md-1">
                                                        <i class="fi-rr-pencil"></i> Dùng mẫu
                                                    </a>
                                                @endif
                                            @else
                                                <a href="#" class="p-0 btn btn-use p-md-1" data-bs-toggle="modal" data-bs-target="#ModalLoginForm">
                                                    <i class="fi-rr-pencil"></i> Dùng mẫu
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block-info">
                                    <h6><a href="">{{ $template->template_name }}</a></h6>
                                    <div class="mt-5">
                                        <span class="card-briefcase">{{ $template->template_description }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for preview -->
                        <div class="modal fade" id="previewModal{{ $template->id }}" tabindex="-1"
                             aria-labelledby="previewModalLabel{{ $template->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="previewModalLabel{{ $template->id }}">Xem
                                            trước: {{ $template->template_name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="reviewCV{{ $template->id }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal lựa chọn cách tạo CV -->
                        @if($hasExistingCV)
                            <div class="modal fade" id="chooseCreateTypeModal{{$template->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fw-bold">
                                                <i class="fi-rr-file-edit me-2"></i>
                                                Chọn cách tạo CV
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <a href="#"
                                                       class="card h-100 text-center p-4 text-decoration-none create-new-cv option-card"
                                                       data-template-id="{{ $template->id }}">
                                                        <div class="mb-3 option-icon">
                                                            <i class="fi-rr-file-plus icon-option"></i>
                                                        </div>
                                                        <h6 class="mb-2 fw-bold">Tạo CV mới</h6>
                                                        <p class="text-muted small mb-0">
                                                            <i class="fi-rr-refresh me-1"></i>
                                                            Bắt đầu với mẫu CV mới hoàn toàn
                                                        </p>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('client.cv.show', ['id' => $template->id]) }}"
                                                       class="card h-100 text-center p-4 text-decoration-none continue-edit option-card">
                                                        <div class="mb-3 option-icon">
                                                            <i class="fi-rr-edit icon-option"></i>
                                                        </div>
                                                        <h6 class="mb-2 fw-bold">Tiếp tục chỉnh sửa</h6>
                                                        <p class="text-muted small mb-0">
                                                            <i class="fi-rr-time-forward me-1"></i>
                                                            Tiếp tục với CV đã lưu trước đó
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @push('css')
                            <style>
                            /* Modal Styles */
                            .modal-content {
                                border: none;
                                border-radius: 16px;
                                box-shadow: 0 10px 34px -15px rgba(0, 0, 0, 0.24);
                            }

                            .modal-header {
                                padding: 1.5rem 1.5rem 1rem;
                                background: #fff;
                            }

                            .modal-title {
                                color: #333;
                                font-size: 1.25rem;
                                display: flex;
                                align-items: center;
                            }

                            .modal-title i {
                                color: #3C65F5;
                                font-size: 1.4rem;
                            }

                            .modal-body {
                                background: #f8f9fa;
                            }

                            /* Option Cards */
                            .option-card {
                                border: 2px solid #e9ecef;
                                border-radius: 12px;
                                transition: all 0.3s ease;
                                height: 100%;
                                background: white;
                            }

                            .option-card:hover {
                                border-color: #3C65F5;
                                transform: translateY(-3px);
                                box-shadow: 0 5px 12px rgba(0, 0, 0, 0.12);
                            }

                            .option-card .option-icon {
                                width: 64px;
                                height: 64px;
                                margin: 0 auto;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                background: #f8f9fa;
                                border-radius: 50%;
                                transition: all 0.3s ease;
                            }

                            .option-card:hover .option-icon {
                                background: #3C65F5;
                            }

                            .icon-option {
                                font-size: 28px;
                                color: #3C65F5;
                                transition: all 0.3s ease;
                            }

                            .option-card:hover .icon-option {
                                color: white;
                                transform: scale(1.1);
                            }

                            .option-card h6 {
                                color: #333;
                                transition: color 0.3s ease;
                            }

                            .option-card:hover h6 {
                                color: #3C65F5;
                            }

                            .option-card p i {
                                font-size: 12px;
                                color: #6c757d;
                            }

                            .option-card:hover p i {
                                color: #3C65F5;
                            }

                            /* Modal Animation */
                            .modal.fade .modal-dialog {
                                transform: scale(0.8);
                                transition: transform 0.3s ease-out;
                            }

                            .modal.show .modal-dialog {
                                transform: scale(1);
                            }

                            /* Responsive Adjustments */
                            @media (max-width: 768px) {
                                .modal-dialog {
                                    margin: 1rem;
                                }

                                .option-card {
                                    padding: 1rem !important;
                                }

                                .option-card .option-icon {
                                    width: 48px;
                                    height: 48px;
                                }

                                .icon-option {
                                    font-size: 24px;
                                }

                                .option-card h6 {
                                    font-size: 1rem;
                                }
                            }

                            /* Button Close Styling */
                            .btn-close {
                                opacity: 0.5;
                                transition: all 0.2s ease;
                            }

                            .btn-close:hover {
                                opacity: 1;
                                transform: rotate(90deg);
                            }

                            /* Custom Scrollbar for Modal */
                            .modal-body::-webkit-scrollbar {
                                width: 6px;
                            }

                            .modal-body::-webkit-scrollbar-track {
                                background: #f1f1f1;
                                border-radius: 10px;
                            }

                            .modal-body::-webkit-scrollbar-thumb {
                                background: #888;
                                border-radius: 10px;
                            }

                            .modal-body::-webkit-scrollbar-thumb:hover {
                                background: #555;
                            }
                            </style>
                            @endpush
                        @endif
                    @endforeach
                </div>
                <div class="paginations">
                    {{ $templates->appends(['sortBy' => $sortBy, 'perPage' => $perPage])->links('vendor.pagination.custom') }}

                    {{-- {{ $templates->links() }} --}}
                </div>
            </div>
        </section>
    </main>
@endsection

@push('css')
    <style>
        .image-box {
            position: relative;
            overflow: hidden;
        }

        .overlay-buttons {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .card-grid-2:hover .overlay-buttons {
            opacity: 1;
        }

        .overlay-buttons a {
            margin: 5px 0;
            padding: 10px 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            width: 100%;
            max-width: 180px;
            color: #ffffff;
            font-size: 14px;
        }

        .overlay-buttons a:hover {
            color: #ffffff;
        }

        .overlay-buttons i {
            color: #ffffff;
            font-size: 14px;
            margin-right: 8px;
        }

        .btn-preview {
            color: #ffffff;
            border: 1px solid #ffffff;
        }


        .btn-use {
            background-color: #3C65F5;
            color: #fff;
        }

        .modal-dialog.modal-xl {
            max-width: 90%;
        }

        .cv-preview {
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: #0048db;
            box-shadow: 0 0 0 0.2rem rgba(0, 72, 219, 0.25);
        }

        .btn-outline-primary, .btn-outline-danger {
            border-width: 2px;
            border-radius: 8px;
            height: 48px;
        }

        .btn-outline-primary img, .btn-outline-danger img {
            margin-top: -2px;
        }

        .btn-outline-primary span, .btn-outline-danger span {
            line-height: 24px;
        }

        .hover-up {
            transition: all 0.3s ease;
        }

        .hover-up:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.12);
        }

        .text-brand-1 {
            color: #0048db;
        }

        .modal.fade .modal-dialog {
            transform: scale(0.8);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }

        @media (max-width: 1200px) {
            .modal-dialog {
                max-width: 90% !important;
            }
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-label {
            cursor: pointer;
            user-select: none;
        }

        .small {
            font-size: 0.875rem;
        }

        /* Thêm styles cho modal lựa chọn */
        #chooseCreateTypeModal .card {
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        #chooseCreateTypeModal .card:hover {
            border-color: #3C65F5;
            transform: translateY(-3px);
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.12);
        }

        #chooseCreateTypeModal .card h6 {
            color: #333;
        }

        #chooseCreateTypeModal .card:hover h6 {
            color: #3C65F5;
        }

        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }

        /* Modal Preview Styles */
        .modal-dialog.modal-xl {
            max-width: 80%;
            margin: 1.75rem auto;
        }

        .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: #f5f5f5;
        }

        .modal-body {
            padding: 0;
            background: #f5f5f5;
        }

        /* Container cho phép scroll */
        .preview-scroll-container {
            width: 100%;
            overflow-x: auto;
            overflow-y: auto;
            max-height: 80vh;
            -webkit-overflow-scrolling: touch;
        }

        /* Wrapper giữ kích thước cố định */
        .preview-wrapper {
            min-width: 700px;
            margin: 0 auto;
        }

        /* CV Container Styles */
        .cv-container {
            /* margin-top: 10px; */
            /* width: 21cm;
            min-height: 29.7cm;
            padding: 0.5cm;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.1); */
        }

        .cv-content {
            width: 100%;
            min-height: 990px;
            background: white;
            padding: 5px;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .modal-dialog.modal-xl {
                max-width: 95%;
                margin: 1rem auto;
            }

            .cv-container {
                transform: scale(0.9);
                transform-origin: top center;
            }
        }

        @media (max-width: 768px) {
            .cv-container {
                transform: scale(0.8);
            }

            .preview-scroll-container {
                -ms-overflow-style: -ms-autohiding-scrollbar;
                scrollbar-width: thin;
            }

            .preview-scroll-container::-webkit-scrollbar {
                -webkit-appearance: none;
                width: 7px;
                height: 7px;
            }

            .preview-scroll-container::-webkit-scrollbar-thumb {
                border-radius: 4px;
                background-color: rgba(0, 0, 0, .5);
                -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            }
        }

        @media (max-width: 480px) {
            .cv-container {
                transform: scale(0.7);
            }
        }

        /* Theme Colors */
        :root {
            --theme-color: #3c65f5;
            --theme-color-light: rgba(60, 101, 245, 0.1);
            --cv-primary-color: var(--theme-color);
            --cv-hover-color: #2a4cd7;
            --cv-bg-color: #f8f9fa;
            --cv-border-color: #e0e0e0;
        }

        /* CV Content Styles */
        h5 {
            color: var(--theme-color);
            border-bottom: 2px solid var(--theme-color);
            padding-bottom: 8px;
            margin-bottom: 16px;
        }

        .fas, .fab, .bi {
            color: var(--theme-color);
        }

        /* Hide unnecessary elements in preview */
        #reviewCV .action-buttons,
        #reviewCV .add-item,
        #reviewCV .remove-section,
        #reviewCV [contenteditable],
        #reviewCV .btn,
        #reviewCV .cv-toolbar {
            display: none !important;
        }
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var previewModals = document.querySelectorAll('[id^="previewModal"]');
            var roots = {}; // Object to store React roots

            previewModals.forEach(function (modal) {
                modal.addEventListener('show.bs.modal', function (event) {
                    var templateId = this.id.replace('previewModal', '');
                    var templateContent = {!! json_encode($templates->pluck('template_content', 'id')) !!}[templateId];
                    var container = document.getElementById('reviewCV' + templateId);

                    if (!roots[templateId]) {
                        // Create root only if it doesn't exist
                        roots[templateId] = window.createRoot(container);
                    }

                    // Render or update the component
                    roots[templateId].render(window.React.createElement(window.ReviewCV, {templateContent: templateContent}));
                });
            });
        });
    </script>
@endpush

<!-- Modal Login Form -->
<div class="modal fade" id="ModalLoginForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="p-0">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="bg-primary h-100 d-flex flex-column justify-content-center"
                             style="background: linear-gradient(135deg, #3a8ffe 0%, #0048db 100%); min-height: 600px;">
                            <div class="text-center px-5">
                                <img src="{{ asset('assets/client/imgs/page/login-register/img-4.svg') }}"
                                     alt="Login"
                                     class="img-fluid mb-4"
                                     style="max-width: 85%;">
                                <h2 class="text-white mb-3 fs-2">Chào mừng bạn trở lại!</h2>
                                <p class="text-white-50 fs-6">
                                    Đăng nhập để khám phá hàng ngàn cơ hội việc làm hấp dẫn
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="p-30">
                            <button type="button"
                                    class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            <div class="text-center mb-4">
                                <h3 class="text-brand-1 mb-2 fs-3">Đăng nhập để tạo CV</h3>
                                <p class="text-muted">Truy cập vào tài khoản của bạn</p>
                            </div>

                            <!-- Social Login Buttons -->
                            <div class="d-grid gap-3 mb-4">
                                <a href="{{ route('client.login.facebook') }}"
                                   class="btn btn-outline-primary hover-up py-2 d-flex align-items-center justify-content-center">
                                    <img src="{{asset('assets/client/imgs/template/icons/facebook.svg')}}"
                                         alt="facebook" class="me-2" height="24">
                                    <span>Đăng nhập với Facebook</span>
                                </a>
                                <a href="{{ route('client.auth.google', ['previous_url' => url()->current()]) }}"
                                   class="btn btn-outline-danger hover-up py-2 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets/client/imgs/template/icons/icon-google.svg') }}"
                                         alt="google" class="me-2" height="24">
                                    <span>Đăng nhập với Google</span>
                                </a>
                            </div>

                            <div class="position-relative mb-4">
                                <hr class="text-muted">
                                <span
                                    class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                    hoặc đăng nhập với
                                </span>
                            </div>

                            <!-- Login Form -->
                            <form class="login-register" method="post"
                                  action="{{ route('client.candidate.login.post') }}">
                                @csrf
                                <input type="hidden" name="previous_url" value="{{ url()->current() }}">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="email">Email của bạn</label>
                                    <input class="form-control"
                                           id="email"
                                           type="email"
                                           required
                                           name="email"
                                           placeholder="name@example.com">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="password">Mật khẩu</label>
                                    <input class="form-control"
                                           id="password"
                                           type="password"
                                           required
                                           name="password"
                                           placeholder="Nhập mật khẩu">
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input type="checkbox"
                                               class="form-check-input" style="height: 16px;"
                                               id="remember"
                                               name="remember_login">
                                        <label class="form-check-label small" for="remember">
                                            Ghi nhớ
                                        </label>
                                    </div>
                                    <a href="{{route('client.reset')}}" class="text-primary small">Quên mật khẩu?</a>
                                </div>

                                <div class="d-grid mb-3">
                                    <button class="btn btn-primary hover-up py-2 p-15" type="submit">
                                        Đăng nhập ngay
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-4">
                                <p class="mb-0">Chưa có tài khoản?
                                    <a href="{{ route('client.candidate.register') }}" class="text-primary">
                                        Đăng ký ngay
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const useTemplateButtons = document.querySelectorAll('.use-template-btn');

    useTemplateButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const templateId = this.dataset.templateId;

            try {
                const response = await fetch(`/check-existing-cv/${templateId}`);
                const data = await response.json();

                if (data.exists) {
                    // Nếu có CV đã lưu, hiện modal
                    const modalId = `#chooseCreateTypeModal${templateId}`;
                    const modal = new bootstrap.Modal(document.querySelector(modalId));
                    modal.show();
                } else {
                    // Nếu chưa có CV, chuyển thẳng đến trang tạo CV
                    window.location.href = `/cv/${templateId}`;
                }
            } catch (error) {
                console.error('Error:', error);
                // Nếu có lỗi, vẫn chuyển đến trang tạo CV
                window.location.href = `/cv/${templateId}`;
            }
        });
    });

    // Xử lý nút "Tạo CV mới"
    const createNewButtons = document.querySelectorAll('.create-new-cv');
    createNewButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const templateId = this.dataset.templateId;

            try {
                // Xóa template cũ
                const deleteResponse = await fetch(`/cv/${templateId}/delete-template`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const deleteData = await deleteResponse.json();

                if (deleteData.success) {
                    window.location.href = `/cv/${templateId}`;
                } else {
                    console.error('Error deleting template:', deleteData.message);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
@endpush
