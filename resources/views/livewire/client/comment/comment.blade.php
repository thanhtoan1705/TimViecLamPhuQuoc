
<div>
    @if ($isEditing)
        @include('livewire.client.comment.partials.comment-form', [
            'method' => 'editComment',
            'state' => 'editState',
            'inputId' => 'reply-comment',
            'inputLabel' => 'Your Reply',
            'button' => 'Sửa bình luận',
        ])
    @else
        <article class="py-4 my-4 text-base bg-white rounded-lg">
            <footer class="d-flex justify-content-between align-items-center mb-1">
                <div class="d-flex align-items-center pt-2 mt-2">
                    <p class="d-inline-flex align-items-center mr-3 text-muted"><img
                            class="mr-2 rounded-circle" style="width: 24px; height: 24px;" src="{{ $comment->user->avatar_url }}"
                            alt="{{ $comment->user->name }}">{{ Str::ucfirst($comment->user->name) }}
                    </p>
                    <p class="text-muted ms-3">
                        <time pubdate datetime="{{ $comment->presenter()->relativeCreatedAt() }}"
                            title="{{ $comment->presenter()->relativeCreatedAt() }}">
                            {{ $comment->presenter()->relativeCreatedAt() }}
                        </time>
                    </p>
                </div>
                <div class="position-relative">
                    <button wire:click="$toggle('showOptions')"
                        class="bg-light border border-1 btn btn-light btn-sm p-2" type="button">
                        <svg class="bi bi-three-dots-vertical" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 9.5A1.5 1.5 0 1 1 4.5 8 1.5 1.5 0 0 1 3 9.5zm0-5A1.5 1.5 0 1 1 4.5 3 1.5 1.5 0 0 1 3 4.5zm0 10A1.5 1.5 0 1 1 4.5 13 1.5 1.5 0 0 1 3 14.5z"/>
                        </svg>
                    </button>
                </div>
            </footer>
            <p class="text-muted m-0">
                {!! $comment->presenter()->replaceUserMentions($comment->presenter()->markdownBody()) !!}
            </p>

            <div class="d-flex align-items-center mt-2">
                <livewire:like :$comment :key="$comment->id" />

                @include('livewire.client.comment.partials.comment-reply')

            </div>

        </article>
    @endif
    @if ($isReplying)
        @include('livewire.client.comment.partials.comment-form', [
            'method' => 'postReply',
            'state' => 'replyState',
            'inputId' => 'reply-comment',
            'inputLabel' => 'Your Reply',
            'button' => 'Trả lời',
        ])
    @endif
    @if ($hasReplies)

       <article class="p-1 mb-1 ml-1 border-top border-light">
            @foreach ($comment->children as $child)
                <livewire:comment :comment="$child" :key="$child->id" />

            @endforeach
        </article>
{{--        <div class="d-flex align-items-center mt-2">--}}
{{--            @foreach ($comment->children as $child)--}}
{{--                <livewire:comment :comment="$child" :key="$child->id" />--}}
{{--                    @include('livewire.client.comment.partials.comment-reply')--}}
{{--            @endforeach--}}

{{--        </div>--}}
    @endif
        <script>
            function detectAtSymbol() {
                const textarea = document.getElementById('reply-comment');
                if (!textarea || textarea.selectionStart === undefined) {
                    return;
                }

                const cursorPosition = textarea.selectionStart;
                const textBeforeCursor = textarea.value.substring(0, cursorPosition);
                const atSymbolPosition = textBeforeCursor.lastIndexOf('@');

                if (atSymbolPosition !== -1) {
                    const searchTerm = textBeforeCursor.substring(atSymbolPosition + 1);
                    if (searchTerm.trim().length > 0) {
                        Livewire.emit('getUsers', { searchTerm: searchTerm });
                    }
                }
            }
        </script>

</div>
