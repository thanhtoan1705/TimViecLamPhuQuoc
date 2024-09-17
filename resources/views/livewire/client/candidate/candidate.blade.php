<div class="container">
    <div class="content-page">
        <div class="box-filters-job">
            <p>Bạn đã chọn: {{ $sortBy === 'newest' ? 'Ứng viên mới nhất' : 'Ứng viên cũ nhất' }}</p>
            <div class="row">
                <div class="col-xl-6 col-lg-5">
                    <span class="text-small text-showing">Hiển thị <strong>{{ $candidates->firstItem() }}-{{ $candidates->lastItem() }}</strong> của <strong>{{ $candidates->total() }}</strong> ứng viên</span>
                </div>
                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                    <div class="display-flex2">
                        <select wire:model="perPage" class="form-select">
                            <option value="10">10</option>
                            <option value="12">12</option>
                            <option value="20">20</option>
                        </select>

                        <select wire:model="sortBy" class="form-select">
                            <option value="newest">Ứng viên mới</option>
                            <option value="oldest">Ứng viên cũ</option>
                        </select>

                        <div class="box-view-type">
                            <a class='view-type' href='#'><img src="{{ asset('assets/client/imgs/template/icons/icon-list.svg') }}" alt="jobBox"></a>
                            <a class='view-type' href='#'><img src="{{ asset('assets/client/imgs/template/icons/icon-grid-hover.svg') }}" alt="jobBox"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($candidates as $candidate)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card-grid-2 hover-up">
                        <div class="card-grid-2-image-left">
                            <div class="card-grid-2-image-rd online">
                                <a href='#'>
                                    <figure><img alt="jobBox" src="{{ asset('storage/' . $candidate->user->image) }}"></figure>
                                </a>
                            </div>
                            <div class="card-profile pt-10">
                                <a href='#'>
                                    <h5>{{ $candidate->user->name }}</h5>
                                </a>
                                <span class="font-xs color-text-mutted">{{ $candidate->major->name ?? '' }}</span>
                            </div>
                        </div>
                        <div class="card-block-info">
                            <p class="font-xs color-text-paragraph-2">{!! $candidate->description !!}</p>
                            <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                <div class="text-start">
                                    @foreach($candidate->skills as $skill)
                                        <a class='btn btn-tags-sm mb-10 mr-5' href='#'>{{ $skill->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="employers-info align-items-center justify-content-center mt-15">
                                <div class="row">
                                    <div class="col-6">
                                    <span class="d-flex align-items-center">
                                        <i class="fi-rr-marker mr-5 ml-0"></i>
                                        <span class="font-sm color-text-mutted">{{ $candidate->address->province->name }}</span>
                                    </span>
                                    </div>
                                    <div class="col-6">
                                    <span class="d-flex justify-content-end align-items-center">
                                        <i class="fi-rr-clock mr-5"></i>
                                        <span class="font-sm color-brand-1">{{ $candidate->rate }} VNĐ / giờ</span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="paginations">
        {{ $candidates->links('vendor.pagination.custom') }}
    </div>
</div>
