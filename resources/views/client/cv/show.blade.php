@extends('client.layouts.master')
@section('title', 'Chỉnh sửa CV')
@section('content')
    <main class="main" style="background-color: #F1F2F6">
        <div class="cv-header sticky-top d-flex justify-content-between align-items-center p-3 bg-light">
            <div class="cv-toolbar d-flex justify-content-start p-3 bg-white">
                <select id="fontSelect" class="cv-select me-2">
                    <option value="Arial">Arial</option>
                    <option value="Helvetica">Helvetica</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <!-- Thêm các font khác nếu cần -->
                </select>
                <select id="fontSizeSelect" class="cv-select me-2">
                    <option value="12px">12px</option>
                    <option value="14px">14px</option>
                    <option value="16px">16px</option>
                    <!-- Thêm các kích thước khác nếu cần -->
                </select>
                <button id="boldBtn" class="cv-btn" title="In đậm">
                    <i class="bi bi-type-bold"></i>
                </button>
                <button id="italicBtn" class="cv-btn" title="In nghiêng">
                    <i class="bi bi-type-italic"></i>
                </button>
                <button id="underlineBtn" class="cv-btn" title="Gạch chân">
                    <i class="bi bi-type-underline"></i>
                </button>
                <input type="color" id="colorPicker" class="cv-btn" title="Chọn màu">
            </div>
            <div class="cv-button-group ms-auto">
                <button class="btn btn-outline-primary cv-action-btn xem-truoc">
                    <i class="bi bi-eye"></i> Xem trước
                </button>
                <button class="btn btn-outline-primary cv-action-btn luu-tai-xuong" id="downloadCV">
                    <i class="bi bi-download"></i> Lưu và tải xuống
                </button>
                <button class="btn btn-success luu-lai">
                    <i class="bi bi-save"></i> Lưu lại
                </button>
            </div>
        </div>

        <div class="cv-content-wrapper">
            <div class="cv-container container mt-35 p-4 bg-white" id="pdf">
                <div id="cv-editor" data-template-id="{{ $cvTemplate->id }}"></div>
            </div>
        </div>
    </main>
@endsection

@push('css')
<style>
    :root {
        --cv-primary-color: #3c65f5;
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
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        padding: 10px;
        border-bottom: 1px solid #dee2e6;
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

    .cv-button-group .btn-primary {
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
    }

    .main {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .cv-content-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding-bottom: 2rem;
    }

    .cv-container {
        flex: 1;
    }
</style>
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cvEditorElement = document.getElementById('cv-editor');
        const templateId = cvEditorElement.dataset.templateId;
        const templateContent = @json($cvTemplate->template_content);

        const root = window.createRoot(cvEditorElement);
        root.render(
            window.React.createElement(window.CV, { templateContent: templateContent, templateId: templateId })
        );

        document.querySelector('.luu-tai-xuong').addEventListener('click', downloadCV);
    });

    function downloadCV() {
        const content = document.getElementById('pdf');

        html2canvas(content, {
            scale: 2, // Tăng scale lên để có độ phân giải tốt hơn
            useCORS: true,
            logging: false,
            backgroundColor: null
        }).then(canvas => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({
                orientation: 'p',
                unit: 'mm',
                format: 'a4',
                compress: true
            });

            const imgWidth = 210;
            const pageHeight = 295;
            const imgHeight = canvas.height * imgWidth / canvas.width;

            let heightLeft = imgHeight;
            let position = 0;

            const imgData = canvas.toDataURL('image/jpeg', 0.9); // Tăng chất lượng lên 90%

            pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }

            pdf.save('my_cv.pdf');
        }).catch(error => {
            console.error('Error downloading CV:', error);
            alert('Có lỗi xảy ra khi tải xuống CV');
        });
    }

    function changeColor() {
        // Implement color change logic
    }

    function toggleBold() {
        // Implement bold toggle logic
    }

    function toggleItalic() {
        // Implement italic toggle logic
    }

    function changeFont() {
        // Implement font change logic
    }
</script>
@endpush
