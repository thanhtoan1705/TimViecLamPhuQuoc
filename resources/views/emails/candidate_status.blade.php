<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật tình trạng hồ sơ</title>
</head>
<body>
<p>Chào {{ $candidateName }},</p>

@if ($status === 'Phỏng vấn')
    <p>Chúc mừng! Hồ sơ của bạn đã vượt qua vòng sơ tuyển và bạn đã được chọn để phỏng vấn tại công ty {{ $companyName }}. Vui lòng kiểm tra chi tiết dưới đây:</p>
    <ul>
        <li><strong>Nhà tuyển dụng:</strong> {{ $employerName }}</li>
        <li><strong>Tên công ty:</strong> {{ $companyName }}</li>
        <li><strong>Địa chỉ công ty:</strong> {{ $companyAddress }}</li>
        <li><strong>Email liên hệ:</strong> {{ $companyEmail }}</li>
        <li><strong>Vị trí ứng tuyển:</strong> {{ $jobPosition }}</li>
    </ul>
    <p>Chúng tôi mong đợi được gặp bạn trong buổi phỏng vấn sắp tới. Vui lòng đăng nhập vào tài khoản của bạn để kiểm tra thông tin chi tiết về buổi phỏng vấn.</p>
@elseif ($status === 'Trúng tuyển')
    <p>Chúc mừng! Bạn đã được tuyển dụng tại công ty {{ $companyName }}. Vui lòng kiểm tra các thông tin dưới đây:</p>
    <ul>
        <li><strong>Nhà tuyển dụng:</strong> {{ $employerName }}</li>
        <li><strong>Tên công ty:</strong> {{ $companyName }}</li>
        <li><strong>Địa chỉ công ty:</strong> {{ $companyAddress }}</li>
        <li><strong>Email liên hệ:</strong> {{ $companyEmail }}</li>
        <li><strong>Vị trí ứng tuyển:</strong> {{ $jobPosition }}</li>
    </ul>
    <p>Chúng tôi rất vui mừng khi bạn trở thành một phần của công ty. Vui lòng đăng nhập vào tài khoản của bạn để xem thêm chi tiết và các bước tiếp theo.</p>
@elseif ($status === 'Từ chối')
    <p>Rất tiếc, sau khi xem xét kỹ lưỡng, chúng tôi phải thông báo rằng bạn đã không được chọn cho vị trí tại công ty {{ $companyName }}. Thông tin chi tiết:</p>
    <ul>
        <li><strong>Nhà tuyển dụng:</strong> {{ $employerName }}</li>
        <li><strong>Tên công ty:</strong> {{ $companyName }}</li>
        <li><strong>Địa chỉ công ty:</strong> {{ $companyAddress }}</li>
        <li><strong>Email liên hệ:</strong> {{ $companyEmail }}</li>
        <li><strong>Vị trí ứng tuyển:</strong> {{ $jobPosition }}</li>
    </ul>
    <p>Chúng tôi cảm ơn bạn đã dành thời gian và nỗ lực ứng tuyển. Hy vọng có cơ hội hợp tác với bạn trong tương lai.</p>
@else
    <p>Tình trạng hồ sơ của bạn tại công ty {{ $companyName }} đã được cập nhật: {{ $status }}. Vui lòng đăng nhập vào tài khoản của bạn để kiểm tra chi tiết.</p>
@endif

<p>Cảm ơn bạn đã ứng tuyển!</p>
</body>
</html>
