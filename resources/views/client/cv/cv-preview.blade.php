@extends('client.layouts.master')
@section('title', 'Preview CV Template')
@section('content')
    <main class="main">
        <div class="container mt-5 p-4">
            <!-- Template Selection -->
            <div class="template-navigation mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="action-buttons">
                        <button id="downloadCV" class="btn btn-primary me-2">
                            <i class="bi bi-download"></i> Tải xuống PDF
                        </button>
                        <button id="saveCV" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu CV
                        </button>
                    </div>
                </div>
            </div>

            <!-- Template Content -->
            <div id="example" data-template-id="{{ $templateId }}"></div>
        </div>
    </main>
@endsection
