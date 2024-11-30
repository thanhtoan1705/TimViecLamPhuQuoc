<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yêu hỗ trợ từ {{ $email }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; margin: 0; padding: 20px; background-color: #f4f4f9;">

<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; max-width: 700px; margin: 20px auto; background-color: #ffffff;">
    <div class="text-center">
        <h3  style="color: #333;">Có yêu hỗ trợ từ {{ $email }}</h3>
    </div>

    <div style="margin-top: 15px;">

        <p><strong>Họ tên:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Số điện thoại:</strong> {{ $phone }}</p>
        <p><strong>Nội dung:</strong></p>
        <p>{{ $content }}</p>
        <br>


        <p>Thân ái,</p>
        <p>{{ config('app.name') }}</p>
        <p style="color: #555555; font-style: italic; font-weight: bold;">** Nếu yêu cầu không do bạn thực hiện, vui lòng bỏ qua email này!</p>
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
            <p>
                Email:
                <a href="{{ check_empty($settings->email, 'vieclamphuquoc@gmail.com') }}" style="text-decoration: none; color: #007bff;">
                    {{ check_empty($settings->email, 'vieclamphuquoc@gmail.com') }}</a>
                    - Hotline: {{ check_empty($settings->hotline, '09777.850.32') }}
            </p>
        </div>
    </div>
</div>

</body>
</html>

