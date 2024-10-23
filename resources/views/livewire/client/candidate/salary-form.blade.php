<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Mức lương mong muốn</h5>
        <form wire:submit.prevent="updateSalary" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-8 col-sm-12">
                    <select wire:model="selectedSalary" class="form-select">
                        <option value="">Chọn mức lương</option>
                        @foreach($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" class="btn btn-primary w-100">Cập nhật mức lương</button>
                </div>
            </div>
        </form>

        @if($candidate->salary)
                <div class="alert alert-info">
                    <strong>Kinh nghiệm hiện tại:</strong> {{ $candidate->salary->name }}
                </div>
        @endif
    </div>
</div>
