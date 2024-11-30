@component('mail::message')
{!! $additionalContent !!}

@component('mail::button', ['url' => $interview->interview_type === 'online' ? $interview->zoom_join_url : '#'])
Tham gia phỏng vấn
@endcomponent

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
    <tr>
        <td style="padding: 10px; background-color: #f8f9fa;">
            <div style="text-align: center;">
                <img src="{{ getStorageImageUrl($settings->logo_website, config('image.main-logo')) }}" alt="Việc Làm Phú Quốc" style="width: 150px;">
            </div>
            <div style="text-align: center; margin-top: 15px;">
                <div><strong>Việc Làm Phú Quốc</strong></div>
                <div>
                    <a href="#" style="text-decoration: none; color: #007bff;">Liên hệ</a> |
                    <a href="#" style="text-decoration: none; color: #007bff;">Hồ sơ ứng viên</a> |
                    <a href="#" style="text-decoration: none; color: #007bff;">Phí đăng tin</a> |
                    <a href="#" style="text-decoration: none; color: #007bff;">Hướng dẫn</a>
                </div>
                <div>Email: <span href="mailto:vieclamphuquoc.hotro@gmail.com">vieclamphuquoc.com.vn</span> - Hotline: 0336.216.546</div>
            </div>
        </td>
    </tr>
</table>
@endcomponent
