@extends('employer.layouts.master')
@section('title', 'Bảng tin')
@section('content')
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Bảng tin</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href='index.html'>Nhà tuyển dụng</a></li>
                        <li><span>Bảng tin</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="customCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner border-16">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/employer/imgs/page/dashboard/banner.png') }}"
                             class="rounded d-block w-100" style="max-height: 300px; object-fit: cover;"
                             alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-light">Testcenter - Nền tảng đánh giá năng lực nhân sự</h5>
                            <p class="text-light mb-4">Một nền tảng chuyên nghiệp giúp đánh giá và phát triển nhân sự.
                            </p>
                            <a href="#" class="btn btn-default mt-3">Khám phá ngay</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/employer/imgs/page/dashboard/banner.png') }}"
                             class="rounded d-block w-100" style="max-height: 300px; object-fit: cover;"
                             alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-light">HappyTime - Nền tảng quản lý và gia tăng trải nghiệm nhân viên</h5>
                            <p class="text-light mb-4">Giải pháp tối ưu hóa quản lý và tăng cường hiệu suất làm việc của
                                nhân viên.</p>
                            <a href="#" class="btn btn-default mt-3">Khám phá ngay</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#customCarousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- First Block -->
            <div class="col-md-6 my-4">
                <div class="card border-16">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Hiệu quả tuyển dụng</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="bg-primary-subtle p-3 rounded">
                                    <h6 class="text-primary">0</h6>
                                    <p class="text-primary">Chiến dịch đang mở</p>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="bg-warning-subtle p-3 rounded">
                                    <h6 class="text-warning">0</h6>
                                    <p class="text-warning">CV tiếp nhận</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-success-subtle p-3 rounded">
                                    <h6 class="text-success">0</h6>
                                    <p class="text-success">Tin tuyển dụng hiển thị</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-danger-subtle p-3 rounded">
                                    <h6 class="text-danger">0</h6>
                                    <p class="text-danger">CV ứng tuyển mới</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <img src="{{ asset('assets/employer/imgs/page/dashboard/bieudo.png') }}" alt="Graph"
                                 class="img-fluid">
                            <p class="my-3">Chưa đủ dữ liệu để hiển thị</p>
                        </div>
                        <button class="btn btn-default w-100">Quản lý chiến dịch tuyển dụng</button>
                    </div>
                </div>
            </div>
            <!-- Second Block -->
            <div class="col-md-6 my-4">
                <div class="card border-16">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 bg-light rounded py-2">
                            <img src="{{ asset('assets/employer/imgs/page/candidates/user1.png') }}" alt="Avatar"
                                 class="rounded-circle me-3 ps-1" style="width: 50px;">
                            <div>
                                <h5>Trần Thanh Duy</h5>
                                <p class="mb-0">Mã NTD: 123456</p>
                                <p class="mb-0"><i class="fi-rr-envelope me-2"></i> duytptc06458@fpt.edu.vn</p>
                                <p><i class="fi-rr-phone-call me-2"></i> 026558765414</p>
                            </div>
                        </div>
                        <div>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Member</span>
                                    <span>Silver</span>
                                    <span>Gold</span>
                                    <span>Platinum</span>
                                    <span>Diamond</span>
                                </div>
                                <input type="range" class="form-range" id="customRange1">
                            </div>
                            <p>Điểm xếp hạng: 0</p>
                            <p class="py-2">Bạn cần đạt ít nhất 2 để thực hiện hạng khách hàng. <a href="#"
                                                                                                   class="text-primary">Tìm
                                    hiểu
                                    thêm</a></p>
                            <button class="btn btn-default w-100 mb-3">Ưu đãi của tôi</button>
                            <button class="btn btn-default w-100">Xác thực ngay</button>
                        </div>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Số lượng Top Point (TP)</h6>
                                    <p>Xét hạng: 0 TP</p>
                                    <p>Điểm quà: 0 TP</p>
                                </div>
                                <div class="col-6">
                                    <h6>Số lượng Credit (CP)</h6>
                                    <p>Chính: 0 CP</p>
                                    <p>Khuyến mãi: 0 CP</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4"></div>
            <div class="col-md-6 mb-4 border-16">
                <div class="row">
                    <!-- First Block -->
                    <div class="col-md-6 mb-3">
                        <div class="card text-center border-16">
                            <div class="card-body">
                                <p class="card-text">Đề xuất từ Toppy AI</p>
                                <p class="text-muted">Hiện không có đề xuất nào</p>
                            </div>
                            <div class="card-footer bg-white border-16">
                                <a href="#" class="btn btn-link text-primary text-decoration-none">
                                    <i class="fi-rr-building me-2"></i> Xem tất cả
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Second Block -->
                    <div class="col-md-6 mb-3">
                        <div class="card text-center border-16">
                            <div class="card-body">
                                <p class="card-text">Dịch vụ sắp hết hạn</p>
                                <p class="text-muted">Hiện không có dịch vụ nào</p>
                            </div>
                            <div class="card-footer bg-white border-16">
                                <a href="#" class="btn btn-link text-primary text-decoration-none">
                                    <i class="fi-rr-document me-2"></i> Quản lý dịch vụ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card border-16">
                    <div class="card-body">
                        <h5 class="card-title">Các vị trí đã được chúng tôi tối ưu kết quả tìm kiếm</h5>
                        <p class="card-text text-muted">Chúng tôi sẽ liên tục cập nhật các vị trí mới và gia
                            tăng nguồn ứng viên phù hợp dựa theo nhu cầu tìm kiếm của bạn.</p>

                        <!-- Section 1: Hành chính Văn phòng -->
                        <h6>Hành chính Văn phòng</h6>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p class="mb-1">Chuyên viên Nhân sự (190.314)</p>
                                <p class="mb-1">Nhân viên Hành chính (64.964)</p>
                                <p class="mb-1">Lễ tân (134.138)</p>
                                <p class="mb-1">Kế toán tổng hợp (56.444)</p>
                                <p class="mb-1">Nhân viên kho (92.072)</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1">Chuyên viên Tuyển dụng (59.090)</p>
                                <p class="mb-1">Nhân viên Hành chính – Kế toán</p>
                                <p class="mb-1">Giao dịch viên (26.620)</p>
                                <p class="mb-1">Xuất nhập khẩu (105.614)</p>
                                <p class="mb-1">Trợ lý giám đốc (25.836)</p>
                            </div>
                        </div>

                        <div class="text-dark">
                            <hr>
                        </div>

                        <h6>Kinh doanh – Bán hàng</h6>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p class="mb-1">Nhân viên kinh doanh (641.969)</p>
                                <p class="mb-1">Tư vấn bán hàng (41.963)</p>
                                <p class="mb-1">Giám sát bán hàng (44.904)</p>
                                <p class="mb-1">Telesales (111.781)</p>
                                <p class="mb-1">Sales Phần mềm (73.083)</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1">Nhân viên bán hàng (497.098)</p>
                                <p class="mb-1">Trưởng nhóm kinh doanh</p>
                                <p class="mb-1">Tư vấn tài chính (181.121)</p>
                                <p class="mb-1">Sales bảo hiểm (38.505)</p>
                                <p class="mb-1">Sales Thị trường (94.487)</p>
                            </div>
                        </div>

                        <div class="text-dark">
                            <hr>
                        </div>

                        <a href="#" class="btn btn-link text-primary text-decoration-none">
                            <i class="fi-rr-building me-2"></i> Xem tất cả danh sách
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
