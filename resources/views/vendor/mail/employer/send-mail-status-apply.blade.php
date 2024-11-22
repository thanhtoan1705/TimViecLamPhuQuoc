<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
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

        <strong style="display: inline-block; text-align: center; font-size: 18px; width: 100%;">{{ $subject }}</strong>

        <div style="margin-top: 20px;">
            {!! $content !!}
        </div>

        @if($interviewDate)

            @if($profileStatus)
                @php
                    $dateAlert = '';
                    if($profileStatus == 'interview')
                        $dateAlert = 'Thời gian phỏng vấn';
                    elseif($profileStatus == 'accepted')
                        $dateAlert = 'Thời gian nhận việc';

                @endphp
            @endif

            <p>
                <strong>{{$dateAlert}}: {{ \Carbon\Carbon::parse($interviewDate)->format('H:i') }}, ngày {{ \Carbon\Carbon::parse($interviewDate)->format('d') }} tháng {{ \Carbon\Carbon::parse($interviewDate)->format('m') }} năm {{ \Carbon\Carbon::parse($interviewDate)->format('Y') }}</strong>
            </p>
        @endif
        <p>
            Trân trọng.
        </p>

    </div>

    <div style="margin-top: 20px;">
        <div style="text-align: center;">
            <img src="{{ getStorageImageUrl($settings->logo_website, config('image.main-logo')) }}" alt="{{ $subject }}" style="width: 150px;">
        </div>
        <div style="text-align: center; margin-top: 15px;">
            <p><strong>Việc Làm Phú Quốc</strong></p>
            <p>
                <a href="#" style="text-decoration: none; color: #007bff;">Liên hệ</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Hồ sơ ứng viên</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Phí đăng tin</a> |
                <a href="#" style="text-decoration: none; color: #007bff;">Hướng dẫn</a>
            </p>
            <p>Email: <a href="mailto:vieclamphuquoc.hotro@gmail.com">vieclamphuquoc.com.vn</a> - Hotline: 0336.216.546</p>
        </div>
    </div>
</div>
</body>
</html>
