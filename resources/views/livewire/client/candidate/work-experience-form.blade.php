<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Kinh nghiệm làm việc</h5>
        <form wire:submit.prevent="addExperience" class="mb-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="position" wire:model="position" placeholder="Vị trí">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="company_name" wire:model="company_name" placeholder="Tên công ty">
                </div>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="start_date" wire:model="start_date">
                </div>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="end_date" wire:model="end_date">
                </div>
                <div class="col-12">
                    <textarea class="form-control" id="description" wire:model="description" rows="3" placeholder="Mô tả công việc"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Thêm kinh nghiệm</button>
                </div>
            </div>
        </form>

        <div class="experience-list">
            @foreach($experiences as $experience)
                <div class="card mb-3 position-relative">
                    <div class="card-body">
                        <h6 class="card-title">{{ $experience->position }} tại {{ $experience->company_name }}</h6>
                        <p class="card-text">
                            <small class="text-muted">
                                {{ $experience->start_date->format('d/m/Y') }} - {{ $experience->end_date ? $experience->end_date->format('d/m/Y') : 'Hiện tại' }}
                            </small>
                        </p>
                        <p class="card-text">{{ $experience->description }}</p>
                        <button class="btn btn-link text-danger position-absolute top-0 end-0 p-2"
                                wire:click="removeExperience({{ $experience->id }})"
                                title="Xóa kinh nghiệm này">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
