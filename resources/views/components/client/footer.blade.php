



<footer class="footer mt-50">
    <div class="container">
      <div class="row">
        <div class="footer-col-1 col-md-3 col-sm-12">
            <a href='{{ route('client.client.index') }}'>
                @php
                    $logo_website = getStorageImageUrl($settings->logo_website, config('image.main-logo'));
                 @endphp
                <img style="width: 185px" alt="{{ $settings->company_name }}"  src="{{ $logo_website }}">
            </a>
          <div class="mt-20 mb-20 font-xs color-text-paragraph-2">{{ $settings->short_intro }}</div>
          <div class="footer-social">
              @if(isset($settings->facebook))
                  <a class="icon-socials" href="{{ $settings->facebook }}">
                      <img src="{{ asset('default/icon/facebook.svg') }}">
                  </a>
              @endif
              @if(isset($settings->tiktok))
                  <a class="icon-socials" href="{{ $settings->tiktok }}">
                      <img src="{{ asset('default/icon/tiktok.svg') }}">
                  </a>
              @endif
              @if(isset($settings->twitter))
                  <a class="icon-socials" href="{{ $settings->twitter }}">
                      <img src="{{ asset('default/icon/x.svg') }}">
                  </a>
              @endif
              @if(isset($settings->instagram))
                  <a class="icon-socials" href="{{ $settings->instagram }}">
                      <img src="{{ asset('default/icon/instagram.svg') }}">
                  </a>
              @endif
              @if(isset($settings->youtube))
                  <a class="icon-socials" href="{{ $settings->youtube }}">
                      <img src="{{ asset('default/icon/youtube.svg') }}">
                  </a>
              @endif
          </div>
        </div>
        <div class="footer-col-2 col-md-2 col-xs-6">
          <h6 class="mb-20">Tài nguyên</h6>
          <ul class="menu-footer">
            <li><a href="#">Về chúng tôi</a></li>
            <li><a href="#">Đội của chúng tôi</a></li>
            <li><a href="#">Các việc làm</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>
        <div class="footer-col-3 col-md-2 col-xs-6">
          <h6 class="mb-20">Cộng đồng</h6>
          <ul class="menu-footer">
            <li><a href="#">Đánh giá</a></li>
            <li><a href="#">Tính năng</a></li>
            <li><a href="#">Tín dụng</a></li>
            <li><a href="#">Câu hỏi thường gặp</a></li>
          </ul>
        </div>
        <div class="footer-col-4 col-md-2 col-xs-6">
          <h6 class="mb-20">Hồ sơ và CV</h6>
          <ul class="menu-footer">
            <li><a href="#">Quản lý CV của bạn</a></li>
            <li><a href="#">Hướng dẫn viết CV</a></li>
            <li><a href="#">Top CV Profile</a></li>
            <li><a href="#">Thư viện CV</a></li>
          </ul>
        </div>
        <div class="footer-col-5 col-md-2 col-xs-6">
          <h6 class="mb-20">Xây dựng sự nghiếp</h6>
          <ul class="menu-footer">
            <li><a href="#">Việc làm tốt nhất</a></li>
            <li><a href="#">Việt làm lương cao</a></li>
            <li><a href="#">Việc làm  IT</a></li>
            <li><a href="#">Việc làm quản lý</a></li>
          </ul>
        </div>
        <div class="footer-col-6 col-md-3 col-sm-12">
          <h6 class="mb-20">Tải ứng dụng</h6>
          <p class="color-text-paragraph-2 font-xs">Tải xuống Ứng dụng của chúng tôi và được Giảm thêm 15% cho Đơn hàng đầu tiên của bạn…!&mldr;!</p>
          <div class="mt-15"><a class="mr-5" href="#"><img src="{{ asset('assets/client//imgs/template/icons/app-store.png')}}" alt="joxBox"></a><a href="#"><img src="{{ asset('assets/client//imgs/template/icons/android.png')}}" alt="joxBox"></a></div>
        </div>
      </div>
      <div class="footer-bottom mt-50">
        <div class="row">
          <div class="col-md-6"><span class="font-xs color-text-paragraph">{{ $settings->copyright }}</span></div>
          <div class="col-md-6 text-md-end text-start">
            <div class="footer-social"><a class="font-xs color-text-paragraph" href="#">Chính sách bảo mật</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="#">Điều khoản & điều kiện</a><a class="font-xs color-text-paragraph" href="#">Bảo mật</a></div>
          </div>
        </div>
      </div>
    </div>
  </footer>
