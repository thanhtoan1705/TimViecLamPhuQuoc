<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <!-- Widget hiển thị thông báo -->
            <h2>Thông báo của bạn</h2>
            <ul>
                @foreach ($this->getNotifications()->take(10) as $notification)
                    <li>{{ $notification->data['message'] }}</li>
                @endforeach
            </ul>
        </div>

    </x-filament::section>
</x-filament-widgets::widget>
