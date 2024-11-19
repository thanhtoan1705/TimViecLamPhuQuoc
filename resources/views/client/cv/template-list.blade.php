@extends('client.layouts.master')
@section('title', 'Danh sách Template CV')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Chọn mẫu CV của bạn</h2>

        <div class="row g-4">
            <!-- Template 1 -->
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="{{ asset('images/template1-preview.jpg') }}"
                         class="card-img-top"
                         alt="Template 1 Preview">
                    <div class="card-body">
                        <h5 class="card-title">Template 1</h5>
                        <p class="card-text">Mẫu CV chuyên nghiệp, phù hợp cho các vị trí công việc văn phòng.</p>
                        <a href="{{ url('/cv/template-view/1') }}"
                           class="btn btn-primary">
                            Xem mẫu
                        </a>
                    </div>
                </div>
            </div>

            <!-- Template 2 -->
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="{{ asset('images/template2-preview.jpg') }}"
                         class="card-img-top"
                         alt="Template 2 Preview">
                    <div class="card-body">
                        <h5 class="card-title">Template 2</h5>
                        <p class="card-text">Mẫu CV hiện đại, sáng tạo, phù hợp cho các ngành sáng tạo.</p>
                        <a href="{{ url('/cv/template-view/2') }}"
                           class="btn btn-primary">
                            Xem mẫu
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="{{ asset('images/template2-preview.jpg') }}"
                         class="card-img-top"
                         alt="Template 2 Preview">
                    <div class="card-body">
                        <h5 class="card-title">Template 2</h5>
                        <p class="card-text">Mẫu CV hiện đại, sáng tạo, phù hợp cho các ngành sáng tạo.</p>
                        <a href="{{ url('/cv/template-view/3') }}"
                           class="btn btn-primary">
                            Xem mẫu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            transition: transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
    </style>
@endsection
