@extends('client.layouts.master')
@section('title', 'Hồ sơ ứng viên'. ' - '. config('app.name'))
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
                                    <div class="d-flex align-items-center justify-content-between d-lg-block">
                                        <!-- Mobile Controls -->
                                        <div class="d-flex d-lg-none align-items-center gap-2 w-100">
                                            <!-- Filter Button -->
                                            <button class="btn btn-filter-mobile" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#mobileFilterModal">
                                                <i class="fi-rr-filter"></i>
                                                <div class="filter-count"></div>
                                            </button>

                                            <!-- Display Per Page -->
                                            <div class="box-border flex-grow-1">
                                                <span class="text-sortby">Hiển thị:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static">
                                                        <span>{{ $perPage }}</span>
                                                        <i class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort">
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 3 ? 'active' : '' }}"
                                                               href="#" data-per-page="3">3</a></li>
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 12 ? 'active' : '' }}"
                                                               href="#" data-per-page="12">12</a></li>
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 18 ? 'active' : '' }}"
                                                               href="#" data-per-page="18">18</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Sort By -->
                                            <div class="box-border flex-grow-1">
                                                <span class="text-sortby">Sắp xếp:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-bs-display="static">
                                                        <span>
                                                            @if(request('sortBy') == 'oldest')
                                                                Cũ nhất
                                                            @else
                                                                Mới nhất
                                                            @endif
                                                        </span>
                                                        <i class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort2">
                                                        <li>
                                                            <a class="dropdown-item {{ request('sortBy') == 'newest' || !request('sortBy') ? 'active' : '' }}"
                                                               href="#"
                                                               data-per-page="{{ $perPage }}"
                                                               data-sort-by="newest">
                                                                Mới nhất
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ request('sortBy') == 'oldest' ? 'active' : '' }}"
                                                               href="#"
                                                               data-per-page="{{ $perPage }}"
                                                               data-sort-by="oldest">
                                                                Cũ nhất
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Desktop Text -->
                                        <span class="text-small text-showing d-none d-lg-block">
                                            Hiển thị <strong>{{ $candidates->firstItem() }}-{{ $candidates->lastItem() }}</strong>
                                            của <strong>{{ $candidates->total() }}</strong> ứng viên
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15 d-none d-lg-block">
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
                                                        <li><a class="dropdown-item {{ $perPage == 3 ? 'active' : '' }}"
                                                               href="#"
                                                               onclick="document.querySelector('select[name=perPage]').value='3'; this.closest('form').submit();">3</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 12 ? 'active' : '' }}"
                                                               href="#"
                                                               onclick="document.querySelector('select[name=perPage]').value='12'; this.closest('form').submit();">12</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ $perPage == 18 ? 'active' : '' }}"
                                                               href="#"
                                                               onclick="document.querySelector('select[name=perPage]').value='18'; this.closest('form').submit();">18</a>
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
                                            {{--                                            <div class="box-view-type">--}}
                                            {{--                                                <a class='view-type' href='#'><img--}}
                                            {{--                                                        src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}"--}}
                                            {{--                                                        alt="jobBox"></a>--}}
                                            {{--                                                <a class='view-type' href='#'><img--}}
                                            {{--                                                        src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}"--}}
                                            {{--                                                        alt="jobBox"></a>--}}
                                            {{--                                            </div>--}}
                                            <select name="perPage" class="d-none">
                                                <option value="3" {{ $perPage == 3 ? 'selected' : '' }}>3</option>
                                                <option value="12" {{ $perPage == 12 ? 'selected' : '' }}>12</option>
                                                <option value="18" {{ $perPage == 18 ? 'selected' : '' }}>18</option>
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
                            @if(isset($candidates) && !$candidates->isEmpty())
                                @foreach($candidates as $candidate)
                                    @if(!isset($candidate->user))
                                        @continue
                                    @endif
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="card-grid-2-image-rd online">
                                                    <a href='{{ route('client.candidate.detail', $candidate->slug) }}'>
                                                        <figure>

                                                            @php
                                                                $avatar_url = getStorageImageUrl($candidate->user->avatar_url, config('image.avatar'));

                                                                $candidate_name = $candidate->user->name
                                                            @endphp


                                                            <img alt="{{ $candidate_name }}" src="{{ $avatar_url }}">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="card-profile pt-10">
                                                    <a href='{{ route('client.candidate.detail', $candidate->slug) }}'>
                                                        <h5>{{ $candidate_name }}</h5>
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
                                                <div
                                                    class="employers-info align-items-center justify-content-center mt-15">
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
                            @else
                                <div class="no-results">
                                    <h6>Không có kết quả tìm kiếm phù hợp</h6>
                                </div>
                            @endif
                        </div>
                        <div class="paginations">
                            {{ $candidates->appends(['sortBy' => $sortBy, 'perPage' => $perPage])->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 d-none d-lg-block">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <form id="desktopFilterForm" method="GET" action="{{ route('client.candidate.hot') }}">
                                    <div class="filter-block head-border mb-30">
                                        <h5>Bộ lọc nâng cao
                                            <a class="link-reset" href="{{ route('client.candidate.hot') }}">Làm mới</a>
                                        </h5>
                                    </div>

                                    <!-- Filter địa điểm -->
                                    <div class="filter-block mb-30">
                                        <div class="form-group select-style select-style-icon">
                                            <select id="location-select" name="locations"
                                                    class="form-control form-icons desktop-filter">
                                                <option value="">Chọn địa điểm</option>
                                                @foreach($locations as $location)
                                                    <option
                                                        value="{{ $location }}" {{ request('locations') == $location ? 'selected' : '' }}>
                                                        {{ $location }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="fi-rr-marker"></i>
                                        </div>
                                    </div>

                                    <!-- Filter chuyên ngành -->
                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-10">Chuyên Ngành</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($majors as $major)
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" class="desktop-filter"
                                                                   name="majors[]"
                                                                   value="{{ $major->id }}"
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

                                    <!-- Filter mức lương -->
                                    <div class="filter-block mb-30">
                                        <h5 class="medium-heading mb-10">Khoảng Lương</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                @foreach($salaries as $salary)
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="salaries[]"
                                                                   class="desktop-filter"
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

                                    <!-- Hidden inputs for sorting and pagination -->
                                    <input type="hidden" name="perPage" value="{{ $perPage }}">
                                    <input type="hidden" name="sortBy" value="{{ $sortBy }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Thêm modal filter cho mobile -->
    <div class="modal fade" id="mobileFilterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bộ lọc</h5>
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
                            <div id="locationFilter" class="collapse">
                                <div class="filter-content">
                                    <select name="locations" class="form-control mobile-filter select-active">
                                        <option value="">Chọn địa điểm</option>
                                        @foreach($locations as $location)
                                            <option
                                                value="{{ $location }}" {{ request('locations') == $location ? 'selected' : '' }}>
                                                {{ $location }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Chuyên ngành -->
                        <div class="filter-section">
                            <div class="filter-header" data-bs-toggle="collapse" data-bs-target="#majorFilter">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fi-rr-briefcase"></i>
                                    <span>Chuyên ngành</span>
                                </div>
                                <i class="fi-rr-angle-small-down"></i>
                            </div>
                            <div id="majorFilter" class="collapse">
                                <div class="filter-content">
                                    <div class="checkbox-group">
                                        @foreach($majors as $major)
                                            @if(!empty($major))
                                                <label class="custom-checkbox">
                                                    <input type="checkbox"
                                                           name="majors[]"
                                                           class="mobile-filter"
                                                           value="{{ $major->id }}"
                                                           data-name="{{ $major->name }}"
                                                        {{ in_array($major->id, request('majors', [])) ? 'checked' : '' }}>
                                                    <span class="checkbox-label">{{ $major->name }}</span>
                                                    <span class="checkbox-count">{{ $major->candidate_count }}</span>
                                                </label>
                                            @endif
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
                                            @if(!empty($salary))
                                                <label class="custom-checkbox">
                                                    <input type="checkbox"
                                                           name="salaries[]"
                                                           class="mobile-filter"
                                                           value="{{ $salary->id }}"
                                                           data-name="{{ $salary->name }}"
                                                        {{ in_array($salary->id, request('salaries', [])) ? 'checked' : '' }}>
                                                    <span class="checkbox-label">{{ $salary->name }}</span>
                                                    <span class="checkbox-count">{{ $salary->candidate_count }}</span>
                                                </label>
                                            @endif
                                        @endforeach
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

        /* Mobile Filter Styles */
        .mobile-filter-wrapper {
            padding: 16px;
        }

        .filter-section {
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 16px;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            cursor: pointer;
        }

        .filter-content {
            padding: 12px 0;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0;
            cursor: pointer;
        }

        .checkbox-label {
            flex-grow: 1;
            margin-left: 8px;
        }

        .checkbox-count {
            color: #6c757d;
            font-size: 14px;
        }

        .btn-filter-mobile {
            position: relative;
            padding: 8px;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .filter-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #3498db;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            display: none;
        }

        .filter-count.show {
            display: flex;
        }

        /* Mobile controls styles */
        @media (max-width: 991px) {
            .btn-filter-mobile {
                padding: 8px 12px;
                background: #fff;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                min-width: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #333;
            }

            .box-border {
                background: #fff;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                padding: 8px 12px;
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .dropdown-sort {
                flex-grow: 1;
            }

            .dropdown-toggle {
                padding: 0;
                font-size: 14px;
                background: transparent;
                border: none;
                width: 100%;
                text-align: left;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .dropdown-toggle::after {
                display: none;
            }

            .text-sortby {
                color: #6c757d;
                font-size: 12px;
                white-space: nowrap;
            }

            .dropdown-menu {
                width: 100%;
                padding: 8px 0;
                margin-top: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .dropdown-item {
                font-size: 14px;
                padding: 8px 16px;
                color: #333;
            }

            .dropdown-item.active {
                background-color: #f8f9fa;
                color: #3498db;
                font-weight: 500;
            }

            .dropdown-item:active {
                background-color: #e9ecef;
            }

            .fi-rr-angle-small-down {
                font-size: 12px;
                color: #6c757d;
            }

            /* Cải thiện khoảng cách và căn chỉnh */
            .d-flex.d-lg-none {
                padding: 12px 0;
                border-bottom: 1px solid #dee2e6;
                margin-bottom: 16px;
            }

            /* Hiệu ứng hover cho các nút */
            .btn-filter-mobile:hover,
            .box-border:hover {
                border-color: #3498db;
            }

            /* Làm cho dropdown menu có animation mượt mà */
            .dropdown-menu {
                transition: all 0.2s ease-in-out;
                transform-origin: top;
            }

            .dropdown-menu.show {
                animation: dropdownAnimation 0.2s ease-in-out;
            }

            @keyframes dropdownAnimation {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }
    </style>
@endpush
@push('script')
    <script>
        // Khởi tạo object lưu trữ tạm thời các filter cho mobile
        let tempFilters = {
            locations: '',
            majors: [],
            salaries: [],
            educations: [],
            experiences: []
        };

        document.addEventListener('DOMContentLoaded', function () {
            // Xử lý cho desktop filters
            document.querySelectorAll('.desktop-filter').forEach(filter => {
                filter.addEventListener('change', function () {
                    const url = new URL(window.location.href);
                    const params = new URLSearchParams(url.search);

                    if (this.type === 'checkbox') {
                        const paramName = this.name.replace('[]', '');
                        params.delete(paramName);

                        document.querySelectorAll(`input[name="${this.name}"]:checked`).forEach(checkbox => {
                            params.append(paramName, checkbox.value);
                        });
                    } else {
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

            // Khởi tạo tempFilters từ URL hiện tại
            const urlParams = new URLSearchParams(window.location.search);
            for (const [key, value] of urlParams.entries()) {
                if (key.endsWith('[]')) {
                    const cleanKey = key.replace('[]', '');
                    if (!tempFilters[cleanKey]) {
                        tempFilters[cleanKey] = [];
                    }
                    tempFilters[cleanKey].push(value);
                } else {
                    tempFilters[key] = value;
                }
            }

            // Cập nhật UI mobile filters từ tempFilters
            updateMobileFiltersUI();
            updateFilterCount();

            // Xử lý cho mobile filters
            document.querySelectorAll('.mobile-filter').forEach(filter => {
                filter.addEventListener('change', function () {
                    const name = this.name.replace('[]', '');

                    if (this.type === 'checkbox') {
                        if (!tempFilters[name]) {
                            tempFilters[name] = [];
                        }

                        if (this.checked) {
                            tempFilters[name].push(this.value);
                        } else {
                            tempFilters[name] = tempFilters[name].filter(value => value !== this.value);
                        }
                    } else {
                        tempFilters[name] = this.value;
                    }

                    updateFilterCount();
                });
            });
        });

        // Cập nhật số lượng filter đã chọn
        function updateFilterCount() {
            let count = 0;

            for (const key in tempFilters) {
                if (Array.isArray(tempFilters[key])) {
                    count += tempFilters[key].length;
                } else if (tempFilters[key]) {
                    count++;
                }
            }

            const filterCount = document.querySelector('.filter-count');
            if (count > 0) {
                filterCount.textContent = count;
                filterCount.style.display = 'flex';
            } else {
                filterCount.style.display = 'none';
            }
        }

        // Cập nhật UI của mobile filters
        function updateMobileFiltersUI() {
            for (const key in tempFilters) {
                const value = tempFilters[key];

                if (Array.isArray(value)) {
                    value.forEach(val => {
                        const checkbox = document.querySelector(`.mobile-filter[name="${key}[]"][value="${val}"]`);
                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    });
                } else {
                    const input = document.querySelector(`.mobile-filter[name="${key}"]`);
                    if (input) {
                        input.value = value;
                    }
                }
            }
        }

        // Reset tất cả các filter
        function resetTempFilters() {
            tempFilters = {
                locations: '',
                majors: [],
                salaries: [],
                educations: [],
                experiences: []
            };

            document.querySelectorAll('.mobile-filter').forEach(filter => {
                if (filter.type === 'checkbox') {
                    filter.checked = false;
                } else {
                    filter.value = '';
                }
            });

            updateFilterCount();
        }

        // Áp dụng các filter
        function applyFilters() {
            const url = new URL(window.location.href);
            const params = new URLSearchParams();

            for (const key in tempFilters) {
                const value = tempFilters[key];
                if (Array.isArray(value)) {
                    value.forEach(val => {
                        if (val) {
                            params.append(`${key}[]`, val);
                        }
                    });
                } else if (value) {
                    params.append(key, value);
                }
            }

            url.search = params.toString();
            window.location.href = url.toString();
        }

        // Xử lý sự kiện cho các nút hiển thị và sắp xếp
        document.querySelectorAll('[data-per-page]').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();

                const url = new URL(window.location.href);
                const params = new URLSearchParams(url.search);

                params.set('perPage', this.dataset.perPage);
                params.set('sortBy', this.dataset.sortBy);
                params.set('sortOrder', this.dataset.sortOrder);

                url.search = params.toString();
                window.location.href = url.toString();
            });
        });

        // Desktop filter handling
        document.addEventListener('DOMContentLoaded', function () {
            // Handle desktop filters
            document.querySelectorAll('.desktop-filter').forEach(filter => {
                filter.addEventListener('change', function () {
                    document.getElementById('desktopFilterForm').submit();
                });
            });

            // Handle sorting and per page selection for desktop
            document.querySelectorAll('[data-per-page]').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const form = document.getElementById('desktopFilterForm');
                    form.querySelector('input[name="perPage"]').value = this.dataset.perPage;
                    if (this.dataset.sortBy) {
                        form.querySelector('input[name="sortBy"]').value = this.dataset.sortBy;
                    }
                    form.submit();
                });
            });

            // Handle sort by selection
            document.querySelectorAll('[data-sort-by]').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const form = document.getElementById('desktopFilterForm');
                    form.querySelector('input[name="sortBy"]').value = this.dataset.sortBy;
                    form.submit();
                });
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

