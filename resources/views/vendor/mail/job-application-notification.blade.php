<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo ứng tuyển</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; margin: 20px auto; width: 100%; max-width: 700px;">
    <div>
        <h3>Xin chào {{ $employer->company_name }},</h3>
    </div>

    <div style="margin-top: 15px;">
        <p><strong>vieclamphuquoc.com.vn</strong> trân trọng thông báo:</p>
        <p>Quý công ty vừa nhận được một hồ sơ ứng tuyển vào vị trí <strong>{{ $job->title }}</strong> từ ứng viên <strong>{{ $candidate->user->name }}</strong>.</p>

        <div style="border: 1px solid #007bff; padding: 15px; margin-top: 15px; background-color: #f9f9f9; border-radius: 5px;">
            <p><strong>Thông tin chi tiết của ứng viên như sau:</strong></p>
            <p>Họ & tên: <strong>{{ $candidate->user->name }}</strong></p>
            <p>Email: <strong>{{ $candidate->user->email }}</strong></p>
            <p>Số điện thoại: <strong>{{ $candidate->user->phone }}</strong></p>
        </div>

        <p style="margin-top: 15px;">Để gửi phản hồi đến ứng viên, quý công ty vui lòng <strong>trả lời (Reply)</strong> lại email này.</p>
        <p>Chi tiết thông tin ứng viên xem tại file đính kèm bên dưới.</p>
        <p>Để xem lại các hồ sơ đã ứng tuyển, vui lòng đăng nhập tài khoản của quý công ty tại
            <a href="{{ route('client.client.index') }}" style="color: #007bff; text-decoration: none;">Việc Làm Phú Quốc</a>
        </p>
    </div>

    <div style="margin-top: 20px;">
        <div style="text-align: center;">
            <img src="{{ asset('assets/client/imgs/template/pq2.svg') }}" alt="ViecLamPhuQuoc" style="width: 150px;">
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
