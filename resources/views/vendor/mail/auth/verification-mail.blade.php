<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực tài khoản</title>
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
        <p>Bạn đã đăng ký tài khoản trên website
            <strong>
                <a href="https://www.vieclamphuquoc.com.vn/">
                    vieclamphuquoc.com.vn
                </a>
            </strong>.
            Nếu đó là bạn xin hãy xác nhận kích hoạt tài khoản
            có email là: <strong>{{$user->email}}</strong>
        </p>
        <p>Click vào nút bên dưới để xác nhận:</p>

        <div class="text-center">
            <a href="{{ route('client.candidate.verify-email', ['token' => $token]) }}" class="btn btn-primary btn-lg">
                Xác thực tài khoản
            </a>
        </div>
        <p class="mt-4">Thân ái,</p>
        <p>{{ config('app.name') }}</p>
        <p class="text-muted fst-italic fw-bold mt-4">** Nếu yêu cầu không do bạn thực hiện, vui lòng bỏ qua email này!</p>
    </div>

    <div class="email-footer mt-4">
        <div class="company-logo text-center">
            <img src="{{ asset('assets/client/imgs/template/pq2.svg') }}" alt="JobBox Logo">
        </div>
        <div class="contact-info text-center mt-3">
            <p><strong>Việc Làm Phú Quốc</strong></p>
            <p>
                <a href="{{ route('client.client.lien-he') }}">Liên hệ</a> |
                <a href="{{ route('client.client.lien-he') }}">Hồ sơ ứng viên</a> |
                <a href="{{ route('client.pricing.index') }}">Phí đăng tin</a> |
                <a href="{{ route('client.client.about') }}">Về chúng tôi</a>
            </p>
            <p>Website: <a href="https://www.vieclamphuquoc.com.vn/">vieclamphuquoc.com.vn</a>
                - Email: <a href="mailto:vieclamphuquoc.hotro@gmail.com">vieclamphuquoc.hotro@gmail.com</a>
                <br>Hotline: 0336.216.54
            </p>
        </div>
    </div>
</div>
</body>
</html>

