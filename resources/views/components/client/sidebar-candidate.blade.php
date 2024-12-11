<div class="col-lg-3 col-md-4 col-sm-12 d-sm-flex d-lg-block justify-content-center">
    <div class="box-nav-tabs nav-tavs-profile mb-5 d-block text-center text-sm-start">
        <ul class="nav flex-column align-items-center align-items-sm-start" role="tablist">
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.candidate.profile')}}" role="tab"
                    aria-controls="tab-my-profile" aria-selected="true">
                    <i class="bi bi-buildings me-2" style="font-size: 15px"></i>Thông tin của tôi
                </a>
            </li>
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.candidate.viewSavedJobs')}}" role="tab"
                    aria-controls="tab-saved-jobs" aria-selected="false">
                    <i class="bi bi-briefcase-fill me-2" style="font-size: 15px"></i>Việc làm đã lưu
                </a>
            </li>
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.candidate.interviews')}}" role="tab"
                    aria-controls="tab-saved-jobs" aria-selected="false">
                    <i class="bi bi-calendar2-check-fill me-2" style="font-size: 15px"></i>Lịch phỏng vấn
                </a>
            </li>
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.cv.saved')}}" role="tab"
                    aria-controls="tab-saved-jobs" aria-selected="false">
                    <i class="bi bi-person-fill-gear me-2" style="font-size: 15px"></i>Quản lý cv
                </a>
            </li>
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.candidate.change-password')}}" role="tab"
                    aria-controls="tab-saved-jobs" aria-selected="false">
                    <i class="bi bi-shield-lock-fill me-2" style="font-size: 15px"></i>Đổi mật khẩu
                </a>
            </li>
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.candidate.notification')}}" role="tab"
                    aria-controls="tab-saved-jobs" aria-selected="false">
                    <i class="bi bi-bell-fill me-2" style="font-size: 15px"></i>Thông báo
                </a>
            </li>
            <li class="rounded-3 my-3 w-100">
                <a class="btn btn-border w-100" href="{{route('client.candidate.logout')}}" role="tab"
                    aria-controls="tab-saved-jobs" aria-selected="false">
                    <i class="bi bi-box-arrow-left me-2" style="font-size: 15px"></i>Đăng xuất
                </a>
            </li>
        </ul>
    </div>
</div>
