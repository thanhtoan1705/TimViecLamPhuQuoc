@extends('employer.layouts.master')
@section('title', 'Mã Ưu Đãi')

@section('content')
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Mã giảm giá</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href=''>Nhà tuyển dụng</a></li>
                        <li><span>Mã giảm giá</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-8 col-lg-8">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <div class="container mt-5">
                                    <div class="row">
                                        <div style="display: flex !important" class="d-flex">
                                            <ul style="display: flex !important" class="navtest nav-pills"
                                                id="pills-tab"
                                                role="tablist">
                                                <li class="nav-item me-3" role="presentation">
                                                    <button class="nav-link fw-bolder rounded-pill active"
                                                            id="pills-effective-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-effective" type="button" role="tab"
                                                            aria-controls="pills-effective" aria-selected="true">
                                                        <i class="bi bi-credit-card-fill me-3"></i>Có hiệu lực
                                                    </button>
                                                </li>
                                                <li class="nav-item me-3" role="presentation">
                                                    <button class="nav-link fw-bolder rounded-pill text-dark"
                                                            id="pills-used-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-used" type="button" role="tab"
                                                            aria-controls="pills-used" aria-selected="false">
                                                        <i class="bi bi-credit-card-fill me-3"></i>Đã sử dụng
                                                    </button>
                                                </li>
                                                <li class="nav-item me-3" role="presentation">
                                                    <button class="nav-link fw-bolder rounded-pill text-dark"
                                                            id="pills-expired-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-expired" type="button" role="tab"
                                                            aria-controls="pills-expired" aria-selected="false">
                                                        <i class="bi bi-credit-card-fill me-3"></i>Hết hiệu lực
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content m-3" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-effective" role="tabpanel"
                                                 aria-labelledby="pills-effective-tab">
                                                <div class="row d-flex justify-content-around">
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-danger">
                                                                <span>TOPECOPLUS</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-danger">Giảm 20%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-danger text-center me-4 ">
                                                                        <strong>HQMU5QDGTG</strong>
                                                                    </p>
                                                                    <a href="" class="btn text-white btn-danger">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-danger">
                                                                <span>TOPECOPLUS</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-danger">Giảm 20%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-danger text-center me-4 ">
                                                                        <strong>HQMU5QDGTG</strong>
                                                                    </p>
                                                                    <a href="" class="btn text-white btn-danger">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-danger">
                                                                <span>TOPECOPLUS</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-danger">Giảm 20%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-danger text-center me-4 ">
                                                                        <strong>HQMU5QDGTG</strong>
                                                                    </p>
                                                                    <a href="" class="btn text-white btn-danger">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-danger">
                                                                <span>TOPECOPLUS</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-danger">Giảm 20%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-danger text-center me-4 ">
                                                                        <strong>HQMU5QDGTG</strong>
                                                                    </p>
                                                                    <a href=""
                                                                       class="btn text-white btn-danger">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-danger">
                                                                <span>TOPECOPLUS</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-danger">Giảm 20%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-danger text-center me-4 ">
                                                                        <strong>HQMU5QDGTG</strong>
                                                                    </p>
                                                                    <a href=""
                                                                       class="btn text-white btn-danger">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-danger">
                                                                <span>TOPECOPLUS</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-danger">Giảm 20%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-danger text-center me-4 ">
                                                                        <strong>HQMU5QDGTG</strong>
                                                                    </p>
                                                                    <a href=""
                                                                       class="btn text-white btn-danger">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-used" role="tabpanel"
                                                 aria-labelledby="pills-used-tab">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card mb-4 position-relative d-flex">
                                                            <div class="vertical-tab bg-primary">
                                                                <span>TOPPRO</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title text-primary">Giảm 25%</h5>
                                                                <p class="card-text">Thời gian còn lại: 18 ngày 4
                                                                    giờ 14 phút</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-end">
                                                                    <p class="text-primary text-center me-4 pt-3">
                                                                        <strong>HQMU5QCUIE</strong>
                                                                    </p>
                                                                    <a href="#"
                                                                       class="btn text-white btn-primary">Dùng
                                                                        ngay</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-expired" role="tabpanel"
                                                 aria-labelledby="pills-expired-tab">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="text-center mt-4">
                                                            <img
                                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MTN2bQzCBeBpWdpYUrMHeuQsx3NA7kyMTw&s"
                                                                alt="CV Icon" class="img-fluid" style="width: 100px;">
                                                            <p class="mt-3">Bạn chưa có mã giảm giá nào</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="paginations ms-5 pb-20">
                                            <ul class="pager">
                                                <li><a class="pager-prev" href="#"></a></li>
                                                <li><a class="pager-number" href="#">1</a></li>
                                                <li><a class="pager-number" href="#">2</a></li>
                                                <li><a class="pager-number" href="#">3</a></li>
                                                <li><a class="pager-number" href="#">4</a></li>
                                                <li><a class="pager-number" href="#">5</a></li>
                                                <li><a class="pager-number active" href="#">6</a></li>
                                                <li><a class="pager-number" href="#">7</a></li>
                                                <li><a class="pager-next" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .vertical-tab {
            height: 100%;
            width: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 0;
        }

        .vertical-tab span {
            transform: rotate(-90deg);
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        .vertical-tab span::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            left: calc(50% - 10px);
            top: -90%;
            transform: translateY(-50%);
        }

        .card {
            position: relative;
            padding-left: 70px;
        }

        .nav-pills .nav-link.active {
            background-color: #3C65F5;
            color: white;
        }

        ul.nav {
            display: flex !important;
            flex-wrap: wrap;
        }
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.navtest button');
            const tabContents = document.querySelectorAll('.tab-pane');

            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.add('text-dark');
                    });

                    // Add active class to the clicked button
                    this.classList.add('active');
                    this.classList.remove('text-dark');

                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.remove('show', 'active');
                    });

                    // Show the selected tab content
                    const target = this.getAttribute('data-bs-target');
                    document.querySelector(target).classList.add('show', 'active');
                });
            });
        });
    </script>
@endpush
