@if (config('commentify.comment_nesting') === true)
    @auth
        <button type="button" wire:click="$toggle('isReplying')"
                class="border-0 bg-white d-flex align-items-center text-muted text-sm">
            <img src="{{ asset('assets/client/imgs/page/blog/mess.svg') }}" alt="">
            <span class="fw-bold">Trả lời</span>
        </button>
        <div wire:loading wire:target="$toggle('isReplying')">
            @include('livewire.client.comment.partials.loader')
        </div>
    @endauth
    @if ($comment->children->count())
        <button type="button" wire:click="$toggle('hasReplies')"
                class="border-0 bg-white d-flex align-items-center text-muted text-sm">
            @if (!$hasReplies)
                Xem tất cả ({{ $comment->children->count() }})
            @else
                Ẩn
            @endif
        </button>
        <div wire:loading wire:target="$toggle('hasReplies')">
            @include('livewire.client.comment.partials.loader')
        </div>
    @endif
@endif
