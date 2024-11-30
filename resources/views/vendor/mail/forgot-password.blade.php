<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; margin: 20px auto; width: 100%; max-width: 700px;">
    <div>
        <h3>Xin chào {{$user->name}}</h3>
    </div>

    <div style="margin-top: 15px;">
        <p>Gần đây, bạn đã yêu cầu đặt lại mật khẩu cho tài khoản đăng ký tại <strong>vieclamphuquoc.com.vn</strong>
            có email là: {{$user->email}}
        </p>
        <p>Để cập nhật mật khẩu, hãy nhấp vào nút bên dưới:</p>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('client.newPass', $user->remember_token) }}"
               style="text-align: center; display: inline-block; padding: 10px 20px; font-size: 1.25rem; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">
                Đặt lại mật khẩu
            </a>
        </div>

        <p style="margin-top: 20px;">Thân ái,</p>
        <p>Vieclamphuquoc</p>
        <p style="color: #6c757d; font-style: italic; font-weight: bold; margin-top: 20px;">** Nếu yêu cầu không do bạn thực hiện, vui lòng bỏ qua email này!</p>
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
