<div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
    <h3 class="mt-0 mb-15 color-brand-1">Tài khoản của tôi</h3>
    <a class="font-md color-text-paragraph-2" href="#">Cập nhật hồ sơ</a>
    <div class="mt-35 mb-40 box-info-profie">
        <div class="image-profile" style="width: 85px; height: 85px;">
            <img width="85px" height="85px" id="profileImage" src="{{ asset('storage/' . Auth::user()->image) }}"
                 alt="jobbox">
        </div>
        {{--        <input type="file" name="image" id="uploadImage" style="display: none;" accept="image/*" onchange="uploadImage(event)">--}}
        <input type="file" id="uploadImage" style="display: none;" accept="image/*" wire:model="image"
               onchange="uploadImage(event)">

        <a class="btn btn-apply" onclick="document.getElementById('uploadImage').click();">Cập nhật ảnh đại diện</a>
        <a class="btn btn-link">Xóa</a>
    </div>
    <div class="row form-contact">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label class="font-sm color-text-muted mb-10">Tên đầy đủ *</label>
                <input class="form-control" type="text" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="font-sm color-text-muted mb-10">Email *</label>
                <input class="form-control" type="text" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="font-sm color-text-muted mb-10">Số điện thoại</label>
                <input class="form-control" type="text" wire:model="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="font-sm color-text-muted mb-10">Tiểu sử</label>
                <textarea class="form-control" rows="4" wire:model="description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-sm color-text-muted mb-10">Tỉnh / Thành phố</label>
                        <select class="form-control" wire:model="province_id" id="province-select">
                            <option value="">Chọn Tỉnh / Thành phố</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{ $province->id }}" {{ $province->id == $province_id ? 'selected' : '' }}>{{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-sm color-text-muted mb-10">Quận / Huyện</label>
                        <select class="form-control" wire:model="district_id" id="district-select">
                            <option value="">Chọn Quận / Huyện</option>
                            @foreach($districts as $district)
                                <option
                                    value="{{ $district->id }}" {{ $district->id == $district_id ? 'selected' : '' }}>{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('district_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-sm color-text-muted mb-10">Xã / Phường</label>
                        <select class="form-control" wire:model="ward_id" id="ward-select">
                            <option value="">Chọn Xã / Phường</option>
                            @foreach($wards as $ward)
                                <option
                                    value="{{ $ward->id }}" {{ $ward->id == $ward_id ? 'selected' : '' }}>{{ $ward->name }}</option>
                            @endforeach
                        </select>
                        @error('ward_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-sm color-text-muted mb-10">Đường</label>
                        <input class="form-control" type="text" wire:model="street" placeholder="Nhập tên đường">
                        @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="border-bottom pt-10 pb-10 mb-30"></div>
            <div class="box-agree mt-30">
                <label class="lbl-agree font-xs color-text-paragraph-2">
                    <input class="lbl-checkbox" type="checkbox" value="1">Đồng ý với điều khoản
                </label>
            </div>
            <div class="box-button mt-15">
                <button wire:click="updateAccount" class="btn btn-apply-big font-md font-bold">Lưu tất cả thay đổi
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#province-select').on('change', function () {
            const provinceId = $(this).val();
            console.log("Tỉnh được chọn:", provinceId);

            if (provinceId) {
                $.ajax({
                    url: `/districts/${provinceId}`,
                    type: 'GET',
                    success: function (districts) {
                        console.log("Danh sách huyện trả về:", districts);

                        let districtOptions = '<option value="">Chọn Quận / Huyện</option>';
                        districts.forEach(district => {
                            districtOptions += `<option value="${district.id}">${district.name}</option>`;
                        });
                        $('#district-select').html(districtOptions);
                        $('#ward-select').html('<option value="">Chọn Xã / Phường</option>');
                    },
                    error: function (xhr) {
                        console.log("Lỗi khi gọi API lấy huyện:", xhr);
                    }
                });
            } else {
                $('#district-select').html('<option value="">Chọn Quận / Huyện</option>');
                $('#ward-select').html('<option value="">Chọn Xã / Phường</option>');
            }
        });

        $('#district-select').on('change', function () {
            const districtId = $(this).val();
            console.log("Huyện được chọn:", districtId);

            if (districtId) {
                $.ajax({
                    url: `/wards/${districtId}`,
                    type: 'GET',
                    success: function (wards) {
                        console.log("Danh sách xã/phường trả về:", wards);

                        let wardOptions = '<option value="">Chọn Xã / Phường</option>';
                        wards.forEach(ward => {
                            wardOptions += `<option value="${ward.id}">${ward.name}</option>`;
                        });
                        $('#ward-select').html(wardOptions);
                    },
                    error: function (xhr) {
                        console.log("Lỗi khi gọi API lấy xã/phường:", xhr);
                    }
                });
            } else {
                $('#ward-select').html('<option value="">Chọn Xã / Phường</option>');
            }
        });
    });

    function uploadImage(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
