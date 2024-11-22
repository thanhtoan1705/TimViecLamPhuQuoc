@extends('client.layouts.master')
@section('title', 'Xem trước CV')
@section('content')
    <div class="template-preview-container">
        <div class="template-container">
            <div id="example" data-template-id="{{ $template->template_content }}"></div>
        </div>
    </div>

    <style>
        .template-preview-container {
            display: flex;
            justify-content: center;
            padding: 20px;
            background: #f8fafc;
            min-height: 100vh;
        }

        .template-container {
            width: 21cm;
            min-height: 29.7cm;
            background: white;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            margin: auto;
            flex-shrink: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('example');
            const templateId = container.dataset.templateId;
            const root = window.createRoot(container);
            root.render(
                React.createElement(window.TemplateView, {
                    templateId: templateId,
                    isPreview: true // Truyền thêm prop để nhận biết chế độ xem trước
                })
            );
        });
    </script>
@endsection 
