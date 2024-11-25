@extends('client.layouts.master')
@section('title', 'CV đã lưu')
@section('content')
    <main class="main">
        <x-client.cadidate-header></x-client.cadidate-header>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <x-client.sidebar-candidate></x-client.sidebar-candidate>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-page">
                            <div class="box-content">
                                <div class="box-heading mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="mb-0">CV đã lưu</h3>
                                        <a href="{{ route('client.cv.list') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>
                                            Tạo CV mới
                                        </a>
                                    </div>
                                </div>
                                @if($savedCVs->count() > 0)
                                    <div class="row g-4">
                                        @foreach($savedCVs as $cv)
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="cv-card">
                                                    <div class="cv-card-preview">
                                                        <img src="{{ getStorageImageUrl($cv->template->template_image, config('cv')) }}"
                                                             alt="CV Template"
                                                             class="cv-preview-image">
                                                        <div class="cv-card-overlay">
                                                            <div class="d-flex gap-2">
                                                                <a href="{{ route('client.cv.viewTemplate', ['id' => $cv->template_id]) }}"
                                                                   class="btn btn-light btn-sm">
                                                                    <i class="bi bi-pencil-square me-1"></i>
                                                                    Chỉnh sửa
                                                                </a>
                                                                <form action="{{ route('client.cv.destroy', $cv->id) }}" method="POST" class="delete-cv-form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <i class="bi bi-trash me-1"></i>
                                                                        Hủy lưu
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="cv-card-body">
                                                        <div class="cv-card-info">
                                                            <h5 class="cv-title">{{ $cv->template->template_name }}</h5>
                                                            <p class="cv-meta">
                                                                <i class="bi bi-clock me-1"></i>
                                                                {{ $cv->updated_at->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="empty-state text-center py-5">
                                        <img src="{{ asset('images/no-data.svg') }}"
                                             alt="No CV"
                                             class="img-fluid mb-4"
                                             style="max-width: 200px;">
                                        <h4>Chưa có CV nào được lưu</h4>
                                        <p class="text-muted">Bắt đầu tạo CV chuyên nghiệp đầu tiên của bạn!</p>
                                        <a href="" class="btn btn-primary btn-lg mt-3">
                                            <i class="bi bi-plus-circle me-2"></i>
                                            Tạo CV mới
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('css')
<style>
    .cv-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .cv-card-preview {
        position: relative;
        border-radius: 12px 12px 0 0;
        overflow: hidden;
        padding-top: 90%;
    }

    .cv-preview-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.3s ease;
    }

    .cv-card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
    }

    .cv-card-overlay .btn {
        font-weight: 500;
        padding: 0.5rem 1rem;
    }

    .cv-card:hover .cv-card-overlay {
        opacity: 1;
    }

    .cv-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    }

    .cv-card:hover .cv-preview-image {
        transform: scale(1.05);
    }

    .cv-card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .cv-card-info {
        flex-grow: 1;
    }

    .cv-card-actions {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #edf2f7;
    }

    /* Card Actions Styling */
    .cv-card-actions {
        padding: 1rem;
        border-top: 1px solid #edf2f7;
    }

    .cv-card-actions .btn-group {
        gap: 4px;
    }

    .cv-card-actions .btn {
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    /* Primary Button Styling */
    .cv-card-actions .btn-primary {
        background-color: #3c65f5;
        border-color: #3c65f5;
    }

    .cv-card-actions .btn-primary:hover {
        background-color: #2a4cd7;
        border-color: #2a4cd7;
        transform: translateY(-1px);
    }

    /* Dropdown Styling */
    .cv-card-actions .dropdown-toggle {
        padding-left: 12px !important;
        padding-right: 12px !important;
    }

    .cv-card-actions .dropdown-toggle::after {
        display: none;
    }

    .cv-card-actions .dropdown-menu {
        min-width: 200px;
        padding: 0.5rem;
        margin-top: 0.5rem;
        border-radius: 8px;
    }

    .cv-card-actions .dropdown-item {
        padding: 0.6rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .cv-card-actions .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .cv-card-actions .dropdown-item.text-danger:hover {
        background-color: #fff5f5;
    }

    .cv-card-actions .dropdown-divider {
        margin: 0.5rem 0;
        border-color: #edf2f7;
    }

    /* Icon Styling */
    .cv-card-actions .bi {
        font-size: 1.1rem;
    }

    /* Card Hover Effect */
    .cv-card {
        transition: all 0.3s ease;
    }

    .cv-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    /* Preview Image Styling */
    .cv-preview-image {
        border-radius: 8px 8px 0 0;
        transition: all 0.3s ease;
    }

    .cv-card:hover .cv-preview-image {
        transform: scale(1.02);
    }

    /* Card Info Styling */
    .cv-card-info {
        padding: 1rem;
    }

    .cv-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .cv-meta {
        font-size: 0.9rem;
        color: #718096;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .cv-card-actions .btn {
            padding: 0.4rem 0.8rem;
            font-size: 0.9rem;
        }

        .cv-card-info {
            padding: 0.8rem;
        }

        .cv-title {
            font-size: 1rem;
        }
    }
</style>
@endpush

@push('script')
<script>

// Thêm animation cho hiệu ứng xóa
</script>

<style>
@keyframes fadeOut {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(-20px); }
}
</style>
@endpush
