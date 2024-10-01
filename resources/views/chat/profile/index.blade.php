@extends('chat.layouts.master')
@section('title', 'Hồ sơ')
@section('content')
    
<!-- Start Profile tab-pane -->
<div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
    <!-- Start profile content -->
    <div>
        <div class="px-4 pt-4">
            <div class="user-chat-nav float-end">
                <div class="dropdown">
                    <a href="#" class="font-size-18 text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-more-2-fill"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Sửa</a>
                        <a class="dropdown-item" href="#">Hoạt động</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Khác</a>
                    </div>
                </div>
            </div>
            <h4 class="mb-0">Hồ sơ</h4>
        </div>

        <div class="text-center p-4 border-bottom">
            <div class="mb-4">
                <img src="{{asset('assets/chat/images/users/avatar-1.jpg')}}" class="rounded-circle avatar-lg img-thumbnail" alt="">
            </div>

            <h5 class="font-size-16 mb-1 text-truncate">Trần Văn A</h5>
            <p class="text-muted text-truncate mb-1"><i class="ri-record-circle-fill font-size-10 text-success me-1 ms-0 d-inline-block"></i> Hoạt động</p>
        </div>
        <!-- End profile user -->

        <!-- Start user-profile-desc -->
        <div class="p-4 user-profile-desc" data-simplebar>
            <div class="text-muted">
                <p class="mb-4">
                    Nếu nhiều ngôn ngữ kết hợp lại, ngữ pháp của ngôn ngữ kết quả sẽ đơn giản và có quy tắc hơn so với ngôn ngữ riêng lẻ.
                </p>
            </div>


            <div id="tabprofile" class="accordion">
                <div class="accordion-item card border mb-2">
                    <div class="accordion-header" id="about2">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="true" aria-controls="about">
                            <h5 class="font-size-14 m-0">
                                <i class="ri-user-2-line me-2 ms-0 ms-0 align-middle d-inline-block"></i> Giới thiệu
                            </h5>
                        </button>
                    </div>
                    <div id="about" class="accordion-collapse collapse show" aria-labelledby="about2" data-bs-parent="#tabprofile">
                        <div class="accordion-body">
                            <div>
                                <p class="text-muted mb-1">Tên</p>
                                <h5 class="font-size-14">Trần Văn A</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Email</p>
                                <h5 class="font-size-14">adc@123.com</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Thời gian</p>
                                <h5 class="font-size-14">11:40 AM</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Địa chỉ</p>
                                <h5 class="font-size-14 mb-0">Cần Thơ, Việt Nam</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End About card -->

                <div class="card accordion-item border">
                    <div class="accordion-header" id="attachfile2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#attachfile" aria-expanded="false" aria-controls="attachfile">
                            <h5 class="font-size-14 m-0">
                                <i class="ri-attachment-line me-2 ms-0 ms-0 align-middle d-inline-block"></i> Tệp đính kèm
                            </h5>
                        </button>
                    </div>
                    <div id="attachfile" class="accordion-collapse collapse" aria-labelledby="attachfile2" data-bs-parent="#tabprofile">
                        <div class="accordion-body">
                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-primary-subtle text-primary rounded font-size-20">
                                            <i class="ri-file-text-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Admin-A.zip</h5>
                                            <p class="text-muted font-size-13 mb-0">12.5 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-primary-subtle text-primary rounded font-size-20">
                                            <i class="ri-image-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Image-1.jpg</h5>
                                            <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-primary-subtle text-primary rounded font-size-20">
                                            <i class="ri-image-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Image-2.jpg</h5>
                                            <p class="text-muted font-size-13 mb-0">3.1 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-primary-subtle text-primary rounded font-size-20">
                                            <i class="ri-file-text-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Landing-A.zip</h5>
                                            <p class="text-muted font-size-13 mb-0">6.7 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Attached Files card -->
            </div>
            <!-- end profile-user-accordion -->

        </div>
        <!-- end user-profile-desc -->
    </div>
    <!-- End profile content -->
</div>
<!-- End Profile tab-pane -->

@endsection