@extends('client.layouts.master')
@section('title', 'Chỉnh sửa CV')
@section('content')
    <main class="main" style="background-color: #F1F2F6">
        <div class="cv-header sticky-top d-flex justify-content-between align-items-center p-3 bg-light">
            <div class="cv-toolbar d-flex justify-content-start p-3 bg-white">
                <select id="fontSelect" class="cv-select me-2">
                    <option value="Montserrat">Montserrat</option>
                    // Thêm các tùy chọn font khác ở đây
                </select>
                <select id="fontSizeSelect" class="cv-select me-2">
                    <option value="30px">30px</option>
                    // Thêm các tùy chọn cỡ chữ khác ở đây
                </select>
                <button class="cv-btn" onclick="toggleBold()">
                    <i class="bi bi-type-bold"></i>
                </button>
                <button class="cv-btn" onclick="toggleItalic()">
                    <i class="bi bi-type-italic"></i>
                </button>
                <button class="cv-btn" onclick="toggleUnderline()">
                    <i class="bi bi-type-underline"></i>
                </button>
                <button class="cv-btn" onclick="changeColor()">
                    <i class="bi bi-palette"></i>
                </button>
                <select id="lineHeightSelect" class="cv-select ms-2">
                    <option value="1.2">1.2</option>
                    // Thêm các tùy chọn khoảng cách dòng khác ở đây
                </select>
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
        background-color: var(--cv-bg-color);
    }

    .cv-select {
        padding: 6px 12px;
        border: 1px solid var(--cv-border-color);
        border-radius: 4px;
        background-color: white;
        color: #333;
        font-size: 14px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .cv-select:focus {
        border-color: var(--cv-primary-color);
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(60, 101, 245, 0.25);
    }

    .cv-btn {
        padding: 6px 12px;
        background-color: white;
        border: 1px solid var(--cv-border-color);
        border-radius: 4px;
        color: #333;
        font-size: 14px;
        transition: all 0.15s ease-in-out;
    }

    .cv-btn:hover {
        background-color: var(--cv-primary-color);
        color: white;
    }

    .cv-btn:focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(60, 101, 245, 0.25);
    }

    .cv-btn.active {
        background-color: var(--cv-primary-color);
        color: white;
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
            scale: 2,
            useCORS: true,
            logging: true,
        }).then(canvas => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');

            const imgWidth = 210;
            const pageHeight = 295;
            const imgHeight = canvas.height * imgWidth / canvas.width;

            let heightLeft = imgHeight;
            let position = 0;

            pdf.addImage(canvas, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(canvas, 'PNG', 0, position, imgWidth, imgHeight);
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
