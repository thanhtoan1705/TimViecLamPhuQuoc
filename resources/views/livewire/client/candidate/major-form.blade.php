<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Chuyên ngành</h5>
        <form wire:submit.prevent="updateMajor" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-8 col-sm-12">
                    <select wire:model="selectedMajor" class="form-select">
                        <option value="">Chọn chuyên ngành</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                </div>
            </div>
        </form>

        @if($candidate->major)
            <div class="alert alert-info">
                <strong>Chuyên ngành hiện tại:</strong> {{ $candidate->major->name }}
            </div>
        @endif
    </div>
</div>
