@extends('client.layouts.master')
@section('title', $page->meta_title ?? $page->title)
@section('content')
    <main class="main">
        <section class="section-box">
            <div class="breacrumb-cover bg-img-about">
                <div class="container">
                    <div class="row d-flex align-items-lg-end ">
                        <div class="col-lg-6">
                            <h2 class="mb-10">{{ $page->title }}</h2>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <ul class="breadcrumbs mt-40">
                                <li><a class="home-icon" href="{{ route('client.client.index') }}">Trang chủ</a></li>
                                <li>{{ $page->title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box mt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-page">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('css')
    <style>
        .content-page ul {
            list-style: none !important;
            padding-left: 20px !important;
            margin-bottom: 15px !important;
        }

        .content-page ul li {
            position: relative !important;
            padding-left: 20px !important;
            margin-bottom: 10px !important;
            line-height: 1.6 !important;
        }

        .content-page ul li:before {
            content: "•" !important;
            position: absolute !important;
            left: 0 !important;
            font-size: 18px !important;
            top: -2px !important;
        }

        .content-page h3 {
            font-size: 20px !important;
            margin-bottom: 15px !important;
            margin-top: 20px !important;
        }

        .content-page p {
            margin-bottom: 15px !important;
            line-height: 1.6 !important;
        }
    </style>
@endpush
