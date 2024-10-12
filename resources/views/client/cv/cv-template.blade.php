@extends('client.layouts.master')
@section('title', 'Mẫu CV')

@section('content')
    <main class="main">
        <div class="container mt-5 p-4 bg-white rounded shadow">
            <!-- Modal -->
            <div class="modal fade show" id="cvModal" tabindex="-1" aria-labelledby="cvModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cvModalLabel">Xem trước CV</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <livewire:client.cv.template-preview :templateId="$templateId"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript để tự động hiển thị modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cvModal = new bootstrap.Modal(document.getElementById('cvModal'));
            cvModal.show();
        });
    </script>


@endsection
