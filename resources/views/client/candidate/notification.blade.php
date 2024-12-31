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
                                            $notifications = auth()->user()->notifications->filter(function($notification) {
                                                return isset($notification->data['message']) && !empty($notification->data['message']);
                                            });
                                            $displayLimit = 2; // Số thông báo hiện ban đầu
                                            $remainingNotifications = $notifications->count() - $displayLimit;
                                        @endphp

                                        @if ($notifications->isEmpty())
                                            <p class="text-muted">Bạn chưa có thông báo nào.</p>
                                        @else
                                            <ul class="list-group">
                                                @foreach ($notifications->slice(0, $displayLimit) as $notification)
                                                    @if(isset($notification->data['message']) && !empty($notification->data['message']))
                                                        <li class="list-group-item notification-item d-flex justify-content-between align-items-center {{ $notification->read_at ? 'read' : 'unread' }}">
                                                            <a href="{{ $notification->data['url'] ?? '#' }}" class="d-flex align-items-center text-decoration-none w-100 notification-link justify-content-between"
                                                               data-notification-id="{{ $notification->id }}">
                                                                <div class="d-flex align-items-center">
                                                                    @if(!$notification->read_at)
                                                                        <span class="unread-dot"></span>
                                                                    @endif
                                                                    <i class="bi bi-bell-fill notification-icon text-white me-3"></i>
                                                                    <span class="notification-message">{{ $notification->data['message'] }}</span>
                                                                </div>
                                                                <span class="badged bg-gradient-primary">{{ $notification->created_at->diffForHumans() }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
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
                min-width: 105px;
                padding: 10px 15px;
                font-size: 12px;
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

            .notification-link {
                color: inherit;
            }

            .notification-link:hover {
                color: inherit;
            }

            .notification-item.read {
                background-color: #f8f9fa;
            }

            .notification-item.read .notification-icon {
                background-color: #6c757d;
            }

            .notification-item.read .notification-message {
                color: #6c757d;
            }

            .notification-item.unread {
                background-color: #fff;
                border-left: 4px solid #007bff;
            }

            .notification-item.read {
                background-color: #f8f9fa;
                border-left: 4px solid #e9ecef;
            }

            .notification-item.read .notification-message {
                color: #6c757d;
            }

            .notification-item.read .notification-icon {
                background-color: #6c757d;
            }

            .unread-dot {
                width: 8px;
                height: 8px;
                background-color: #007bff;
                border-radius: 50%;
                display: inline-block;
                margin-right: 10px;
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    transform: scale(0.95);
                    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
                }

                70% {
                    transform: scale(1);
                    box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
                }

                100% {
                    transform: scale(0.95);
                    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
                }
            }

            .notification-item:hover {
                transform: translateX(5px);
            }

            .notification-item {
                transition: all 0.3s ease;
            }

            /* Thêm animation styles */
            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.5s ease forwards;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Smooth height transition for container */
            .list-group {
                transition: height 0.3s ease;
            }

            /* Thêm transition cho tất cả các thông báo */
            .notification-item {
                transition: all 0.3s ease;
                transform-origin: top;
            }
        </style>

    @endpush

    @push('script')
        <script>
            document.querySelectorAll('.notification-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    const notificationId = this.dataset.notificationId;
                    fetch(`/notifications/mark-as-read/${notificationId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).then(response => {
                        if (response.ok) {
                            this.closest('.notification-item').classList.add('read');
                        }
                    });
                });
            });

            document.getElementById('showMoreBtn')?.addEventListener('click', function() {
                let notificationsList = '';
                @foreach ($notifications->slice($displayLimit) as $notification)
                    @if(isset($notification->data['message']) && !empty($notification->data['message']))
                    notificationsList += `
                    <li class="list-group-item notification-item d-flex justify-content-between align-items-center fade-in {{ $notification->read_at ? 'read' : 'unread' }}">
                        <a href="{{ $notification->data['url'] ?? '#' }}" class="d-flex align-items-center justify-content-between text-decoration-none w-100 notification-link"
                           data-notification-id="{{ $notification->id }}">
                            <div class="d-flex align-items-center">
                                @if(!$notification->read_at)
                <span class="unread-dot"></span>
@endif
                <i class="bi bi-bell-fill notification-icon text-white me-3"></i>
                <span class="notification-message">{{ $notification->data['message'] }}</span>
                            </div>
                            <span class="badged bg-gradient-primary">{{ $notification->created_at->diffForHumans() }}</span>
                        </a>
                    </li>`;
                @endif
                @endforeach

                const container = document.querySelector('.list-group');
                const fragment = document.createRange().createContextualFragment(notificationsList);
                container.appendChild(fragment);

                // Thêm animation cho các thông báo mới
                const newItems = container.querySelectorAll('.fade-in');
                newItems.forEach((item, index) => {
                    item.style.animationDelay = `${index * 0.2}s`;
                });

                this.style.display = 'none';

                // Thêm event listeners cho các thông báo mới
                document.querySelectorAll('.notification-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        const notificationId = this.dataset.notificationId;
                        fetch(`/notifications/mark-as-read/${notificationId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        }).then(response => {
                            if (response.ok) {
                                this.closest('.notification-item').classList.add('read');
                            }
                        });
                    });
                });
            });
        </script>
    @endpush

@endsection
