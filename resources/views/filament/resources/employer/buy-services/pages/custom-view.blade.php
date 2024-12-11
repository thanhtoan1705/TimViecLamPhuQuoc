<x-filament::page>
    <style>
        .fi-header {
            display: none;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .pricing-title-h1 {
            text-align: center;
            font-size: 20px;
            font-weight: bolder;
        }

        .pricing-title-p {
            text-align: center;
            font-size: 16px;
        }

        .pricing-title-a {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            text-align: center;
            font-size: 16px;
        }

        .card {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Căn giữa các card */
            align-items: stretch; /* Đảm bảo chiều cao các thẻ đều nhau */
            max-width: 1000px;
            margin: 20px auto 0;
        }

        .main {
            min-width: 300px;
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin: 10px; /* Tạo khoảng cách giữa các thẻ */

            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
            transition: transform 0.3s;
        }

        .main:hover {
            transform: translateY(-5px); /* Hiệu ứng nổi lên khi hover */
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .price {
            font-size: 1.5rem;
            color: #e74c3c;
            margin: 10px 0;
            text-align: center;
        }

        .price span {
            font-size: 18px;
            color: #888;
        }

        .features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
            flex-grow: 1;
        }

        .features li {
            font-size: 14px;
            margin-bottom: 10px;
            color: #333;
        }

        .features li:before {
            content: '✔️';
            margin-right: 10px;
            color: #2d7ef7;
        }

        .subscribe-btn {
            width: 250px;
            background-color: white;
            color: #2d7ef7;
            padding: 10px 20px;
            border: #2d7ef7 solid 1px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            align-self: center;
        }

        .subscribe-btn:hover {
            background-color: #1a5abf;
            color: white;
        }
    </style>
    <div>
        <h1 class="pricing-title-h1">Bảng giá đăng tin VIP 1 tuần</h1>
        <p class="pricing-title-p">Chọn gói phù hợp và tốt nhất dành cho doanh nghiệp của bạn</p>
    </div>
    <div class="card">
        @foreach($packages as $package)
            @if ($package->period == 7)
                <div class="main">
                    <h2>{{ $package->title }}</h2>
                    <div class="price">{{ number_format($package->price) }}<span>đ</span></div>
                    <ul class="features">
                        <li>Được bảo hành dịch vụ</li>
                        @if ($package->label != 0)
                            <li>
                                @if ($package->label == 1)
                                    Tin tuyển dụng được gắn nhãn GẤP vào tiêu đề tin.
                                @elseif ($package->label == 2)
                                    Tin tuyển dụng được gắn nhãn HOT vào tiêu đề tin.
                                @endif
                            </li>
                        @endif
                        @if (!($package->display_haste == 0 && $package->display_best == 0 && $package->display_top == 0))
                            <li>
                                @if ($package->display_top == 1)
                                    Đăng tin tuyển dụng với vị trí nổi bật.
                                @elseif ($package->display_best == 1)
                                    Đăng tin tuyển dụng với vị trí tốt nhất.
                                @elseif ($package->display_haste == 1)
                                    Đăng tin tuyển dụng với vị trí hàng đầu.
                                @endif
                            </li>
                        @endif
                        <li>Đăng thêm {{ $package->limit_job_post }} bản tin/tuần</li>
                    </ul>
                    @php
                        $userpackages = $this->userpackages;
                        $purchased = $userpackages->where('packages_id', $package->id)
                            ->where('status', 1)
                            ->isNotEmpty();
                        $canPurchase = $this->canPurchasePackage($package);
                    @endphp

                    <form action="{{ route('client.employer.payment') }}" method="GET">
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <button type="submit"
                                class="subscribe-btn"
                                @if(!$canPurchase) disabled @endif
                                style="@if(!$canPurchase) opacity: 0.5; cursor: not-allowed; @endif">
                            @if(!$canPurchase)
                                Đã đủ số lượng
                            @else
                                {{ $purchased ? 'Gia hạn' : 'Đăng ký' }}
                            @endif
                        </button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
    <div>
        <h1 class="pricing-title-h1">Bảng giá đăng tin VIP 1 tháng</h1>
        <p class="pricing-title-p">Chọn gói phù hợp và tốt nhất dành cho doanh nghiệp của bạn</p>
    </div>
    <div class="card">
        @foreach($packages as $package)
            @if ($package->period == 30 && ($package->display_top == 1 || $package->display_best == 1 || $package->display_haste == 1))
                <div class="main">
                    <h2>{{ $package->title }}</h2>
                    <div class="price">{{ number_format($package->price) }}<span>đ</span></div>
                    <ul class="features">
                        <li>Được bảo hành dịch vụ</li>
                        @if ($package->label != 0)
                            <li>
                                @if ($package->label == 1)
                                    Tin tuyển dụng được gắn nhãn GẤP vào tiêu đề tin.
                                @elseif ($package->label == 2)
                                    Tin tuyển dụng được gắn nhãn HOT vào tiêu đề tin.
                                @endif
                            </li>
                        @endif
                        @if (!($package->display_haste == 0 && $package->display_best == 0 && $package->display_top == 0))
                            <li>
                                @if ($package->display_top == 1)
                                    Đăng tin tuyển dụng với vị trí nổi bật.
                                @elseif ($package->display_best == 1)
                                    Đăng tin tuyển dụng với vị trí tốt nhất.
                                @elseif ($package->display_haste == 1)
                                    Đăng tin tuyển dụng với vị trí hàng đầu.
                                @endif
                            </li>
                        @endif
                        <li>Đăng thêm {{ $package->limit_job_post }} bản tin/tháng</li>
                    </ul>
                    @php
                        $userpackages = $this->userpackages;
                        $purchased = $userpackages->where('packages_id', $package->id)
                            ->where('status', 1)
                            ->isNotEmpty();
                        $canPurchase = $this->canPurchasePackage($package);
                    @endphp

                    <form action="{{ route('client.employer.payment') }}" method="GET">
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <button type="submit"
                                class="subscribe-btn"
                                @if(!$canPurchase) disabled @endif
                                style="@if(!$canPurchase) opacity: 0.5; cursor: not-allowed; @endif">
                            @if(!$canPurchase)
                                Đã đủ số lượng
                            @else
                                {{ $purchased ? 'Gia hạn' : 'Đăng ký' }}
                            @endif
                        </button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
    <div>
        <h1 class="pricing-title-h1">Dịch vụ cộng thêm</h1>
        <p class="pricing-title-p">Thêm tùy chọn giúp tin tuyển dụng nổi bật hơn với ứng viên</p>
    </div>
    <div class="card">
        @foreach($packages as $package)
            @if ($package->label != 0 && ($package->display_top == 0 && $package->display_best == 0 && $package->display_haste == 0))
                <div class="main">
                    <h2>{{ $package->title }}</h2>
                    <div class="price">{{ number_format($package->price) }}<span>đ/tháng</span></div>
                    <ul class="features">
                        <li>Được bảo hành dịch vụ</li>
                        <li>
                            @if ($package->label == 1)
                                Tin tuyển dụng được gắn nhãn GẤP vào tiêu đề tin.
                            @elseif ($package->label == 2)
                                Tin tuyển dụng được gắn nhãn HOT vào tiêu đề tin.
                            @endif
                        </li>
                        <li>Đăng thêm {{ $package->limit_job_post }} bản tin/tháng</li>
                    </ul>
                    @php
                        $userpackages = $this->userpackages;
                        $purchased = $userpackages->where('packages_id', $package->id)
                            ->where('status', 1)
                            ->isNotEmpty();
                        $canPurchase = $this->canPurchasePackage($package);
                    @endphp

                    <form action="{{ route('client.employer.payment') }}" method="GET">
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <button type="submit"
                                class="subscribe-btn"
                                @if(!$canPurchase) disabled @endif
                                style="@if(!$canPurchase) opacity: 0.5; cursor: not-allowed; @endif">
                            @if(!$canPurchase)
                                Đã đủ số lượng
                            @else
                                {{ $purchased ? 'Gia hạn' : 'Đăng ký' }}
                            @endif
                        </button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
    <div>
        <h1 class="pricing-title-h1">Giá tiền đã bao gồm VAT</h1>
        <a target="_blank" class="pricing-title-a" href="https://zalo.me/0336216546">Liên hệ: 0336216546</a>
    </div>
</x-filament::page>
