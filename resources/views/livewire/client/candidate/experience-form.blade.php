<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Kinh nghiệm</h5>
        <form wire:submit.prevent="updateExperience" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-8 col-sm-12">
                    <select wire:model="selectedExperience" class="form-select">
                        <option value="">Chọn kinh nghiệm</option>
                        @foreach($experiences as $experience)
                            <option value="{{ $experience->id }}">{{ $experience->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                </div>
            </div>
        </form>

        @if($candidate->experience)
            <div class="alert alert-info">
                <strong>Kinh nghiệm hiện tại:</strong> {{ $candidate->experience->name }}
            </div>
        @endif
    </div>
</div>
