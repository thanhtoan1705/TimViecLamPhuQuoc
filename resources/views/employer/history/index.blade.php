@extends('employer.layouts.master')
@section('title', 'Theo dõi đơn hàng')
@section('content')
<div class="box-content">
    <div class="box-heading">
        <div class="box-title">
            <h3 class="mb-35">Lịch sử hoạt động</h3>
        </div>
        <div class="box-breadcrumb">
            <div class="breadcrumbs">
                <ul>
                    <li> <a class='icon-home' href='index.html'>Nhà tuyển dụng</a></li>
                    <li><span>Lịch sử hoạt động</span></li>
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

                            </div>
                        </nav>
                        <div class="box-padding">
                            <div class="box-left">
                                <ul class="box-left-list">
                                    <h4 class="box-left-title">Tất cả lịch sử</h4>
                                    <li><a href=""><i class="bi bi-clock-history"></i> Lịch sử kích hoạt dịch vụ</a></li>
                                    <li><a href=""><i class="bi bi-clock-history"></i> Lịch sử phỏng vấn</a></li>

                                    <li><a href=""><i class="bi bi-clock-history"></i> Lịch sử cập nhật tài khoản</a></li>
                                </ul>
                            </div>
                            <div class="box-right">
                                <div class="box-right-header">
                                    <h4 class="title">Tất cả lịch sử</h4>
                                    <div class="date">12/05/2024-12/06/2024</div>
                                </div>
                                <div class="box-right-content">
                                    <p class="date">12/06/2024</p>
                                    <div class="time">
                                        <p><span>19:19</span> Đăng nhập</p>
                                        <p><span>19:19</span> Đăng ký thành công</p>
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
    <link href="{{asset ('assets/employer/css/activityHistory.css')}}" rel="stylesheet">
@endpush

@push('script')
@endpush
