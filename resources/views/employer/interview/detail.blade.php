@extends('employer.layouts.master')
@section('title', 'Hẹn phỏng vấn')
@section('content')
    @push('css')
        <style>
            .dropdown-menu {
                display: none;
                position: absolute;
                top: 100%;
                /* Đặt menu dropdown dưới nút */
                right: 0;
                /* Căn phải */
                background-color: #fff;
                border: 1px solid #ddd;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                /* Đảm bảo menu nằm trên các phần tử khác */
            }

            .dropdown-menu.show {
                display: block;
            }

            .dropdown-item {
                padding: 8px 12px;
            }
        </style>
    @endpush

    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Chi tiết phỏng vấn</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href='index.html'>Quản trị</a></li>
                        <li><span>Chi tiết phỏng vấn</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-11 col-lg-11">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <div class="d-flex justify-content-between align-items-center mb-10">
                                    <h5 class="color-text-paragraph-2 mb-0">Thông tin phỏng vấn</h5>
                                    <div class="toolbar d-flex justify-content-end align-items-center p-2">
                                        <div class="dropdown">
                                            <span id="dropdownMenuButton" aria-expanded="false"> <i
                                                    class="bi bi-three-dots-vertical"></i>
                                            </span>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="bi bi-file-earmark-text"></i> Biểu mẫu</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i>
                                                        Sửa</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i>
                                                        Xóa</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="bi bi-clock-history"></i> Lịch sử</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-5 col-md-5 col-sm-12 d-flex justify-content-between mb-3">
                                        <span>Tên lịch phỏng vấn</span>
                                        <span>Phỏng vấn</span>
                                    </div>
                                    <div class="col-xxl-1 col-md-1 col-sm-12 d-flex justify-content-between mb-3">
                                    </div>
                                    <div class="col-xxl-5 col-md-5 col-sm-12 d-flex justify-content-between mb-3">
                                        <span>Tên vị trí tuyển dụng</span>
                                        <span>Chăm sóc khách hàng</span>
                                    </div>
                                    <div class="col-xxl-5 col-md-5 col-sm-12 d-flex justify-content-between mb-3">
                                        <span>Ứng viên</span>
                                        <span>10</span>
                                    </div>
                                    <div class="col-xxl-1 col-md-1 col-sm-12 d-flex justify-content-between mb-3">
                                    </div>
                                    <div class="col-xxl-5 col-md-5 col-sm-12 d-flex justify-content-between mb-3">
                                        <span>Thời gian</span>
                                        <span>08h20 - 10h20, 17/10/2024</span>
                                    </div>
                                    <div class="col-xxl-5 col-md-5 col-sm-12 d-flex justify-content-between mb-3">
                                        <span>Người phỏng vấn</span>
                                        <span>Đào Thanh Toàn</span>
                                    </div>
                                    <div class="col-xxl-1 col-md-1 col-sm-12 d-flex justify-content-between mb-3">
                                    </div>
                                    <div class="col-xxl-5 col-md-5 col-sm-12 d-flex justify-content-between mb-3">
                                        <span>Tham gia vào cuộc họp</span>
                                        <button class="btn btn-primary btn-sm">Join</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <h5 class="color-text-paragraph-2 mb-3">Danh sách ứng viên</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Ngày sinh</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><img src="link_to_image" alt="Ảnh ứng viên" class="img-fluid rounded-circle"
                                                 style="width: 50px; height: 50px;"></td>
                                        <td>Nguyễn Văn A</td>
                                        <td>08h20, 17/10/2024</td>
                                        <td><span class="badge bg-success">Đã xác nhận</span></td>
                                        <td>nguyenvana@example.com</td>
                                        <td>0901234567</td>
                                        <td>01/01/1990</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <x-employer.footer></x-employer.footer>
    </div>



    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.5/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.5/index.global.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const dropdownButton = document.getElementById('dropdownMenuButton');
                const dropdownMenu = dropdownButton.nextElementSibling;

                dropdownButton.addEventListener('click', (event) => {
                    event.stopPropagation(); // Ngăn chặn sự kiện nhấp chuột lan ra ngoài
                    dropdownMenu.classList.toggle('show');
                });

                document.addEventListener('click', () => {
                    dropdownMenu.classList.remove('show');
                });
            });
        </script>
    @endpush
@endsection
