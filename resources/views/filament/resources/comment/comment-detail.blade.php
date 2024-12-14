<x-filament::page>
    <div class="grid grid-cols-2 gap-6">
        <!-- Thông tin bình luận -->
        <x-filament::section>
            <x-slot name="heading">Thông tin bình luận</x-slot>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-700">Người bình luận</label>
                    <input type="text" class="w-full bg-gray-100 border border-gray-300 rounded-md" value="{{ $record->user->name }}" disabled>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Tên bài viết</label>
                    <input type="text" class="w-full bg-gray-100 border border-gray-300 rounded-md" value="{{ $record->blog->title }}" disabled>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Nội dung bình luận</label>
                    <textarea class="w-full bg-gray-100 border border-gray-300 rounded-md" rows="3" disabled>{{ strip_tags($record->content) }}</textarea>
                </div>
            </div>
        </x-filament::section>

        <!-- Thời gian -->
        <x-filament::section>
            <x-slot name="heading">Thời gian</x-slot>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-700">Thời gian tạo</label>
                    <input type="text" class="w-full bg-gray-100 border border-gray-300 rounded-md" value="{{ $record->created_at }}" disabled>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Thời gian cập nhật mới nhất</label>
                    <input type="text" class="w-full bg-gray-100 border border-gray-300 rounded-md" value="{{ $record->updated_at }}" disabled>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament::page>
