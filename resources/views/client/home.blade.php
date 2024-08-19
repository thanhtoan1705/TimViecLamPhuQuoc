@extends('client.layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <main class="main">
        <div class="bg-homepage1"></div>
        <section class="section-box">
            <div class="banner-hero hero-1">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-xl-11 col-lg-12">
                            <div class="block-banner">
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">Cách <span
                                        class="color-brand-2">dễ nhất</span><br class="d-none d-lg-block">để có được
                                    công
                                    việc mới của bạn</h1>
                                <div class="banner-description mt-20 wow animate__animated animate__fadeInUp"
                                     data-wow-delay=".1s">Mỗi tháng, hơn 3 triệu người tìm việc truy cập <br
                                        class="d-none d-lg-block">trang web để tìm việc, tạo ra hơn 140.000 <br
                                        class="d-none d-lg-block">đơn đăng ký mỗi ngày
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
                                <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp"
                                     data-wow-delay=".3s"><strong>Tìm kiếm phổ biến:</strong><a
                                        href="#">Designer</a>, <a href="#">Web</a>, <a
                                        href="#">IOS</a>, <a href="#">Developer</a>, <a
                                        href="#">PHP</a>, <a href="#">Senior</a>, <a
                                        href="#">Engineer</a></div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-12 d-none d-xl-block col-md-6">
                            <div class="banner-imgs">
                                <div class="block-1 shape-1"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/banner1.png') }}">
                                </div>
                                <div class="block-2 shape-2"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/banner2.png') }}">
                                </div>
                                <div class="block-3 shape-3"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/icon-top-banner.png') }}">
                                </div>
                                <div class="block-4 shape-3"><img class="img-responsive" alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/page/homepage1/icon-bottom-banner.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="mt-100"></div>
        <section class="section-box mt-80">
            <div class="section-box wow animate__animated animate__fadeIn">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tìm kiếm bằng danh
                            mục</h2>
                        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm công việc
                            hoàn hảo cho bạn&rsquo; khoảng hơn 800 việc làm mới mỗi ngày</p>
                    </div>
                    <div class="box-swiper mt-50">
                        <div class="swiper-container swiper-group-5 swiper">
                            <div class="swiper-wrapper pb-70 pt-5">
                                @foreach ($employers as $item)
                                    <div class="swiper-slide hover-up">
                                        <a href=''>
                                            <div class="item-logo">
                                                <div class="image-left"><img alt="jobBox" width="50px"
                                                                             src="{{ asset('storage/' . $item->company_logo) }}">
                                                </div>
                                                <div class="text-info-right">
                                                    <h4>
                                                        {{$item->name}}
                                                    </h4>
                                                    <p class="font-xs">{{$item->company_size}}
                                                        <span> {{$item->company_type}}</span></p>
                                                </div>
                                            </div>
                                        </a>
                                        {{--                                        <a href=''>--}}
                                        {{--                                            <div class="item-logo">--}}
                                        {{--                                                <div class="image-left"><img alt="jobBox"--}}
                                        {{--                                                        src="{{ asset('assets/client/imgs/page/homepage1/customer.svg') }}">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="text-info-right">--}}
                                        {{--                                                    <h4>Trợ giúp khách hàng</h4>--}}
                                        {{--                                                    <p class="font-xs">185<span> Công việc có sẵn</span></p>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </a>--}}
                                    </div>
                                @endforeach
                                {{--                                <div class="swiper-slide hover-up"><a href='jobs-grid.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/finance.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Tài chính</h4>--}}
                                {{--                                                <p class="font-xs">168<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a><a href='jobs-list.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/lightning.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Software</h4>--}}
                                {{--                                                <p class="font-xs">1856<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="swiper-slide hover-up"><a href='jobs-grid.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/human.svg') }}"></div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Nguồn nhân lực</h4>--}}
                                {{--                                                <p class="font-xs">165<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a><a href='jobs-grid.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/management.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Sự quản lý</h4>--}}
                                {{--                                                <p class="font-xs">965<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="swiper-slide hover-up"><a href='jobs-list.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/retail.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Sản phẩm bán lẻ</h4>--}}
                                {{--                                                <p class="font-xs">563<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a><a href='jobs-grid.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/security.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Nhà phân tích</h4>--}}
                                {{--                                                <p class="font-xs">254<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="swiper-slide hover-up"><a href='jobs-grid.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/content.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Người viết nội dung</h4>--}}
                                {{--                                                <p class="font-xs">142<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a><a href='jobs-list.html'>--}}
                                {{--                                        <div class="item-logo">--}}
                                {{--                                            <div class="image-left"><img alt="jobBox"--}}
                                {{--                                                    src="{{ asset('assets/client/imgs/page/homepage1/research.svg') }}">--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="text-info-right">--}}
                                {{--                                                <h4>Nghiên cứu</h4>--}}
                                {{--                                                <p class="font-xs">532<span> Công việc có sẵn</span></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section-box mb-30">
            <div class="container">
                <div class="box-we-hiring">
                    <div class="text-1"><span class="text-we-are">Chúng tôi là</span><span class="text-hiring">Ứng
                            tuyển</span></div>
                    <div class="text-2">Hãy cùng nhau&rsquo;s <span class="color-brand-1">làm việc</span> <br> &amp;
                        <span
                            class="color-brand-1">và khám phá</span> cơ hội
                    </div>
                    <div class="text-3">
                        <div class="btn btn-apply btn-apply-icon" data-bs-toggle="modal"
                             data-bs-target="#ModalApplyJobForm">Ứng tuyển ngay
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Công việc trong ngày</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm kiếm và kết
                        nối
                        với ứng viên phù hợp nhanh hơn. </p>
                    <div class="list-tabs mt-40">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="active" id="nav-tab-job-1" href="#tab-job-1" data-bs-toggle="tab"
                                   role="tab" aria-controls="tab-job-1" aria-selected="true"><img
                                        src="{{ asset('assets/client/imgs/page/homepage1/management.svg') }}"
                                        alt="jobBox"> Sự quản lý</a></li>
                            <li><a id="nav-tab-job-2" href="#tab-job-2" data-bs-toggle="tab" role="tab"
                                   aria-controls="tab-job-2" aria-selected="false"><img
                                        src="{{ asset('assets/client/imgs/page/homepage1/marketing.svg') }}"
                                        alt="jobBox"> Marketing &amp; Sale</a></li>
                            <li><a id="nav-tab-job-3" href="#tab-job-3" data-bs-toggle="tab" role="tab"
                                   aria-controls="tab-job-3" aria-selected="false"><img
                                        src="{{ asset('assets/client/imgs/page/homepage1/finance.svg') }}"
                                        alt="jobBox"> Tài chính</a></li>
                            <li><a id="nav-tab-job-4" href="#tab-job-4" data-bs-toggle="tab" role="tab"
                                   aria-controls="tab-job-4" aria-selected="false"><img
                                        src="{{ asset('assets/client/imgs/page/homepage1/human.svg') }}"
                                        alt="jobBox">Nguồn nhân lực</a></li>
                            <li><a id="nav-tab-job-5" href="#tab-job-5" data-bs-toggle="tab" role="tab"
                                   aria-controls="tab-job-5" aria-selected="false"><img
                                        src="{{ asset('assets/client/imgs/page/homepage1/retail.svg') }}" alt="jobBox">
                                    Bán lẻ &amp; Các sản phẩm</a></li>
                            <li><a id="nav-tab-job-6" href="#tab-job-6" data-bs-toggle="tab" role="tab"
                                   aria-controls="tab-job-6" aria-selected="false"><img
                                        src="{{ asset('assets/client/imgs/page/homepage1/content.svg') }}"
                                        alt="jobBox"> Người viết nội dung </a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-70">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel"
                             aria-labelledby="tab-job-1">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>LinkedIn</a><span
                                                    class="location-small">Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> Vài phút trước</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Adobe XD</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                      href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>Adobe
                                                    Ilustrator</a><span class="location-small">An Thới, Phú Quốc</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>React</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>NodeJS</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>Bing
                                                    Search</a><span class="location-small">An Thới, Phú Quốc</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Python</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                    href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Dailymotion</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Java</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Linkedin</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Angular</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>Quora
                                                    JSC</a><span class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Android</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Nintendo</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Products Manager</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>ASP .Net</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Figma</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Periscope</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>iOS</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Laravel</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Golang</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-job-2" role="tabpanel" aria-labelledby="tab-job-2">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>Quora
                                                    JSC</a><span class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Android</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Nintendo</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Products Manager</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>ASP .Net</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Figma</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Dailymotion</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Java</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Linkedin</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Angular</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Periscope</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>iOS</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Laravel</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Golang</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>LinkedIn</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Adobe XD</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                      href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>Adobe
                                                    Ilustrator</a><span class="location-small">An Thới, Phú Quốc</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>React</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>NodeJS</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job' href='company-details.html'>Bing
                                                    Search</a><span class="location-small">An Thới, Phú Quốc</span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Python</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                    href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-job-3" role="tabpanel" aria-labelledby="tab-job-3">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Dailymotion</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Java</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Linkedin</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Angular</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Quora JSC</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Android</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Nintendo</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Products Manager</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>ASP .Net</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Figma</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Periscope</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>iOS</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Laravel</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Golang</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>LinkedIn</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Adobe XD</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                      href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Adobe
                                                    Ilustrator</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>React</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>NodeJS</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Bing Search</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Python</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                    href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-job-4" role="tabpanel" aria-labelledby="tab-job-4">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Nintendo</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Products Manager</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>ASP .Net</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Figma</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Periscope</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>iOS</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Laravel</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Golang</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Dailymotion</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Java</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Linkedin</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Angular</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Quora JSC</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Android</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>LinkedIn</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Adobe XD</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                      href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Adobe
                                                    Ilustrator</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>React</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>NodeJS</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Bing Search</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Python</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                    href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-job-5" role="tabpanel" aria-labelledby="tab-job-5">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Periscope</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>iOS</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Laravel</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Golang</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>LinkedIn</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Adobe XD</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                      href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Dailymotion</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Java</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Linkedin</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Angular</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Quora JSC</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Android</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Nintendo</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Products Manager</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>ASP .Net</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Figma</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Adobe
                                                    Ilustrator</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>React</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>NodeJS</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Bing Search</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Python</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                    href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-job-6" role="tabpanel" aria-labelledby="tab-job-6">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Periscope</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>iOS</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Laravel</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Golang</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>LinkedIn</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Adobe XD</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                      href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Adobe
                                                    Ilustrator</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>React</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>NodeJS</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Bing Search</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Python</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                    href='jobs-grid.html'>Photoshop</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Dailymotion</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Typescript</a><a
                                                    class='btn btn-grey-small mr-5' href='jobs-grid.html'>Java</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Linkedin</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time">4<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, </p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='jobs-grid.html'>Angular</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Quora JSC</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                    class="card-time">5<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>PHP</a><a
                                                    class='btn btn-grey-small mr-5'
                                                    href='job-details.html'>Android</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img
                                                    src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                    alt="jobBox"></div>
                                            <div class="right-info"><a class='name-job'
                                                                       href='company-details.html'>Nintendo</a><span
                                                    class="location-small">An Thới, Phú Quốc</span></div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href='job-details.html'>Products Manager</a></h6>
                                            <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                    class="card-time">6<span> minutes ago</span></span></div>
                                            <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các
                                                tên
                                                tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty
                                                cổ
                                                phần Phát triển đô thị Nam Hà Nội, ...</p>
                                            <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                                  href='job-details.html'>ASP .Net</a><a
                                                    class='btn btn-grey-small mr-5' href='job-details.html'>Figma</a>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box overflow-visible mt-100 mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-image-job"><img class="img-job-1" alt="jobBox"
                                                        src="{{ asset('assets/client/imgs/page/homepage1/img-chart.png') }}"><img
                                class="img-job-2" alt="jobBox"
                                src="{{ asset('assets/client/imgs/page/homepage1/controlcard.png') }}">
                            <figure class="wow animate__animated animate__fadeIn"><img alt="jobBox"
                                                                                       src="{{ asset('assets/client/imgs/page/homepage1/img1.png') }}">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-job-inner"><span class="color-text-mutted text-32">Hàng triệu việc làm.
                            </span>
                            <h2 class="text-52 wow animate__animated animate__fadeInUp">Tìm người phù hợp
                                với bạnt&rsquo;s <span class="color-brand-2">Với</span> bạn</h2>
                            <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">Tìm kiếm tất
                                cả các vị trí mở trên web. Nhận ước tính lương cá nhân của riêng bạn. Đọc đánh giá về
                                hơn 600.000 công ty trên toàn thế giới. Công việc phù hợp đang ở ngoài kia.
                            </div>
                            <div class="mt-40">
                                <div class="wow animate__animated animate__fadeInUp"><a class='btn btn-default'
                                                                                        href='jobs-grid.html'>Tìm kiếm
                                        cong việc</a><a class='btn btn-link'
                                                        href='page-about.html'>Hơn nữa</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box overflow-visible mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">25</span><span> K+</span></h1>
                            <h5>Các trường hợp đã hoàn thành</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào<br
                                    class="d-none d-lg-block"> mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">17</span><span> +</span></h1>
                            <h5>Văn phòng của chúng tôi</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào <br
                                    class="d-none d-lg-block">mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">86</span><span> +</span></h1>
                            <h5>Người có tay nghề</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào <br
                                    class="d-none d-lg-block">mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="text-center">
                            <h1 class="color-brand-2"><span class="count">28</span><span> +</span></h1>
                            <h5>Chúc mừng khách hàng</h5>
                            <p class="font-sm color-text-paragraph mt-10">Chúng tôi luôn cung cấp cho mọi người một <br
                                    class="d-none d-lg-block">giải pháp hoàn chỉnh tập trung vào <br
                                    class="d-none d-lg-block">mọi hoạt động kinh doanh</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Nhà tuyển dụng hàng đầu</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Khám phá bước đi sự nghiệp tiếp theo của bạn, hợp đồng biểu diễn tự do hoặc thực tập</p>
                </div>
            </div>
            <div class="container">
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-1 swiper-style-2 swiper">
                        <div class="swiper-wrapper pt-5">
                            <div class="swiper-slide">
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-1.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Linkedin</h4><img alt="jobBox"
                                                                      src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>68</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">25<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-2.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Adobe</h4><img alt="jobBox"
                                                                   src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>42</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">17<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-3.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Dailymotion</h4><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>46</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">65<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-4.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>NewSum</h4><img alt="jobBox"
                                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>68</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">25<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-5.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>PowerHome</h4><img alt="jobBox"
                                                                       src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>87</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">34<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-6.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Whop.com</h4><img alt="jobBox"
                                                                      src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>34</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">56<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-7.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Greewood</h4><img alt="jobBox"
                                                                      src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>124</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">78<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-8.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Kentucky</h4><img alt="jobBox"
                                                                      src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>54</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">98<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-9.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Qeuity</h4><img alt="jobBox"
                                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>76</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">90<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-10.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Honda</h4><img alt="jobBox"
                                                                   src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>89</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">34<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-5.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Toyota</h4><img alt="jobBox"
                                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>34</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">26<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-3.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Lexuxs</h4><img alt="jobBox"
                                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>27</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">54<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-6.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Ondo</h4><img alt="jobBox"
                                                                  src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>54</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">58<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-2.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Square</h4><img alt="jobBox"
                                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>16</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">37<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                                <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="#">
                                        <div class="item-logo">
                                            <div class="image-left"><img alt="jobBox"
                                                                         src="{{ asset('assets/client/imgs/brands/brand-8.png') }}">
                                            </div>
                                            <div class="text-info-right">
                                                <h4>Vista</h4><img alt="jobBox"
                                                                   src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><img
                                                    alt="jobBox"
                                                    src="{{ asset('assets/client/imgs/template/icons/star.svg') }}"><span
                                                    class="font-xs color-text-mutted ml-10"><span>(</span><span>97</span><span>)</span></span>
                                            </div>
                                            <div class="text-info-bottom mt-5"><span
                                                    class="font-xs color-text-mutted icon-location">An Thới, Phú
                                                    Quốc</span><span
                                                    class="font-xs color-text-mutted float-end mt-5">43<span> Công việc hiện có</span></span></div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next-1"></div>
                    <div class="swiper-button-prev swiper-button-prev-1"></div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Một số nhóm ngành hot</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm công việc yêu
                        thích của bạn và nhận được
                        lợi ích của chính mình</p>
                </div>
            </div>
            <div class="container">
                <div class="row mt-50">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                        <div class="card-image-top hover-up"><a href='jobs-grid.html'>
                                <div class="image"
                                     style="background-image: url({{ asset('assets/client/imgs/page/homepage1/location1.png') }});">
                                    <span class="lbl-hot">Hot</span></div>
                            </a>
                            <div class="informations"><a href='jobs-grid.html'>
                                    <h5>Phú Quốc</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">5
                                            vị trí ứng tuyển</span></div>
                                    <div class="col-lg-6 col-6 text-end"><span
                                            class="color-text-paragraph-2 text-14">120 công ty</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-7 col-sm-12 col-12">
                        <div class="card-image-top hover-up"><a href='jobs-grid.html'>
                                <div class="image"
                                     style="background-image: url({{ asset('assets/client/imgs/page/homepage1/location2.png') }});">
                                    <span class="lbl-hot">Xu hướng</span></div>
                            </a>
                            <div class="informations"><a href='jobs-grid.html'>
                                    <h5>Phú Quốc</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">7
                                            vị trí</span></div>
                                    <div class="col-lg-6 col-6 text-end"><span class="color-text-paragraph-2 text-14">68
                                            công ty</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 col-12">
                        <div class="card-image-top hover-up"><a href='jobs-grid.html'>
                                <div class="image"
                                     style="background-image: url({{ asset('assets/client/imgs/page/homepage1/location3.png') }});">
                                    <span class="lbl-hot">Hot</span></div>
                            </a>
                            <div class="informations"><a href='jobs-grid.html'>
                                    <h5>An Thới, Phú Quốc</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">9
                                            vị trí</span></div>
                                    <div class="col-lg-6 col-6 text-end"><span class="color-text-paragraph-2 text-14">80
                                            công ty</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                        <div class="card-image-top hover-up"><a href='jobs-grid.html'>
                                <div class="image"
                                     style="background-image: url({{ asset('assets/client/imgs/page/homepage1/location4.png') }});">
                                </div>
                            </a>
                            <div class="informations"><a href='jobs-grid.html'>
                                    <h5>Amsterdam, Holland</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">16
                                            vị trí</span></div>
                                    <div class="col-lg-6 col-6 text-end"><span class="color-text-paragraph-2 text-14">86
                                            công ty</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 col-12">
                        <div class="card-image-top hover-up"><a href='jobs-grid.html'>
                                <div class="image"
                                     style="background-image: url({{ asset('assets/client/imgs/page/homepage1/location5.png') }});">
                                </div>
                            </a>
                            <div class="informations"><a href='jobs-grid.html'>
                                    <h5>Phú Quốc</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">39
                                            vị trí</span></div>
                                    <div class="col-lg-6 col-6 text-end"><span
                                            class="color-text-paragraph-2 text-14">186 công ty</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                        <div class="card-image-top hover-up"><a href='jobs-grid.html'>
                                <div class="image"
                                     style="background-image: url({{ asset('assets/client/imgs/page/homepage1/location6.png') }});">
                                </div>
                            </a>
                            <div class="informations"><a href='jobs-grid.html'>
                                    <h5>Cần Thơ</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">15
                                            vị trí</span></div>
                                    <div class="col-lg-6 col-6 text-end"><span
                                            class="color-text-paragraph-2 text-14">632 công ty</span></div>
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
                                                                       href='blog-grid.html'>News</a></div>
                                            <h5><a href='blog-details.html'>21 mẹo phỏng vấn xin việc: Cách tạo ấn
                                                    tượng tốt</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra công ty chăm sóc
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
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh Toàn</span><br><span
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
                                            <div class="tags mb-15"><a class='btn btn-tag'
                                                                       href='blog-grid.html'>Sự kiến</a></div>
                                            <h5><a href='blog-details.html'>39 điểm mạnh và điểm yếu để thảo luận một
                                                    cách
                                                    Phỏng vấn xin việc</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Sứ mệnh của chúng tôi là tạo
                                                ra
                                                công ty chăm sóc sức khỏe bền vững nhất thế giới bằng cách tạo ra
                                                sản phẩm chăm sóc sức khỏe chất lượng cao trong bao bì mang tính biểu
                                                tượng, bền vững.</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user2.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Thanh Toàn</span><br><span
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
                                                                       href='blog-grid.html'>News</a></div>
                                            <h5><a href='blog-details.html'>Câu hỏi phỏng vấn: Tại sao bạn không có
                                                    Bằng cấp?</a></h5>
                                            <p class="mt-10 color-text-paragraph font-sm">Tìm hiểu cách phản ứng nếu
                                                người phỏng vấn hỏi bạn tại sao bạn không có bằng cấp và đọc các câu trả
                                                lời ví dụ
                                                điều đó có thể giúp bạn chế tạo</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex"><img class="img-rounded"
                                                                                 src="{{ asset('assets/client/imgs/page/homepage1/user3.png') }}"
                                                                                 alt="jobBox">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">Khoa Nguyễn</span><br><span
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
        <script src="</main>{{ asset('assets/client/js/plugins/counterup.js"></script>
    </main>
@endsection
