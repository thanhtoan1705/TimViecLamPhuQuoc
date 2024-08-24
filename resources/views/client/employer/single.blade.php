@extends('client.layouts.master')
@section('title', 'Chi tiết nhà tuyển dụng')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single">
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $employer->company_photo_cover) }}" alt="jobBox">
                    </div>
                </div>
                <div class="box-company-profile">
                    <div class="image-compay"><img src="{{ asset('storage/' . $employer->company_logo) }}"
                                                   alt="jobBox" width="85px" height="85px"></div>
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">{{$employer->company_name}}
                            </h5>
                            <p class="mt-5 font-md color-text-paragraph-2 mb-15"><span
                                    class="card-location font-regular">{{$employer->address->district->name}}, {{$employer->address->province->name}}</span></p>
                        </div>
                        <div class="col-lg-4 col-md-12 text-lg-end">
                            <a class='btn btn-call-icon btn-apply btn-apply-big' href="tel:+84{{$employer->company_phone}}">Liên hệ</a>
                        </div>

                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                     aria-labelledby="tab-about">
                                    {!! $employer->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-related-job content-page">
                            <h5 class="mb-30">Việc làm mới nhất</h5>
                            @livewire('client.employer.job-posts', ['employer' => $employer])
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <div class="sidebar-info pl-0"><span
                                            class="sidebar-company">{{$employer->company_name}}</span><span
                                            class="card-location">{{$employer->address->street}}</span></div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <div id="map" style="height: 200px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Lĩnh vực công ty</span><strong
                                                class="small-heading">{{$employer->company_type}}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Địa chỉ</span><strong
                                                class="small-heading">{{$employer->address->street}}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi fi-rr-coins"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Mã số thuế</span><strong
                                                class="small-heading">{{$employer->tax_code}}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Ngày thành lập</span>
                                            <strong class="small-heading">{{$employer->since}}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi fi-rr-globe"></i></div>
                                        <div class="sidebar-text-info"><span
                                                class="text-description">Website công ty</span>
                                            <strong class="small-heading"><a class="pager-prev" href="{{$employer->website_url}}">{{$employer->website_url}}</a></strong>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>{{$employer->address->street}}</li>
                                    <li>Điện thoại: (+84) {{$employer->company_phone}}</li>
                                    <li>Email: {{$employer->user->email}}</li>
                                </ul>
                                <div class="mt-30"><a class='btn btn-send-message' href='page-contact.html'>Gửi tin</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-border-bg bg-right"><span class="text-grey">Chúng tôi</span><span
                                class="text-hiring">Đang tuyển dụng</span>
                            <p class="font-xxs color-text-paragraph mt-5">Tìm kiếm ngay việc làm phù hợp với bạn</p>
                            <div class="mt-15"><a class='btn btn-paragraph-2' href='page-contact.html'>Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Component newsletter -->
        <x-client.newsletter/>
        <!-- End component newsletter -->
    </main>
@endsection
@push('css')
    <style>
        .custom-control {
            background-color: white;
            border-radius: 4px;
            padding: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #007bff;
        }

        .custom-control:hover {
            text-decoration: underline;
        }

        .text-truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 3.6em; /* 1.8em per line for example, adjust based on your line-height */
            line-height: 1.8em; /* Adjust this value according to your font size */
        }
    </style>
@endpush
@push('script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var lat = {{$employer->address->latitude}};
            var lon = {{$employer->address->longitude}};
            var map = L.map('map', {
                center: [lat, lon],
                zoom: 16,
                zoomControl: false
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var customIcon = L.icon({
                iconUrl: '{{ asset('assets/client/imgs/page/vitri.png') }}',
                iconSize: [38, 38],
                iconAnchor: [22, 38],
                popupAnchor: [0, -38]
            });

            var marker = L.marker([lat, lon], { icon: customIcon }).addTo(map);

            var apiKey = '3497af00b0434dc0ac2c08b62bd21f3e';
            var apiUrl = `https://api.geoapify.com/v1/geocode/reverse?lat=${lat}&lon=${lon}&format=json&apiKey=${apiKey}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data && data.results && data.results.length > 0) {
                        var locationName = data.results[0].formatted;
                        marker.bindPopup(`<b>${locationName}</b>`).openPopup();
                    } else {
                        marker.bindPopup("<b>Không thể lấy tên vị trí</b>").openPopup();
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi gọi API:', error);
                    marker.bindPopup("<b>Lỗi khi lấy tên vị trí</b>").openPopup();
                });

            // Thêm nút tùy chỉnh để mở bản đồ lớn hơn
            var ZoomToMapControl = L.Control.extend({
                options: {
                    position: 'topleft'
                },

                onAdd: function (map) {
                    var container = L.DomUtil.create('div', 'custom-control');
                    container.innerHTML = 'Xem bản đồ lớn hơn';

                    container.onclick = function(){
                        // Chuyển hướng sang Google Maps với vị trí đã định
                        window.open(`https://www.google.com/maps?q=${lat},${lon}&z=18`, '_blank');
                    };

                    return container;
                }
            });

            map.addControl(new ZoomToMapControl());
        });
    </script>

@endpush
