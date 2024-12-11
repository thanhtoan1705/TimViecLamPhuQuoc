@extends('client.layouts.master')

@section('title', $postDetail->title)
@section('seo_title', $postDetail->title)
@section('seo_description', $postDetail->meta_description)
@section('seo_keywords', $postDetail->meta_keywords)
@section('seo_image',  getStorageImageUrl($postDetail->image, config('image.banner-vieclamphuquoc')))

@section('content')
    <main class="main">

        <section class="section-box">
            <div><img src="{{ asset('assets/client/imgs/page/blog/img-single.png') }}"></div>
        </section>
        <section class="section-box">
            <div class="archive-header pt-50 text-center">
                <div class="container">
                    <div class="box-white">
                        <div class="max-width-single"><a class="btn btn-tag"
                                href="#">{{ $postDetail->category->name }}</a>
                            <h2 class="mb-30 mt-20 text-center">{{ $postDetail->title }}</h2>
                            <div class="post-meta text-muted d-flex align-items-center mx-auto justify-content-center">
                                <div class="author d-flex align-items-center mr-30"><img alt="jobBox"
                                        src="{{ getStorageImageUrl($postDetail->user->avatar_url, config('image.avatar')) }}"><span>{{ $postDetail->user->name }}</span>
                                </div>
                                <div class="date"><span class="font-xs color-text-paragraph-2 mr-20 d-inline-block"><img
                                            class="img-middle mr-5"
                                            src="{{ asset('assets/client/imgs/page/blog/calendar.svg') }}">
                                        {{ \Carbon\Carbon::parse($postDetail->created_at)->format('d \t\há\n\g m \nă\m Y') }}
                                    </span><span class="font-xs color-text-paragraph-2 d-inline-block"><img
                                            class="img-middle mr-5"
                                            src="{{ asset('assets/client/imgs/template/icons/time.svg') }}">
                                        {{ \Carbon\Carbon::parse($postDetail->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="post-loop-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="single-body">
                            <div class="max-width-single">
                                <div class="font-lg mb-30">
                                    <p>
                                        {{-- {{$postDetail['content']}} --}}
                                    </p>
                                </div>
                            </div>
                            <figure class="text-center"><img src="{{ getStorageImageUrl($postDetail->image, config('image.blog')) }}">
                            </figure>
                            <div class="max-width-single">
                                <div class="content-single">
                                    {!! $postDetail->content !!}
                                </div>
                                <div class="single-apply-jobs mt-20">
                                    <div class="row">
                                        {{-- <div class="col-lg-7"><a class="btn btn-border-3 mr-10 hover-up" href="#">#
                                                Thiên nhiên</a><a class="btn btn-border-3 mr-10 hover-up" href="#">#
                                                Việc làm</a><a class="btn btn-border-3 hover-up" href="#"># Kỹ
                                                năng</a>
                                        </div> --}}
                                        <div class="col-md-12 text-lg-end social-share">
                                            <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-20 mt-10">Chia sẻ</h6>
                                            <a class="mr-20 d-inline-block d-middle hover-up" target="_blank"
                                                href="{{ $shareUrls['facebook'] }}"><img alt="facebook"
                                                    src="{{ asset('assets/client/imgs/page/blog/fb.svg') }}"></a>
                                            <a
                                                class="mr-20 d-inline-block d-middle hover-up" target="_blank"
                                                href="{{ $shareUrls['twitter'] }}"><img alt="twitter"
                                                    src="{{ asset('assets/client/imgs/page/blog/tw.svg') }}"></a>
                                            <a
                                                class="mr-0 d-inline-block d-middle hover-up" target="_blank"
                                                href="{{ $shareUrls['pinterest'] }}"><img alt="pinterest"
                                                    src="{{ asset('assets/client/imgs/page/blog/pi.svg') }}"></a>
                                        </div>
                                    </div>
                                </div>
                                <livewire:client.comment.comments :model="$postDetail" />
                                <div class="border-bottom mt-50 mb-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
