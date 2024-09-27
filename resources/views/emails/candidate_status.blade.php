<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tình trạng hồ sơ</title>
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
        .email-body {
            margin-top: 20px;
        }
        ul {
            padding-left: 20px;
        }
        ul li {
            list-style-type: disc;
        }
        .email-footer {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div>
        <h3>Chào {{ $candidateName }},</h3>
    </div>

    <div class="email-body">
        @if ($status === 'Phỏng vấn')
            <p>Chúc mừng! Hồ sơ của bạn đã vượt qua vòng sơ tuyển và bạn đã được chọn để phỏng vấn tại công ty {{ $companyName }}. Vui lòng kiểm tra chi tiết dưới đây:</p>
            <div class="box-info border border-primary">
                <p><strong>Nhà tuyển dụng:</strong> {{ $employerName }}</p>
                <p><strong>Tên công ty:</strong> {{ $companyName }}</p>
                <p><strong>Địa chỉ công ty:</strong> {{ $companyAddress }}</p>
                <p><strong>Email liên hệ:</strong> {{ $companyEmail }}</p>
                <p><strong>Vị trí ứng tuyển:</strong> {{ $jobPosition }}</p>
            </div>
            <p>Chúng tôi mong đợi được gặp bạn trong buổi phỏng vấn sắp tới. Vui lòng đăng nhập vào tài khoản của bạn để kiểm tra thông tin chi tiết về buổi phỏng vấn.</p>
        @elseif ($status === 'Trúng tuyển')
            <p>Chúc mừng! Bạn đã được tuyển dụng tại công ty {{ $companyName }}. Vui lòng kiểm tra các thông tin dưới đây:</p>
            <div class="box-info border border-primary">
                <p><strong>Nhà tuyển dụng:</strong> {{ $employerName }}</p>
                <p><strong>Tên công ty:</strong> {{ $companyName }}</p>
                <p><strong>Địa chỉ công ty:</strong> {{ $companyAddress }}</p>
                <p><strong>Email liên hệ:</strong> {{ $companyEmail }}</p>
                <p><strong>Vị trí ứng tuyển:</strong> {{ $jobPosition }}</p>
            </div>
            <p>Chúng tôi rất vui mừng khi bạn trở thành một phần của công ty. Vui lòng đăng nhập vào tài khoản của bạn để xem thêm chi tiết và các bước tiếp theo.</p>
        @elseif ($status === 'Từ chối')
            <p>Rất tiếc, sau khi xem xét kỹ lưỡng, chúng tôi phải thông báo rằng bạn đã không được chọn cho vị trí tại công ty {{ $companyName }}. Thông tin chi tiết:</p>
            <div class="box-info border border-primary">
                <p><strong>Nhà tuyển dụng:</strong> {{ $employerName }}</p>
                <p><strong>Tên công ty:</strong> {{ $companyName }}</p>
                <p><strong>Địa chỉ công ty:</strong> {{ $companyAddress }}</p>
                <p><strong>Email liên hệ:</strong> {{ $companyEmail }}</p>
                <p><strong>Vị trí ứng tuyển:</strong> {{ $jobPosition }}</p>
            </div>
            <p>Chúng tôi cảm ơn bạn đã dành thời gian và nỗ lực ứng tuyển. Hy vọng có cơ hội hợp tác với bạn trong tương lai.</p>
        @else
            <p>Tình trạng hồ sơ của bạn tại công ty {{ $companyName }} đã được cập nhật: {{ $status }}. Vui lòng đăng nhập vào tài khoản của bạn để kiểm tra chi tiết.</p>
        @endif
        <p>Cảm ơn bạn đã ứng tuyển!</p>
    </div>

    <div class="email-footer">
        <p><strong>Việc Làm Phú Quốc</strong></p>
        <p>Email: <a href="mailto:vieclamphuquoc.vn">vieclamphuquoc.vn</a> - Hotline: 09777.850.32</p>
    </div>
</div>
</body>
</html>
