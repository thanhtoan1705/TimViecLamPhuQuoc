@extends('client.layouts.master')

@section('title', 'Danh sách việc làm'. ' - '. config('app.name'))
@section('seo_image', getStorageImageUrl('', config('image.main-logo')))

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
                                class="color-brand-2"></span>Tìm kiếm vệc làm phù hợp với bạn</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Khám phá cơ hội việc làm tuyệt vời và tìm kiếm công việc phù hợp với
                            bạn.
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
                                    <div class="col-xl-6 col-lg-5">
                                        <div class="d-flex align-items-center justify-content-between d-lg-block">
                                            <!-- Nút filter cho mobile -->
                                            <div class="d-flex d-lg-none align-items-center gap-2">
                                                <button class="btn btn-filter-mobile" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#mobileFilterModal">
                                                    <i class="fi-rr-filter"></i>
                                                    <div class="filter-count"></div>
                                                </button>

                                                <!-- Box hiển thị và sắp xếp cho mobile -->
                                                <div class="d-flex gap-2">
                                                    <div class="box-border">
                                                        <span class="text-sortby">Hiển thị:</span>
                                                        <div class="dropdown dropdown-sort">
                                                            <button class="btn dropdown-toggle" id="dropdownSort"
                                                                    type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    data-bs-display="static"><span>{{ $perPage }}</span><i
                                                                    class="fi-rr-angle-small-down"></i></button>
                                                            <ul class="dropdown-menu dropdown-menu-light"
                                                                aria-labelledby="dropdownSort">
                                                                <li><a class="dropdown-item" href="#" data-per-page="3"
                                                                       data-sort-by="{{ $sortBy }}"
                                                                       data-sort-order="{{ $sortOrder }}">3</a></li>
                                                                <li><a class="dropdown-item" href="#" data-per-page="12"
                                                                       data-sort-by="{{ $sortBy }}"
                                                                       data-sort-order="{{ $sortOrder }}">12</a></li>
                                                                <li><a class="dropdown-item" href="#" data-per-page="18"
                                                                       data-sort-by="{{ $sortBy }}"
                                                                       data-sort-order="{{ $sortOrder }}">18</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="box-border">
                                                        <span class="text-sortby">Sắp xếp:</span>
                                                        <div class="dropdown dropdown-sort">
                                                            <button class="btn dropdown-toggle" id="dropdownSort2"
                                                                    type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    data-bs-display="static">
                                                                <span>{{ $sortBy == 'created_at' && $sortOrder == 'desc' ? 'Mới nhất' : ($sortBy == 'created_at' && $sortOrder == 'asc' ? 'Cũ nhất' : 'Đánh giá') }}</span><i
                                                                    class="fi-rr-angle-small-down"></i></button>
                                                            <ul class="dropdown-menu dropdown-menu-light"
                                                                aria-labelledby="dropdownSort2">
                                                                <li>
                                                                    <a class="dropdown-item {{ $sortBy == 'created_at' && $sortOrder == 'desc' ? 'active' : '' }}"
                                                                       href="#" data-sort-by="created_at"
                                                                       data-sort-order="desc"
                                                                       data-per-page="{{ $perPage }}">Mới nhất</a></li>
                                                                <li>
                                                                    <a class="dropdown-item {{ $sortBy == 'created_at' && $sortOrder == 'asc' ? 'active' : '' }}"
                                                                       href="#" data-sort-by="created_at"
                                                                       data-sort-order="asc"
                                                                       data-per-page="{{ $perPage }}">Cũ nhất</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Text showing chỉ hiển thị trên desktop -->
                                            <span class="text-small text-showing d-none d-lg-block">
                                                Hiển thị <strong>{{ $jobs->firstItem() }}-{{ $jobs->lastItem() }}</strong> trên <strong>{{ $totalJobs }} </strong>việc làm
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Phần này chỉ hiển thị trên desktop -->
                                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15 d-none d-lg-block">
                                        <!-- Giữ nguyên code cũ cho desktop view -->
                                        <div class="display-flex2">
                                            <div class="box-border mr-10">
                                                <span class="text-sortby">Hiển thị:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static"><span>{{ $perPage }}</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort">
                                                        <li><a class="dropdown-item" href="#" data-per-page="3"
                                                               data-sort-by="{{ $sortBy }}"
                                                               data-sort-order="{{ $sortOrder }}">3</a></li>
                                                        <li><a class="dropdown-item" href="#" data-per-page="12"
                                                               data-sort-by="{{ $sortBy }}"
                                                               data-sort-order="{{ $sortOrder }}">12</a></li>
                                                        <li><a class="dropdown-item" href="#" data-per-page="18"
                                                               data-sort-by="{{ $sortBy }}"
                                                               data-sort-order="{{ $sortOrder }}">18</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-border mr-10">
                                                <span class="text-sortby">Sắp xếp:</span>
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
                                            <!-- Nút filter cho mobile -->
                                            <button class="btn btn-filter-mobile d-lg-none" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#mobileFilterModal">
                                                <i class="fi-rr-filter"></i>
                                                <div class="filter-count"></div>
                                            </button>
                                            <!-- Box view type cho desktop -->
                                            {{--                                            <div class="box-view-type d-none d-lg-flex">--}}
                                            {{--                                                <a class='view-type' href='jobs-list.html'>--}}
                                            {{--                                                    <img--}}
                                            {{--                                                        src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}"--}}
                                            {{--                                                        alt="jobBox">--}}
                                            {{--                                                </a>--}}
                                            {{--                                                <a class='view-type' href='jobs-grid.html'>--}}
                                            {{--                                                    <img--}}
                                            {{--                                                        src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}"--}}
                                            {{--                                                        alt="jobBox">--}}
                                            {{--                                                </a>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(isset($jobs) && !$jobs->isEmpty())
                                    @foreach($jobs as $item)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                            <!-- Desktop View -->
                                            <div class="card-grid-2 hover-up d-none d-md-flex">
                                                <div class="card-grid-2-image-left"><span class="flash"></span>
                                                    <div class="image-box">
                                                        @php
                                                            $company_logo = getStorageImageUrl($item->employer->company_logo, config('image.square-logo'));
                                                        @endphp

                                                        <img
                                                            style="width: 55px; height: 55px;"
                                                            src="{{ $company_logo }}"
                                                            alt="{{ $item->title }}">
                                                    </div>
                                                    <div class="right-info"><a class='name-job'
                                                                               href="{{ route('client.employer.single', ['slug' => $item->employer->slug]) }}">
                                                            {{ $item->employer->company_name }}</a><span
                                                            class="location-small">{{ $item->employer->address->province->name ?? ''}}</span>
                                                    </div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h6>
                                                        <a href="{{route('client.job.single', ['jobSlug' => $item->slug])}}">
                                                            {{ limit_text($item->title, 65) }}
                                                        </a>
                                                    </h6>
                                                    <div class="mt-5 job-meta-info"><span
                                                            class="card-briefcase">{{ $item->jobType->name }}</span>
                                                        <span
                                                            class="card-time">{{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="description font-sm color-text-paragraph mt-15">
                                                        {{ limit_text($item->description, 120) }}
                                                    </p>
                                                    <div class="mt-30">
                                                        @foreach($item->skills as $skill)
                                                            <a class='btn btn-grey-small mr-5'
                                                               href='#'>{{ $skill->name }}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-2-bottom mt-30">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6 align-content-center"><span
                                                                    class="text-sm">{{ $item->salary->name }}</span>
                                                            </div>
                                                            <div class="col-lg-1 col-1 p-0 align-content-center">
                                                                @php
                                                                    $isSaved = in_array($item->id, $savedJobIds);
                                                                @endphp
                                                                @if ($isSaved)
                                                                    <!-- Nếu công việc đã lưu, hiển thị nút bỏ lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.unsave', ['job_id' => $item->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button
                                                                            style="border: 0; background-color: white"
                                                                            type="submit">
                                                                            <i class="bi bi-heart-fill text-primary"
                                                                               style="font-size: 16px; margin: 0"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <!-- Nếu công việc chưa lưu, hiển thị nút lưu -->
                                                                    <form
                                                                        action="{{ route('client.candidate.saveJob', ['job_id' => $item->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button
                                                                            style="border: 0; background-color: white"
                                                                            type="submit">
                                                                            <i class="bi bi-heart"
                                                                               style="font-size: 16px; margin: 0"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-3 col-3 text-end">
                                                                <a href="{{route('client.job.single', ['jobSlug' => $item->slug])}}"
                                                                   target="_blank" class="btn btn-apply-now"
                                                                >Ứng tuyển
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Mobile View -->
                                            <div class="card-grid-2 hover-up d-md-none mobile-job-card">
                                                <div class="mobile-job-content">
                                                    <div class="company-logo">
                                                        @php
                                                            $company_logo = getStorageImageUrl($item->employer->company_logo, config('image.square-logo'));
                                                        @endphp
                                                        <img src="{{ $company_logo }}" alt="{{ $item->title }}">
                                                    </div>

                                                    <div class="job-info">
                                                        <h3 class="job-title m-0">
                                                            <a href="{{route('client.job.single', ['jobSlug' => $item->slug])}}">
                                                                {{ limit_text($item->title, 65) }}
                                                            </a>
                                                        </h3>

                                                        <div class="company-name font-bold">
                                                            <a href="{{ route('client.employer.single', ['slug' => $item->employer->slug]) }}">{{ $item->employer->company_name ?? '' }}</a>
                                                        </div>

                                                        <div class="job-details font-bold">
                                                            <div class="salary">{{ $item->salary->name }}</div>
                                                            <div
                                                                class="location">{{ $item->employer->address->province->name ?? ''}}</div>
                                                        </div>
                                                    </div>

                                                    <!-- Nút tim -->
                                                    <div class="save-job">
                                                        @php
                                                            $isSaved = in_array($item->id, $savedJobIds);
                                                        @endphp
                                                        @if ($isSaved)
                                                            <form
                                                                action="{{ route('client.candidate.unsave', ['job_id' => $item->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="save-button">
                                                                    <i class="bi bi-heart-fill text-primary"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('client.candidate.saveJob', ['job_id' => $item->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="save-button">
                                                                    <i class="bi bi-heart"></i>
                                                                </button>
                                                            </form>
                                                        @endif
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
                        <!-- Wrap existing sidebar trong collapse -->
                        <div id="advancedFilter" class="collapse d-lg-block">
                            <div class="sidebar-shadow none-shadow mb-30">
                                <div class="sidebar-filters">
                                    <div class="filter-block head-border mb-30">
                                        <h5>Bộ lọc nâng cao<a class="link-reset" href="{{ route('client.job.index') }}">Làm
                                                mới</a></h5>
                                    </div>
                                    <div class="filter-block mb-30">
                                        <div class="form-group select-style select-style-icon">
                                            <div class="custom-select-wrapper">
                                                <select id="location-select" name="locations"
                                                        class="form-control form-icons desktop-filter select-active">
                                                    <option value="">Chọn địa điểm</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{ $location }}"
                                                            {{ request('locations') == $location ? 'selected' : '' }}>
                                                            {{ $location }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <i class="fi-rr-marker"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-20">
                                        <h5 class="medium-heading mb-15">Danh Mục</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($categories as $category)
                                                    @if(!empty($category))
                                                        <li>
                                                            <label class="cb-container">
                                                                <input type="checkbox" name="categories[]"
                                                                       class="desktop-filter"
                                                                       value="{{ $category->id }}"
                                                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                                                <span class="text-small">{{ $category->name }}</span>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <span
                                                                class="number-item">{{ $category->job_posts_count }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-20">
                                        <h5 class="medium-heading mb-25">Mức Lương</h5>
                                        <div class="form-group mb-20">
                                            <ul class="list-checkbox">
                                                @foreach($salaries as $salary)
                                                    @if(!empty($salary))
                                                        <li>
                                                            <label class="cb-container">
                                                                <input type="checkbox" name="salaries[]"
                                                                       class="desktop-filter"
                                                                       value="{{ $salary->id }}"
                                                                    {{ in_array($salary->id, request('salaries', [])) ? 'checked' : '' }}>
                                                                <span class="text-small">{{ $salary->name }}</span>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <span
                                                                class="number-item">{{ $salary->job_posts_count }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-10">Từ khóa phổ biến</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($keywords as $keyword)
                                                    @if(!empty($keyword['job_count']))
                                                        <li>
                                                            <label class="cb-container">
                                                                <input type="checkbox" name="keywords[]"
                                                                       class="desktop-filter"
                                                                       value="{{ $keyword['keyword'] }}"
                                                                    {{ in_array($keyword['keyword'], request('keywords', [])) ? 'checked' : '' }}><span
                                                                    class="text-small">{{ $keyword['keyword'] }}</span><span
                                                                    class="checkmark"></span>
                                                            </label><span
                                                                class="number-item">{{ $keyword['job_count'] }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-10">Chức vụ</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($ranks as $rank)
                                                    @if(!empty($rank->job_count))
                                                        <li>
                                                            <label class="cb-container">
                                                                <input type="checkbox" name="ranks[]"
                                                                       class="desktop-filter"
                                                                       value="{{ $rank->id }}"
                                                                    {{ in_array($rank->id, request('ranks', [])) ? 'checked' : '' }}>
                                                                <span class="text-small">{{ $rank->name }}</span>
                                                                <span class="checkmark"></span>
                                                            </label><span
                                                                class="number-item">{{ $rank->job_count }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-10">Kinh nghiệm làm việc</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($experiences as $experience)
                                                    @if(!empty($experience))
                                                        <li>
                                                            <label class="cb-container">
                                                                <input type="checkbox" name="experiences[]"
                                                                       class="desktop-filter"
                                                                       value="{{ $experience->id }}"
                                                                    {{ in_array($experience->id, request('experiences', [])) ? 'checked' : '' }}>
                                                                <span class="text-small">{{ $experience->name }}</span>
                                                                <span class="checkmark"></span>
                                                            </label><span
                                                                class="number-item">{{ $experience->job_count }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-10">Việc làm đã đăng</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @if($jobsCount1Day > 0)
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="posted_time"
                                                                   class="desktop-filter"
                                                                   value="1_day" {{ request('posted_time') == '1_day' ? 'checked' : '' }}>
                                                            <span class="text-small">1 ngày</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="number-item">{{ $jobsCount1Day }}</span>
                                                    </li>
                                                @endif
                                                @if($jobsCount7Days > 0)
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="posted_time"
                                                                   class="desktop-filter"
                                                                   value="7_days" {{ request('posted_time') == '7_days' ? 'checked' : '' }}>
                                                            <span class="text-small">7 ngày</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="number-item">{{ $jobsCount7Days }}</span>
                                                    </li>
                                                @endif
                                                @if($jobsCount30Days > 0)
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="posted_time"
                                                                   class="desktop-filter"
                                                                   value="30_days" {{ request('posted_time') == '30_days' ? 'checked' : '' }}>
                                                            <span class="text-small">30 ngày</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="number-item">{{ $jobsCount30Days }}</span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-20">
                                        <h5 class="medium-heading mb-15">Loại công việc</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($jobTypes as $jobType)
                                                    @if(!empty($jobType))
                                                        <li>
                                                            <label class="cb-container">
                                                                <input type="checkbox" name="job_types[]"
                                                                       class="desktop-filter"
                                                                       value="{{ $jobType->id }}"
                                                                    {{ in_array($jobType->id, request('job_types', [])) ? 'checked' : '' }}>
                                                                <span class="text-small">{{ $jobType->name }}</span>
                                                                <span class="checkmark"></span>
                                                            </label><span
                                                                class="number-item">{{ $jobType->job_count }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--        <x-client.blog></x-client.blog>--}}
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
            height: 100%;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;

            height: 63px;
            line-height: 20px;
        }

        .description:only-child {
            margin-bottom: 23px;
        }

        .card-block-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        /* Style cho tiêu đề công việc */
        .card-block-info h6 {
            margin: 0;
            padding: 0;
        }

        .card-block-info h6 a {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-decoration: none;
        }

        .card-block-info h6 a:hover {
            color: #0d6efd;
        }

        .name-job {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .name-job:hover {
            color: #0d6efd;
        }

        /* Đảm bảo container giữ đúng width */
        .right-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            max-width: 70%;
        }

        .card-grid-2-image-left {
            padding: 10px 20px 15px 20px;
            display: flex;
            align-items: center;
            position: relative;
            width: 100%;
        }

        .image-box {
            flex-shrink: 0;
        }

        .right-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            max-width: 70%;
        }

        .location-small {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;

            height: 42px;
            line-height: 20px;
        }

        .card-grid-2 .label-jobbox {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        /* Styles for filter responsive */
        @media (max-width: 991px) {
            #advancedFilter {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: white;
                z-index: 1050;
                overflow-y: auto;
                padding: 20px;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            #advancedFilter.show {
                transform: translateX(0);
            }

            .filter-toggle .btn {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 10px;
                border-radius: 8px;
                font-weight: 500;
            }

            /* Add close button */
            #advancedFilter::before {
                content: '×';
                position: absolute;
                top: 10px;
                right: 20px;
                font-size: 30px;
                cursor: pointer;
                z-index: 1051;
            }
        }

        /* Optimize for tablets */
        @media (min-width: 768px) and (max-width: 991px) {
            #advancedFilter {
                width: 400px;
                right: auto;
            }
        }

        /* Mobile specific styles */
        @media (max-width: 767px) {
            .mobile-job-card {
                background: #fff;
                padding: 12px;
                margin-bottom: 10px;
                border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .mobile-job-content {
                display: grid;
                grid-template-columns: 80px 1fr;
                gap: 12px;
                position: relative;
            }

            /* Logo styling */
            .company-logo {
                width: 80px;
                height: 80px;
                flex-shrink: 0;
                border-radius: 8px;
                overflow: hidden;
                background: #fff;
                border: 1px solid #eee;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .company-logo img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 8px;
            }

            /* Job info styling */
            .job-info {
                flex: 1;
                min-width: 0;
                padding-right: 25px;
            }

            .job-title {
                font-size: 15px;
                font-weight: 600;
                margin: 0 0 4px 0;
                line-height: 1.3;
            }

            .job-title a {
                color: #333;
                text-decoration: none;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .company-name {
                font-size: 13px;
                color: #666;
                margin-bottom: 8px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .job-details {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .salary,
            .location {
                background: #f1f2f4;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 13px;
                color: #05264E;
                display: inline-flex;
                align-items: center;
            }

            .salary:after {
                display: none;
            }

            /* Save button styling */
            .save-job {
                position: absolute;
                top: 0;
                right: 0;
            }

            .save-button {
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
            }

            .save-button i {
                font-size: 20px;
                color: #666;
            }

            /* Hide desktop elements */
            .mobile-job-card .description,
            .mobile-job-card .mt-30,
            .mobile-job-card .btn-apply-now {
                display: none;
            }
        }

        /* Utility classes for responsive display */
        @media (max-width: 767px) {
            .d-md-flex {
                display: none !important;
            }

            .d-md-none {
                display: block !important;
            }
        }

        @media (min-width: 768px) {
            .d-md-flex {
                display: flex !important;
            }
        }

        .box-filters-job .dropdown-menu[data-bs-popper] {
            right: unset !important;
        }

        /* Mobile Filter Modal Styling */
        #mobileFilterModal .modal-content {
            background: #f8f9fa;
        }

        #mobileFilterModal .modal-header {
            background: white;
            padding: 16px;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        #mobileFilterModal .modal-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .mobile-filter-wrapper {
            height: calc(100vh - 140px);
            overflow-y: auto;
            padding-bottom: 80px;
        }

        .filter-section {
            background: white;
            margin-bottom: 8px;
        }

        .filter-header {
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s;
            border-bottom: 1px solid #f1f2f4;
        }

        .filter-header:active {
            background: #f8f9fa;
        }

        .filter-header i {
            font-size: 20px;
            color: #1967d2;
        }

        .filter-header span {
            font-size: 15px;
            font-weight: 500;
            color: #333;
        }

        .filter-content {
            padding: 16px;
        }

        /* Checkbox styling */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            background: #f8f9fa;
            border-radius: 8px;
            cursor: pointer;
            margin: 0;
            transition: all 0.2s;
            border: 1px solid #eee;
            position: relative;
        }

        .custom-checkbox:active {
            transform: scale(0.98);
        }

        .custom-checkbox input {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            border-color: #1967d2;
            border-radius: 4px;
        }

        .custom-checkbox input:checked {
            background-color: #1967d2;
            border-color: #1967d2;
        }

        .checkbox-label {
            flex: 1;
            font-size: 14px;
            color: #333;
            margin-right: 8px;
        }

        .checkbox-count {
            background: #e8f2ff;
            color: #1967d2;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            min-width: 45px;
            text-align: center;
        }

        /* Select styling */
        .form-select {
            border: 1px solid #e0e6ed;
            padding: 12px 16px;
            border-radius: 8px;
            width: 100%;
            font-size: 14px;
            background-color: #f8f9fa;
            color: #333;
            height: 48px;
        }

        .form-select:focus {
            border-color: #1967d2;
            box-shadow: 0 0 0 3px rgba(25, 103, 210, 0.15);
        }

        /* Radio button styling */
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .radio-group .custom-checkbox {
            background: #f8f9fa;
        }

        .radio-group input[type="radio"] {
            border-radius: 50%;
        }

        /* Footer styling */
        .modal-footer {
            background: white;
            border-top: 1px solid #eee;
            padding: 16px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1020;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
        }

        .modal-footer .btn {
            height: 48px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-outline-primary {
            border: 1px solid #1967d2;
            color: #1967d2;
        }

        .btn-outline-primary:active {
            background: #e8f2ff;
        }

        .btn-primary {
            background: #1967d2;
            border: none;
        }

        .btn-primary:active {
            background: #165cbd;
        }

        /* Filter count badge */
        .filter-count {
            background: #e8f2ff;
            color: #1967d2;
            border-radius: 20px;
            min-width: 24px;
            height: 24px;
            padding: 0 8px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Collapse animation */
        .collapse {
            transition: all 0.2s ease-out;
        }

        /* Scrollbar styling */
        .mobile-filter-wrapper::-webkit-scrollbar {
            width: 6px;
        }

        .mobile-filter-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .mobile-filter-wrapper::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }

        /* Bottom filter button */
        .mobile-filter-button {
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            background: white;
            z-index: 1040;
            padding: 12px !important;
        }

        .mobile-filter-button .btn {
            height: 48px;
            font-size: 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .mobile-filter-button i {
            font-size: 18px;
        }

        /* Button-style checkbox group */
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 8px;
        }

        .custom-checkbox {
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .custom-checkbox input[type="checkbox"],
        .custom-checkbox input[type="radio"] {
            display: none;
        }

        .checkbox-label {
            display: inline-block;
            padding: 8px 16px;
            background: #f0f4ff;
            border-radius: 20px;
            color: #3C65F5;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid #e0e7ff;
            margin: 0;
        }

        .checkbox-label:hover {
            background: #e5ebff;
        }

        .custom-checkbox input:checked + .checkbox-label {
            background: #3C65F5;
            border-color: #3C65F5;
            color: white;
        }

        .checkbox-count {
            display: none; /* Ẩn badge số lượng */
        }

        /* Filter section styling */
        .filter-section {
            background: white;
            border-radius: 12px;
            margin-bottom: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .filter-header {
            padding: 16px;
            border-bottom: 1px solid #eef1ff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .filter-header span {
            color: #333;
            font-size: 15px;
            font-weight: 600;
        }

        .filter-header i {
            color: #3C65F5;
            font-size: 18px;
        }

        .filter-content {
            padding: 12px 8px;
            background: #fafbff;
        }

        /* Modal styling */
        #mobileFilterModal .modal-content {
            background: #f8faff;
        }

        #mobileFilterModal .modal-header {
            background: white;
            border-bottom: 1px solid #eef1ff;
            padding: 16px;
        }

        #mobileFilterModal .modal-title {
            color: #333;
            font-size: 18px;
            font-weight: 600;
        }

        /* Footer buttons */
        .modal-footer {
            background: white;
            border-top: 1px solid #eef1ff;
            padding: 16px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1020;
            box-shadow: 0 -2px 10px rgba(60, 101, 245, 0.08);
        }

        .btn-outline-primary {
            border: 1px solid #3C65F5;
            color: #3C65F5;
            background: white;
        }

        .btn-outline-primary:hover {
            background: #f0f4ff;
        }

        .btn-primary {
            background: #3C65F5;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: #3558d6;
        }

        /* Mobile filter button */
        .mobile-filter-button {
            box-shadow: 0 -2px 10px rgba(60, 101, 245, 0.1);
        }

        .mobile-filter-button .btn {
            background: #3C65F5;
            color: white;
        }

        .filter-count {
            background: white;
            color: #3C65F5;
            border-radius: 20px;
            min-width: 24px;
            height: 24px;
            padding: 0 8px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Scrollbar styling */
        .mobile-filter-wrapper::-webkit-scrollbar {
            width: 6px;
        }

        .mobile-filter-wrapper::-webkit-scrollbar-track {
            background: #f0f4ff;
        }

        .mobile-filter-wrapper::-webkit-scrollbar-thumb {
            background: #3C65F5;
            border-radius: 3px;
        }

        /* Animation */
        .collapse {
            transition: all 0.2s ease-out;
        }

        /* Select styling */
        .form-select {
            border: 1px solid #e0e7ff;
            padding: 12px 16px;
            border-radius: 8px;
            width: 100%;
            font-size: 14px;
            background-color: white;
            color: #333;
            height: 48px;
        }

        .form-select:focus {
            border-color: #3C65F5;
            box-shadow: 0 0 0 3px rgba(60, 101, 245, 0.15);
        }

        /* Nút filter cho mobile */
        .btn-filter-mobile {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f4ff;
            border: 1px solid #e0e7ff;
            border-radius: 8px;
            padding: 8px 12px;
            color: #3C65F5;
            position: relative;
        }

        .btn-filter-mobile i {
            font-size: 18px;
        }

        .btn-filter-mobile .filter-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #3C65F5;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
        }
    </style>

    @push('script')
        <script>
            // Khởi tạo object lưu trữ tạm thời các filter cho mobile
            let tempFilters = {
                locations: '',
                categories: [],
                salaries: [],
                experiences: [],
                job_types: [],
                posted_time: '',
                keywords: []
            };

            document.addEventListener('DOMContentLoaded', function () {
                // Xử lý cho desktop filters
                document.querySelectorAll('.desktop-filter').forEach(filter => {
                    filter.addEventListener('change', function () {
                        const url = new URL(window.location.href);
                        const params = new URLSearchParams(url.search);

                        if (this.type === 'checkbox') {
                            const paramName = this.name;
                            if (this.checked) {
                                params.append(paramName, this.value);
                            } else {
                                const values = params.getAll(paramName).filter(v => v !== this.value);
                                params.delete(paramName);
                                values.forEach(v => params.append(paramName, v));
                            }
                        } else if (this.type === 'select-one') {
                            // Xử lý cho select
                            if (this.value) {
                                params.set(this.name, this.value);
                            } else {
                                params.delete(this.name);
                            }
                        }

                        url.search = params.toString();
                        window.location.href = url.toString();
                    });
                });

                // Xử lý cho mobile filters
                document.querySelectorAll('.mobile-filter').forEach(filter => {
                    filter.addEventListener('change', function (e) {
                        e.stopPropagation();

                        if (this.type === 'checkbox') {
                            const name = this.name.replace('[]', '');
                            if (this.checked) {
                                if (!tempFilters[name].includes(this.value)) {
                                    tempFilters[name].push(this.value);
                                }
                            } else {
                                tempFilters[name] = tempFilters[name].filter(id => id !== this.value);
                            }
                        } else if (this.type === 'select-one') {
                            // Xử lý cho select
                            tempFilters[this.name] = this.value;
                        }

                        updateFilterCount();
                    });
                });

                // Khởi tạo tempFilters từ URL hiện tại
                const urlParams = new URLSearchParams(window.location.search);
                tempFilters.locations = urlParams.get('locations') || '';
                tempFilters.categories = urlParams.getAll('categories[]');
                tempFilters.salaries = urlParams.getAll('salaries[]');
                tempFilters.experiences = urlParams.getAll('experiences[]');
                tempFilters.job_types = urlParams.getAll('job_types[]');
                tempFilters.posted_time = urlParams.get('posted_time') || '';
                tempFilters.keywords = urlParams.getAll('keywords[]');

                updateFilterCount();
            });

            function updateFilterCount() {
                const filterCount = document.querySelector('.filter-count');
                let count = 0;

                if (tempFilters.locations) count++;
                count += tempFilters.categories.length;
                count += tempFilters.salaries.length;
                count += tempFilters.experiences.length;
                count += tempFilters.job_types.length;
                if (tempFilters.posted_time) count++;
                count += tempFilters.keywords.length;

                if (count > 0) {
                    filterCount.textContent = count;
                    filterCount.classList.add('active');
                } else {
                    filterCount.classList.remove('active');
                }
            }

            function resetTempFilters() {
                tempFilters = {
                    locations: '',
                    categories: [],
                    salaries: [],
                    experiences: [],
                    job_types: [],
                    posted_time: '',
                    keywords: []
                };

                // Reset UI
                document.getElementById('mobile-location-select').value = '';
                document.querySelectorAll('.mobile-filter[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
                document.querySelectorAll('.mobile-filter[type="radio"]').forEach(radio => {
                    radio.checked = false;
                });

                updateFilterCount();
            }

            function applyFilters() {
                const url = new URL(window.location.href);
                const params = new URLSearchParams();

                // Xử lý locations
                if (tempFilters.locations) {
                    params.append('locations', tempFilters.locations);
                }

                tempFilters.categories.forEach(category => {
                    params.append('categories[]', category);
                });

                tempFilters.salaries.forEach(salary => {
                    params.append('salaries[]', salary);
                });

                tempFilters.experiences.forEach(experience => {
                    params.append('experiences[]', experience);
                });

                tempFilters.job_types.forEach(jobType => {
                    params.append('job_types[]', jobType);
                });

                if (tempFilters.posted_time) {
                    params.append('posted_time', tempFilters.posted_time);
                }

                tempFilters.keywords.forEach(keyword => {
                    params.append('keywords[]', keyword);
                });

                url.search = params.toString();
                window.location.href = url.toString();
            }

            // Xử lý sắp xếp
            document.querySelectorAll('.dropdown-sort .dropdown-item').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();

                    const sortBy = this.dataset.sortBy;
                    const sortOrder = this.dataset.sortOrder;
                    const perPage = this.dataset.perPage;

                    const url = new URL(window.location.href);
                    const params = new URLSearchParams(url.search);

                    // Cập nhật params
                    params.set('sort_by', sortBy);
                    params.set('sort_order', sortOrder);
                    if (perPage) {
                        params.set('per_page', perPage);
                    }

                    // Cập nhật URL và reload trang
                    url.search = params.toString();
                    window.location.href = url.toString();
                });
            });

            // Xử lý số lượng hiển thị
            document.querySelectorAll('[data-per-page]').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();

                    const perPage = this.dataset.perPage;
                    const sortBy = this.dataset.sortBy;
                    const sortOrder = this.dataset.sortOrder;

                    const url = new URL(window.location.href);
                    const params = new URLSearchParams(url.search);

                    // Cập nhật params
                    params.set('per_page', perPage);
                    if (sortBy && sortOrder) {
                        params.set('sort_by', sortBy);
                        params.set('sort_order', sortOrder);
                    }

                    // Cập nhật URL và reload trang
                    url.search = params.toString();
                    window.location.href = url.toString();
                });
            });

            $('#location-select').on('change', function () {
                const selectedLocation = $(this).val();
                console.log('Selected location:', selectedLocation);

                // Nếu cần cập nhật URL:
                const url = new URL(window.location.href);
                const params = new URLSearchParams(url.search);

                if (selectedLocation) {
                    params.set('locations', selectedLocation);
                } else {
                    params.delete('locations');
                }

                url.search = params.toString();
                window.location.href = url.toString();
            });


            $(document).ready(function () {
                $('#location-select').select2({
                    placeholder: 'Chọn địa điểm', // Placeholder cho ô input
                    allowClear: true, // Cho phép xóa lựa chọn
                    width: '100%' // Căn chỉnh cho phù hợp với bố cục
                });
            });
        </script>
    @endpush
    <!-- Mobile Filter Modal -->
    <div class="modal fade" id="mobileFilterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bộ lọc tìm kiếm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div>
                    <div class="mobile-filter-wrapper">
                        <!-- Địa điểm -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#locationFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-marker"></i>
                                    <span>Địa điểm</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="locationFilter" class="collapse show">
                                <div class="filter-content">
                                    <select id="mobile-location-select" class="form-select mobile-filter"
                                            name="locations">
                                        <option value="">Tất cả địa điểm</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location }}"
                                                {{ request('locations') == $location ? 'selected' : '' }}>
                                                {{ $location }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Danh mục -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#categoryFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-briefcase"></i>
                                    <span>Danh mục</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="categoryFilter" class="collapse">
                                <div class="filter-content">
                                    <div class="checkbox-group">
                                        @foreach($categories as $category)
                                            <label class="custom-checkbox">
                                                <input type="checkbox"
                                                       name="categories[]"
                                                       class="mobile-filter"
                                                       value="{{ $category->id }}"
                                                       data-name="{{ $category->name }}"
                                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                                <span class="checkbox-label">{{ $category->name }}</span>
                                                <span class="checkbox-count">{{ $category->job_posts_count }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mức lương -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#salaryFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-money"></i>
                                    <span>Mức lương</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="salaryFilter" class="collapse">
                                <div class="filter-content">
                                    <div class="checkbox-group">
                                        @foreach($salaries as $salary)
                                            <label class="custom-checkbox">
                                                <input type="checkbox"
                                                       name="salaries[]"
                                                       class="mobile-filter"
                                                       value="{{ $salary->id }}"
                                                       data-name="{{ $salary->name }}"
                                                    {{ in_array($salary->id, request('salaries', [])) ? 'checked' : '' }}>
                                                <span class="checkbox-label">{{ $salary->name }}</span>
                                                <span class="checkbox-count">{{ $salary->job_posts_count }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kinh nghiệm -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#experienceFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-briefcase"></i>
                                    <span>Kinh nghiệm</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="experienceFilter" class="collapse">
                                <div class="filter-content">
                                    <div class="checkbox-group">
                                        @foreach($experiences as $experience)
                                            <label class="custom-checkbox">
                                                <input type="checkbox"
                                                       name="experiences[]"
                                                       class="mobile-filter"
                                                       value="{{ $experience->id }}"
                                                       data-name="{{ $experience->name }}"
                                                    {{ in_array($experience->id, request('experiences', [])) ? 'checked' : '' }}>
                                                <span class="checkbox-label">{{ $experience->name }}</span>
                                                <span class="checkbox-count">{{ $experience->job_count }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Loại công việc -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#jobTypeFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-time-fast"></i>
                                    <span>Loại công việc</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="jobTypeFilter" class="collapse">
                                <div class="filter-content">
                                    <div class="checkbox-group">
                                        @foreach($jobTypes as $jobType)
                                            <label class="custom-checkbox">
                                                <input type="checkbox"
                                                       name="job_types[]"
                                                       class="mobile-filter"
                                                       value="{{ $jobType->id }}"
                                                       data-name="{{ $jobType->name }}"
                                                    {{ in_array($jobType->id, request('job_types', [])) ? 'checked' : '' }}>
                                                <span class="checkbox-label">{{ $jobType->name }}</span>
                                                <span class="checkbox-count">{{ $jobType->job_count }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thời gian đăng -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#postedTimeFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-calendar"></i>
                                    <span>Thời gian đăng</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="postedTimeFilter" class="collapse">
                                <div class="filter-content">
                                    <div class="radio-group">
                                        <label class="custom-checkbox">
                                            <input type="radio"
                                                   name="posted_time"
                                                   class="mobile-filter"
                                                   value="1"
                                                {{ request('posted_time') == '1' ? 'checked' : '' }}>
                                            <span class="checkbox-label">24 giờ qua</span>
                                            <span class="checkbox-count">{{ $jobsCount1Day }}</span>
                                        </label>
                                        <label class="custom-checkbox">
                                            <input type="radio"
                                                   name="posted_time"
                                                   class="mobile-filter"
                                                   value="7"
                                                {{ request('posted_time') == '7' ? 'checked' : '' }}>
                                            <span class="checkbox-label">7 ngày qua</span>
                                            <span class="checkbox-count">{{ $jobsCount7Days }}</span>
                                        </label>
                                        <label class="custom-checkbox">
                                            <input type="radio"
                                                   name="posted_time"
                                                   class="mobile-filter"
                                                   value="30"
                                                {{ request('posted_time') == '30' ? 'checked' : '' }}>
                                            <span class="checkbox-label">30 ngày qua</span>
                                            <span class="checkbox-count">{{ $jobsCount30Days }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row g-2 w-100">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="resetTempFilters()">
                                Đặt lại
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100" onclick="applyFilters()">
                                Áp dụng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


