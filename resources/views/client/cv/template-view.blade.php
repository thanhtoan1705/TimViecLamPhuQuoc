@extends('client.layouts.master')
@section('title', 'CV Template')
@section('content')
    <main class="main">
        <div class="editor-toolbar-container">
            <div id="toolbar-root"></div>
        </div>
        <div class="main-content">
            <div class="sidebar-container">
                <div class="cv-actions">
                    <button class="action-card template-btn">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <span>Đổi mẫu CV</span>
                    </button>
                    <div class="section-btn-container">
                        <button class="action-card section-btn">
                            <div class="action-icon">
                                <i class="bi bi-list-ul"></i>
                            </div>
                            <span>Thêm mục</span>
                        </button>
                        <div id="sectionModalContainer"></div>
                    </div>
                    <button class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-archive"></i>
                        </div>
                        <span>Thư viện CV</span>
                    </button>
                    <button class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-question-circle"></i>
                        </div>
                        <span>Hướng dẫn viết CV</span>
                    </button>
                    <button class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <span>Việc làm phù hợp</span>
                    </button>
                </div>
            </div>

            <div class="content-container">
                <div id="modalContainer"></div>

                <div class="cv-workspace">
                    <div class="template-container">
                        <div id="example" data-template-id="{{ $templateId }}"></div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .editor-toolbar-container {
                position: sticky;
                top: 0;
                z-index: 1000;
                background-color: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(8px);
                margin-bottom: 20px;
            }

            .main-content {
                display: flex;
                padding: 24px;
                max-width: 1400px;
                margin: 0 auto;
                gap: 24px;
                position: relative;
            }

            .main {
                padding: 0;
                background: #f8fafc;
                min-height: 100vh;
            }

            #editor-toolbar {
                background: white;
                padding: 8px 24px;
                border-bottom: 1px solid #e5e7eb;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .main-content {
                display: flex;
                padding: 24px;
                max-width: 1400px;
                margin: 0 auto;
                gap: 24px;
            }

            .cv-actions {
                display: flex;
                flex-direction: column;
                gap: 16px;
                width: 120px;
                position: sticky;
                top: 100px;
                height: fit-content;
            }

            .action-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 16px;
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                cursor: pointer;
                transition: all 0.2s;
                width: 100%;
                text-align: center;
            }

            .action-card:hover {
                border-color: #10b981;
                transform: translateY(-2px);
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            }

            .action-icon {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 8px;
            }

            .action-icon i {
                font-size: 24px;
                color: #10b981;
            }

            .action-card span {
                font-size: 13px;
                color: #374151;
                line-height: 1.2;
            }

            .cv-workspace {
                flex: 1;
                display: flex;
                justify-content: center;
                overflow: auto;
                padding: 20px;
            }

            .template-container {
                width: 21cm;
                min-height: 29.7cm;
                background: white;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
                margin: auto;
                flex-shrink: 0;
            }

            @media print {
                .editor-toolbar-container,
                .cv-actions,
                .action-buttons {
                    display: none !important;
                }

                .template-wrapper {
                    margin: 0;
                    padding: 0;
                }

                .cv-template-1 {
                    box-shadow: none !important;
                }

                @page {
                    size: A4;
                    margin: 0;
                }

                body {
                    margin: 0;
                    padding: 0;
                }
            }

            @media (max-width: 768px) {
                .main-content {
                    flex-direction: column;
                    align-items: center;
                    padding: 10px;
                }

                .cv-actions {
                    flex-direction: row;
                    width: auto;
                    position: static;
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .action-card {
                    width: 100px;
                }

                .cv-workspace {
                    padding: 0;
                    width: 100%;
                    overflow: auto;
                }

                .template-container {
                    width: 21cm;
                    min-height: 29.7cm;
                    transform: scale(0.4);
                    transform-origin: top center;
                    margin: -30% auto;
                }

                .template-container::after {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: rgba(0, 0, 0, 0.3);
                    z-index: 999;
                    pointer-events: none;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                }

                .template-container.shifted::after {
                    opacity: 1;
                }
            }

            #modalContainer {
                position: absolute;
                pointer-events: none;
                z-index: 1000;
            }

            #modalContainer > * {
                pointer-events: auto;
            }

            /* Thêm style cho text được chọn */
            ::selection {
                background: rgba(16, 185, 129, 0.2);
            }

            /* Style cho vùng có thể edit */
            [contenteditable="true"]:focus {
                outline: 2px solid rgba(16, 185, 129, 0.5);
                border-radius: 4px;
            }

            /* Style cho print mode */
            @media print {
                .editor-toolbar-container {
                    display: none !important;
                }
            }

            .section-modal {
                position: absolute;
                left: calc(100% + 20px);
                top: 0;
                width: 320px;
                background: white;
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                animation: slideIn 0.2s ease-out;
            }

            .section-modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 16px 20px;
                border-bottom: 1px solid #e5e7eb;
            }

            .section-modal-header h3 {
                font-size: 16px;
                font-weight: 600;
                color: #111827;
                margin: 0;
            }

            .close-button {
                background: none;
                border: none;
                cursor: pointer;
                padding: 4px;
                color: #6b7280;
            }

            .close-button:hover {
                color: #111827;
            }

            .section-modal-content {
                padding: 16px;
            }

            .section-group {
                margin-bottom: 24px;
            }

            .section-group h4 {
                font-size: 14px;
                font-weight: 600;
                color: #111827;
                margin: 0 0 8px 0;
            }

            .section-hint {
                font-size: 13px;
                color: #6b7280;
                margin: 0 0 16px 0;
                font-style: italic;
            }

            .section-item {
                display: flex;
                align-items: center;
                padding: 12px;
                background: #f9fafb;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                margin-bottom: 8px;
                cursor: pointer;
                transition: all 0.2s;
            }

            .section-item:hover {
                background: #f3f4f6;
                border-color: #d1d5db;
            }

            .section-item-icon {
                color: #9ca3af;
                margin-right: 12px;
                cursor: grab;
            }

            .section-item span {
                flex: 1;
                font-size: 14px;
                color: #374151;
            }

            .section-item-actions {
                color: #9ca3af;
            }

            .section-item-actions:hover {
                color: #6b7280;
            }

            /* Animation */
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Đảm bảo modal không bị che khuất */
            .cv-workspace {
                position: relative;
                margin-left: 20px; /* Thêm khoảng cách để modal có chỗ hiển thị */
            }

            /* Tạo container riêng cho sidebar và modal */
            .sidebar-container {
                position: sticky;
                top: 100px;
                height: fit-content;
                width: 120px;
                z-index: 10;
            }

            .cv-actions {
                display: flex;
                flex-direction: column;
                gap: 16px;
                width: 100%;
            }

            /* Container cho modal và workspace */
            .content-container {
                flex: 1;
                display: flex;
                position: relative;
            }

            /* Điều chỉnh modal container */
            .section-modal-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 320px;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                z-index: 20;
            }

            .section-modal-container.show {
                opacity: 1;
                visibility: visible;
            }

            /* Điều chỉnh workspace */
            .cv-workspace {
                flex: 1;
                display: flex;
                justify-content: center;
                padding: 20px;
                transition: transform 0.3s ease;
                min-height: 100vh;
            }

            .cv-workspace.modal-open {
                transform: translateX(340px);
            }

            .template-container {
                width: 21cm;
                min-height: 29.7cm;
                background: white;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
                margin: auto;
                flex-shrink: 0;
            }

            .sidebar-container {
                width: 120px;
                position: sticky;
                top: 100px;
                height: fit-content;
            }

            .cv-actions {
                display: flex;
                flex-direction: column;
                gap: 16px;
                /* position: relative; */
            }

            .section-btn {
                position: relative;
            }

            .content-container {
                flex: 1;
                display: flex;
                transition: margin-left 0.3s ease;
            }

            .content-container.modal-open {
                margin-left: 320px;
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .section-btn-container {
                position: relative;
                width: 100%;
            }

            .section-modal {
                position: absolute;
                left: calc(100% + 20px);
                top: 0;
                width: 320px;
                background: white;
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                animation: slideIn 0.2s ease-out;
            }

            .content-container {
                flex: 1;
                display: flex;
                transition: margin-left 0.3s ease;
            }

            .content-container.modal-open {
                margin-left: 320px;
            }

            .sticky-bar.stick {
                position: static !important; /* Sử dụng !important để đảm bảo ghi đè */
            }
        </style>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toolbarContainer = document.getElementById('toolbar-root');
            const container = document.getElementById('example');
            const templateId = container.dataset.templateId;
            const root = window.createRoot(container);
            root.render(
                React.createElement(window.TemplateView, {
                    templateId: templateId
                })
            );
        });
    </script>
@endsection
