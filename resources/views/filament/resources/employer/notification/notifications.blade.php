<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Thông báo</h2>

        <ul>
            @foreach ($this->getNotifications() as $notification)
                <li class="p-4 bg-white rounded-lg shadow">
                    <p>{{ $notification->data['message'] }}</p>
                    <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</x-filament::page>
