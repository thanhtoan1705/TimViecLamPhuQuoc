<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Bằng cấp</h5>
        <form wire:submit.prevent="updateDegree" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-8 col-sm-12">
                    <select wire:model="selectedDegree" class="form-select">
                        <option value="">Chọn bằng cấp</option>
                        @foreach($degrees as $degree)
                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                </div>
            </div>
        </form>

        @if($candidate->degree)
            <div class="alert alert-info">
                <strong>Bằng cấp hiện tại:</strong> {{ $candidate->degree->name }}
            </div>
        @endif
    </div>
</div>
