@if($getRecord()->interview_type === 'online' && $getRecord()->zoom_join_url)
    <div class="inline-flex rounded-lg overflow-hidden border border-primary-600 bg-white/80 hover:bg-primary-50/50 transition-all duration-300">
        <button
            type="button"
            onclick="window.open('{{ $getRecord()->zoom_join_url }}', '_blank')"
            class="flex items-center justify-center gap-1.5 px-3 py-1.5 hover:bg-primary-600 transition-all duration-300 group"
            title="Join Zoom"
        >
            <x-heroicon-o-video-camera class="w-4 h-4 text-primary-600 group-hover:text-white transition-all duration-300"/>
            <span class="text-xs font-medium text-primary-600 group-hover:text-white transition-all duration-300">
                Bắt đầu
            </span>
        </button>
    </div>
@endif
