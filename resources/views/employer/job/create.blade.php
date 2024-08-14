@extends('employer.layouts.master')
@section('title', 'Danh sách dịch vụ')
@section('content')

    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Thêm việc làm</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>

                        <li><a href=''>Việc làm</a></li>
                        <li><span>Thêm việc làm</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <h6 class="color-text-paragraph-2">Thêm mới việc làm</h6>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Tên nhà tuyển dụng *</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Tên công ty *</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Website công ty</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Công việc</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Chuyên ngành *</label>
                                            <select class="form-control" name="" id="">
                                                <option value="" selected>Chọn chuyên ngành</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Trình độ *</label>
                                            <select class="form-control" name="" id="">
                                                <option value="" selected>Chọn trình độ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Kinh nghiệm *</label>
                                            <select class="form-control" name="" id="">
                                                <option value="" selected>Chọn kinh nghiệm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Giới tính *</label>
                                            <select class="form-control" name="" id="">
                                                <option value="" selected>Chọn giới tính</option>
                                                <option value="">Nam</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Thời gian bắt đầu *</label>
                                            <input class="form-control" type="date" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Thời gian kết thúc *</label>
                                            <input class="form-control" type="date" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-13 col-md-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Địa chỉ *</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Mổ tả công việc</label>
                                            <textarea class="form-control" name="message" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mt-10">
                                            <button class="btn btn-default btn-brand icon-tick mr-5">Thêm mới</button>
                                            <a href="" class="btn btn-danger btn-brand icon-list">Danh sách</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <x-employer.footer></x-employer.footer>

    </div>

@endsection


@push('css')

@endpush

