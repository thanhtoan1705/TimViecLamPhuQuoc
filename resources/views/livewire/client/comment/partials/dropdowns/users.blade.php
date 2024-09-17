<div class="position-relative bg-white rounded-lg shadow-sm w-100">
    <ul class="list-group h-48 overflow-auto text-dark">
        @foreach($users as $user)
        @php
            if (isset($user->avatar_url)) {
                $user_img = $user->avatar_url;
            } else {
                $user_img = asset('default/user.png');
            }
        @endphp
            <li wire:click="selectUser('{{ $user->name }}')" wire:key="{{ $user->id }}" class="list-group-item">
                <a class="d-flex align-items-center px-3 list-group-item-action">
                    <img class="rounded-circle mr-2" src="{{$user_img}}" alt="{{ $user->name }}" style="width: 24px; height: 24px;">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
