@extends('client.layouts.master')
@section('title', 'Bài Viết - Tin tức mới nhất'. ' - '. config('app.name'))
@section('seo_image', getStorageImageUrl('', config('image.main-logo')))

@section('content')
    <main class="main">
        <section class="section-box">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="mb-10">Bài Viết</h2>
                            <p class="font-lg color-text-paragraph-2">Nhận tin tức, cập nhật và mẹo mới nhất</p>
                        </div>
                        <div class="col-lg-6 text-end">
                            <ul class="breadcrumbs mt-40">
                                <li><a class='home-icon' href='{{route('client.client.index')}}'>Trang chủ</a></li>
                                <li>Bài Viết</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-50">
            <div class="post-loop-grid">
                <div class="container">
                    <div class="text-left">
                        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Bài viết mới nhất</h2>
                        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Đừng bỏ lỡ bài
                            viết thịnh hành</p>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-8">
                            <div class="row">

                                @if(isset($searchResult) && !$searchResult->isEmpty())
                                    @foreach($searchResult as $value)
                                        <div class="col-lg-6 mb-30">

                                            <div class="card-grid-3 hover-up">
                                                <div class="text-center card-grid-3-image"><a href="{{route('client.post.detail' , $value->slug)}}">
                                                        <figure><img alt="jobBox" style="max-width: 100%;
                                                                                        max-height: 220px;
                                                                                        object-fit: cover;"
                                                                     src="{{ getStorageImageUrl($value->image, config('image.blog')) }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-block-info">
                                                    <div class="tags mb-15"><a class='btn btn-tag'
                                                                               href="{{route('client.post.detail' , $value->slug)}}">{{ $value->category->name }}</a>
                                                    </div>
                                                    <h5><a href="{{route('client.post.detail' , $value->slug)}}">{{ $value->title }}</a></h5>
                                                    <p class="mt-10 color-text-paragraph font-sm">
                                                        {{ limit_text($value->content, 180) }}
                                                    </p>
                                                    <div class="card-2-bottom mt-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6">
                                                                <div class="d-flex"><img class="img-rounded"
                                                                                         src="{{ getStorageImageUrl($value->user->avatar_url, config('image.avatar')) }}">
                                                                    <div class="info-right-img"><span
                                                                            class="font-sm font-bold color-brand-1 op-70">{{ $value->user->name }}</span><br><span
                                                                            class="font-xs color-text-paragraph-2">{{ $value->created_at->format('d-m-Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 text-end col-6 pt-15"><span
                                                                    class="color-text-paragraph-2 font-xs">{{ $value->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @elseif($searchResult->isEmpty())
                                    <div class="no-results">
                                        <h6>Không có kết quả tìm kiếm phù hợp</h6>
                                    </div>
                                @else
                                    @foreach($blogs as $value)
                                        <div class="col-lg-6 mb-30">

                                            <div class="card-grid-3 hover-up">
                                                <div class="text-center card-grid-3-image"><a href="{{route('client.post.detail' , $value->slug)}}">
                                                        <figure><img alt="jobBox" style="max-width: 100%;
                                                                                        max-height: 220px;
                                                                                        object-fit: cover;"
                                                                     src="{{ getStorageImageUrl($value->image, config('image.blog')) }}">
                                                        </figure>
                                                    </a></div>
                                                <div class="card-block-info">
                                                    <div class="tags mb-15"><a class='btn btn-tag'
                                                                               href="{{route('client.post.detail' , $value->slug)}}">{{ $value->category->name }}</a>
                                                    </div>
                                                    <h5><a href="{{route('client.post.detail' , $value->slug)}}">{{ $value->title }}</a></h5>
                                                    <p class="mt-10 color-text-paragraph font-sm">
                                                        {{ limit_text($value->content, 180) }}
                                                    </p>
                                                    <div class="card-2-bottom mt-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-6">
                                                                <div class="d-flex"><img class="img-rounded"
                                                                                         src="{{ getStorageImageUrl($value->user->avatar_url, config('image.avatar')) }}">
                                                                    <div class="info-right-img"><span
                                                                            class="font-sm font-bold color-brand-1 op-70">{{ $value->user->name }}</span><br><span
                                                                            class="font-xs color-text-paragraph-2">{{ $value->created_at->format('d-m-Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 text-end col-6 pt-15"><span
                                                                    class="color-text-paragraph-2 font-xs">{{ $value->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>

                            {{ $blogs->links('vendor.pagination.custom') }}

                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                            <div class="widget_search mb-40">
                                <div class="search-form">
                                    <form action="{{route('client.post.index')}}" method="GET">
                                        <input type="text" placeholder="Tìm kiếm..." name="keyword">
                                        <button type="submit"><i class="fi-rr-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-shadow sidebar-news-small">
                                <h5 class="sidebar-title">Đang là xu hướng</h5>
                                <div class="post-list-small">
                                    @if(is_object($blogTrending))
                                        @foreach($blogTrending as $item)
                                            <div class="post-list-small-item d-flex align-items-center">
                                                <a href="{{route('client.post.detail' , $item->slug)}}">
                                                    <figure class="thumb mr-15"><img
                                                        src="{{ getStorageImageUrl($item->image, config('image.blog')) }}"
                                                        alt="jobBox"></figure>
                                                </a>
                                                <div class="content">
                                                    <a href="{{route('client.post.detail' , $item->slug)}}"><h5>{{$item->title}}</h5></a>
                                                    <div class="post-meta text-muted d-flex align-items-center mb-15">
                                                        <div class="author d-flex align-items-center mr-20"><img
                                                                alt="jobBox"
                                                                src="{{ getStorageImageUrl($item->user->avatar_url, config('image.avatar')) }}"><span>{{$item->user->name}}</span>
                                                        </div>
                                                        <div class="date"><span>{{ $item->created_at->diffForHumans() }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="sidebar-border-bg bg-right"><span class="text-grey">CHÚNG TÔI</span><span
                                    class="text-hiring">NHÀ TUYỂN DỤNG</span>
                                <p class="font-xxs color-text-paragraph mt-5">
                                    Môi trường làm việc chuyên nghiệp năng động và thân thiện, nơi bạn có thể phát triển
                                    bản thân và tiến bước trong sự nghiệp
                                </p>
                                <div class="mt-15"><a class="btn btn-paragraph-2" href="#">Tìm hiểu thêm</a></div>
                            </div>
                            <div class="sidebar-shadow sidebar-news-small">
                                <h5 class="sidebar-title">Thư Viện</h5>
                                <div class="post-list-small">
                                    <ul class="gallery-3">
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery1.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery2.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery3.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery4.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery5.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery6.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery7.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery8.png') }}"></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/client/imgs/page/blog/gallery9.png') }}"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('style')
    <style>


        .card-grid-3-image img {
            max-width: 100% !important;
            max-height: 220px !important;
            object-fit: cover !important;
            border-radius: 8px;
        }
    </style>
@endpush
