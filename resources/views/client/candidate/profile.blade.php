@extends('client.layouts.master')
@section('title', 'Hồ sơ của tôi')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img
                        src="{{ asset('assets/client/imgs/page/candidates/img.png') }}"
                        alt="jobbox"><a class="btn-editor" href="#"></a></div>
                <div class="box-company-profile">
                    <div class="image-compay">
                        @if(isset($candidate->image) && $candidate->image)
                            <img alt="jobBox" width="85px" height="85px"
                                 src="{{ asset('storage/' . $candidate->image) }}">
                        @else
                            <img alt="jobBox" width="85px" height="85px"
                                 src="{{ asset('assets/client/imgs/page/candidates/candidate-profile.png') }}">
                        @endif
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5>{{$candidate->name}}</h5>
                            {{--                            @dd($candidate->candidate->major->name)--}}
                            {{--                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">@if ($candidate->candidate->major)--}}
                            {{--                                    <span>{{ $candidate->candidate->major->name }}</span>--}}
                            {{--                                @else--}}
                            {{--                                    <span>N/A</span>--}}
                            {{--                                @endif</p>--}}
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end"><a
                                class='btn btn-download-icon btn-apply btn-apply-big'
                                href=''>Tải xuống CV</a></div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>

        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <div class="tab-content">
                                @livewire('client.candidate.profile')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
@push('script')

@endpush
