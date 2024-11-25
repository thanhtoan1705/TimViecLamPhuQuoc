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
        .fi-header { display: none !important; }

        .promo-wrapper {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .promo-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #eee;
        }

        .promo-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .promo-title svg {
            width: 24px;
            height: 24px;
            color: #0ea5e9;
        }

        .promo-content {
            padding: 1.5rem 2rem;
        }

        /* Improved Tab Navigation */
        .navtest {
            display: inline-flex;
            background: #f1f5f9;
            padding: 0.4rem;
            border-radius: 10px;
            gap: 0.4rem;
        }

        .navtest li { list-style: none; }

        .navtest button {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #64748b;
            background: transparent;
            border: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }

        .navtest button:hover:not(.active) {
            background: rgba(255, 255, 255, 0.5);
            color: #334155;
        }

        .navtest button.active {
            background: white;
            color: #0ea5e9;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        /* Card Grid */
        .row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
            margin-top: 1.5rem;
        }

        .card {
            position: relative;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.2s;
        }

        .card:hover {
            border-color: #0ea5e9;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .vertical-tab {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 32px;
            background: #0ea5e9;
            color: white;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .card-body {
            padding: 1.25rem 1.25rem 1.25rem 3rem;
        }

        .card-title {
            color: #0ea5e9;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .mo-ta {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .ma-giam-gia {
            background: #f8fafc;
            padding: 0.75rem;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text-danger {
            color: #0ea5e9 !important;
            font-weight: 600;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        .btn-danger {
            background: #0ea5e9;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: #0284c7;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 2rem;
        }

        .empty-state img {
            width: 100px;
            height: auto;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .empty-state p {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
            margin: 0;
        }

        /* Tab Content */
        .custom-tab-pane {
            display: none;
        }

        .custom-tab-pane.custom-active {
            display: block;
        }

        .tab-content {
            min-height: 400px;
        }

        .custom-tab-pane {
            height: 100%;
        }

        .custom-tab-pane > div {
            height: 100%;
        }
    </style>

    <div class="promo-wrapper">
        <div class="promo-header">
            <h2 class="promo-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Mã Giảm Giá
            </h2>
        </div>

        <div class="promo-content">
            <ul class="navtest">
                <li>
                    <button class="active" data-tab-target="#validTab">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Có Hiệu Lực
                    </button>
                </li>
                <li>
                    <button data-tab-target="#usedTab">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                        Đã Sử Dụng
                    </button>
                </li>
                <li>
                    <button data-tab-target="#expiredTab">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                        Hết Hiệu Lực
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <div id="validTab" class="custom-tab-pane custom-active">
                    <div wire:snapshot="{&quot;data&quot;:{&quot;statusCode&quot;:1,&quot;paginators&quot;:[{&quot;page&quot;:1}]},&quot;memo&quot;:{&quot;id&quot;:&quot;FognjQF9Pk8akJyCO76w&quot;,&quot;name&quot;:&quot;promotions-table&quot;,&quot;path&quot;:&quot;business\/employer\/promotional\/promotionals&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;vi&quot;},&quot;checksum&quot;:&quot;b99ec097b1f8645eeb32a421f8bbd837357ef2d231a99c6238fbb4ace30207c9&quot;}" wire:effects="{&quot;url&quot;:{&quot;paginators.page&quot;:{&quot;as&quot;:&quot;page&quot;,&quot;use&quot;:&quot;push&quot;,&quot;alwaysShow&quot;:false,&quot;except&quot;:null}}}" wire:id="FognjQF9Pk8akJyCO76w">
                        <div style="height: 100%;">
                            @livewire('promotions-table', ['status' => 1])
                        </div>
                    </div>
                </div>

                <div id="usedTab" class="custom-tab-pane">
                    <div wire:snapshot="{&quot;data&quot;:{&quot;statusCode&quot;:0,&quot;paginators&quot;:[{&quot;page&quot;:1}]},&quot;memo&quot;:{&quot;id&quot;:&quot;nZh0ZqHrT6SxngA83XGD&quot;,&quot;name&quot;:&quot;promotions-table&quot;,&quot;path&quot;:&quot;business\/employer\/promotional\/promotionals&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;vi&quot;},&quot;checksum&quot;:&quot;b920dd8030724e8964bf57b9f913a8f51e29f4abeef51f921a0a646286bfedda&quot;}" wire:effects="{&quot;url&quot;:{&quot;paginators.page&quot;:{&quot;as&quot;:&quot;page&quot;,&quot;use&quot;:&quot;push&quot;,&quot;alwaysShow&quot;:false,&quot;except&quot;:null}}}" wire:id="nZh0ZqHrT6SxngA83XGD">
                        <div style="height: 100%;">
                            @livewire('promotions-table', ['status' => 0])
                        </div>
                    </div>
                </div>

                <div id="expiredTab" class="custom-tab-pane">
                    <div wire:snapshot="{&quot;data&quot;:{&quot;statusCode&quot;:2,&quot;paginators&quot;:[{&quot;page&quot;:1}]},&quot;memo&quot;:{&quot;id&quot;:&quot;cpPTLdq9ykwxnH37fwkx&quot;,&quot;name&quot;:&quot;promotions-table&quot;,&quot;path&quot;:&quot;business\/employer\/promotional\/promotionals&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;vi&quot;},&quot;checksum&quot;:&quot;c4f2275ec71aec70af6cd2a5f336acbc4a2bbe91998d6c22d0e540888cf2a324&quot;}" wire:effects="{&quot;url&quot;:{&quot;paginators.page&quot;:{&quot;as&quot;:&quot;page&quot;,&quot;use&quot;:&quot;push&quot;,&quot;alwaysShow&quot;:false,&quot;except&quot;:null}}}" wire:id="cpPTLdq9ykwxnH37fwkx">
                        <div style="height: 100%;">
                            @livewire('promotions-table', ['status' => 2])
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
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    tabContents.forEach(content => content.classList.remove('custom-active'));
                    const target = this.getAttribute('data-tab-target');
                    document.querySelector(target).classList.add('custom-active');
                });
            });
        });
    </script>
</x-filament::page>
