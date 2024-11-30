<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực Email</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; margin: 0; padding: 20px; background-color: #f4f4f9;">

<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; max-width: 700px; margin: 20px auto; background-color: #ffffff;">
    <h3 style="color: #333;">Xin chào!</h3>

    <div style="margin-top: 15px;">
        <p>Bạn đã đăng ký nhận tin tức trên website
            <strong>
                <a href="https://www.vieclamphuquoc.com.vn/" style="color: #007bff; text-decoration: none;">
                    vieclamphuquoc.com.vn
                </a>
            </strong>. Nếu đó là bạn, xin hãy xác nhận kích hoạt tài khoản có email là: <strong>{{$email}}</strong>.
        </p>
        <p>Click vào nút bên dưới để xác nhận:</p>

        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ route('client.client.verifyEmail', ['token' => $verificationToken]) }}"
               style="display: inline-block; padding: 10px 20px; font-size: 1.25rem; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">
                Xác thực tài khoản
            </a>
        </div>

        <p>Thân ái,</p>
        <p>{{ config('app.name') }}</p>
        <p style="color: #888; font-style: italic; font-weight: bold;">** Nếu yêu cầu không do bạn thực hiện, vui lòng bỏ qua email này!</p>
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
            <p>Email: <a href="mailto:vieclamphuquoc.vn" style="text-decoration: none; color: #007bff;">vieclamphuquoc@gmail.com</a> - Hotline: 09777.850.32</p>
        </div>
    </div>
</div>

</body>
</html>
