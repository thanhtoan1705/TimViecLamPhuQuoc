@extends('employer.layouts.master')
@section('title', 'Theo dõi đơn hàng')
@section('content')
<div class="box-content">
    <div class="box-heading">
        <div class="box-title">
            <h3 class="mb-35" tabindex="0">Theo dõi đơn hàng</h3>
        </div>
        <div class="box-breadcrumb">
            <div class="breadcrumbs">
                <ul>
                    <li><a class='icon-home' href='index.html' tabindex="0">Nhà tuyển dụng</a></li>
                    <li><span tabindex="0">Theo dõi đơn hàng</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white mb-30">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active fw-bold" data-tab="all" href="#" tabindex="0">Tất cả <span class="ms-1 count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold" data-tab="pending" href="#" tabindex="0">Đang chờ duyệt <span class="ms-1 count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold" data-tab="in-progress" href="#" tabindex="0">Đang chạy dịch vụ <span class="ms-1 count">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold" data-tab="completed" href="#" tabindex="0">Hoàn thành <span class="ms-1 count">0</span></a>
                                        </li>
                                        <li class="nav-item fw-bold">
                                            <a class="nav-link" data-tab="expired" href="#" tabindex="0">Hết hạn <span class="ms-1 count">0</span></a>
                                        </li>
                                        <li class="nav-item fw-bold">
                                            <a class="nav-link" data-tab="cancelled" href="#" tabindex="0">Bị hủy <span class="ms-1 count">0</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="box-padding">
                            <div class="row display-list">
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <img class="img-responsive order-img" alt="jobBox" src="{{ asset('assets/employer/imgs/page/order/no_order_yiran.png') }}" tabindex="0">
                                </div>
                                <div class="row-2">
                                    <p class="text-center fw-bold" data-content="all" tabindex="0">Bạn chưa có đơn hàng nào</p>
                                    <button class="btn btn-primary order-btn" tabindex="0">Mua dịch vụ</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="all-content" data-tab-content="all">

                            </div>
                            <div class="tab-pane" id="pending-content" data-tab-content="pending">

                            </div>
                            <div class="tab-pane" id="in-progress-content" data-tab-content="in-progress">

                            </div>
                            <div class="tab-pane" id="completed-content" data-tab-content="completed">

                            </div>
                            <div class="tab-pane" id="expired-content" data-tab-content="expired">

                            </div>
                            <div class="tab-pane" id="cancelled-content" data-tab-content="cancelled">

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
    <link href="{{asset ('assets/employer/css/order.css')}}" rel="stylesheet">
@endpush

@push('script')
    <script src="{{asset ('assets/employer/js/order.js')}}"></script>
@endpush
