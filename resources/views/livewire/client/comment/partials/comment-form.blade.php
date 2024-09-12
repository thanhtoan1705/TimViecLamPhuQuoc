<form class="mb-3" wire:submit="{{$method}}">
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thành công!</strong> {{ session('message') }}
            </div>
        </div>
    @endif
    @csrf
    <div class="form-group mb-3">
        <textarea id="{{$inputId}}" rows="6" style="max-height: 800px; height: 200px;"
                  class="form-control @error($state.'.content') is-invalid @enderror"
                  placeholder="Nhập bình luận..."
                  wire:model.defer="{{$state}}.content"
                  wire:key="new-comment-{{ now() }}"
                  oninput="detectAtSymbol()"
                  wire:ignore></textarea>
        @if(!empty($users) && $users->count() > 0)
            @include('livewire.client.comment.partials.dropdowns.users')
        @endif
        @error($state.'.content')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <button wire:loading.attr="disabled" type="submit" class="btn btn-primary btn-lg">
        <span style="background-color: #0d6efd;">{{$button}}</span>
    </button>
</form>
