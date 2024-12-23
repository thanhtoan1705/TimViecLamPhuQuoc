<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                @php

                    $logo = getStorageImageUrl($settings->logo_website, config('image.main-logo'));
                @endphp
                <div style="width: 185px" class="header-logo"><a class='d-flex'
                                                                 href="{{ route('client.client.index') }}"><img
                            alt="{{ $settings->company_name }}"
                            src="{{ $logo }}"></a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li><a class="{{ request()->is('/') ? 'active' : '' }}" href='/'>Trang chủ</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.job.index') ? 'active' : '' }}"
                               href='{{route('client.job.index')}}'>Việc làm</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.employer.index') ? 'active' : '' }}"
                               href='{{route('client.employer.index')}}'>Công ty</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.candidate.hot') ? 'active' : '' }}"
                               href='{{route('client.candidate.hot')}}'>Ứng viên</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.post.index') ? 'active' : '' }}"
                               href='{{route('client.post.index')}}'>Tin tức</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.cv.list') ? 'active' : '' }}"
                               href='{{route('client.cv.list')}}'>Mẫu CV</a>
                        </li>
                        <li><a class="{{ request()->routeIs('client.pricing.index') ? 'active' : '' }}"
                               href='{{route('client.pricing.index')}}'>Bảng giá</a>
                        </li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right d-none d-xl-flex align-items-center">
                @if(auth()->check() && auth()->user()->role == 'candidate')
                    <div class="dropdown me-3">
                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-bell-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user()->unreadNotifications->filter(function($notification) {
                                return isset($notification->data['message']) && !empty($notification->data['message']);
                            })->count() }}
                        </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-20"
                            style="width: 500px; max-height: 450px; overflow-y: auto;">
                            <h5 class="mb-2">Thông báo</h5>
                            @php
                                $notifications = auth()->user()->notifications->take(3);
                            @endphp
                            @if ($notifications->isEmpty())
                                <p class="text-muted">Bạn chưa có thông báo nào.</p>
                            @else
                                @foreach ($notifications as $notification)
                                    @if(isset($notification->data['message']) && !empty($notification->data['message']))
                                        <li class="d-flex justify-content-between align-items-center"
                                            style="background-color: #ffffff; border: none; padding: 20px; border-radius: 10px; margin-bottom: 15px; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                                            <div style="display: flex; align-items: center;">
                                                <i class="bi bi-bell-fill"
                                                   style="background-color: #007bff; padding: 10px; border-radius: 50%; font-size: 20px; display: inline-flex; justify-content: center; align-items: center; transition: background-color 0.3s; color: white;"></i>
                                                <span
                                                    style="font-size: 14px; color: #495057; font-weight: 500; margin-left: 10px;">{{ $notification->data['message'] }}</span>
                                            </div>
                                            <div
                                                style="content: ''; position: absolute; top: 0; left: 0; height: 100%; width: 5px; background: linear-gradient(180deg, #00c6ff, #007bff); transition: width 0.3s ease;"></div>
                                        </li>
                                    @endif
                                @endforeach
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="{{ route('client.candidate.notification') }}" class="btn btn-primary">Xem
                                        thêm</a>
                                </div>
                            @endif
                        </ul>

                    </div>



                    <div class="dropdown me-3"  >
                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Tài khoản

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-2"
                            style="width: auto; max-height: 450px; overflow-y: auto;">


                            <div class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{route('client.candidate.profile')}}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0C3.58887 0 0 3.58887 0 8C0 12.4111 3.58887 16 8 16C12.4111 16 16 12.4111 16 8C16 3.58887 12.4111 0 8 0ZM8 2.33334C10.1136 2.33334 11.8333 4.05306 11.8333 6.16669C11.8333 8.28031 10.1136 10 8 10C5.88641 10 4.16666 8.28028 4.16666 6.16666C4.16666 4.05303 5.88641 2.33334 8 2.33334ZM8 14.6667C5.82166 14.6667 3.89 13.6118 2.67272 11.9912C4.00634 11.3495 5.91088 10.6667 8 10.6667C10.0893 10.6667 11.994 11.3496 13.3273 11.9911C12.11 13.6118 10.1784 14.6667 8 14.6667Z" fill="#02528E"></path>
                                    </svg>
                                    Hồ sơ
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{route('client.cv.saved')}}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2842_13249)">
                                            <path d="M12.666 6.66683H3.33268C2.96402 6.66683 2.66602 6.36816 2.66602 6.00016C2.66602 5.63216 2.96402 5.3335 3.33268 5.3335H12.666C13.0347 5.3335 13.3327 5.63216 13.3327 6.00016C13.3327 6.36816 13.0347 6.66683 12.666 6.66683Z" fill="#02528E"></path>
                                            <path d="M7.99935 9.33334H3.33268C2.96402 9.33334 2.66602 9.03468 2.66602 8.66667C2.66602 8.29867 2.96402 8 3.33268 8H7.99935C8.36802 8 8.66602 8.29867 8.66602 8.66667C8.66602 9.03468 8.36802 9.33334 7.99935 9.33334Z" fill="#02528E"></path>
                                            <path d="M6.66602 11.9998H3.33268C2.96402 11.9998 2.66602 11.7012 2.66602 11.3332C2.66602 10.9652 2.96402 10.6665 3.33268 10.6665H6.66602C7.03468 10.6665 7.33268 10.9652 7.33268 11.3332C7.33268 11.7012 7.03468 11.9998 6.66602 11.9998Z" fill="#02528E"></path>
                                            <path d="M12.3327 8.6665C10.3113 8.6665 8.66602 10.3112 8.66602 12.3332C8.66602 14.3552 10.3113 15.9999 12.3327 15.9999C14.354 15.9999 15.9993 14.3552 15.9993 12.3332C15.9993 10.3112 14.354 8.6665 12.3327 8.6665ZM14.2427 11.7818L12.424 13.7818C12.3013 13.9158 12.1307 13.9945 11.9487 13.9998C11.9427 13.9998 11.936 13.9998 11.9307 13.9998C11.7553 13.9998 11.5873 13.9312 11.4627 13.8078L10.448 12.8078C10.1853 12.5492 10.1833 12.1272 10.4413 11.8652C10.6987 11.6025 11.1207 11.5998 11.384 11.8578L11.904 12.3712L13.2553 10.8845C13.504 10.6125 13.926 10.5925 14.1973 10.8398C14.47 11.0878 14.49 11.5092 14.2427 11.7818Z" fill="#02528E"></path>
                                            <path d="M14 0H2C0.9 0 0 0.9 0 2V12.6667C0 13.7667 0.9 14.6667 2 14.6667H7.92C7.69333 14.2533 7.52667 13.8067 7.43333 13.3333H2C1.63333 13.3333 1.33333 13.0333 1.33333 12.6667V3.33333H14.6667V7.92C15.1733 8.18 15.6267 8.52667 16 8.94667V2C16 0.9 15.1 0 14 0V0Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2842_13249">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Quản lý CV
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{route('client.candidate.viewSavedJobs')}}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M12.8002 4.80005H3.2002V6.40006H12.8002V4.80005Z" fill="#02528E"></path>
                                            <path d="M12.8 0.802246V2.40225H14.4V14.4001H1.6V2.40225H3.1744V0.802246H1C0.447715 0.802246 0 1.24996 0 1.80225V15.0001C0 15.5524 0.447715 16.0001 1 16.0001H15C15.5523 16.0001 16 15.5524 16 15.0001V1.80225C16 1.24996 15.5523 0.802246 15 0.802246H12.8Z" fill="#02528E"></path>
                                            <path d="M12.8002 8H3.2002V9.59999H12.8002V8Z" fill="#02528E"></path>
                                            <path d="M12.8002 11.2H3.2002V12.8H12.8002V11.2Z" fill="#02528E"></path>
                                            <path d="M11.1998 0H4.7998V3.2H11.1998V0Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Việc làm đã lưu
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{route('client.candidate.change-password')}}" class="dropdown-employer_list__child btn">
                                    <svg width="16" height="16" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#02528E" d="m18 21v-4c0-7.7197 6.2803-14 14-14s14 6.2803 14 14v4h-7v-4c0-3.866-3.134-7-7-7s-7 3.134-7 7v4zm37 7v28c0 2.7568-2.2432 5-5 5h-36c-2.7568 0-5-2.2432-5-5v-28c0-2.7568 2.2432-5 5-5h36c2.7568 0 5 2.2432 5 5zm-30.9297 24.3604c1.6348-1.7827 2.6807-3.5869 3.29-5.6777.1543-.5298-.1494-1.085-.6797-1.2397-.5322-.1548-1.0859.1494-1.2402.6802-.3271 1.123-.9785 2.8516-2.8447 4.8857-.373.4067-.3457 1.0396.0615 1.4126.1924.1763.4336.2632.6758.2632.2705 0 .54-.1089.7373-.3242zm3.5039 2.2314c4.8975-4.9888 5.4258-10.6353 5.4258-12.8311 0-.5522-.4473-1-1-1s-1 .4478-1 1c0 1.9502-.4727 6.9678-4.8535 11.4297-.3867.394-.3809 1.0273.0137 1.4141.1943.1914.4473.2866.7002.2866.2588 0 .5176-.1001.7139-.2993zm10.4258-12.5884c0-3.3086-2.6914-6-6-6s-6 2.6914-6 6c0 .5522.4473 1 1 1s1-.4478 1-1c0-2.2056 1.7939-4 4-4s4 1.7944 4 4c0 2.7856-.4033 6.269-5.2148 12.374-.3418.4341-.2676 1.0625.166 1.4043.1836.1445.4014.2148.6182.2148.2959 0 .5889-.1309.7861-.3809 4.9609-6.2935 5.6445-10.2617 5.6445-13.6123zm4 0c0-5.5142-4.4863-10-10-10s-10 4.4858-10 10c0 1.6953-.1572 3.4214-2.0508 5.8862-.3369.438-.2539 1.0659.1836 1.4023.4395.3379 1.0664.2534 1.4023-.1836 2.2744-2.9604 2.4648-5.2197 2.4648-7.105 0-4.4111 3.5889-8 8-8s8 3.5889 8 8c0 2.2646-.208 4.9849-1.7471 7.9912-.252.4917-.0576 1.0942.4336 1.3462.1465.0747.3018.1099.4551.1099.3633 0 .7139-.1987.8906-.5439 1.7344-3.3853 1.9678-6.4004 1.9678-8.9033zm4 0c0-7.7197-6.2803-14-14-14s-14 6.2803-14 14c0 .5522.4473 1 1 1s1-.4478 1-1c0-6.6167 5.3828-12 12-12s12 5.3833 12 12c0 .4785-.0283.9614-.085 1.4346-.0654.5483.3271 1.0459.875 1.1113.04.0044.0801.0068.1191.0068.5 0 .9316-.3735.9922-.8818.0654-.5513.0986-1.1138.0986-1.6709z"></path>
                                    </svg>
                                    Đổi mật khẩu
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">

                                <a href="{{route('client.candidate.logout')}}" style="width: 200px" class="dropdown-employer_list__child btn">
                                    <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px !important; height: 18px !important">
                                        <path fill="#02528E" d="m21.9 11.4c.1-.2.1-.5 0-.8-.1-.1-.1-.2-.2-.3l-2-2c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l.3.3h-2.6c-.6 0-1 .4-1 1s.4 1 1 1h2.6l-.3.3c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l2-2c.1-.1.2-.2.2-.3z"></path>
                                        <path fill="#02528E" d="m17 14c-.6 0-1 .4-1 1v1c0 .6-.4 1-1 1h-1v-8.6c0-1.3-.8-2.4-1.9-2.8l-1.6-.6h4.5c.6 0 1 .4 1 1v1c0 .6.4 1 1 1s1-.4 1-1v-1c0-1.7-1.3-3-3-3h-10c-.1 0-.2 0-.3.1-.1 0-.2.1-.2.1s0 0-.1.1c-.1 0-.2.1-.2.2v.1c-.1 0-.2.1-.2.2v.1.1 14c0 .4.3.8.6.9l6.6 2.5c.2.1.5.1.7.1.4 0 .8-.1 1.1-.4.5-.4.9-1 .9-1.6v-.5h1c1.7 0 3-1.3 3-3v-1c.1-.5-.3-1-.9-1z"></path>
                                    </svg>
                                    Đăng xuất
                                </a>

                            </div>
                        </ul>

                    </div>


                @elseif(auth()->check() && auth()->user()->role == 'employer' && !is_null(auth()->user()->email_verified_at))

                    <div class="dropdown me-3" >
                        <a href="{{ route('tin-nhan') }}" target="_blank" class="btn btn-grey position-relative"
                                aria-expanded="false">
                            <i class="bi bi-chat-fill"></i>
                            @php
                                $countMessages = auth()->user()->chatMessages()->where('seen', false)->count();
                            @endphp

                            @if($countMessages > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $countMessages }}
                                </span>

                            @endif


                        </a>



                    </div>


                    <div class="dropdown me-3"  >
                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Tài khoản

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-2"
                            style="width: auto; max-height: 450px; overflow-y: auto;">

                            <div class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.employer.resources.job-posts.create') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.0997 0H4.80948C4.38385 0.00102546 3.9709 0.144959 3.63685 0.408716C3.3028 0.672474 3.06701 1.04077 2.96729 1.45455H11.6801C12.4393 1.45685 13.1668 1.75949 13.7037 2.29637C14.2406 2.83325 14.5432 3.56076 14.5455 4.32002V13.0328C14.9593 12.9331 15.3276 12.6973 15.5914 12.3632C15.8551 12.0292 15.9991 11.6162 16.0001 11.1906V1.90037C16.0001 1.39636 15.7999 0.912996 15.4435 0.556606C15.0871 0.200217 14.6037 0 14.0997 0Z" fill="#02528E"></path>
                                        <path d="M11.1906 2.90918H1.90037C1.39654 2.90976 0.913508 3.11016 0.557244 3.46642C0.20098 3.82269 0.00057746 4.30572 0 4.80955V14.0998C0.00057746 14.6036 0.20098 15.0866 0.557244 15.4429C0.913508 15.7992 1.39654 15.9996 1.90037 16.0002H11.1906C11.6944 15.9996 12.1775 15.7992 12.5337 15.4429C12.89 15.0866 13.0904 14.6036 13.091 14.0998V4.80955C13.0904 4.30572 12.89 3.82269 12.5337 3.46642C12.1775 3.11016 11.6944 2.90976 11.1906 2.90918ZM9.45459 10.1819H7.27277V12.3638C7.27277 12.5567 7.19614 12.7416 7.05975 12.878C6.92336 13.0144 6.73837 13.0911 6.54549 13.0911C6.3526 13.0911 6.16762 13.0144 6.03123 12.878C5.89484 12.7416 5.81821 12.5567 5.81821 12.3638V10.1819H3.63638C3.4435 10.1819 3.25851 10.1053 3.12212 9.96893C2.98573 9.83254 2.90911 9.64755 2.90911 9.45467C2.90911 9.26178 2.98573 9.0768 3.12212 8.94041C3.25851 8.80402 3.4435 8.72739 3.63638 8.72739H5.81821V6.54556C5.81821 6.35268 5.89484 6.16769 6.03123 6.0313C6.16762 5.89491 6.3526 5.81829 6.54549 5.81829C6.73837 5.81829 6.92336 5.89491 7.05975 6.0313C7.19614 6.16769 7.27277 6.35268 7.27277 6.54556V8.72739H9.45459C9.64748 8.72739 9.83247 8.80402 9.96886 8.94041C10.1052 9.0768 10.1819 9.26178 10.1819 9.45467C10.1819 9.64755 10.1052 9.83254 9.96886 9.96893C9.83247 10.1053 9.64748 10.1819 9.45459 10.1819Z" fill="#02528E"></path>
                                    </svg>
                                    Đăng tin tuyển dụng
                                </a>
                            </div>

                            <div class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.employer.resources.job-posts.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M12.8002 4.80005H3.2002V6.40006H12.8002V4.80005Z" fill="#02528E"></path>
                                            <path d="M12.8 0.802246V2.40225H14.4V14.4001H1.6V2.40225H3.1744V0.802246H1C0.447715 0.802246 0 1.24996 0 1.80225V15.0001C0 15.5524 0.447715 16.0001 1 16.0001H15C15.5523 16.0001 16 15.5524 16 15.0001V1.80225C16 1.24996 15.5523 0.802246 15 0.802246H12.8Z" fill="#02528E"></path>
                                            <path d="M12.8002 8H3.2002V9.59999H12.8002V8Z" fill="#02528E"></path>
                                            <path d="M12.8002 11.2H3.2002V12.8H12.8002V11.2Z" fill="#02528E"></path>
                                            <path d="M11.1998 0H4.7998V3.2H11.1998V0Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Danh sách tin đăng
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.employer.resources.candidate-applies.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M15.0906 10.4657C13.7189 9.60027 12.1484 9.12544 10.5254 9.03662C10.9006 9.21228 11.272 9.39777 11.6243 9.62001C12.4729 10.1547 13.0002 11.1229 13.0002 12.1464V14.9999H16.0002V12.1464C16.0002 11.4638 15.6516 10.8197 15.0906 10.4657Z" fill="#02528E"></path>
                                            <path d="M11.0903 10.4658C8.05031 8.54785 3.94923 8.54785 0.910147 10.4658C0.348641 10.8193 0 11.4634 0 12.1465V15H12V12.1465C12 11.4634 11.6514 10.8193 11.0903 10.4658Z" fill="#02528E"></path>
                                            <path d="M8.99414 7.83439C9.3174 7.93224 9.65098 8.00005 9.99994 8.00005C11.9296 8.00005 13.4999 6.42974 13.4999 4.50004C13.4999 2.57035 11.9296 1 9.99994 1C9.65098 1 9.3174 1.06781 8.99414 1.16566C9.9113 1.99 10.4999 3.17251 10.4999 4.50001C10.4999 5.82751 9.91133 7.01002 8.99414 7.83439Z" fill="#02528E"></path>
                                            <path d="M8.47489 2.02513C9.84174 3.39198 9.84174 5.60802 8.47489 6.97487C7.10803 8.34172 4.89199 8.34172 3.52514 6.97487C2.15829 5.60802 2.15829 3.39198 3.52514 2.02513C4.89199 0.658276 7.10803 0.658307 8.47489 2.02513Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Quản lý ứng viên
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.employer.resources.employer.buy-services.buy-services.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.49388 0C1.56734 0 0 1.56734 0 3.49388V15.5102C0 15.7807 0.219313 16 0.489781 16H9.34766C9.06122 15.8626 8.79022 15.6988 8.53622 15.5102C8.34034 15.3647 8.1545 15.2045 7.97984 15.0297C7.97678 15.0267 7.97381 15.0235 7.97078 15.0204C7.51762 14.565 7.16138 14.0352 6.91191 13.4455C6.84941 13.2978 6.79453 13.1478 6.74687 12.9959H3.49388C3.22338 12.9959 3.00409 12.7766 3.00409 12.5061C3.00409 12.2357 3.22341 12.0163 3.49388 12.0163H6.54566C6.52847 11.8472 6.51972 11.6767 6.51972 11.5048C6.51972 10.986 6.59856 10.479 6.75387 9.99187H3.49388C3.22338 9.99187 3.00409 9.77256 3.00409 9.50209C3.00409 9.23162 3.22341 9.01231 3.49388 9.01231H7.18666C7.40366 8.63641 7.669 8.29069 7.97988 7.97988C8.43738 7.52238 8.97038 7.16306 9.56409 6.91197C10.1793 6.65175 10.8323 6.51981 11.5048 6.51981C11.6767 6.51981 11.8473 6.52856 12.0163 6.54575V3.49397V0.979594V0.489781V0H3.49388ZM8.52244 6.98775H3.49388C3.22338 6.98775 3.00409 6.76844 3.00409 6.49797C3.00409 6.2275 3.22341 6.00819 3.49388 6.00819H8.52244C8.79294 6.00819 9.01222 6.2275 9.01222 6.49797C9.01222 6.76844 8.79294 6.98775 8.52244 6.98775ZM9.50203 3.98369H3.49388C3.22338 3.98369 3.00409 3.76437 3.00409 3.49391C3.00409 3.22344 3.22341 3.00413 3.49388 3.00413H9.50203C9.77253 3.00413 9.99181 3.22344 9.99181 3.49391C9.99181 3.76437 9.77253 3.98369 9.50203 3.98369Z" fill="#02528E"></path>
                                        <path d="M12.9961 0.0344238V0.489705V0.529705V1.02742V3.00401V3.4938V3.98358H15.5104C15.7809 3.98358 16.0002 3.76426 16.0002 3.4938C16.0002 1.73352 14.6916 0.27333 12.9961 0.0344238Z" fill="#02528E"></path>
                                        <path d="M12.9961 7.7863C12.8375 7.72267 12.6741 7.66867 12.5063 7.62546C12.3466 7.58439 12.1832 7.55289 12.0165 7.53164C11.849 7.51033 11.6783 7.49927 11.5049 7.49927C10.198 7.49927 9.03732 8.12539 8.3062 9.09396C8.09939 9.36795 7.92711 9.66939 7.79545 9.9918C7.60486 10.4586 7.49951 10.9694 7.49951 11.5047C7.49951 11.678 7.51054 11.8488 7.53186 12.0163C7.57432 12.3493 7.6577 12.6696 7.77676 12.9719C8.12167 13.8477 8.76639 14.5725 9.58429 15.0204C10.1545 15.3325 10.8089 15.5101 11.5049 15.5101C11.6782 15.5101 11.8489 15.4991 12.0164 15.4777C12.1831 15.4565 12.3466 15.425 12.5062 15.384C12.674 15.3408 12.8375 15.2868 12.996 15.2231C14.4697 14.6317 15.5103 13.1898 15.5103 11.5047C15.5104 9.81964 14.4698 8.37774 12.9961 7.7863ZM12.5063 11.9945H12.0165H11.5049C11.2344 11.9945 11.0152 11.7752 11.0152 11.5047V10.5033C11.0152 10.2328 11.2345 10.0135 11.5049 10.0135C11.7754 10.0135 11.9947 10.2329 11.9947 10.5033V11.0149H12.0165H12.5063C12.7768 11.0149 12.9961 11.2342 12.9961 11.5047C12.9961 11.7752 12.7768 11.9945 12.5063 11.9945Z" fill="#02528E"></path>
                                    </svg>
                                    Mua gói VIP
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.employer.resources.employer.service-tracking.service-trackings.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2842_13249)">
                                            <path d="M12.666 6.66683H3.33268C2.96402 6.66683 2.66602 6.36816 2.66602 6.00016C2.66602 5.63216 2.96402 5.3335 3.33268 5.3335H12.666C13.0347 5.3335 13.3327 5.63216 13.3327 6.00016C13.3327 6.36816 13.0347 6.66683 12.666 6.66683Z" fill="#02528E"></path>
                                            <path d="M7.99935 9.33334H3.33268C2.96402 9.33334 2.66602 9.03468 2.66602 8.66667C2.66602 8.29867 2.96402 8 3.33268 8H7.99935C8.36802 8 8.66602 8.29867 8.66602 8.66667C8.66602 9.03468 8.36802 9.33334 7.99935 9.33334Z" fill="#02528E"></path>
                                            <path d="M6.66602 11.9998H3.33268C2.96402 11.9998 2.66602 11.7012 2.66602 11.3332C2.66602 10.9652 2.96402 10.6665 3.33268 10.6665H6.66602C7.03468 10.6665 7.33268 10.9652 7.33268 11.3332C7.33268 11.7012 7.03468 11.9998 6.66602 11.9998Z" fill="#02528E"></path>
                                            <path d="M12.3327 8.6665C10.3113 8.6665 8.66602 10.3112 8.66602 12.3332C8.66602 14.3552 10.3113 15.9999 12.3327 15.9999C14.354 15.9999 15.9993 14.3552 15.9993 12.3332C15.9993 10.3112 14.354 8.6665 12.3327 8.6665ZM14.2427 11.7818L12.424 13.7818C12.3013 13.9158 12.1307 13.9945 11.9487 13.9998C11.9427 13.9998 11.936 13.9998 11.9307 13.9998C11.7553 13.9998 11.5873 13.9312 11.4627 13.8078L10.448 12.8078C10.1853 12.5492 10.1833 12.1272 10.4413 11.8652C10.6987 11.6025 11.1207 11.5998 11.384 11.8578L11.904 12.3712L13.2553 10.8845C13.504 10.6125 13.926 10.5925 14.1973 10.8398C14.47 11.0878 14.49 11.5092 14.2427 11.7818Z" fill="#02528E"></path>
                                            <path d="M14 0H2C0.9 0 0 0.9 0 2V12.6667C0 13.7667 0.9 14.6667 2 14.6667H7.92C7.69333 14.2533 7.52667 13.8067 7.43333 13.3333H2C1.63333 13.3333 1.33333 13.0333 1.33333 12.6667V3.33333H14.6667V7.92C15.1733 8.18 15.6267 8.52667 16 8.94667V2C16 0.9 15.1 0 14 0V0Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2842_13249">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Lịch sử giao dịch
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.employer.pages.edit-profile') }}" class="dropdown-employer_list__child btn">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0C3.58887 0 0 3.58887 0 8C0 12.4111 3.58887 16 8 16C12.4111 16 16 12.4111 16 8C16 3.58887 12.4111 0 8 0ZM8 2.33334C10.1136 2.33334 11.8333 4.05306 11.8333 6.16669C11.8333 8.28031 10.1136 10 8 10C5.88641 10 4.16666 8.28028 4.16666 6.16666C4.16666 4.05303 5.88641 2.33334 8 2.33334ZM8 14.6667C5.82166 14.6667 3.89 13.6118 2.67272 11.9912C4.00634 11.3495 5.91088 10.6667 8 10.6667C10.0893 10.6667 11.994 11.3496 13.3273 11.9911C12.11 13.6118 10.1784 14.6667 8 14.6667Z" fill="#02528E"></path>
                                    </svg>
                                    Tài khoản
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <form action="{{ route('filament.employer.auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="width: 200px" class="dropdown-employer_list__child btn">
                                        <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px !important; height: 18px !important">
                                            <path fill="#02528E" d="m21.9 11.4c.1-.2.1-.5 0-.8-.1-.1-.1-.2-.2-.3l-2-2c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l.3.3h-2.6c-.6 0-1 .4-1 1s.4 1 1 1h2.6l-.3.3c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l2-2c.1-.1.2-.2.2-.3z"></path>
                                            <path fill="#02528E" d="m17 14c-.6 0-1 .4-1 1v1c0 .6-.4 1-1 1h-1v-8.6c0-1.3-.8-2.4-1.9-2.8l-1.6-.6h4.5c.6 0 1 .4 1 1v1c0 .6.4 1 1 1s1-.4 1-1v-1c0-1.7-1.3-3-3-3h-10c-.1 0-.2 0-.3.1-.1 0-.2.1-.2.1s0 0-.1.1c-.1 0-.2.1-.2.2v.1c-.1 0-.2.1-.2.2v.1.1 14c0 .4.3.8.6.9l6.6 2.5c.2.1.5.1.7.1.4 0 .8-.1 1.1-.4.5-.4.9-1 .9-1.6v-.5h1c1.7 0 3-1.3 3-3v-1c.1-.5-.3-1-.9-1z"></path>
                                        </svg>
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </ul>

                    </div>


                @elseif(auth()->check() && auth()->user()->role == 'admin')

                    <div class="dropdown me-3" >
{{--                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown"--}}
{{--                                aria-expanded="false">--}}
{{--                            <i class="bi bi-bell-fill"></i>--}}
{{--                            <span--}}
{{--                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">--}}
{{--                            {{ auth()->user()->unreadNotifications->filter(function($notification) {--}}
{{--                                return isset($notification->data['message']) && !empty($notification->data['message']);--}}
{{--                            })->count() }}--}}
{{--                        </span>--}}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-3"
                            style="width: 500px; max-height: 450px; overflow-y: auto;">
                            <h5 class="mb-2">Thông báo</h5>
                            @php
                                $notifications = auth()->user()->notifications->take(3);
                            @endphp
                            @if ($notifications->isEmpty())
                                <p class="text-muted">Bạn chưa có thông báo nào.</p>
                            @else
                                @foreach ($notifications as $notification)
                                    @if(isset($notification->data['message']) && !empty($notification->data['message']))
                                        <li class="d-flex justify-content-between align-items-center"
                                            style="background-color: #ffffff; border: none; padding: 20px; border-radius: 10px; margin-bottom: 15px; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                                            <div style="display: flex; align-items: center;">
                                                <i class="bi bi-bell-fill"
                                                   style="background-color: #007bff; padding: 10px; border-radius: 50%; font-size: 20px; display: inline-flex; justify-content: center; align-items: center; transition: background-color 0.3s; color: white;"></i>
                                                <span
                                                    style="font-size: 14px; color: #495057; font-weight: 500; margin-left: 10px;">{{ $notification->data['message'] }}</span>
                                            </div>
                                            <div
                                                style="content: ''; position: absolute; top: 0; left: 0; height: 100%; width: 5px; background: linear-gradient(180deg, #00c6ff, #007bff); transition: width 0.3s ease;"></div>
                                        </li>
                                    @endif
                                @endforeach
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="{{ route('client.candidate.notification') }}" class="btn btn-primary">Xem
                                        thêm</a>
                                </div>
                            @endif
                        </ul>

                    </div>


                    <div class="dropdown me-3"  >
                        <button class="btn btn-grey position-relative" id="notificationButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Tài khoản

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end p-2"
                            style="width: auto; max-height: 450px; overflow-y: auto;">

                            <div class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.pages.dashboard') }}" class="btn dropdown-employer_list__child">
                                    <svg width="18" height="18" id="glyph" viewBox="0 0 32 32" fill="#02528E" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m17.94 2.25c-1.12-.95-2.76-.95-3.88 0l-11.57 9.83c-.68.57-1.06 1.4-1.06 2.28v13.27c0 1.58 1.29 2.87 2.87 2.87h23.4c1.58 0 2.87-1.29 2.87-2.87v-13.27c0-.88-.38-1.71-1.06-2.28zm3.74 26.25h-2v-6.49c0-.48-.39-.87-.87-.87h-5.62c-.48 0-.87.39-.87.87v6.49h-2v-6.49c0-1.58 1.29-2.87 2.87-2.87h5.62c1.58 0 2.87 1.29 2.87 2.87z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                            </div>

                            <div class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.resources.job-posts.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M12.8002 4.80005H3.2002V6.40006H12.8002V4.80005Z" fill="#02528E"></path>
                                            <path d="M12.8 0.802246V2.40225H14.4V14.4001H1.6V2.40225H3.1744V0.802246H1C0.447715 0.802246 0 1.24996 0 1.80225V15.0001C0 15.5524 0.447715 16.0001 1 16.0001H15C15.5523 16.0001 16 15.5524 16 15.0001V1.80225C16 1.24996 15.5523 0.802246 15 0.802246H12.8Z" fill="#02528E"></path>
                                            <path d="M12.8002 8H3.2002V9.59999H12.8002V8Z" fill="#02528E"></path>
                                            <path d="M12.8002 11.2H3.2002V12.8H12.8002V11.2Z" fill="#02528E"></path>
                                            <path d="M11.1998 0H4.7998V3.2H11.1998V0Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    QL tin tuyển dụng
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.resources.business.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M15.0906 10.4657C13.7189 9.60027 12.1484 9.12544 10.5254 9.03662C10.9006 9.21228 11.272 9.39777 11.6243 9.62001C12.4729 10.1547 13.0002 11.1229 13.0002 12.1464V14.9999H16.0002V12.1464C16.0002 11.4638 15.6516 10.8197 15.0906 10.4657Z" fill="#02528E"></path>
                                            <path d="M11.0903 10.4658C8.05031 8.54785 3.94923 8.54785 0.910147 10.4658C0.348641 10.8193 0 11.4634 0 12.1465V15H12V12.1465C12 11.4634 11.6514 10.8193 11.0903 10.4658Z" fill="#02528E"></path>
                                            <path d="M8.99414 7.83439C9.3174 7.93224 9.65098 8.00005 9.99994 8.00005C11.9296 8.00005 13.4999 6.42974 13.4999 4.50004C13.4999 2.57035 11.9296 1 9.99994 1C9.65098 1 9.3174 1.06781 8.99414 1.16566C9.9113 1.99 10.4999 3.17251 10.4999 4.50001C10.4999 5.82751 9.91133 7.01002 8.99414 7.83439Z" fill="#02528E"></path>
                                            <path d="M8.47489 2.02513C9.84174 3.39198 9.84174 5.60802 8.47489 6.97487C7.10803 8.34172 4.89199 8.34172 3.52514 6.97487C2.15829 5.60802 2.15829 3.39198 3.52514 2.02513C4.89199 0.658276 7.10803 0.658307 8.47489 2.02513Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    QL nhà tuyển dụng
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.resources.candidate.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M15.0906 10.4657C13.7189 9.60027 12.1484 9.12544 10.5254 9.03662C10.9006 9.21228 11.272 9.39777 11.6243 9.62001C12.4729 10.1547 13.0002 11.1229 13.0002 12.1464V14.9999H16.0002V12.1464C16.0002 11.4638 15.6516 10.8197 15.0906 10.4657Z" fill="#02528E"></path>
                                            <path d="M11.0903 10.4658C8.05031 8.54785 3.94923 8.54785 0.910147 10.4658C0.348641 10.8193 0 11.4634 0 12.1465V15H12V12.1465C12 11.4634 11.6514 10.8193 11.0903 10.4658Z" fill="#02528E"></path>
                                            <path d="M8.99414 7.83439C9.3174 7.93224 9.65098 8.00005 9.99994 8.00005C11.9296 8.00005 13.4999 6.42974 13.4999 4.50004C13.4999 2.57035 11.9296 1 9.99994 1C9.65098 1 9.3174 1.06781 8.99414 1.16566C9.9113 1.99 10.4999 3.17251 10.4999 4.50001C10.4999 5.82751 9.91133 7.01002 8.99414 7.83439Z" fill="#02528E"></path>
                                            <path d="M8.47489 2.02513C9.84174 3.39198 9.84174 5.60802 8.47489 6.97487C7.10803 8.34172 4.89199 8.34172 3.52514 6.97487C2.15829 5.60802 2.15829 3.39198 3.52514 2.02513C4.89199 0.658276 7.10803 0.658307 8.47489 2.02513Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    QL ứng viên
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.resources.job-post-package.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.49388 0C1.56734 0 0 1.56734 0 3.49388V15.5102C0 15.7807 0.219313 16 0.489781 16H9.34766C9.06122 15.8626 8.79022 15.6988 8.53622 15.5102C8.34034 15.3647 8.1545 15.2045 7.97984 15.0297C7.97678 15.0267 7.97381 15.0235 7.97078 15.0204C7.51762 14.565 7.16138 14.0352 6.91191 13.4455C6.84941 13.2978 6.79453 13.1478 6.74687 12.9959H3.49388C3.22338 12.9959 3.00409 12.7766 3.00409 12.5061C3.00409 12.2357 3.22341 12.0163 3.49388 12.0163H6.54566C6.52847 11.8472 6.51972 11.6767 6.51972 11.5048C6.51972 10.986 6.59856 10.479 6.75387 9.99187H3.49388C3.22338 9.99187 3.00409 9.77256 3.00409 9.50209C3.00409 9.23162 3.22341 9.01231 3.49388 9.01231H7.18666C7.40366 8.63641 7.669 8.29069 7.97988 7.97988C8.43738 7.52238 8.97038 7.16306 9.56409 6.91197C10.1793 6.65175 10.8323 6.51981 11.5048 6.51981C11.6767 6.51981 11.8473 6.52856 12.0163 6.54575V3.49397V0.979594V0.489781V0H3.49388ZM8.52244 6.98775H3.49388C3.22338 6.98775 3.00409 6.76844 3.00409 6.49797C3.00409 6.2275 3.22341 6.00819 3.49388 6.00819H8.52244C8.79294 6.00819 9.01222 6.2275 9.01222 6.49797C9.01222 6.76844 8.79294 6.98775 8.52244 6.98775ZM9.50203 3.98369H3.49388C3.22338 3.98369 3.00409 3.76437 3.00409 3.49391C3.00409 3.22344 3.22341 3.00413 3.49388 3.00413H9.50203C9.77253 3.00413 9.99181 3.22344 9.99181 3.49391C9.99181 3.76437 9.77253 3.98369 9.50203 3.98369Z" fill="#02528E"></path>
                                        <path d="M12.9961 0.0344238V0.489705V0.529705V1.02742V3.00401V3.4938V3.98358H15.5104C15.7809 3.98358 16.0002 3.76426 16.0002 3.4938C16.0002 1.73352 14.6916 0.27333 12.9961 0.0344238Z" fill="#02528E"></path>
                                        <path d="M12.9961 7.7863C12.8375 7.72267 12.6741 7.66867 12.5063 7.62546C12.3466 7.58439 12.1832 7.55289 12.0165 7.53164C11.849 7.51033 11.6783 7.49927 11.5049 7.49927C10.198 7.49927 9.03732 8.12539 8.3062 9.09396C8.09939 9.36795 7.92711 9.66939 7.79545 9.9918C7.60486 10.4586 7.49951 10.9694 7.49951 11.5047C7.49951 11.678 7.51054 11.8488 7.53186 12.0163C7.57432 12.3493 7.6577 12.6696 7.77676 12.9719C8.12167 13.8477 8.76639 14.5725 9.58429 15.0204C10.1545 15.3325 10.8089 15.5101 11.5049 15.5101C11.6782 15.5101 11.8489 15.4991 12.0164 15.4777C12.1831 15.4565 12.3466 15.425 12.5062 15.384C12.674 15.3408 12.8375 15.2868 12.996 15.2231C14.4697 14.6317 15.5103 13.1898 15.5103 11.5047C15.5104 9.81964 14.4698 8.37774 12.9961 7.7863ZM12.5063 11.9945H12.0165H11.5049C11.2344 11.9945 11.0152 11.7752 11.0152 11.5047V10.5033C11.0152 10.2328 11.2345 10.0135 11.5049 10.0135C11.7754 10.0135 11.9947 10.2329 11.9947 10.5033V11.0149H12.0165H12.5063C12.7768 11.0149 12.9961 11.2342 12.9961 11.5047C12.9961 11.7752 12.7768 11.9945 12.5063 11.9945Z" fill="#02528E"></path>
                                    </svg>
                                    QL gói đăng tin
                                </a>
                            </div>

                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.resources.payments.index') }}" class="btn dropdown-employer_list__child">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2842_13249)">
                                            <path d="M12.666 6.66683H3.33268C2.96402 6.66683 2.66602 6.36816 2.66602 6.00016C2.66602 5.63216 2.96402 5.3335 3.33268 5.3335H12.666C13.0347 5.3335 13.3327 5.63216 13.3327 6.00016C13.3327 6.36816 13.0347 6.66683 12.666 6.66683Z" fill="#02528E"></path>
                                            <path d="M7.99935 9.33334H3.33268C2.96402 9.33334 2.66602 9.03468 2.66602 8.66667C2.66602 8.29867 2.96402 8 3.33268 8H7.99935C8.36802 8 8.66602 8.29867 8.66602 8.66667C8.66602 9.03468 8.36802 9.33334 7.99935 9.33334Z" fill="#02528E"></path>
                                            <path d="M6.66602 11.9998H3.33268C2.96402 11.9998 2.66602 11.7012 2.66602 11.3332C2.66602 10.9652 2.96402 10.6665 3.33268 10.6665H6.66602C7.03468 10.6665 7.33268 10.9652 7.33268 11.3332C7.33268 11.7012 7.03468 11.9998 6.66602 11.9998Z" fill="#02528E"></path>
                                            <path d="M12.3327 8.6665C10.3113 8.6665 8.66602 10.3112 8.66602 12.3332C8.66602 14.3552 10.3113 15.9999 12.3327 15.9999C14.354 15.9999 15.9993 14.3552 15.9993 12.3332C15.9993 10.3112 14.354 8.6665 12.3327 8.6665ZM14.2427 11.7818L12.424 13.7818C12.3013 13.9158 12.1307 13.9945 11.9487 13.9998C11.9427 13.9998 11.936 13.9998 11.9307 13.9998C11.7553 13.9998 11.5873 13.9312 11.4627 13.8078L10.448 12.8078C10.1853 12.5492 10.1833 12.1272 10.4413 11.8652C10.6987 11.6025 11.1207 11.5998 11.384 11.8578L11.904 12.3712L13.2553 10.8845C13.504 10.6125 13.926 10.5925 14.1973 10.8398C14.47 11.0878 14.49 11.5092 14.2427 11.7818Z" fill="#02528E"></path>
                                            <path d="M14 0H2C0.9 0 0 0.9 0 2V12.6667C0 13.7667 0.9 14.6667 2 14.6667H7.92C7.69333 14.2533 7.52667 13.8067 7.43333 13.3333H2C1.63333 13.3333 1.33333 13.0333 1.33333 12.6667V3.33333H14.6667V7.92C15.1733 8.18 15.6267 8.52667 16 8.94667V2C16 0.9 15.1 0 14 0V0Z" fill="#02528E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2842_13249">
                                                <rect width="16" height="16" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Lịch sử giao dịch
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <a style="width: 200px" href="{{ route('filament.admin.pages.edit-profile') }}" class="dropdown-employer_list__child btn">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0C3.58887 0 0 3.58887 0 8C0 12.4111 3.58887 16 8 16C12.4111 16 16 12.4111 16 8C16 3.58887 12.4111 0 8 0ZM8 2.33334C10.1136 2.33334 11.8333 4.05306 11.8333 6.16669C11.8333 8.28031 10.1136 10 8 10C5.88641 10 4.16666 8.28028 4.16666 6.16666C4.16666 4.05303 5.88641 2.33334 8 2.33334ZM8 14.6667C5.82166 14.6667 3.89 13.6118 2.67272 11.9912C4.00634 11.3495 5.91088 10.6667 8 10.6667C10.0893 10.6667 11.994 11.3496 13.3273 11.9911C12.11 13.6118 10.1784 14.6667 8 14.6667Z" fill="#02528E"></path>
                                    </svg>
                                    Tài khoản
                                </a>
                            </div>


                            <div  class="d-flex justify-content-center mt-1">
                                <form action="{{ route('filament.admin.auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="width: 200px" class="dropdown-employer_list__child btn">
                                        <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 18px !important; height: 18px !important">
                                            <path fill="#02528E" d="m21.9 11.4c.1-.2.1-.5 0-.8-.1-.1-.1-.2-.2-.3l-2-2c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l.3.3h-2.6c-.6 0-1 .4-1 1s.4 1 1 1h2.6l-.3.3c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l2-2c.1-.1.2-.2.2-.3z"></path>
                                            <path fill="#02528E" d="m17 14c-.6 0-1 .4-1 1v1c0 .6-.4 1-1 1h-1v-8.6c0-1.3-.8-2.4-1.9-2.8l-1.6-.6h4.5c.6 0 1 .4 1 1v1c0 .6.4 1 1 1s1-.4 1-1v-1c0-1.7-1.3-3-3-3h-10c-.1 0-.2 0-.3.1-.1 0-.2.1-.2.1s0 0-.1.1c-.1 0-.2.1-.2.2v.1c-.1 0-.2.1-.2.2v.1.1 14c0 .4.3.8.6.9l6.6 2.5c.2.1.5.1.7.1.4 0 .8-.1 1.1-.4.5-.4.9-1 .9-1.6v-.5h1c1.7 0 3-1.3 3-3v-1c.1-.5-.3-1-.9-1z"></path>
                                        </svg>
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </ul>

                    </div>


                @else
                    <div id="loginContainer" class="login-container">
                        <button type="button" id="loginButton" class="btn btn-primary">Đăng nhập
                        </button>

                        <div
                            style="position: fixed;top: 0;left: 0;right: 0;bottom: 0;background-color: rgba(0, 0, 0, 0.5);z-index: 1000; display: none"
                            id="overlay" class="overlay"></div>

                        <div id="loginModal" class="modal" style="margin: 70px auto">
                            <div class="modal-dialog" style="min-width: 850px">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title mx-auto text-white">ĐĂNG NHẬP HỆ THỐNG</h5>
                                        <button style="width: 30px;" type="button"
                                                class="close border-0 border-radius-5" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true" class="">
                                                    <i style="font-size: 16px" class="bi bi-x"></i>
                                                </span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-around">
                                        <div class="login-box p-3 bg-light">
                                            <h4 class="text-primary mb-2">Đăng nhập ứng viên</h4>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle"></i> + 1.500.000 công việc được cập
                                                    nhật thường xuyên
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Ứng tuyển công việc yêu thích
                                                    HOÀN TOÀN MIỄN PHÍ
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Hiển thị thông tin hồ sơ với nhà
                                                    tuyển dụng hàng đầu
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Nhận bản tin công việc phù hợp
                                                    định kỳ
                                                </li>
                                            </ul>
                                            <a href="{{ route('client.candidate.login') }}"
                                               class="btn btn-primary mt-2">Đăng nhập ứng viên</a>
                                        </div>

                                        <div class="login-box p-3 bg-light">
                                            <h4 class="text-warning mb-2">Đăng nhập nhà tuyển dụng</h4>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle"></i> + 3.000.000 ứng viên tiếp cận
                                                    thông tin tuyển dụng
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Không giới hạn tương tác với ứng
                                                    viên qua hệ thống nhắn tin nội bộ MIỄN PHÍ
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Quảng cáo thông tin giúp tin
                                                    tuyển dụng được phủ rộng
                                                </li>
                                                <li><i class="bi bi-check-circle"></i> Quảng cáo công ty trên Fanpage số
                                                    1 về việc làm - tuyển dụng
                                                </li>
                                            </ul>
                                            <a href="{{route('filament.employer.auth.login')}}"
                                               class="btn btn-warning text-white mt-2">Đăng
                                                nhập nhà tuyển dụng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-account">
                    @if(auth()->check())
                        <h6 class="mb-10">Tài khoản của bạn</h6>
                        <ul class="mobile-menu font-heading">
                            @if(auth()->user()->role == 'candidate')
                                <li>
                                    <a href="{{ route('client.candidate.notification') }}">
                                        Thông báo
                                        <span class="badge bg-danger">
                                            {{ auth()->user()->unreadNotifications->filter(function($notification) {
                                                return isset($notification->data['message']) && !empty($notification->data['message']);
                                            })->count() }}
                                        </span>
                                    </a>
                                </li>
                                <li><a href="{{route('client.candidate.profile')}}">Hồ sơ</a></li>
                                <li><a href="{{route('client.candidate.logout')}}">Đăng xuất</a></li>
                            @else
                                <li><a href="{{route('client.employer.login')}}">Tuyển dụng</a></li>
                                <li><a href="{{route('client.candidate.login')}}">Ứng viên</a></li>
                            @endif
                        </ul>
                    @else
                        <h6 class="mb-10">Đăng nhập</h6>
                        <ul class="mobile-menu font-heading">
                            <li><a href="{{route('client.employer.login')}}">Đăng nhập Tuyển dụng</a></li>
                            <li><a href="{{route('client.candidate.login')}}">Đăng nhập Ứng viên</a></li>
                        </ul>
                    @endif
                </div>
                <hr>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class='active' href='/'>Trang chủ</a></li>
                            <li class="has-children"><a href='{{route('client.job.index')}}'>Việc làm</a></li>
                            <li class="has-children"><a href='{{route('client.employer.index')}}'>Công ty</a></li>
                            <li class="has-children"><a href='{{route('client.cv.list')}}'>Mẫu CV</a></li>
                            <li class="has-children"><a href='{{route('client.post.index')}}'>Tin tức</a></li>

                            <li class="has-children"><a href='{{route('client.pricing.index')}}'>Bảng giá</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@if(!auth()->check())
    <style>
        .modal {
            display: none;
            z-index: 9999;
        }

        .modal-body {
            display: flex;
            justify-content: space-around;
            align-items: stretch;
            gap: 10px;
            text-align: left;
            background-color: #eee;
        }

        .login-box {
            width: 49%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .login-box ul {
            flex: 1;
            margin-bottom: 10px;
        }

        .login-box a {
            align-self: center;
            width: 100%;
            text-align: center;
        }

        .list-unstyled li {
            margin: 5px 0;
        }

        .list-unstyled li i {
            font-size: 16px;
            margin-right: 5px;
            color: #0b5ed7;
        }
    </style>
@endif

<style>
    .dropdown-employer_list__child {
        padding: 8px 15px 8px 19px;
        background-color: transparent;
        gap: 8px;
        display: flex
    ;
        align-items: center;
        color: #333334;
        font-weight: 500;
        transition: .3s all ease-in-out;
        border-radius: 4px;
    }

    .dropdown-employer_list__child:hover {
        background-color: rgb(160 214 255 / 15%);
        color: #333334 !important;
    }
</style>

@push('script')
    <script>
        const loginButton = document.getElementById('loginButton');
        const loginModal = document.getElementById('loginModal');
        const overlay = document.getElementById('overlay');
        const closeModalButton = document.querySelector('#loginModal .close');

        loginButton.addEventListener('click', function () {
            loginModal.style.display = 'block';
            overlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });

        closeModalButton.addEventListener('click', function () {
            loginModal.style.display = 'none';
            overlay.style.display = 'none';
            document.body.style.overflow = '';

        });

        window.addEventListener('click', function (event) {
            if (event.target === loginModal) {
                loginModal.style.display = 'none';
                overlay.style.display = 'none';
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth <= 1200) {
                loginModal.style.display = 'none';
                overlay.style.display = 'none';
            }
        });
    </script>
@endpush
