<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
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
        .box-info {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .company-logo img {
            width: 150px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div>
        <h3>Xin chào {{$user->name}}</h3>
    </div>

    <div class="email-body mt-3">
        <p>Gần đây, bạn đã yêu cầu đặt lại mật khẩu cho tài khoản đăng ký tại <strong>vieclamphuquoc.com.vn</strong>
            có email là: {{$user->email}}
        </p>
        <p>Để cập nhật mật khẩu, hãy nhấp vào nút bên dưới:</p>

        <a href="{{ route('client.newPass', $user->remember_token) }}" class="btn btn-primary btn-lg">Đặt lại mật khẩu</a>
        <p class="mt-4">Thân ái,</p>
        <p>Vieclamphuquoc</p>
        <p class="text-muted fst-italic fw-bold mt-4">** Nếu yêu cầu không do bạn thực hiện, vui lòng bỏ qua email này!</p>
    </div>

    <div class="email-footer mt-4">
        <div class="company-logo text-center">
            <img src="{{ asset('assets/client/imgs/template/pq2.svg') }}" alt="JobBox Logo">
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
