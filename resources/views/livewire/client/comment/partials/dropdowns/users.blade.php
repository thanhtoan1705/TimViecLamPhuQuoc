<div class="position-relative bg-white rounded-lg shadow-sm w-100">
    <ul class="list-group h-48 overflow-auto text-dark">
        @foreach($users as $user)
            <li wire:click="selectUser('{{ $user->name }}')" wire:key="{{ $user->id }}" class="list-group-item">
                <a class="d-flex align-items-center px-3 list-group-item-action">
                    <img class="rounded-circle mr-2" src="{{ getStorageImageUrl($comment->user->avatar_url, config('image.avatar')) }}" alt="{{ $user->name }}" style="width: 24px; height: 24px;">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
