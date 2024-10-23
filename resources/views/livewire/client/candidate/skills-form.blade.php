<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Kỹ năng</h5>
        <form wire:submit.prevent="addSkill" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="newSkill" wire:model="newSkill" placeholder="Nhập kỹ năng mới">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>

        <div class="skill-list">
            @foreach($skills as $skill)
                <span class="badge bg-light text-dark me-2 mb-2 p-2">
                    {{ $skill->name }}
                    <button class="btn btn-sm btn-link text-danger p-0 ms-2" wire:click="removeSkill({{ $skill->id }})">
                        <i class="fas fa-times"></i>
                    </button>
                </span>
            @endforeach
        </div>
    </div>
</div>
