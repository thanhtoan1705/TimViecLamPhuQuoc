



<footer class="footer mt-50">
    <div class="container">
      <div class="row">
        <div class="footer-col-1 col-md-3 col-sm-12">
            <h6 class="mb-20 text-uppercase">Liên hệ</h6>
            <a href='{{ route('client.client.index') }}'>
                @php
                    $logo_website = getStorageImageUrl($settings->logo_website, config('image.main-logo'));
                 @endphp
                <img style="width: 185px" alt="{{ $settings->company_name }}"  src="{{ $logo_website }}">
            </a>
            <div class="mt-20">
                <strong>{{ $settings->short_intro }}</strong>
            </div>
            <div class="mt-10 mb-10 ">
                <strong>Mã số thuế: </strong>{{ $settings->tax_code }}<br>
                <strong>Địa chỉ: </strong>{{ $settings->company_address }}<br>
                <strong>Số điện thoại: </strong>{{ $settings->hotline }}<br>
                <strong>Email: </strong>{{ $settings->email }}<br>
                <strong>Website: </strong><a target="_blank" href="{{ $settings->website }}">{{ $settings->website }}</a><br>
            </div>


        </div>

        <div class="footer-col-1 col-md-3 col-sm-12">
          <h6 class="mb-20 text-uppercase">Điều hướng</h6>
            <style>
                .menu-footer .link-footer {
                    color: #000000;
                    font-weight: 600;
                    font-size: 30px;
                }

                .menu-footer .link-footer:hover a{
                    color: #3C65F5 !important;
                }
            </style>
          <ul class="menu-footer" style="color: #000000">

              <li class="link-footer"><a class='active ' href='/'>Trang chủ</a></li>
              <li class="link-footer"><a href='{{route('client.job.index')}}'>Việc làm</a></li>
              <li class="link-footer"><a href='{{route('client.employer.index')}}'>Công ty</a></li>
              <li class="link-footer"><a href='{{route('client.cv.list')}}'>Mẫu CV</a></li>
              <li class="link-footer"><a href='{{route('client.post.index')}}'>Tin tức</a></li>

              <li class="link-footer"><a href='{{route('client.pricing.index')}}'>Bảng giá</a></li>

          </ul>
        </div>
        <div class="footer-col-1 col-md-3 col-sm-12">
            <h6 class="mb-20 text-uppercase">Theo dõi chúng tôi</h6>
            <div class="footer-social">

                @if(isset($settings->facebook))
                    <a target="_blank" class="icon-socials" href="{{ $settings->facebook }}">
                        <img src="{{ asset('default/icon/facebook.svg') }}">
                    </a>
                @endif
                @if(isset($settings->tiktok))
                    <a target="_blank" class="icon-socials" href="{{ $settings->tiktok }}">
                        <img src="{{ asset('default/icon/tiktok.svg') }}">
                    </a>
                @endif
                @if(isset($settings->twitter))
                    <a target="_blank" class="icon-socials" href="{{ $settings->twitter }}">
                        <img src="{{ asset('default/icon/x.svg') }}">
                    </a>
                @endif
                @if(isset($settings->instagram))
                    <a target="_blank" class="icon-socials" href="{{ $settings->instagram }}">
                        <img src="{{ asset('default/icon/instagram.svg') }}">
                    </a>
                @endif
                @if(isset($settings->youtube))
                    <a target="_blank" class="icon-socials" href="{{ $settings->youtube }}">
                        <img src="{{ asset('default/icon/youtube.svg') }}">
                    </a>
                @endif
            </div>

        </div>
        <div class="footer-col-6 col-md-3 col-sm-12">
          <h6 class="mb-20 text-uppercase">Fanpage Facebook</h6>
            <div class="mx-auto w-full">
                <div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; width: 0px; height: 0px;"><div></div></div></div>
                <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&amp;version=v21.0"></script>
                <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/profile.php?id=61561772896574" data-tabs="timeline" data-width="" data-height="320" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=295&amp;height=320&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D61561772896574&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline&amp;width="><span style="vertical-align: bottom; width: 295px; height: 320px;"><iframe name="f30cbe56ba957bda3" width="1000px" height="320px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v21.0/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Dfeb2ce4e9eeda7ac2%26domain%3Dgoldenbeeltd.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fgoldenbeeltd.vn%252Ffa78218c12eedf839%26relation%3Dparent.parent&amp;container_width=295&amp;height=320&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D61561772896574&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline&amp;width=" style="border: none; visibility: visible; width: 295px; height: 320px;" class=""></iframe></span></div>
            </div>

        </div>
      </div>
      <div class="footer-bottom mt-50">
        <div class="row">
          <div class="col-md-6"><span class="font-xs color-text-paragraph">{{ $settings->copyright }}</span></div>
          <div class="col-md-6 text-md-end text-start">
            <div class="footer-social">
                @foreach($pages as $page)
                    <a class="font-xs color-text-paragraph mr-30" href="{{ route('client.client.page.detail', $page->slug) }}">{{ $page->title }}</a>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
