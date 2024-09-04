{{-- <div>

    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Bình luận
                    ({{$comments->count()}})</h2>
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
                <a class="pt-4 mt-2 text-sm" href="{{ route('client.candidate.login') }}">Vui lòng đăng nhập để bình luận!</a>
            @endauth
            @if($comments->count())
                @foreach($comments as $comment)
                    <livewire:comment :$comment :key="$comment->id"/>
                @endforeach
                {{$comments->links()}}
            @else
                <p class="pt-4">Chưa có bình luận nào cho bài viết này!</p>
            @endif
        </div>
    </section>
</div> --}}
<div>

    <section class="bg-white pt-4 py-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 h-lg2 font-weight-bold text-dark">Bình luận ({{$comments->count()}})</h2>
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
            <a class="py-2 mt-2 text-sm" href="{{ route('client.candidate.login') }}">Vui lòng đăng nhập để bình luận!</a>
        @endauth
        @if($comments->count())
            @foreach($comments as $comment)
                <livewire:comment :$comment :key="$comment->id"/>
            @endforeach
            {{$comments->links()}}
        @else
            <p class="pt-2">Chưa có bình luận nào cho bài viết này!</p>
        @endif
    </section>
</div>
