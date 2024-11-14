<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Viết Mới</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; font-size: 14px;">
<div style="border: 1px solid #ddd; border-radius: 5px; padding: 20px; margin: 20px auto; width: 100%; max-width: 700px;">
    <div>
        <h3>Xin chào bạn!</h3>
    </div>

    <div style="margin-top: 15px;">
        <p>Chúng tôi vừa đăng một bài viết mới trên <strong>vieclamphuquoc.com.vn</strong> mà có thể bạn quan tâm.</p>
        <span style="display: inline-block; text-align: center; font-size: 16px; width: 100%;">{{ $post->title }}</span>
        <div style="text-align: center; margin-top: 10px;">
            <img src="{{ getStorageImageUrl($post->image, config('image.blog')) }}" alt="{{$post->title}}" style="max-width: 100%; height: auto; max-height: 300px;">
        </div>
        <p>Để đọc bài viết, hãy nhấp vào nút bên dưới:</p>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{route('client.post.detail' , $post->slug)}}"
               style="text-align: center; display: inline-block; padding: 10px; font-size: 1.2rem; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">
               Đọc Bài Viết
            </a>
        </div>

        <p style="margin-top: 20px;">Cảm ơn bạn đã luôn đồng hành cùng chúng tôi,</p>
        <p>Đội ngũ Việc Làm Phú Quốc</p>
        <p style="color: #6c757d; font-style: italic; font-weight: bold; margin-top: 20px;">** Nếu bạn không quan tâm đến nội dung này, vui lòng bỏ qua email này!</p>
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
            <p>Email: <a href="mailto:vieclamphuquoc.hotro@gmail.com">vieclamphuquoc.vn</a> - Hotline: 0336.216.546</p>
        </div>
    </div>
</div>
</body>
</html>
