@php
    function getTimeRemaining($promotion) {
        $now = new DateTime();
        $endTime = new DateTime($promotion->end_time);
        $interval = $now->diff($endTime);
        $days = $interval->days;
        $hours = $interval->h;
        $minutes = $interval->i;

        return "{$days} ngày {$hours} giờ {$minutes} phút";
    }
@endphp

<x-filament::page>
    <style>
        .fi-header {
            display: none;
        }

        .box-content {
            padding: 20px;
            background-color: #f9f9f9;
        }

        .box-heading {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-content: center;
        }

        .box-title h3 {
            margin-bottom: 35px;
            font-size: 24px;
            font-weight: bold;
        }

        .breadcrumbs ul {
            list-style: none;
            padding: 0;
            display: flex;
        }

        .breadcrumbs ul li {
            margin-right: 10px;
        }

        .breadcrumbs ul li a {
            text-decoration: none;
            color: #007bff;
        }

        .breadcrumbs ul li span {
            color: #555;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col {
            display: flex;
            flex-direction: column;
            padding: 10px;
            flex: 1 1 300px;
            box-sizing: border-box;
        }

        .section-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: flex-start;
            width: 100%;
        }

        .navtest {
            display: flex;
            gap: 20px;
        }

        .navtest button {
            padding: 10px 20px;
            border: none;
            background-color: #e7e7e7;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .navtest button.active {
            background-color: #007bff;
            color: white;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .card-title {
            color: #dc3545;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .card-body {
            padding: 5px 10px 10px;
        }

        .vertical-tab {
            background-color: #dc3545;
            color: white;
            transform-origin: left top 0;
            padding: 15px 5px;
            text-align: center;
        }

        .ma-giam-gia {
            display: flex;
            justify-content: space-between;
            align-items: center;
            align-content: center;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .mo-ta {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 4.5em;
            margin-bottom: 5px;
        }

        .custom-tab-pane {
            display: none;
        }

        .custom-tab-pane.custom-active {
            display: block;
        }


        .text-danger {
            color: #dc3545;
        }

        .paginations {
            margin-top: 20px;
        }

        .pager {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 5px;
        }

        .pager li {
            display: inline-block;
        }

        .pager a {
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #007bff;
        }

        .pager a.active {
            background-color: #007bff;
            color: white;
        }

        .btn-icon {
            display: flex;
            justify-content: space-between;
            align-content: center;
            align-items: center
        }

        .btn-icon svg {
            margin-right: 10px;
        }
    </style>
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3>Mã giảm giá</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="section-box">
                    <div class="panel-white">
                        <div class="box-padding">
                            <div>
                                <div>
                                    <ul class="navtest">
                                        <li>
                                            <button class="active btn-icon custom-nav-link" data-tab-target="#validTab">
                                                <svg width="16px" height="16" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                     stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>
                                                </svg>
                                                Có hiệu lực
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn-icon custom-nav-link" data-tab-target="#usedTab">
                                                <svg width="16px" height="16" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                     stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>
                                                </svg>
                                                Đã sử dụng
                                            </button>
                                        </li>
                                        <li class="li-icon">
                                            <button class="btn-icon custom-nav-link" data-tab-target="#expiredTab">
                                                <svg width="16px" height="16" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                     stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>
                                                </svg>
                                                Hết hiệu lực
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="validTab" class="custom-tab-pane custom-active">
                                        @livewire('promotions-table', ['status' => 1])
                                    </div>
                                    <div id="usedTab" class="custom-tab-pane">
                                        @livewire('promotions-table', ['status' => 0])
                                    </div>
                                    <div id="expiredTab" class="custom-tab-pane">
                                        @livewire('promotions-table', ['status' => 2])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.navtest button');
            const tabContents = document.querySelectorAll('.custom-tab-pane');

            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    this.classList.add('active');

                    tabContents.forEach(content => {
                        content.classList.remove('custom-active');
                    });

                    const target = this.getAttribute('data-tab-target');
                    document.querySelector(target).classList.add('custom-active');
                });
            });
        });
    </script>
</x-filament::page>
