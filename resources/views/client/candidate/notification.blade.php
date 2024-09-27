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
                            @if($suggestedJobs->isEmpty())
                                <p class="font-md">Không có việc làm phù hợp với bạn.</p>
                            @else
                                @foreach($suggestedJobs as $job)
                                    <div class="evenly col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box">
                                                    <img src="{{ asset('assets/client/imgs/brands/brand-6.png') }}" alt="jobBox">
                                                </div>
                                                <div class="right-info">
                                                    <a class="name-job" href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}">
                                                        {{ $job->employer->company_name }}
                                                    </a>
                                                    <span class="location-small">{{ $job->employer->address->province->name }}</span>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6>
                                                    <a href="{{ route('client.job.single', ['jobSlug' => $job->slug]) }}">
                                                        {{ $job->title }}
                                                    </a>
                                                </h6>
                                                <div class="mt-5">
                                                    <span class="card-briefcase">{{ $job->job_type->name }}</span>
                                                    <span class="card-time">{{ $job->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="description font-sm color-text-paragraph mt-15">
                                                    {{ $job->description }}
                                                </p>
                                                <div class="mt-30">
                                                    @foreach($job->skills as $skill)
                                                        <a class="btn btn-grey-small mr-5" href="#">
                                                            {{ $skill->name }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7">
                                                            <span class="card-text-price">{{ $job->salary->name }}</span>
                                                        </div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">
                                                                Ứng tuyển
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
    @push('css')
        <style>
            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .evenly {
                display: flex;
                flex-direction: column;
            }

            .card-grid-2 {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                flex-grow: 1;
            }
            .description {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 4.5em;
                line-height: 1.5em;
            }

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

    @endpush

    @push('script')
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
    @endpush

@endsection
