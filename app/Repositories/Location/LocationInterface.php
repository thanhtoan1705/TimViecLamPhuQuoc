<?php

namespace App\Repositories\Location;

interface LocationInterface
{
    public function getAllLocations();

    public function getDistrictsByProvince($provinceId);

    public function getWardsByDistrict($districtId);

    public function getCandidateLocation($candidate);

}
