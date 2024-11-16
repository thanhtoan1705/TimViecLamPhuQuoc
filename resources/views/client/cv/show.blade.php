@extends('client.layouts.master')
@section('title', 'Chỉnh sửa CV')
@section('content')
    <div id="loading-overlay" class="loading-overlay">
        <img src="{{ asset('default/favicon.svg') }}" class="loading-icon pulse" alt="Loading">
    </div>

    <main class="main" style="background-color: #F1F2F6; display: none;" id="main-content">
        <div class="cv-header sticky-top d-flex justify-content-between align-items-center p-3 bg-light">
            <div class="cv-toolbar d-flex justify-content-between p-3 bg-white">
                <!-- Nhóm công cụ bên trái -->
                <div class="d-flex align-items-center">
                    <!-- Giữ nguyên các nhóm công cụ khác -->
                    <div class="toolbar-group me-4">
                        <select id="fontSelect" class="cv-select me-2">
                            <option value="Arial">Arial</option>
                            <option value="Helvetica">Helvetica</option>
                            <option value="Times New Roman">Times New Roman</option>
                        </select>
                        <select id="fontSizeSelect" class="cv-select">
                            <option value="1">8pt</option>
                            <option value="2">10pt</option>
                            <option value="3">12pt</option>
                            <option value="4">14pt</option>
                            <option value="5">18pt</option>
                            <option value="6">24pt</option>
                            <option value="7">36pt</option>
                        </select>
                    </div>

                    <!-- Nhóm định dạng text -->
                    <div class="toolbar-group formatting-group me-4">
                        <button id="boldBtn" class="cv-btn" title="In đậm" data-format="bold">
                            <i class="bi bi-type-bold"></i>
                        </button>
                        <button id="italicBtn" class="cv-btn" title="In nghiêng" data-format="italic">
                            <i class="bi bi-type-italic"></i>
                        </button>
                        <button id="underlineBtn" class="cv-btn" title="Gạch chân" data-format="underline">
                            <i class="bi bi-type-underline"></i>
                        </button>
                    </div>

                    <!-- Nhóm màu sắc -->
                    <div class="toolbar-group color-group">
                        <div class="d-flex align-items-center me-4">
                            <label for="colorPicker" class="me-2">Màu chữ:</label>
                            <input type="color" id="colorPicker" title="Chọn màu">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="themeColorPicker" class="me-2">Màu chủ đề:</label>
                            <input type="color" id="themeColorPicker" title="Chọn màu chủ đề" value="#3c65f5">
                        </div>
                    </div>
                </div>

                <!-- Nhóm nút bên phải -->
                <div class="action-buttons">
                    <button type="button" class="custom-btn preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal">
                        <i class="bi bi-eye me-2"></i>
                        <span>Xem trước</span>
                    </button>

                    <button id="downloadCV" class="custom-btn download-btn">
                        <i class="bi bi-download me-1"></i>
                        Tải xuống
                    </button>

                    <button id="saveCV" class="custom-btn save-btn me-2">
                        <i class="bi bi-save me-1"></i>
                        Lưu CV
                    </button>
                </div>
            </div>
        </div>

        <div class="cv-content-wrapper">
            <div class="cv-container container mt-35 p-4 bg-white" id="pdf">
                <div id="cv-editor" data-template-id="{{ $cvTemplate->id }}" data-is-authenticated="{{ auth()->check() }}"
                ></div>
            </div>
        </div>
    </main>

    <!-- Modal Preview -->
    <div class="modal fade preview-modal" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Xem trước CV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="preview-scroll-container">
                        <div class="preview-wrapper">
                            <div id="preview-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    :root {
        --theme-color: #3c65f5;
        --theme-color-light: rgba(60, 101, 245, 0.1);
        --cv-primary-color: var(--theme-color);
        --cv-hover-color: #2a4cd7;
        --cv-bg-color: #f8f9fa;
        --cv-border-color: #e0e0e0;
    }

    /* CV Header Styles */
    .cv-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: var(--cv-bg-color);
    }

    .cv-header::before,
    .cv-header::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        height: 1px;
        background-color: var(--cv-border-color);
    }

    .cv-header::before {
        top: 0;
    }

    .cv-header::after {
        bottom: 0;
    }

    .cv-toolbar {
        width: 100%;
        display: flex;
        justify-content: space-between !important;
        align-items: center;
        gap: 20px;
    }

    .cv-select, .cv-btn {
        margin-right: 5px;
        padding: 5px 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: white;
    }

    .cv-btn {
        cursor: pointer;
    }

    .cv-btn:hover {
        background-color: #e9ecef;
    }

    #colorPicker {
        width: 30px;
        height: 30px;
        padding: 0;
        border: none;
        cursor: pointer;
    }

    .cv-toolbar > * {
        margin-right: 8px;
    }

    .cv-toolbar > *:last-child {
        margin-right: 0;
    }

    /* .cv-button-group .btn-primary {
        background-color: var(--cv-primary-color);
        border-color: var(--cv-primary-color);
    }

    .cv-button-group .btn-primary:hover,
    .cv-button-group .btn-primary:focus {
        background-color: var(--cv-hover-color);
        border-color: var(--cv-hover-color);
    }

    .cv-button-group .btn-outline-primary {
        color: var(--cv-primary-color);
        border-color: var(--cv-primary-color);
    }

    .cv-button-group .btn-outline-primary:hover,
    .cv-button-group .btn-outline-primary:focus {
        background-color: var(--cv-primary-color);
        border-color: var(--cv-primary-color);
        color: white;
    } */

    .main {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .cv-content-wrapper {
        flex: 1;
        display: flex;
        padding-bottom: 2rem;
    }

    .cv-btn.active {
        background-color: #e9ecef;
        border-color: #ced4da;
    }

    .avatar-container {
        position: relative;
        display: inline-block;
    }

    .avatar-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s;
        border-radius: 50%;
    }

    .avatar-container:hover .avatar-overlay {
        opacity: 1;
    }

    .change-avatar-btn {
        padding: 8px;
        cursor: pointer;
    }

    .change-avatar-btn i {
        font-size: 1.2rem;
    }

    .avatar-image {
        transition: filter 0.3s ease;
    }

    .avatar-image:hover {
        filter: brightness(0.8);
    }

    /* Thêm hiệu ứng hover */
    /* .avatar-container::after {
        content: 'Thay đổi ảnh';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    } */

    .avatar-container:hover::after {
        opacity: 1;
    }

    .editable {
        display: inline-block;
        min-width: 1em;
        outline: none;
    }

    .editable:empty::before {
        content: '\00a0'; /* Thêm khoảng trắng không ngắt */
    }

    /* Thêm các style cho các phần tử sử dụng màu chủ ề */
    .cv-name {
        color: var(--theme-color);
    }

    .section-divider {
        border-color: var(--theme-color);
    }

    .section-title {
        color: var(--theme-color);
    }

    /* Style cho các nút định dạng */
    .cv-btn[data-format] {
        padding: 6px 12px;
        margin: 0 2px;
        border: 1px solid #ced4da;
        background-color: white;
        cursor: pointer;
        transition: all 0.2s;
    }

    .cv-btn[data-format]:hover {
        background-color: var(--theme-color-light);
    }

    .cv-btn[data-format].active {
        background-color: var(--theme-color);
        color: white;
        border-color: var(--theme-color);
    }

    /* Style cho text đã được định dạng */
    .editable {
        position: relative;
        min-height: 1em;
        outline: none;
        cursor: text;
    }

    .editable:focus {
        background-color: rgba(60, 101, 245, 0.05);
    }

    /* Đảm bảo các định dạng được giữ nguyên */
    .editable b, .editable strong {
        font-weight: bold !important;
    }

    .editable i, .editable em {
        font-style: italic !important;
    }

    .editable u {
        text-decoration: underline !important;
    }

    /* Style cho các select và color picker */
    .cv-select {
        min-width: 120px;
        height: 34px;
        padding: 5px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: white;
        cursor: pointer;
    }

    #colorPicker {
        width: 34px;
        height: 34px;
        padding: 2px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Style cho text đã ược định dạng */
    .editable {
        position: relative;
        min-height: 1em;
        outline: none;
        cursor: text;
    }

    .editable:focus {
        background-color: rgba(60, 101, 245, 0.05);
    }

    /* Đảm bảo các định dạng được giữ nguyên */
    /* .editable[style*="font-family"] {
        font-family: inherit;
    }

    .editable[style*="font-size"] {
        font-size: inherit;
    }

    .editable[style*="color"] {
        color: inherit;
    } */

    #themeColorPicker {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        height: 32px;
        width: 32px;
        padding: 0;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        overflow: hidden;
        background: none;
    }

    #themeColorPicker::-webkit-color-swatch-wrapper {
        padding: 0;
        border: none;
        border-radius: 50%;
    }

    #themeColorPicker::-webkit-color-swatch {
        border: 2px solid #e0e0e0;
        border-radius: 50%;
        padding: 0;
    }

    #themeColorPicker::-moz-color-swatch {
        border: 2px solid #e0e0e0;
        border-radius: 50%;
        padding: 0;
    }

    #themeColorPicker:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }

    #themeColorPicker:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(60, 101, 245, 0.2);
    }

    .d-flex.align-items-center.ms-2 {
        display: flex;
        align-items: center;
        white-space: nowrap; /* Ngăn text xuống dòng */
        gap: 8px; /* Khoảng cách giữa label và color picker */
    }

    .d-flex.align-items-center.ms-2 label {
        margin: 0; /* Reset margin */
        font-size: 14px; /* Điều chỉnh kích thước chữ nếu cần */
        line-height: 1; /* Đảm bảo chiều cao line phù hợp */
    }

    #themeColorPicker {
        /* Giữ nguycn các thuộc tính hiện có */
        margin-left: 0; /* Reset margin nếu có */
        vertical-align: middle; /* Căn giữa theo chiều dọc */
    }

    /* Style cho toolbar */
    .cv-toolbar {
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Style cho các nhóm công cụ */
    .toolbar-group {
        display: flex;
        align-items: center;
        padding: 0 8px;
    }

    .toolbar-group:not(:last-child) {
        border-right: 1px solid #e0e0e0;
    }

    /* Style cho các nút định dạng */
    .formatting-group .cv-btn {
        padding: 6px 12px;
        margin: 0 2px;
        border: 1px solid #ced4da;
        background-color: white;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .formatting-group .cv-btn:hover {
        background-color: var(--theme-color-light);
    }

    .formatting-group .cv-btn.active {
        background-color: var(--theme-color);
        color: white;
        border-color: var(--theme-color);
    }

    /* Style cho select boxes */
    .cv-select {
        min-width: 120px;
        height: 34px;
        padding: 5px 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: white;
        cursor: pointer;
    }

    .cv-select:hover {
        border-color: var(--theme-color);
    }

    /* Style cho color pickers */
    #colorPicker, #themeColorPicker {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 32px;
        height: 32px;
        padding: 0;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        overflow: hidden;
    }

    #colorPicker::-webkit-color-swatch-wrapper,
    #themeColorPicker::-webkit-color-swatch-wrapper {
        padding: 0;
        border: none;
        border-radius: 50%;
    }

    #colorPicker::-webkit-color-swatch,
    #themeColorPicker::-webkit-color-swatch {
        border: 2px solid #e0e0e0;
        border-radius: 50%;
        padding: 0;
    }

    #colorPicker::-moz-color-swatch,
    #themeColorPicker::-moz-color-swatch {
        border: 2px solid #e0e0e0;
        border-radius: 50%;
        padding: 0;
    }

    /* Style cho labels */
    .color-group label {
        font-size: 14px;
        margin: 0;
        white-space: nowrap;
    }

    /* Hover effects */
    .cv-btn:hover, .cv-select:hover {
        transform: translateY(-1px);
        transition: transform 0.2s ease;
    }

    #colorPicker:hover, #themeColorPicker:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }

    /* Icons */
    .fas, .fab {
        color: var(--theme-color);
    }

    /* Borders */
    .border, .border-end {
        border-color: var(--theme-color) !important;
    }

    /* Links */
    a {
        color: var(--theme-color);
        text-decoration: none;
    }

    a:hover {
        color: var(--cv-hover-color);
    }

    /* Backgrounds */
    .bg-dark {
        background-color: var(--theme-color) !important;
    }

    .bg-light {
        background-color: var(--cv-bg-color) !important;
    }

    /* Rounded borders */
    .rounded, .rounded-top {
        border-radius: 8px !important;
    }

    /* Section headings */
    h5 {
        color: var(--theme-color);
        border-bottom: 2px solid var(--theme-color);
        padding-bottom: 8px;
        margin-bottom: 16px;
    }

    /* List items */
    .list-unstyled li {
        margin-bottom: 8px;
    }

    /* Experience and education cards */
    .bg-light.rounded.border {
        border: 1px solid var(--theme-color) !important;
        transition: all 0.3s ease;
    }

    .bg-light.rounded.border:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }

    /* Style cho Font Awesome icons */
    .fas,
    .fab,
    .fa-dot-circle,
    .fa-medal,
    .fa-globe,
    .fa-map-marker-alt,
    .fa-phone,
    .fa-envelope,
    .fa-linkedin,
    .fa-github {
        color: var(--theme-color) !important; /* Sử dụng !important để override style mặc định */
        transition: color 0.3s ease; /* Thêm transition cho mượt */
    }

    /* Style cho list items với icons */
    .list-unstyled li i,
    .cv-container i {
        color: var(--theme-color) !important;
    }

    /* Đảm bảo icons trong các section cũng được áp dụng màu */
    section i {
        color: var(--theme-color) !important;
    }

    /* Reset và cô lập styles cho preview */
    .preview-modal {
        z-index: 1060;
    }

    .preview-modal .modal-dialog {
        max-width: 850px;
        margin: 1.75rem auto;
    }

    .preview-modal .modal-content {
        background: #fff;
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .preview-modal .modal-header {
        background: #fff;
        border-bottom: 1px solid #eee;
    }

    .preview-modal .modal-title {
        color: #333;
        font-size: 1.25rem;
    }

    .preview-modal .preview-body {
        background: #fff;
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    #preview-content {
        background: #fff;
    }

    /* Reset styles cho CV content trong preview */
    #preview-content .cv-editor {
        transform: none;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    #preview-content .cv-container {
        margin: 0;
        padding: 0;
    }

    /* Ẩn các elements không cần thiết */
    #preview-content .action-buttons,
    #preview-content .add-item,
    #preview-content .remove-section,
    #preview-content [contenteditable],
    #preview-content .btn,
    #preview-content .cv-toolbar {
        display: none !important;
    }

    /* Giữ nguyên styles cho các phần tử CV */
    #preview-content h5 {
        color: var(--theme-color);
        border-bottom: 2px solid var(--theme-color);
        padding-bottom: 8px;
        margin-bottom: 16px;
    }

    #preview-content .fas,
    #preview-content .fab,
    #preview-content .bi {
        color: var(--theme-color);
    }

    /* Style cho nút preview */
    .preview-btn {
        background-color: var(--theme-color);
        border-color: var(--theme-color);
        padding: 0.5rem 1rem;
    }

    .preview-btn:hover {
        background-color: var(--cv-hover-color);
        border-color: var(--cv-hover-color);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .preview-modal .modal-dialog {
            max-width: 95%;
            margin: 1rem auto;
        }
    }

    /* Modal styles */
    .preview-modal .modal-dialog {
        width: 900px;
        max-width: 90vw;
        margin: 1rem auto;
    }

    .preview-modal .modal-content {
        background: #f5f5f5;
    }

    .preview-modal .modal-body {
        padding: 0; /* Xóa padding để tránh double scrollbar */
        background: #f5f5f5;
    }

    /* Container cho phép scroll */
    .preview-scroll-container {
        width: 100%;
        overflow-x: auto;
        overflow-y: auto;
        max-height: 80vh;
        -webkit-overflow-scrolling: touch; /* Cho iOS */
    }

    /* Wrapper giữ kích thước cố định */
    .preview-wrapper {
        min-width: 700px; /* Đảm bảo không bị co lại */
        margin: 0 auto;
    }

    #preview-content {
        width: 100%;
        min-height: 990px;
        background: white;
        padding: 5px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    /* Ẩn các elements không cần thiết */
    #preview-content .action-buttons,
    #preview-content .add-item,
    #preview-content .remove-section,
    #preview-content [contenteditable],
    #preview-content .btn,
    #preview-content .cv-toolbar {
        display: none !important;
    }

    /* Đảm bảo scrollbar luôn hiển thị trên mobile */
    @media (max-width: 768px) {
        .preview-scroll-container {
            -ms-overflow-style: -ms-autohiding-scrollbar;
            scrollbar-width: thin;
        }

        .preview-scroll-container::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 7px;
            height: 7px;
        }

        .preview-scroll-container::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0,0,0,.5);
            -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);
        }
    }

    /* Base button style */
    .custom-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;  /* Giảm padding */
        border-radius: 8px;  /* Giảm border radius */
        font-weight: 500;
        font-size: 13px;    /* Giảm font size */
        letter-spacing: 0.2px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        font-family: 'Inter', sans-serif;
    }

    /* Preview button */
    .preview-btn {
        background: linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(71, 118, 230, 0.2);
    }

    .preview-btn:hover {
        background: linear-gradient(135deg, #4776E6 0%, #8E54E9 75%);
        box-shadow: 0 4px 12px rgba(71, 118, 230, 0.3);
        transform: translateY(-1px);
    }

    /* Download button */
    .download-btn {
        background: white;
        color: #4776E6;
        border: 1.5px solid transparent;  /* Giảm độ dày border */
        background-image: linear-gradient(white, white),
                         linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);
        background-origin: border-box;
        background-clip: padding-box, border-box;
        box-shadow: 0 2px 8px rgba(71, 118, 230, 0.1);
    }

    .download-btn:hover {
        box-shadow: 0 4px 12px rgba(71, 118, 230, 0.15);
        transform: translateY(-1px);
    }

    /* Save button */
    .save-btn {
        background: linear-gradient(135deg, #00B09B 0%, #96C93D 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(0, 176, 155, 0.2);
    }

    .save-btn:hover {
        background: linear-gradient(135deg, #00B09B 0%, #96C93D 75%);
        box-shadow: 0 4px 12px rgba(0, 176, 155, 0.3);
        transform: translateY(-1px);
    }

    /* Icon styles */
    .custom-btn i {
        font-size: 14px;  /* Giảm kích thước icon */
        transition: all 0.4s ease;
    }

    .custom-btn:hover i {
        transform: scale(1.1) rotate(-3deg);  /* Giảm độ xoay */
    }

    /* Các hiệu ứng khác giữ nguyên */
    .custom-btn::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            to right,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.3) 50%,
            rgba(255, 255, 255, 0) 100%
        );
        transform: rotate(45deg);
        transition: all 0.5s;
        opacity: 0;
    }

    .custom-btn:hover::before {
        animation: shine 1.5s ease-out infinite;
    }

    @keyframes shine {
        0% {
            transform: rotate(45deg) translateX(-200%);
        }
        100% {
            transform: rotate(45deg) translateX(200%);
        }
    }

    /* Hover glow effect - giảm độ mờ */
    .preview-btn:hover {
        box-shadow: 0 4px 12px rgba(71, 118, 230, 0.3),
                    0 0 0 1px rgba(71, 118, 230, 0.2);
    }

    .download-btn:hover {
        box-shadow: 0 4px 12px rgba(71, 118, 230, 0.15),
                    0 0 0 1px rgba(71, 118, 230, 0.1);
    }

    .save-btn:hover {
        box-shadow: 0 4px 12px rgba(0, 176, 155, 0.3),
                    0 0 0 1px rgba(0, 176, 155, 0.2);
    }

    /* Toolbar container */
    .cv-toolbar {
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        min-height: 60px;
    }

    /* Toolbar groups */
    .toolbar-group {
        position: relative;
        padding: 0 15px;
    }

    .toolbar-group:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        height: 24px;
        width: 1px;
        background: rgba(0, 0, 0, 0.1);
    }

    /* Select styles */
    .cv-select {
        height: 36px;
        padding: 0 12px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        font-size: 13px;
        color: #333;
        background-color: #fff;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .cv-select:hover {
        border-color: #4776E6;
    }

    .cv-select:focus {
        outline: none;
        border-color: #4776E6;
        box-shadow: 0 0 0 2px rgba(71, 118, 230, 0.1);
    }

    /* Format buttons */
    .formatting-group .cv-btn {
        width: 36px;
        height: 36px;
        padding: 0;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        background: white;
        color: #555;
        transition: all 0.2s ease;
    }

    .formatting-group .cv-btn:hover {
        background: #f8f9fa;
        border-color: #4776E6;
        color: #4776E6;
    }

    .formatting-group .cv-btn.active {
        background: #4776E6;
        border-color: #4776E6;
        color: white;
    }

    /* Color picker group */
    .color-group {
        font-size: 13px;
        color: #555;
    }

    .color-group input[type="color"] {
        width: 36px;
        height: 36px;
        padding: 2px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        background: white;
        cursor: pointer;
    }

    .color-group input[type="color"]::-webkit-color-swatch-wrapper {
        padding: 0;
    }

    .color-group input[type="color"]::-webkit-color-swatch {
        border: none;
        border-radius: 4px;
    }

    /* Labels */
    .color-group label {
        font-size: 13px;
        color: #555;
        font-weight: 500;
    }

    /* Header container */
    .cv-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        background: #f8f9fa !important;
    }

    /* Spacing adjustments */
    .toolbar-group.formatting-group .cv-btn + .cv-btn {
        margin-left: 4px;
    }

    .color-group .d-flex + .d-flex {
        margin-left: 15px;
    }

    /* Hover states */
    .cv-toolbar:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .formatting-group .cv-btn:active {
        transform: translateY(1px);
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .toolbar-group {
            padding: 0 10px;
        }

        .cv-select {
            min-width: 100px;
        }
    }

    .action-buttons {
        margin-left: auto;
        padding-left: 20px !important;
        border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .action-buttons::after {
        display: none; /* Loại bỏ divider sau nhóm nút */
    }

    /* Đảm bảo các nút không bị co lại */
    .action-buttons .custom-btn {
        white-space: nowrap;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .action-buttons {
            padding-left: 15px !important;
        }
    }


        @keyframes scrollIndicator {
        0% { transform: translateX(0); opacity: 0.8; }
        50% { transform: translateX(10px); opacity: 0.5; }
        100% { transform: translateX(0); opacity: 0.8; }
    }

/* Điều chỉnh toolbar cho mobile */
    @media (max-width: 768px) {
        .cv-toolbar {
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            padding: 10px;
        }

        .toolbar-group {
            display: inline-flex;
            margin-right: 15px;
        }

        .action-buttons {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 10px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    }

    /* Reset và cố định kích thước cho CV */
    #pdf {
        /* width: 21cm !important; */
        margin: 0 auto !important;
        padding: 0 !important;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        position: relative;
    }

    /* Wrapper styles */
    .cv-content-wrapper {
        width: 100% !important;
        padding: 20px !important;
        display: flex !important;
        justify-content: center !important;
        align-items: flex-start !important;
        min-height: 100vh !important;
    }

    /* Mobile styles */
    @media (max-width: 768px) {
        .cv-content-wrapper {
            padding: 0 !important;
            overflow: hidden !important;
        }

        #pdf {
            transform: scale(0.4);
            transform-origin: top center;
        }

        /* Override các style có thể gây conflict */
        .container {
            width: auto !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .row {
            margin: 0 !important;
        }

        [class*="col-"] {
            padding: 0 !important;
        }

        /* Đảm bảo không có scroll ngang */
        body {
            overflow-x: hidden !important;
        }
    }

    /* Fine-tune scale cho từng kích thước màn hình */
    @media (max-width: 320px) {
        #pdf {
            transform: scale(0.35);
        }
    }

    @media (min-width: 321px) and (max-width: 375px) {
        #pdf {
            transform: scale(0.38);
        }
    }

    @media (min-width: 376px) and (max-width: 414px) {
        #pdf {
            transform: scale(0.4);
        }
    }

    @media (min-width: 415px) and (max-width: 768px) {
        #pdf {
            transform: scale(0.45);
        }
    }

    /* Thêm style mới cho container */
    .cv-content-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 20px;
    }

    #pdf {
        width: 21cm; /* Kích thước A4 */
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin: 0 auto;
    }

    /* Style cho mobile */
    @media (max-width: 768px) {
        .cv-content-wrapper {
            padding: 10px;
        }

        #pdf {
            width: 100%; /* Chiếm full width của container */
            transform: scale(0.9); /* Thu nhỏ xuống 90% */
            transform-origin: top center; /* Điểm gốc transform từ giữa trên cùng */
        }
    }

    /* Thêm breakpoint cho màn hình nhỏ hơn */
    @media (max-width: 480px) {
        #pdf {
            transform: scale(0.8); /* Thu nhỏ xuống 80% cho màn hình nhỏ hơn */
        }
    }

    @media (max-width: 320px) {
        #pdf {
            transform: scale(0.7); /* Thu nhỏ xuống 70% cho màn hình rất nhỏ */
        }
    }

    /* Style cho CV container */
    .cv-content-wrapper {
        width: 100%;
        min-height: 100vh;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        overflow-x: hidden;
    }

    #pdf {
        width: 21cm;
        min-height: 29.7cm;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin: 0 auto;
        transform-origin: top center;
        position: relative;
    }

    /* Mobile styles */
    @media (max-width: 768px) {
        .main {
            padding: 0;
            overflow-x: hidden;
        }

        .cv-content-wrapper {
            padding: 0;
            margin: 0;
            width: 100%;
            min-height: auto;
        }

        #pdf {
            width: 21cm;
            transform: scale(0.45);
            /* transform-origin: top left; */
            margin-left: 0;
            margin-right: -50%; /* Điều chỉnh để tránh scroll ngang */
        }

        /* Điều chỉnh toolbar cho mobile */
        .cv-header {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .cv-toolbar {
            padding: 10px !important;
        }

        .action-buttons {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 10px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
    }

    /* Fine-tune scale cho từng kích thước màn hình */
    @media (max-width: 320px) {
        #pdf {
            transform: scale(0.35);
        }
    }

    @media (min-width: 321px) and (max-width: 375px) {
        #pdf {
            transform: scale(0.38);
        }
    }

    @media (min-width: 376px) and (max-width: 414px) {
        #pdf {
            transform: scale(0.4);
        }
    }

    .item-controls {
        position: absolute;
        top: -40px;
        right: 0;
        display: none;
        gap: 8px;
        background: white;
        padding: 8px;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .item-controls.show {
        display: flex;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Style cho các nút điều khiển */
    .control-btn {
        width: 32px;
        height: 32px;
        padding: 0;
        border: none;
        border-radius: 6px;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    /* Style cho từng loại nút */
    .control-btn.add-btn {
        color: #2ecc71;
    }

    .control-btn.delete-btn {
        color: #e74c3c;
    }

    .control-btn.move-btn {
        color: #3498db;
    }

    /* Hover effects */
    .control-btn:hover {
        transform: translateY(-2px);
        background-color: #f8f9fa;
    }

    .control-btn:active {
        transform: translateY(0);
    }

    /* Icon styles */
    .control-btn i {
        font-size: 1.2rem;
        transition: transform 0.2s ease;
    }

    .control-btn:hover i {
        transform: scale(1.1);
    }

    /* Style cho editable item khi active */
    .editable-item {
        position: relative;
        padding: 15px;
        margin: 5px 0;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .editable-item.active {
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Style cho item controls - chỉ hiện khi item active */
    .item-controls {
        position: absolute;
        top: -40px;
        right: 10px;
        display: none;
        gap: 8px;
        background: white;
        padding: 8px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .item-controls.show {
        display: flex;
        animation: slideDown 0.2s ease;
    }

    /* Animation cho controls */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .item-controls {
            position: static;
            margin-top: 10px;
            box-shadow: none;
            padding: 5px;
        }

        .editable-item.active {
            padding-bottom: 50px;
        }
    }

    /* Tooltip styles */
    .control-btn[title] {
        position: relative;
    }

    .control-btn[title]::before {
        content: attr(title);
        position: absolute;
        bottom: -25px;
        left: 50%;
        transform: translateX(-50%);
        padding: 4px 8px;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        font-size: 12px;
        border-radius: 4px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
    }

    .control-btn[title]:hover::before {
        opacity: 1;
        visibility: visible;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .item-controls {
            position: static;
            margin-top: 10px;
            box-shadow: none;
            padding: 5px;
        }

        .editable-item.active {
            padding-bottom: 50px;
        }
    }

    /* Thêm styles mới cho nút xóa section */
    .remove-section-btn {
        position: absolute;
        /* top: 10px; */
        right: 10px;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        background: transparent;
        color: #dc3545;
        cursor: pointer;
        opacity: 0;
        transform: translateY(5px);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 100;
    }

    .remove-section-btn i {
        font-size: 1.1rem;
        transition: transform 0.2s ease;
    }

    /* Hiển thị nút chỉ khi hover trên desktop */
    @media (min-width: 769px) {
        .editable-section:hover .remove-section-btn {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Style cho mobile - chỉ hiện khi section được active/focus */
    @media (max-width: 768px) {
        .remove-section-btn {
            transform: none;
            width: 28px;
            height: 28px;
        }

        .remove-section-btn i {
            font-size: 1rem;
        }

        /* Chỉ hiện nút khi section được active */
        .editable-section.active .remove-section-btn {
            opacity: 1;
        }
    }

    /* Thêm class active cho section khi được click */
    .editable-section.active {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .editable-section .section-controls {
    position: absolute;
    top: 10px;
    right: 10px;
    display: none;
    gap: 8px;
    background: white;
    padding: 8px;
    border-radius: 8px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
    z-index: 1000;
}

.editable-section:hover .section-controls,
.editable-section.active .section-controls {
    display: flex;
}

.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: opacity 0.5s;
}

.loading-icon {
    width: 60px;
    height: 60px;
}

.pulse {
    animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.3); opacity: 0.7; }
    100% { transform: scale(1); opacity: 1; }
}
</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadingOverlay = document.getElementById('loading-overlay');
        const mainContent = document.getElementById('main-content');

        setTimeout(() => {
            loadingOverlay.style.opacity = '0';
            mainContent.style.display = 'block';
            mainContent.classList.add('fade-in');

            setTimeout(() => {
                loadingOverlay.style.display = 'none';
            }, 500);
        }, 2000);
    });
</script
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cvEditorElement = document.getElementById('cv-editor');
        const templateId = cvEditorElement.dataset.templateId;
        const templateContent = @json($cvTemplate->template_content);
        const savedCvData = @json($userCv ? json_decode($userCv->cv_content) : null);

        const root = window.createRoot(cvEditorElement);
        root.render(
            window.React.createElement(window.CV, {
                templateContent: templateContent,
                templateId: templateId,
                cvData: savedCvData
            })
        );

        document.querySelector('.luu-tai-xuong').addEventListener('click', function() {
            // Trigger nút Save CV
            document.getElementById('saveCV').click();
        });

        // Thêm sự kiện để ngăn chặn mất định dạng khi xóa
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' || e.key === 'Delete') {
                const selection = window.getSelection();
                if (selection.rangeCount > 0) {
                    const range = selection.getRangeAt(0);
                    const startContainer = range.startContainer;

                    // Kiểm tra xem có đang ở trong phần tử editable không
                    const editableElement = startContainer.closest('.editable');
                    if (editableElement) {
                        // Nếu đang xóa toàn bộ nội dung, giữ lại phần tử span
                        if (editableElement.innerHTML === '' ||
                            selection.toString() === editableElement.textContent) {
                            e.preventDefault();
                            editableElement.innerHTML = '&nbsp;';
                            const range = document.createRange();
                            range.selectNodeContents(editableElement);
                            selection.removeAllRanges();
                            selection.addRange(range);
                        }
                    }
                }
            }
        });

        // Thêm sự kiện paste để giữ định dạng khi paste
        document.addEventListener('paste', function(e) {
            if (e.target.closest('.editable')) {
                e.preventDefault();
                const text = e.clipboardData.getData('text/html') || e.clipboardData.getData('text/plain');
                document.execCommand('insertHTML', false, text);
            }
        });

        // Thêm xử lý cho việc giữ focus khi click vào nút định dạng
        const formatButtons = document.querySelectorAll('.cv-btn[data-format]');
        formatButtons.forEach(button => {
            button.addEventListener('mousedown', (e) => {
                e.preventDefault(); // Ngăn mất focus khi click nút
            });
        });

        // Thêm xử lý cho paste để giữ định dạng
        document.addEventListener('paste', function(e) {
            if (e.target.closest('.editable')) {
                e.preventDefault();
                const text = e.clipboardData.getData('text/html') ||
                            e.clipboardData.getData('text/plain');
                document.execCommand('insertHTML', false, text);
            }
        });

        // Thêm các font phổ biến
        const additionalFonts = [
            'Roboto',
            'Open Sans',
            'Montserrat',
            'Lato',
            'Source Sans Pro'
        ];

        const fontSelect = document.getElementById('fontSelect');
        additionalFonts.forEach(font => {
            const option = document.createElement('option');
            option.value = font;
            option.textContent = font;
            fontSelect.appendChild(option);
        });

        // Thêm các kích thước font phổ biến
        const fontSizeSelect = document.getElementById('fontSizeSelect');
        const sizes = {
            '1': '8pt',
            '2': '10pt',
            '3': '12pt',
            '4': '14pt',
            '5': '18pt',
            '6': '24pt',
            '7': '36pt'
        };

        Object.entries(sizes).forEach(([value, label]) => {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = label;
            if (value === '3') option.selected = true; // Default size
            fontSizeSelect.appendChild(option);
        });

        const themeColorPicker = document.getElementById('themeColorPicker');

        function updateThemeColor(color) {
            // Cập nhật CSS variables
            document.documentElement.style.setProperty('--theme-color', color);

            // Tính toán màu light từ màu chủ đề
            const rgb = hexToRgb(color);
            const lightColor = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.1)`;
            document.documentElement.style.setProperty('--theme-color-light', lightColor);

            // Tính toán màu hover (tối hơn 10%)
            const hoverColor = adjustBrightness(color, -10);
            document.documentElement.style.setProperty('--cv-hover-color', hoverColor);
        }

        function hexToRgb(hex) {
            const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        }

        function adjustBrightness(hex, percent) {
            const rgb = hexToRgb(hex);
            const adjust = (value) => {
                value = Math.floor(value * (1 + percent / 100));
                return Math.min(255, Math.max(0, value));
            };

            const r = adjust(rgb.r);
            const g = adjust(rgb.g);
            const b = adjust(rgb.b);

            return `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1)}`;
        }

        // Lắng nghe sự kiện thay đổi màu
        themeColorPicker.addEventListener('input', (e) => {
            updateThemeColor(e.target.value);
        });

        // Khởi tạo màu ban đầu
        updateThemeColor(themeColorPicker.value);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const previewModal = document.getElementById('previewModal');

        previewModal.addEventListener('show.bs.modal', function (event) {
            const cvContent = document.querySelector('.cv-editor').cloneNode(true);

            // Xóa các elements không cần thiết
            const elementsToRemove = [
                '.action-buttons',
                '.add-item',
                '.remove-section',
                '.cv-toolbar',
                '.btn:not(.btn-close)',
                '[contenteditable]'
            ];

            elementsToRemove.forEach(selector => {
                cvContent.querySelectorAll(selector).forEach(el => {
                    if (el.hasAttribute('contenteditable')) {
                        el.removeAttribute('contenteditable');
                    } else {
                        el.remove();
                    }
                });
            });

            // Cập nhật nội dung modal
            const previewContent = document.getElementById('preview-content');
            previewContent.innerHTML = '';
            previewContent.appendChild(cvContent);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        let activeItem = null;

        // Xử lý click vào phần editable
        window.handleEditableClick = function(event, itemId) {
            event.stopPropagation();

            const clickedItem = document.querySelector(`.editable-item[data-item-id="${itemId}"]`);

            // Ẩn controls của item cũ (nếu có và khác với item hiện tại)
            if (activeItem && activeItem !== clickedItem) {
                activeItem.classList.remove('active');
                activeItem.querySelector('.item-controls').classList.remove('show');
            }

            // Hiện controls của item được click
            clickedItem.classList.add('active');
            clickedItem.querySelector('.item-controls').classList.add('show');
            activeItem = clickedItem;
        };

        // Xử lý blur của editable
        window.handleEditableBlur = function(event) {
            const element = event.target;
            const key = element.dataset.key;
            const value = element.innerHTML;

            if (window.updateCVData) {
                window.updateCVData(key, value);
            }
        };

        // Click ra ngoài để ẩn controls
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.editable') &&
                !event.target.closest('.item-controls')) {
                if (activeItem) {
                    activeItem.classList.remove('active');
                    activeItem.querySelector('.item-controls').classList.remove('show');
                    activeItem = null;
                }
            }
        });

        // Ngăn chặn sự kiện click của các nút điều khiển lan ra ngoài
        document.querySelectorAll('.item-controls button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        let activeSection = null;

        // Xử lý click vào section
        document.addEventListener('click', function(e) {
            const section = e.target.closest('.editable-section');

            // Nếu click vào section mới
            if (section) {
                // Nếu đang có section active khác, bỏ active
                if (activeSection && activeSection !== section) {
                    activeSection.classList.remove('active');
                }

                // Toggle active cho section hiện tại
                section.classList.toggle('active');
                activeSection = section;
            }
            // Nếu click ra ngoài
            else if (!e.target.closest('.remove-section-btn')) {
                if (activeSection) {
                    activeSection.classList.remove('active');
                    activeSection = null;
                }
            }
        });
    });
</script>
@endpush


