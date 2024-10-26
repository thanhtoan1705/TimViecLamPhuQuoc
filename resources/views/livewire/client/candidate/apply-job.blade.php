
<form wire:submit.prevent="submit" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label" for="file-upload" id="drop-zone" style="display: block;">
            <span id="file-name">{{ $resumeName ? $resumeName : 'Tải lên CV từ máy tính, chọn hoặc kéo thả' }}</span>
        </label>
        <input class="form-control" id="file-upload" name="resume" type="file" accept=".pdf,.doc,.docx" wire:model="resume" style="display: none;">
        <div class="text-muted text-center">Hỗ trợ định dạng .doc, .docx, pdf có kích thước dưới 5MB.</div>
        <div class="text-center mt-2">
            <button type="button" class="btn btn-default" onclick="document.getElementById('file-upload').click()">Chọn CV</button>
        </div>
        @error('resume') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="des" class="form-label">Giới thiệu ngắn</label>
        <textarea id="des" name="description" class="form-control" placeholder="Giới thiệu ngắn của bạn..." rows="5" wire:model="description" style="height: 120px;"></textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-default hover-up w-100" type="submit">Ứng Tuyển</button>
    </div>
</form>
