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
        <article
            class="py-2 px-4 my-4 text-base rounded rounded-lg bg-white border border-secondary-subtle @if($comment->isChild()) ms-4 @endif">
            <footer class="d-flex justify-content-between align-items-center mb-1">
                <div class="d-flex align-items-center pt-2 mt-2">
                    @php
                        if (isset($comment->user->avatar_url)) {
                            $user_img = $comment->user->avatar_url;
                        } else {
                            $user_img = asset('default/user.png');
                        }
                    @endphp
                    @if($comment->isChild() && $parentComment)
                    <p class="d-inline-flex align-items-center mr-3 text-muted"><img
                            class="mr-2 rounded-circle" style="width: 24px; height: 24px;"
                            src="{{ $user_img }}"
                            alt="{{ $comment->user->name }}"><strong
                            class="text-primary">{{ Str::ucfirst($comment->user->name) }}</strong>
                        @<u>{{ $parentComment->user->name }}</u></p>
                    @else
                        <p class="d-inline-flex align-items-center mr-3 text-muted"><img
                                class="mr-2 rounded-circle" style="width: 24px; height: 24px;"
                                src="{{ $user_img }}"
                                alt="{{ $comment->user->name }}"><strong
                                class="text-primary">{{ Str::ucfirst($comment->user->name) }}</strong></p>
                    @endif
                    <p class="text-muted ms-3">
                        <time pubdate datetime="{{ $comment->presenter()->relativeCreatedAt() }}"
                            title="{{ $comment->presenter()->relativeCreatedAt() }}">
                            {{ $comment->presenter()->relativeCreatedAt() }}
                        </time>
                    </p>
                </div>

                <div class="position-relative">
                    <button wire:click="$toggle('showOptions')"
                            class="btn btn-white text-secondary d-inline-flex align-items-center p-2" type="button">
                        <svg class="bi bi-three-dots" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3 9a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm5 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm5 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    @if($showOptions)
                        <div class="dropdown-menu dropdown-menu-end mt-1 shadow-sm show">
                            <ul class="list-unstyled mb-0">
                                @can('update',$comment)
                                    <li>
                                        <button wire:click="$toggle('isEditing')" type="button"
                                                class="dropdown-item">Sửa
                                        </button>
                                    </li>
                                @endcan
                                @can('destroy',$comment)
                                    <li>
                                        <button x-on:click="confirmCommentDeletion"
                                                x-data="{
                                            confirmCommentDeletion(){
                                                if(window.confirm('Bạn có chắc muốn xóa bình luận này?')){
                                                    @this.call('deleteComment')
                                                }
                                            }
                                        }"
                                                class="dropdown-item">
                                            Xóa
                                        </button>
                                    </li>
                                @endcan
                                <li>
                                    <a href="#" onclick="shareOnFacebook()" class="dropdown-item">Chia sẻ</a>
                                </li>
                            </ul>
                        </div>
                    @endif
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
            @foreach ($comment->children->sortByDesc('created_at') as $child)
                <livewire:comment :comment="$child" :key="$child->id"/>
            @endforeach
        </article>

    @endif
    <script>
        function detectAtSymbol() {
            const textarea = document.getElementById('reply-comment');
            if (!textarea) {
                return;
            }

            const cursorPosition = textarea.selectionStart;
            const textBeforeCursor = textarea.value.substring(0, cursorPosition);
            const atSymbolPosition = textBeforeCursor.lastIndexOf('@');

            if (atSymbolPosition !== -1) {
                const searchTerm = textBeforeCursor.substring(atSymbolPosition + 1);
                if (searchTerm.trim().length > 0) {
                @this.dispatch('getUsers', {
                    searchTerm: searchTerm
                })
                    ;
                }
            }
        }
    </script>

</div>
