<?php

namespace App\Livewire\Client\Candidate;

use App\Models\Address;
use App\Repositories\Location\LocationInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $description;
    public $province_id;
    public $district_id;
    public $ward_id;
    public $street;
    public $image;
    public $date_of_birth;
    public $gender;
    public $imageTemp;

    public $provinces;
    public $districts = [];
    public $wards = [];

    protected $locationRepository;

    public function boot(LocationInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function mount()
    {
        $user = Auth::user();
        $candidate = $user->candidate;
        $address = $candidate->address;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->description = $candidate->description;
        $this->date_of_birth = $candidate->date_of_birth; // Thêm dòng này
        $this->gender = $candidate->gender; // Thêm dòng này
        $this->province_id = $address->province_id ?? null;
        $this->district_id = $address->district_id ?? null;
        $this->ward_id = $address->ward_id ?? null;
        $this->street = $address->street ?? '';

        $this->provinces = $this->locationRepository->getAllLocations();

        if ($this->province_id) {
            $this->districts = $this->locationRepository->getDistrictsByProvince($this->province_id);
        }

        if ($this->district_id) {
            $this->wards = $this->locationRepository->getWardsByDistrict($this->district_id);
        }
    }

    public function updateAccount()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'date_of_birth' => 'nullable|date', // Thêm dòng này
            'gender' => 'nullable|string',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'street' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        if ($this->image) {
            $imageName = $this->image->store('images/profiles', 'public');
            $validatedData['image'] = $imageName;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $imageName ?? $user->image,
        ]);

        $user->candidate->update([
            'description' => $this->description,
            'date_of_birth' => $this->date_of_birth, // Thêm dòng này
            'gender' => $this->gender,
        ]);

        $addressData = [
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'street' => $this->street,
        ];
        if ($user->candidate->address_id) {
            $user->candidate->address->update($addressData);
        } else {
            $address = Address::create($addressData);
            $user->candidate->update(['address_id' => $address->id]);
        }

        flash()->success('Thông tin tài khoản đã được cập nhật.', [], 'Thành công!');

        return redirect()->to(request()->header('Referer'));

    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($this->image) {
            $this->imageTemp = $this->image->temporaryUrl();
        }
    }

    public function updateAvatar()
    {
        if (!$this->image) {
            flash()->error('Vui lòng chọn ảnh trước khi cập nhật.', [], 'Lỗi!');
            return;
        }

        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $imageName = $this->image->store('images/profiles', 'public');

        $user->update([
            'avatar_url' => $imageName,
        ]);

        $this->image = null;
        $this->imageTemp = null;

        flash()->success('Ảnh đại diện đã được cập nhật thành công.', [], 'Thành công!');
        return redirect()->to(request()->header('Referer'));
    }

    public function removeAvatar()
    {
        $user = Auth::user();
        $user->update([
            'avatar_url' => null,
        ]);

        $this->image = null;
        $this->imageTemp = null;

        flash()->success('Ảnh đại diện đã được xóa.', [], 'Thành công!');
        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.client.candidate.profile');
    }
}
