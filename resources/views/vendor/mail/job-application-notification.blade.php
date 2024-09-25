<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo ứng tuyển</title>
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
            <h3>Xin chào {{ $employer->company_name }},</h3>
        </div>

        <div class="email-body mt-3">
            <p><strong>vieclamphuquoc.vn</strong> trân trọng thông báo:</p>
            <p>Quý công ty vừa nhận được một hồ sơ ứng tuyển vào vị trí <strong>{{ $job->title }}</strong> từ ứng viên <strong>{{ $candidate->user->name }}</strong>.</p>

            <div class="box-info border border-primary">
                <p><strong>Thông tin chi tiết của ứng viên như sau:</strong></p>
                <p>Họ & tên: <strong>{{ $candidate->user->name }}</strong></p>
                <p>Email: <strong>{{ $candidate->user->email }}</strong></p>
                <p>Số điện thoại: <strong>{{ $candidate->user->phone }}</strong></p>
            </div>

            <p class="mt-3">Để gửi phản hồi đến ứng viên, quý công ty vui lòng <strong>trả lời (Reply)</strong> lại email này.</p>
            <p>Chi tiết thông tin ứng viên xem tại file đính kèm bên dưới.</p>
            <p>Để xem lại các hồ sơ đã ứng tuyển, vui lòng đăng nhập tài khoản của quý công ty tại
                <a href="{{ route('client.client.index') }}">Việc Làm Phú Quốc</a>
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
