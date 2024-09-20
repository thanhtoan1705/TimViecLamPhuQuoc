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

        .pricing-title-a{
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
            justify-content: space-around;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
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
            min-height: 350px;
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .price {
            font-size: 36px;
            color: #2d7ef7;
            margin: 10px 0;
        }

        .price span {
            font-size: 18px;
            color: #888;
        }

        .description {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Số dòng bạn muốn hiển thị */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
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
        }

        .subscribe-btn:hover {
            background-color: #1a5abf;
            color: white;
        }
    </style>
    <div>
        <h1 class="pricing-title-h1">Bảng giá đăng tin VIP</h1>
        <p class="pricing-title-p">Chọn gói phù hợp và tốt nhất dành cho doanh nghiệp của bạn</p>
    </div>
    <div class="card">
        @foreach($packages as $package)
            <div class="main">
                <h2>{{ $package->title }}</h2>
                <div class="price">{{ number_format($package->price) }}<span>đ/tháng</span></div>
                <div class="description">{{ $package->descriptions }}</div>
                <ul class="features">
                    <li>Cập nhật tin không giới hạn</li>
                    <li>Đăng {{ $package->limit_job_post }} bản tin/tháng</li>
                </ul>
                <form action="{{ route('client.employer.payment') }}" method="GET">
                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                    <button type="submit" class="subscribe-btn">Đăng ký</button>
                </form>
            </div>
        @endforeach
    </div>
    <div>
        <h1 class="pricing-title-h1">Giá tiền đã bao gồm VAT</h1>
        <a class="pricing-title-a" href="tel:0354233642">Liên hệ: 0354233642</a>
    </div>
</x-filament::page>
