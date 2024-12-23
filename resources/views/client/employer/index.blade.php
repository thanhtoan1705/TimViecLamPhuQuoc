@extends('client.layouts.master')
@section('title', 'Công ty tuyển dụng'. ' - '. config('app.name'))
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
                        <h3 class="wow animate__animated animate__fadeInUp">Danh sách công ty đang tuyển dụng</h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Tìm kiếm doanh nghiệp và công việc phù hợp với bạn
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
                                    <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Hiển thị
                                        <strong>{{ $employers->firstItem() }}-{{ $employers->lastItem() }} </strong>trong <strong>{{$employers->total()}} </strong>việc làm</span>
                                    </div>
                                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                        <div class="display-flex2">
                                            <form method="GET" action="{{ route('client.employer.index') }}">
                                                <div class="box-border mr-10">
                                                    <span class="text-sortby">Hiển thị:</span>
                                                    <div class="dropdown dropdown-sort">
                                                        <button class="btn dropdown-toggle" id="dropdownSort"
                                                                type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                                data-bs-display="static">
                                                            <span>{{ $perPage }}</span><i
                                                                class="fi-rr-angle-small-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-light"
                                                            aria-labelledby="dropdownSort">
                                                            <li>
                                                                <a class="dropdown-item {{ $perPage == 3 ? 'active' : '' }}"
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
                                                        <button class="btn dropdown-toggle" id="dropdownSort2"
                                                                type="button"
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
                                                {{--                                                <div class="box-view-type">--}}
                                                {{--                                                    <a class='view-type' href='#'><img--}}
                                                {{--                                                            src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}"--}}
                                                {{--                                                            alt="jobBox"></a>--}}
                                                {{--                                                    <a class='view-type' href='#'><img--}}
                                                {{--                                                            src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}"--}}
                                                {{--                                                            alt="jobBox"></a>--}}
                                                {{--                                                </div>--}}
                                                <select name="perPage" class="d-none">
                                                    <option value="3" {{ $perPage == 3 ? 'selected' : '' }}>3</option>
                                                    <option value="12" {{ $perPage == 12 ? 'selected' : '' }}>12
                                                    </option>
                                                    <option value="18" {{ $perPage == 18 ? 'selected' : '' }}>18
                                                    </option>
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
                                @if($employers && $employers->count() > 0)
                                    @foreach($employers as $employer)
                                        @include('client.employer.employerCard', ['employer' => $employer])
                                    @endforeach
                                @elseif(is_object($employers) && $employers->count() === 0)
                                    <p>Không có nhà tuyển dụng nào phù hợp.</p>
                                @endif
                            </div>
                        </div>
                        {{ $employers->appends(['sortBy' => $sortBy, 'perPage' => $perPage])->links('vendor.pagination.custom') }}
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block head-border mb-30">
                                    <h5>Bộ lọc nâng cao <a class="link-reset"
                                                           href="{{ route('client.employer.index') }}">Làm mới</a></h5>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style select-style-icon">
                                        <select name="location" id="location-select"
                                                class="form-control form-icons select-active">
                                            <option value="">Chọn địa điểm</option>
                                            @foreach($locations as $location)
                                                <option value="{{ sanitizeString($location) }}">{{ $location }}</option>
                                            @endforeach
                                        </select><i class="fi-rr-marker"></i>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-15">Loại công ty</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($companyTypes as $type)
                                                @if(!empty($type))
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="company_types[]"
                                                                   value="{{ $type->company_type }}"
                                                                {{ in_array($type->company_type, request('company_types', [])) ? 'checked' : '' }}>
                                                            <span class="text-small">{{ $type->company_type }}</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="number-item">{{ $type->company_count }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-25">Năm thành lập</h5>
                                    <div class="form-group mb-20">
                                        <ul class="list-checkbox">
                                            @foreach($years as $year)
                                                @if(isset($year))
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="years[]"
                                                                   value="{{ $year->year }}"
                                                                {{ in_array($year->year, request('years', [])) ? 'checked' : '' }}>
                                                            <span class="text-small">{{ $year->year }}</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="number-item">{{ $year->company_count }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Quy mô công ty</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($sizes as $size)
                                                @if(!empty($size))
                                                    <li>
                                                        <label class="cb-container">
                                                            <input type="checkbox" name="sizes[]"
                                                                   value="{{ $size->company_size }}"
                                                                {{ in_array($size->company_size, request('sizes', [])) ? 'checked' : '' }}>
                                                            <span class="text-small">{{ $size->company_size }}</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="number-item">{{ $size->company_count }}</span>
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
        </section>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateFilter(name) {
                document.querySelectorAll(`input[name="${name}"], select[name="${name}"]`).forEach(function (element) {
                    element.addEventListener('change', function () {
                        const url = new URL(window.location.href);
                        const currentParams = new URLSearchParams(url.search);
                        currentParams.delete(name);

                        if (element.type === 'checkbox') {
                            document.querySelectorAll(`input[name="${name}"]:checked`).forEach(function (checkedBox) {
                                currentParams.append(name, checkedBox.value);
                            });
                        } else if (element.tagName === 'SELECT') {
                            const selectedValue = element.value;
                            if (selectedValue) {
                                currentParams.set(name, selectedValue);
                            } else {
                            }
                        }

                        url.search = currentParams.toString();
                        window.location.href = url.toString();
                    });
                });
            }

            updateFilter('location');
            updateFilter('company_types[]');
            updateFilter('years[]');
            updateFilter('sizes[]');
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
@endsection
