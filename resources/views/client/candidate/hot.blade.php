@extends('client.layouts.master')
@section('title', 'Ứng viên nổi bật')
@section('content')
    <?php
    function sanitizeString($string)
    {
        // Chuyển đổi ký tự có dấu sang không dấu
        $unwantedArray = array(
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
            'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'ă' => 'a',
            'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'â' => 'a',
            'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ệ' => 'e', 'ể' => 'e',
            'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
            'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ô' => 'o',
            'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ơ' => 'o',
            'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
            'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
            'đ' => 'd', 'Đ' => 'D'
        );

        // Thay thế ký tự có dấu
        $string = strtr($string, $unwantedArray);

        // Loại bỏ khoảng trắng không cần thiết
        $string = preg_replace('/\s+/', ' ', trim($string)); // Thay thế nhiều khoảng trắng bằng một khoảng trắng
        $string = preg_replace('/[^a-zA-Z0-9\s]/', '', $string); // Loại bỏ ký tự không phải chữ và số

        return $string;
    }
    ?>
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-company">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp">Các ứng viên nổi bật</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Hãy tìm các ứng viên ở đây, <br class="d-none d-xl-block">nơi mà các
                            nhà
                            tuyển dụng tuyển tìm kiếm
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 content-page">
                        <div class="box-filters-job">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5">
                                    <span
                                        class="text-small text-showing">Hiển thị <strong>{{ $candidates->firstItem() }}-{{ $candidates->lastItem() }}</strong> của <strong>{{ $candidates->total() }}</strong> ứng viên</span>
                                </div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <form method="GET" action="{{ route('client.candidate.hot') }}">
                                            <div class="box-border mr-10">
                                                <span class="text-sortby">Hiển thị:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static">
                                                        <span>{{ $perPage }}</span><i
                                                            class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort">
                                                        <li><a class="dropdown-item {{ $perPage == 5 ? 'active' : '' }}"
                                                               href="#"
                                                               onclick="document.querySelector('select[name=perPage]').value='5'; this.closest('form').submit();">5</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 10 ? 'active' : '' }}"
                                                               href="#"
                                                               onclick="document.querySelector('select[name=perPage]').value='10'; this.closest('form').submit();">10</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 20 ? 'active' : '' }}"
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
                                            <div class="box-view-type">
                                                <a class='view-type' href='#'><img
                                                        src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}"
                                                        alt="jobBox"></a>
                                                <a class='view-type' href='#'><img
                                                        src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}"
                                                        alt="jobBox"></a>
                                            </div>
                                            <select name="perPage" class="d-none">
                                                <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                            </select>
                                            <select name="sortBy" class="d-none">
                                                <option value="newest" {{ $sortBy == 'newest' ? 'selected' : '' }}>
                                                    Mới nhất
                                                </option>
                                                <option value="oldest" {{ $sortBy == 'oldest' ? 'selected' : '' }}>
                                                    Cũ nhất
                                                </option>
                                            </select>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($candidates as $candidate)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left">
                                            <div class="card-grid-2-image-rd online">
                                                <a href='#'>
                                                    <figure>
                                                        @if($candidate->user->avatar_url)
                                                            <img alt="jobBox"
                                                                 src="{{ asset('storage/' . $candidate->user->avatar_url) }}">
                                                        @else
                                                            <img alt="jobBox" src="{{ asset('default/user.png') }}">
                                                        @endif
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-profile pt-10">
                                                <a href='#'>
                                                    <h5>{{ $candidate->user->name }}</h5>
                                                </a>
                                                <span
                                                    class="font-xs color-text-mutted">{{ $candidate->major->name ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <p class="candidate-description font-xs color-text-paragraph-2">
                                                {{ strip_tags($candidate->description) }}
                                            </p>
                                            <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                <div class="text-start">
                                                    @foreach($candidate->skills as $skill)
                                                        <a class='btn btn-tags-sm mb-10 mr-5'
                                                           href='#'>{{ $skill->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="employers-info align-items-center justify-content-center mt-15">
                                                <div class="row">
                                                    <div class="col-6">
                                        <span class="d-flex align-items-center">
                                            <i class="fi-rr-marker mr-5 ml-0"></i>
                                            <span
                                                class="font-sm color-text-mutted">{{ $candidate->address->province->name ?? null}}</span>
                                        </span>
                                                    </div>
                                                    <div class="col-6">
                                        <span class="d-flex justify-content-end align-items-center">
                                            <span
                                                class="font-sm color-brand-1">{{ $candidate->salary->name ?? '' }}</span>
                                            <i class="fi-rr-clock mr-5"></i>
                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="paginations">
                            {{ $candidates->appends(['sortBy' => $sortBy, 'perPage' => $perPage])->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Bộ lọc nâng cao<a class="link-reset" href="#">Làm mới</a></h5>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style select-style-icon">
                                        <select id="location-select" name="locations"
                                                class="form-control form-icons">
                                            <option value="">Chọn địa điểm</option>
                                            @foreach($locations as $location)
                                                <option
                                                    value="{{ sanitizeString($location) }}">{{ $location }}</option>
                                            @endforeach
                                        </select><i class="fi-rr-marker"></i>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Chuyên Ngành</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($majors as $major)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="majors[]" value="{{ $major->id }}"
                                                            {{ in_array($major->id, request('majors', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $major->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span class="number-item">{{ $major->candidate_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Khoảng Lương</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($salaries as $salary)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="salaries[]"
                                                               value="{{ $salary->id }}"
                                                            {{ in_array($salary->id, request('salaries', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $salary->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span class="number-item">{{ $salary->candidate_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Giáo dục</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($educations as $education)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="educations[]"
                                                               value="{{ $education->id }}"
                                                            {{ in_array($education->id, request('educations', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $education->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span class="number-item">{{ $education->candidate_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Kinh nghiệm làm việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($experiences as $experience)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="experiences[]"
                                                               value="{{ $experience->id }}"
                                                            {{ in_array($experience->id, request('experiences', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $experience->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span class="number-item">{{ $experience->candidate_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin tức</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Nhận tin tức, cập
                        nhật và mẹo mới nhất</p>
                </div>
            </div>
            <div class="container">
                <div class="mt-50">
                    <div class="box-swiper style-nav-top">
                        <div class="swiper-container swiper-group-3 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/homepage1/img-news1.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>News</a>
                                            </div>
                                            <h5><a href='blog-details.html'>21 mẹo phỏng vấn xin việc: Cách tạo ấn
                                                    tượng tốt</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc
                                                sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                các sản phẩm chăm sóc sức khỏe chất lượng cao với
                                                bao bì bền vững, mang tính biểu tượng.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user1.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh
                                                                    Toàn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 7</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">8 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/homepage1/img-news2.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>Sự
                                                    kiến</a></div>
                                            <h5><a href='blog-details.html'>39 điểm mạnh và điểm yếu để thảo luận một
                                                    cách
                                                    Phỏng vấn xin việc</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                sản phẩm chăm sóc sức khỏe chất lượng cao trong bao bì mang tính biểu
                                                tượng,
                                                bền vững.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user2.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh
                                                                    Toàn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 6</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">6 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a href="#">
                                                <figure><img alt="jobBox"
                                                             src="{{ asset('assets/client/imgs/page/homepage1/img-news3.png') }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>News</a>
                                            </div>
                                            <h5><a href='blog-details.html'>Câu hỏi phỏng vấn: Tại sao bạn không có
                                                    Bằng cấp?</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Tìm hiểu cách phản ứng nếu
                                                người phỏng vấn hỏi bạn tại sao bạn không có bằng cấp và đọc các câu trả
                                                lời
                                                ví dụ
                                                điều đó có thể giúp bạn chế tạo</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user3.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Khoa
                                                                    Nguyễn</span><br><span
                                                                    class="font-xs color-text-paragraph-2">06
                                                                    Tháng 2</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">9 phút để đọc</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="text-center"><a class='btn btn-brand-1 btn-icon-load mt--30 hover-up'
                                                href='blog-grid.html'>Tải thêm bài viết</a></div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                src="{{ asset('assets/client/imgs/template/newsletter-left.png') }}" alt="joxBox">
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">Những điều mới sẽ luôn luôn<br> Cập nhật thường
                                xuyên</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading icon-send-letter">Đăng ký</button>
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
@push('css')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-xl-3, .col-lg-4, .col-md-6 {
            display: flex;
            flex-direction: column;
        }

        .card-grid-2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .candidate-description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            height: auto;
        }
    </style>
@endpush
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateFilter(name) {
                const elements = document.querySelectorAll(`input[name="${name}"], select[name="${name}"]`);

                elements.forEach(function (element) {
                    element.addEventListener('change', function () {
                        const url = new URL(window.location.href);
                        const currentParams = new URLSearchParams(url.search);

                        currentParams.delete(name);

                        if (element.type === 'checkbox') {
                            document.querySelectorAll(`input[name="${name}"]:checked`).forEach(function (checkedBox) {
                                currentParams.append(name, checkedBox.value);
                            });
                        } else if (element.type === 'select-one') {
                            if (element.value) {
                                currentParams.set(name, element.value);
                            }
                        }
                        url.search = currentParams.toString();
                        window.location.href = url.toString();
                    });
                });
            }

            const filterNames = ['majors[]', 'salaries[]', 'educations[]', 'experiences[]'];
            filterNames.forEach(function (filterName) {
                updateFilter(filterName);
            });

            function handleLocationChange() {
                const locationElement = document.querySelector('select[name="locations"]');

                if (locationElement) {
                    locationElement.addEventListener('change', function () {
                        const url = new URL(window.location.href);
                        const currentParams = new URLSearchParams(url.search);

                        currentParams.delete('locations');

                        if (locationElement.value) {
                            currentParams.set('locations', locationElement.value);
                        }

                        url.search = currentParams.toString();
                        window.location.href = url.toString();
                    });
                }
            }

            handleLocationChange();
        });
    </script>
@endpush
