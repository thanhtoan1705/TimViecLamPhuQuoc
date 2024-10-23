<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Giáo dục</h5>
        <form wire:submit.prevent="addEducation" class="mb-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="major_name" wire:model="major_name" placeholder="Chuyên ngành">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="institution_name" wire:model="institution_name" placeholder="Trường">
                </div>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="start_date" wire:model="start_date">
                </div>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="end_date" wire:model="end_date">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="classification" wire:model="classification" placeholder="Xếp loại">
                </div>
                <div class="col-md-6">
                    <input type="number" step="0.01" class="form-control" id="gpa" wire:model="gpa" placeholder="GPA">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Thêm giáo dục</button>
                </div>
            </div>
        </form>

        <div class="education-list">
            @foreach($educations as $education)
                <div class="card mb-3 position-relative">
                    <div class="card-body">
                        <h6 class="card-title">{{ $education->major_name }} tại {{ $education->institution_name }}</h6>
                        <p class="card-text">
                            <small class="text-muted">
                                {{ $education->start_date->format('d/m/Y') }} - {{ $education->end_date ? $education->end_date->format('d/m/Y') : 'Hiện tại' }}
                            </small>
                        </p>
                        <p class="card-text">Xếp loại: {{ $education->classification }}, GPA: {{ $education->gpa }}</p>
                        <button class="btn btn-link text-danger position-absolute top-0 end-0 p-2"
                                wire:click="removeEducation({{ $education->id }})"
                                title="Xóa thông tin giáo dục này">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
