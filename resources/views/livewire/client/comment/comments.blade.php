<div>

    <section class="bg-white pt-4 pt-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 h-lg2 font-weight-bold text-dark">Bình luận ({{$totalComments}})</h2>
        </div>
        @auth
            @include('livewire.client.comment.partials.comment-form',[
                'method'=>'postComment',
                'state'=>'newCommentState',
                'inputId'=> 'comment',
                'inputLabel'=> 'Nội dung',
                'button'=>'Bình luận'
            ])
        @else
            <a class="pt-2 mt-2 text-sm" href="{{ route('client.candidate.login') }}">Vui lòng đăng nhập để bình
                luận!</a>
        @endauth
        @if($comments->count())
            @foreach($comments as $comment)
                <livewire:comment :$comment :key="$comment->id"/>
            @endforeach

                <div style="margin-top: 100px;">
                    {{$comments->links('vendor.pagination.custom')}}
                </div>
        @else
            <p class="pt-2">Chưa có bình luận nào cho bài viết này!</p>
        @endif
    </section>
</div>
