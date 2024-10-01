@extends('client.layouts.master')
@section('title', 'Nhà tuyển dụng')
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
                        <h3 class="wow animate__animated animate__fadeInUp">Hiện có<span class="color-brand-2"> 22 Công
                            ty</span></h3>
                        <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                             data-wow-delay=".1s">Tìm kiếm công việc phù hợp với bạn
                        </div>

                        <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            <form>
                                <div class="box-industry">
                                    <select class="form-input mr-10 select-active input-industry">
                                        <option value="0">Ngành</option>
                                        <option value="1">Software</option>
                                        <option value="2">Finance</option>
                                        <option value="3">Recruting</option>
                                        <option value="4">Management</option>
                                        <option value="5">Advertising</option>
                                        <option value="6">Development</option>
                                    </select>
                                </div>
                                <select class="form-input mr-10 select-active">
                                    <option value="">Vị trí</option>
                                    <option value="AX">Aland Islands</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="PW">Belau</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo (Brazzaville)</option>
                                    <option value="CD">Congo (Kinshasa)</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Cura&Ccedil;ao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao S.A.R., China</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="KP">North Korea</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PS">Palestinian Territory</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="QA">Qatar</option>
                                    <option value="IE">Republic of Ireland</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                    <option value="BL">Saint Barth&eacute;lemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="SX">Saint Martin (Dutch part)</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="SM">San Marino</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom (UK)</option>
                                    <option value="US">USA (US)</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="WS">Western Samoa</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                <div class="box-industry">
                                    <select class="form-input mr-10 select-active input-industry">
                                        <option value="0">Mức lương</option>
                                        <option value="1">Software</option>
                                        <option value="2">Finance</option>
                                        <option value="3">Recruting</option>
                                        <option value="4">Management</option>
                                        <option value="5">Advertising</option>
                                        <option value="6">Development</option>
                                    </select>
                                </div>
                                <div class="box-industry">
                                    <select class="form-input mr-10 select-active input-industry">
                                        <option value="0">Kinh nghiệm</option>
                                        <option value="1">Software</option>
                                        <option value="2">Finance</option>
                                        <option value="3">Recruting</option>
                                        <option value="4">Management</option>
                                        <option value="5">Advertising</option>
                                        <option value="6">Development</option>
                                    </select>
                                </div>
                                <input class="form-input input-keysearch mr-10" type="text"
                                       placeholder="Từ khóa... ">
                                <button class="btn btn-default btn-find font-sm">Tìm kiếm</button>
                            </form>
                        </div>
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
                                                                <a class="dropdown-item {{ $perPage == 5 ? 'active' : '' }}"
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
                                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10
                                                    </option>
                                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20
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
                                                class="form-control form-icons">
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
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <h5 class="medium-heading mb-25">Năm thành lập</h5>
                                    <div class="form-group mb-20">
                                        <ul class="list-checkbox">
                                            @foreach($years as $year)
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
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="medium-heading mb-10">Quy mô công ty</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach($sizes as $size)
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
    </script>
@endsection
