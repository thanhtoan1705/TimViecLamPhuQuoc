<span class="d-inline-flex align-items-center text-sm me-2">
  <button wire:click="like" class="border-0 d-inline-flex align-items-center bg-white {{ $comment->isLiked() ? 'text-success' : 'text-muted' }} focus-outline-none">
    <img src="{{ asset('assets/client/imgs/page/blog/like.svg') }}" alt="">

    <span class="fw-bold">{{ $count }} like</span>
  </button>
</span>
