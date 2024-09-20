<x-filament-panels::page>
    <div>
        <div class="content-wrapper">
            <h2 class="text-lg font-bold mb-4">Thông báo</h2>

            <ul>
                @forelse($this->getNotifications() as $notification)
                    <li class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}">
                        <!-- Dấu chấm xanh nếu chưa đọc -->
                        @if(!$notification->read_at)
                            <span class="status-dot"></span>
                        @endif

                        <x-filament::icon
                            :icon="match($notification->data['type'] ?? 'info') {
                                'success' => 'heroicon-o-check-circle',
                                'warning' => 'heroicon-o-exclamation-circle',
                                'error' => 'heroicon-o-x-circle',
                                default => 'heroicon-o-information-circle',
                            }"
                            class="icon"
                        />
                        <span>{{ $notification->data['message'] }}</span>

                        <!-- Thời gian thông báo -->
                        <span class="timestamp">{{ $notification->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                @empty
                    <li class="notification-item">
                        <x-filament::icon icon="heroicon-o-information-circle" class="icon"/>
                        <span>Không có thông báo nào.</span>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

    <style>
        .content-wrapper {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        .notification-item {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 1rem;
            color: #374151;
        }

        .icon {
            margin-right: 10px;
            width: 24px;
            height: 24px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background-color: #3b82f6;
            border-radius: 50%;
            margin-right: 10px;
        }

        .notification-item.read {
            color: #6b7280;
        }

        .notification-item.unread {
            color: #4b5563;
        }

        .timestamp {
            font-size: 0.875rem;
            color: #9ca3af;
            margin-left: auto;
        }
    </style>
</x-filament-panels::page>
