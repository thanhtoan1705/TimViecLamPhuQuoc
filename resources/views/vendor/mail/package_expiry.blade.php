<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo hết hạn gói dịch vụ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .email-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            width: 100%;
            max-width: 700px;
        }

        .company-logo img {
            width: 150px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div>
        <h3>Xin chào {{ $employerName }}</h3>
    </div>

    <div class="email-body mt-3">
        <p><strong>vieclamphuquoc.com.vn</strong> trân trọng thông báo:</p>
        <p>Gói dịch vụ của bạn sẽ hết hạn sau {{ $remainingDays }} ngày, vào ngày {{ $expiryDate }}.</p>
        <p>Vui lòng gia hạn gói dịch vụ của bạn để không bị gián đoạn.</p>

        <p>Để xem thêm các gói, vui lòng đăng nhập tài khoản của quý công ty tại
            <a href="{{ route('filament.employer.auth.login') }}">Việc Làm Phú Quốc</a>
        </p>
    </div>

    <div class="email-footer mt-4">
        <div class="company-logo text-center">
            <img src="{{ asset('assets/client/imgs/template/jobhub-logo.svg') }}" alt="JobBox Logo">
        </div>
        <div class="contact-info text-center mt-3">
            <p><strong>Việc Làm Phú Quốc</strong></p>
            <p>
                <a href="#">Liên hệ</a> |
                <a href="#">Hồ sơ ứng viên</a> |
                <a href="#">Phí đăng tin</a> |
                <a href="#">Hướng dẫn</a>
            </p>
            <p>Email: <a href="mailto:vieclamphuquoc.vn">vieclamphuquoc.vn</a> - Hotline: 09777.850.32</p>
        </div>
    </div>
</div>
</body>
</html>
