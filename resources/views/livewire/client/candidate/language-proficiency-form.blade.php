<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Ngôn ngữ</h5>
        <form wire:submit.prevent="addLanguage" class="mb-4">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" class="form-control" id="language" wire:model="language" placeholder="Ngôn ngữ">
                    @error('language') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-5">
                    <select class="form-select" id="proficiency_level" style="height: 50px" wire:model="proficiency_level">
                        <option value="">Mức độ thành thạo</option>
                        <option value="Beginner">Sơ cấp</option>
                        <option value="Intermediate">Trung cấp</option>
                        <option value="Advanced">Nâng cao</option>
                        <option value="Fluent">Thành thạo</option>
                        <option value="Native">Bản ngữ</option>
                    </select>
                    @error('proficiency_level') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-2">
                    <button type="submit" style="height: 50px;" class="btn btn-primary w-100">Thêm</button>
                </div>
            </div>
        </form>

        <div class="language-list">
            @foreach($languages as $language)
                <div class="badge bg-light text-dark me-2 mb-2 p-2">
                    {{ $language->language }} - {{ $language->proficiency_level }}
                    <button class="btn btn-sm btn-link text-danger p-0 ms-2" wire:click="removeLanguage({{ $language->id }})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>
