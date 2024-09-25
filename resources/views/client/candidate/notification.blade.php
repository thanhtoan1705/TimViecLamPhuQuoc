@extends('client.layouts.master')
@section('title', 'Hồ sơ của tôi')
@section('content')

    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="notifications mb-50">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel"
                                     aria-labelledby="tab-my-profile">
                                    <div class="">
                                        <h3 class="mb-4">Thông báo của bạn</h3>
                                        @php
                                            $notifications = auth()->user()->notifications;
                                            $displayLimit = 2; // Số thông báo hiện ban đầu
                                            $remainingNotifications = $notifications->count() - $displayLimit;
                                        @endphp

                                        @if ($notifications->isEmpty())
                                            <p class="text-muted">Bạn chưa có thông báo nào.</p>
                                        @else
                                            <ul class="list-group">
                                                @foreach ($notifications->slice(0, $displayLimit) as $notification)
                                                    <li class="list-group-item notification-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-bell-fill notification-icon text-white me-3"></i>
                                                            <span class="notification-message">{{ $notification->data['message'] ?? 'Thông báo không có nội dung.' }}</span>
                                                        </div>
                                                        <span class="badged bg-gradient-primary">{{ $notification->created_at->diffForHumans() }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <!-- Nút Xem thêm nếu còn thông báo -->
                                            @if ($remainingNotifications > 0)
                                                <button id="showMoreBtn" class="btn btn-primary">Xem thêm ({{ $remainingNotifications }} thông báo)</button>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <h3 class="mt-0 mb-15 color-brand-1">Việc làm phù hợp với bạn</h3>
                            <p class="mb-3 font-md">Để nhận được gợi ý việc làm chính xác hơn, hãy <a
                                    class="font-md color-text-paragraph-2" href="#"> tùy chỉnh cài đặt gợi ý việc
                                    làm.</a></p>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-6.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job' href='company-details.html'>Quora
                                                JSC</a><span class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                class="card-time">5<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='job-details.html'>PHP</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='job-details.html'>Android</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-7.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Nintendo</a><span
                                                class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Products Manager</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='job-details.html'>ASP .Net</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='job-details.html'>Figma</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-4.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Dailymotion</a><span
                                                class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Typescript</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>Java</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-5.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Linkedin</a><span
                                                class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                class="card-time">4<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, </p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Angular</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-8.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>Periscope</a><span
                                                class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='job-details.html'>iOS</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='job-details.html'>Laravel</a><a class='btn btn-grey-small mr-5'
                                                                                      href='job-details.html'>Golang</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-1.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job'
                                                                   href='company-details.html'>LinkedIn</a><span
                                                class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Fulltime</span><span
                                                class="card-time">4<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, </p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Adobe XD</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5'
                                                                                  href='jobs-grid.html'>Photoshop</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-2.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job' href='company-details.html'>Adobe
                                                Ilustrator</a><span class="location-small">An Thới, Phú Quốc</span>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                class="card-time">5<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>React</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>NodeJS</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img
                                                src="{{ asset('assets/client/imgs/brands/brand-3.png') }}"
                                                alt="jobBox"></div>
                                        <div class="right-info"><a class='name-job' href='company-details.html'>Bing
                                                Search</a><span class="location-small">An Thới, Phú Quốc</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Các vị  trí tiếp theo là các tên
                                            tuổi trong lĩnh vực xây dựng, bất động sản, giao thông... như: Công ty cổ
                                            phần Phát triển đô thị Nam Hà Nội, ...</p>
                                        <div class="mt-30"><a class='btn btn-grey-small mr-5'
                                                              href='jobs-grid.html'>Python</a><a
                                                class='btn btn-grey-small mr-5'
                                                href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5'
                                                                                href='jobs-grid.html'>Photoshop</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">200.000
                                            VNĐ</span><span class="text-muted">/Giờ</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                         data-bs-target="#ModalApplyJobForm">Ứng tuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="paginations">
                                <ul class="pager">
                                    <li><a class="pager-prev" href="#"></a></li>
                                    <li><a class="pager-number" href="#">1</a></li>
                                    <li><a class="pager-number" href="#">2</a></li>
                                    <li><a class="pager-number" href="#">3</a></li>
                                    <li><a class="pager-number" href="#">4</a></li>
                                    <li><a class="pager-number" href="#">5</a></li>
                                    <li><a class="pager-number active" href="#">6</a></li>
                                    <li><a class="pager-number" href="#">7</a></li>
                                    <li><a class="pager-next" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <style>
        .notifications {
            background: linear-gradient(135deg, #f2f6fd, #e0eaff);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .notifications h3 {
            font-size: 24px;
            font-weight: 600;
            color: #343a40;
        }

        .notification-item {
            background-color: #ffffff;
            border: none;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .notification-item:hover {
            transform: scale(1.03);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .notification-icon {
            background-color: #007bff;
            padding: 10px;
            border-radius: 50%;
            font-size: 20px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }

        .notification-item:hover .notification-icon {
            background-color: #0056b3;
        }

        .notification-message {
            font-size: 16px;
            color: #495057;
            font-weight: 500;
        }

        .badged {
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 30px;
            background: linear-gradient(90deg, #007bff, #00c6ff);
            color: #fff;
            font-weight: 600;
        }

        .list-group-item {
            position: relative;
            overflow: hidden;
        }

        .list-group-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(180deg, #00c6ff, #007bff);
            transition: width 0.3s ease;
        }

        .list-group-item:hover:before {
            width: 10px;
        }
    </style>
    <script>
        document.getElementById('showMoreBtn')?.addEventListener('click', function() {
            let notificationsList = '';
            @foreach ($notifications->slice($displayLimit) as $notification)
                notificationsList += `
                <li class="list-group-item notification-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-bell-fill notification-icon text-white me-3"></i>
                        <span class="notification-message">{{ $notification->data['message'] ?? 'Thông báo không có nội dung.' }}</span>
                    </div>
                    <span class="badged bg-gradient-primary">{{ $notification->created_at->diffForHumans() }}</span>
                </li>`;
            @endforeach

            document.querySelector('.list-group').innerHTML += notificationsList;
            this.style.display = 'none'; // Ẩn nút "Xem thêm" sau khi nhấn
        });
    </script>

@endsection
