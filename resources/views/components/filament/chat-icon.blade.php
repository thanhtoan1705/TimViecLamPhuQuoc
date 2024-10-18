<a href="{{ route(config('chatify.routes.prefix')) }}" target="_blank">
    <x-icon name="heroicon-o-chat-bubble-oval-left-ellipsis" class="h-6 w-6 text-gray-400 top-bar-chat-icon" />
{{--    @if($newMessageCount > 0)--}}
{{--        <span class="text-red-500 font-bold">{{ $newMessageCount }}</span> <!-- Display the count -->--}}
{{--    @endif--}}
</a>

<style>
    .top-bar-chat-icon:hover {
        color: blue;
    }
</style>
