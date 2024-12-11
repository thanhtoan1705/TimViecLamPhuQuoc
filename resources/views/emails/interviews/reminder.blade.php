<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhắc nhở: Lịch phỏng vấn sắp diễn ra</title>
    <style>
        p {
            font-size: 16px !important;
            line-height: 25px;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; color: #333; font-size: 14px;">
<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; margin: 20px auto; width: 100%; max-width: 700px;">

    <div style="margin-top: 15px;">
        <strong style="display: inline-block; text-align: center; font-size: 18px; width: 100%;">Nhắc nhở: Lịch phỏng vấn sắp diễn ra</strong>

        <div style="margin-top: 20px;">
            <p>Kính gửi {{ $candidate->user->name }},</p>

            <p>Chúng tôi xin nhắc nhở bạn về buổi phỏng vấn sắp diễn ra:</p>

            <p><strong>Thông tin chi tiết:</strong></p>
            <ul>
                <li>Tiêu đề: {{ $interview->title }}</li>
                <li>Thời gian: {{ $interview->start_time->format('H:i d/m/Y') }}</li>
                <li>Thời lượng: {{ $interview->duration }} phút</li>
                @if($interview->interview_type === 'online')
                    <li>Hình thức: Phỏng vấn online</li>
                    <li>Link phỏng vấn: <a href="{{ $interview->zoom_join_url }}" style="color: #007bff; text-decoration: none;">{{ $interview->zoom_join_url }}</a></li>
                @else
                    <li>Hình thức: Phỏng vấn trực tiếp</li>
                    <li>Địa điểm: {{ $interview->location }}</li>
                @endif
            </ul>
        </div>

        @if($interview->interview_type === 'online')
            <p style="text-align: center;">
                <a href="{{ $interview->zoom_join_url }}"
                   style="display: inline-block;
                          background-color: #007bff;
                          color: white;
                          padding: 10px 20px;
                          text-decoration: none;
                          border-radius: 5px;
                          margin-top: 15px;">
                    Tham gia phỏng vấn
                </a>
            </p>
        @endif
    </div>

    <div style="margin-top: 20px;">
        <div style="text-align: center;">
            <img src="{{ getStorageImageUrl($settings->logo_website, config('image.main-logo')) }}" alt="Logo" style="width: 150px;">
        </div>
        <div style="text-align: center; margin-top: 15px;">
            <div><strong>Việc Làm Phú Quốc</strong></div>
            <div>
                <a href="#" style="text-decoration: none; color: #007bff;">Liên hệ</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Hồ sơ ứng viên</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Phí đăng tin</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Hướng dẫn</a>
            </div>
            <div>Email: <a href="mailto:vieclamphuquoc.hotro@gmail.com">vieclamphuquoc.com.vn</a> - Hotline: 0336.216.546</div>
        </div>
    </div>
</div>
</body>
</html>
