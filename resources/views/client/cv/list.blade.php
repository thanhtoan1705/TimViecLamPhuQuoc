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
                                               data-bs-target="#previewModal{{ $template->id }}"><i
                                                    class="fi-rr-eye"></i> Xem trước</a>
                                            <a href="#" class="p-0 btn btn-use p-md-1"><i class="fi-rr-pencil"></i> Dùng
                                                mẫu</a>
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
