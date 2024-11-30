<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo hết hạn gói dịch vụ</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; margin: 20px auto; width: 100%; max-width: 700px;">
    <div>
        <h3>Xin chào {{ $employerName }}</h3>
    </div>

    <div style="margin-top: 15px;">
        <p><strong>vieclamphuquoc.com.vn</strong> trân trọng thông báo:</p>
        <p>Gói dịch vụ của bạn sẽ hết hạn sau {{ $remainingDays }} ngày, vào ngày {{ $expiryDate }}.</p>
        <p>Vui lòng gia hạn gói dịch vụ của bạn để không bị gián đoạn.</p>

        <p>Để xem thêm các gói, vui lòng đăng nhập tài khoản của quý công ty tại
            <a href="{{ route('filament.employer.auth.login') }}" style="color: #007bff; text-decoration: none;">Việc Làm Phú Quốc</a>
        </p>
    </div>

    <div style="margin-top: 20px;">
        <div style="text-align: center;">
            <img src="{{ getStorageImageUrl($settings->logo_website, config('image.main-logo')) }}" alt="ViecLamPhuQuoc" style="width: 150px;">
        </div>
        <div style="text-align: center; margin-top: 15px;">
            <p><strong>Việc Làm Phú Quốc</strong></p>
            <p>
                <a href="#" style="text-decoration: none; color: #007bff;">Liên hệ</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Hồ sơ ứng viên</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Phí đăng tin</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Hướng dẫn</a>
            </p>
            <p>Email: <a href="mailto:vieclamphuquoc.hotro@gmail.com">vieclamphuquoc.vn</a> - Hotline: 0336.216.546</p>
        </div>
    </div>
</div>
</body>
</html>
