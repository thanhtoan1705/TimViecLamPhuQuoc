@extends('client.layouts.master')
@section('title', 'Trang Việc Làm')
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
                <div class="banner-hero banner-single banner-single-bg">
                    <div class="block-banner text-center">
                        <h3 class="wow animate__animated animate__fadeInUp"><span
                                class="color-brand-2">22 Công Việc</span> Có Sẵn Ngay Bây Giờ</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Khám phá cơ hội việc làm tuyệt vời và tìm kiếm công việc phù hợp với
                            bạn.<br class="d-none d-xl-block">Ứng tuyển ngay để bắt đầu sự nghiệp của bạn!?
                        </div>
                        <x-client.search></x-client.search>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5"><span
                                            class="text-small text-showing">Hiển thị <strong>{{ $jobs->firstItem() }}-{{ $jobs->lastItem() }}</strong> trên <strong>{{ $totalJobs }} </strong>việc làm</span>
                                    </div>
                                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                        <div class="display-flex2">
                                            <div class="box-border mr-10"><span class="text-sortby">Hiển thị:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static"><span>{{ $perPage }}</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort">
                                                        <li><a class="dropdown-item" href="#" data-per-page="2"
                                                               data-sort-by="{{ $sortBy }}"
                                                               data-sort-order="{{ $sortOrder }}">2</a></li>
                                                        <li><a class="dropdown-item" href="#" data-per-page="12"
                                                               data-sort-by="{{ $sortBy }}"
                                                               data-sort-order="{{ $sortOrder }}">12</a></li>
                                                        <li><a class="dropdown-item" href="#" data-per-page="20"
                                                               data-sort-by="{{ $sortBy }}"
                                                               data-sort-order="{{ $sortOrder }}">20</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-border"><span class="text-sortby">Sắp xếp:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static">
                                                        <span>{{ $sortBy == 'created_at' && $sortOrder == 'desc' ? 'Bài Mới Nhất' : ($sortBy == 'created_at' && $sortOrder == 'asc' ? 'Bài Cũ Nhất' : 'Bài Đánh Giá') }}</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort2">
                                                        <li>
                                                            <a class="dropdown-item {{ $sortBy == 'created_at' && $sortOrder == 'desc' ? 'active' : '' }}"
                                                               href="#" data-sort-by="created_at" data-sort-order="desc"
                                                               data-per-page="{{ $perPage }}">Bài Mới Nhất</a></li>
                                                        <li>
                                                            <a class="dropdown-item {{ $sortBy == 'created_at' && $sortOrder == 'asc' ? 'active' : '' }}"
                                                               href="#" data-sort-by="created_at" data-sort-order="asc"
                                                               data-per-page="{{ $perPage }}">Bài Cũ Nhất</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-view-type"><a class='view-type' href='jobs-list.html'><img
                                                        src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}"
                                                        alt="jobBox"></a><a class='view-type' href='jobs-grid.html'><img
                                                        src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}"
                                                        alt="jobBox"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(isset($jobs) && !$jobs->isEmpty())
                                    @foreach($jobs as $item)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <div class="card-grid-2 hover-up">
                                                <div class="card-grid-2-image-left"><span class="flash"></span>
                                                    <div class="image-box"><img
                                                            src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                            alt="jobBox"></div>
                                                    <div class="right-info"><a class='name-job'
                                                                               href="{{route('client.job.single', ['jobSlug' => $item->slug])}}">
                                                            {{ $item->employer->company_name }}</a><span
                                                            class="location-small">{{ $item->address }}</span></div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h6>
                                                        <a href="{{route('client.job.single', ['jobSlug' => $item->slug])}}">{{ $item->title }}</a>
                                                    </h6>
                                                    <div class="mt-5"><span
                                                            class="card-briefcase">{{ $item->jobType->name }}</span>
                                                        <span
                                                            class="card-time">{{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="font-sm color-text-paragraph mt-15">
                                                        {{ $item->description }}
                                                    </p>
                                                    <div class="mt-30">
                                                        @foreach($item->skills as $skill)
                                                            <a class='btn btn-grey-small mr-5'
                                                               href='#'>{{ $skill->name }}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-2-bottom mt-30">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-7"><span
                                                                    class="card-text-price">{{ $item->salary->name }}</span>
                                                            </div>
                                                            <div class="col-lg-5 col-5 text-end">
                                                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                     data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="no-results">
                                        <h6>Không có kết quả tìm kiếm phù hợp</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="paginations">
                            {{ $jobs->appends(request()->query())->links('vendor.pagination.custom_job') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Bộ lọc nâng cao<a class="link-reset" href="{{ route('client.job.index') }}">Làm
                                            mới</a></h5>
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
                                        </select>
                                        <i class="fi-rr-marker"></i>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Danh Mục</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($categories as $category)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="categories[]"
                                                               value="{{ $category->id }}"
                                                            {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $category->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span
                                                        class="number-item">{{ $category->job_posts_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-25">Mức Lương</h5>
                                    <div class="form-group mb-20">
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
                                                    <span
                                                        class="number-item">{{ $salary->job_posts_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Từ khóa phổ biến</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($keywords as $keyword)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="keywords[]"
                                                               value="{{ $keyword['keyword'] }}"
                                                            {{ in_array($keyword['keyword'], request('keywords', [])) ? 'checked' : '' }}><span
                                                            class="text-small">{{ $keyword['keyword'] }}</span><span
                                                            class="checkmark"></span>
                                                    </label><span
                                                        class="number-item">{{ $keyword['job_count'] }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Chức vụ</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($ranks as $rank)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="ranks[]"
                                                               value="{{ $rank->id }}"
                                                            {{ in_array($rank->id, request('ranks', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $rank->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label><span class="number-item">{{ $rank->job_count }}</span>
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
                                                    </label><span
                                                        class="number-item">{{ $experience->job_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Việc làm đã đăng</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="posted_time"
                                                           value="1_day" {{ request('posted_time') == '1_day' ? 'checked' : '' }}>
                                                    <span class="text-small">1 ngày</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $jobsCount1Day }}</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="posted_time"
                                                           value="7_days" {{ request('posted_time') == '7_days' ? 'checked' : '' }}>
                                                    <span class="text-small">7 ngày</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $jobsCount7Days }}</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="posted_time"
                                                           value="30_days" {{ request('posted_time') == '30_days' ? 'checked' : '' }}>
                                                    <span class="text-small">30 ngày</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $jobsCount30Days }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Loại công việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($jobTypes as $jobType)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="job_types[]"
                                                               value="{{ $jobType->id }}"
                                                            {{ in_array($jobType->id, request('job_types', [])) ? 'checked' : '' }}>
                                                        <span class="text-small">{{ $jobType->name }}</span>
                                                        <span class="checkmark"></span>
                                                    </label><span
                                                        class="number-item">{{ $jobType->job_count }}</span>
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
        <x-client.blog></x-client.blog>
    </main>
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
    </style>

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const locationElement = document.querySelector('select[name="locations"]');
                const sortDropdowns = document.querySelectorAll('.dropdown-menu a');
                const jobListContainer = document.querySelector('#job-list-container');

                sortDropdowns.forEach(dropdown => {
                    dropdown.addEventListener('click', function (event) {
                        event.preventDefault();
                        const url = new URL(window.location.href);
                        const currentParams = new URLSearchParams(url.search);
                        const perPage = document.querySelector('#dropdownSort').textContent.trim();
                        const sortBy = this.getAttribute('data-sort-by');
                        const sortOrder = this.getAttribute('data-sort-order');

                        currentParams.set('per_page', perPage);
                        currentParams.set('sort_by', sortBy);
                        currentParams.set('sort_order', sortOrder);

                        url.search = currentParams.toString();
                        window.location.href = url.toString();
                    });
                });

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

                updateFilter('categories[]');
                updateFilter('salaries[]');
                updateFilter('keywords[]');
                updateFilter('ranks[]');
                updateFilter('experiences[]');
                updateFilter('job_types[]');
                updateFilter('posted_time');

                function handleLocationChange() {
                    const locationElement = document.querySelector('select[name="locations"]');

                    if (locationElement) {
                        console.log(`Location element found: ${locationElement}`);

                        locationElement.addEventListener('change', function () {
                            const url = new URL(window.location.href);
                            const currentParams = new URLSearchParams(url.search);

                            currentParams.delete('locations');
                            if (locationElement.value) {
                                currentParams.set('location', locationElement.value);
                            }

                            url.search = currentParams.toString();
                            window.location.href = url.toString();
                        });
                    } else {
                        setTimeout(handleLocationChange, 500);
                    }
                }

                handleLocationChange();
            });
        </script>
    @endpush

@endsection
