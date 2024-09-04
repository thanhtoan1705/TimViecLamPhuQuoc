<?php

namespace App\Repositories\Location;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;

class LocationRepository implements LocationInterface
{
    protected $location;

    public function __construct(Province $location)
    {
        $this->location = $location;
    }

    public function getAllLocations()
    {
        return $this->location->with('districts.wards')->get();
    }

    public function getDistrictsByProvince($provinceId)
    {
        return District::where('province_id', $provinceId)->get();
    }

    public function getWardsByDistrict($districtId)
    {
        return Ward::where('district_id', $districtId)->get();
    }

    public function getCandidateLocation($candidate)
    {
        $province = $candidate->candidate->address->province ?? null;
        $district = $candidate->candidate->address->district ?? null;
        $ward = $candidate->candidate->address->ward ?? null;

        return [
            'province' => $province,
            'district' => $district,
            'ward' => $ward
        ];
    }
}
