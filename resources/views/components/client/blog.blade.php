<section class="section-box mt-50 mb-50">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin tức</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Nhận tin tức, cập
                nhật và mẹo mới nhất</p>
        </div>
    </div>
    <div class="container">
        <div class="mt-50">
            <div class="box-swiper style-nav-top">
                <div class="swiper-container swiper-group-3 swiper">
                    <div class="swiper-wrapper pb-70 pt-5">
                        @foreach($blogs as $blog)
                        @php
                            if (isset($blog->user->avatar_url))
                                $user_img = $blog->user->avatar_url;
                            else
                                $user_img = asset('default/user.png');

                            if (isset($blog->image))
                                $blog_img = asset('storage/' . $blog->image);
                            else
                                $blog_img = asset('default/blog.jpg');
                        @endphp
                        <div class="swiper-slide">
                            <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                <div class="text-center card-grid-3-image"><a href="#">
                                        <figure><img alt="jobBox"
                                                src="{{ $blog_img }}">
                                        </figure>
                                    </a></div>
                                <div class="card-block-info">
                                    <div class="tags mb-15"><a class='btn btn-tag' href='blog-grid.html'>{{$blog->category->name}}</a></div>
                                    <h5><a href='blog-details.html'>{{$blog->title}}</a></h5>
                                    <p class="mt-10 color-text-paragraph font-sm">{{$blog->meta_description}}</p>
                                    <div class="card-2-bottom mt-20">
                                        <div class="row">
                                            <div class="col-lg-6 col-6">
                                                <div class="d-flex"><img class="img-rounded"
                                                        src="{{ $user_img  }}"
                                                        alt="jobBox">
                                                    <div class="info-right-img"><span
                                                        class="font-sm font-bold color-brand-1 op-70">{{$blog->user->name}}</span><br><span
                                                        class="font-xs color-text-paragraph-2">{{$blog->published_at}}</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end col-6 pt-15"><span
                                                    class="color-text-paragraph-2 font-xs">{{$blog->view}} lượt xem</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="text-center"><a class='btn btn-brand-1 btn-icon-load mt--30 hover-up' href='blog-grid.html'>
                Tải thêm bài viết</a></div>
        </div>
    </div>
</section>
