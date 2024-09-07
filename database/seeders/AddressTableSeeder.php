<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy ngẫu nhiên ID từ bảng provinces
        $provinceId = DB::table('provinces')->inRandomOrder()->value('id');

        // Lấy ngẫu nhiên ID từ bảng districts dựa trên province_id đã chọn
        $districtId = DB::table('districts')
            ->where('province_id', $provinceId)
            ->inRandomOrder()
            ->value('id');

        // Lấy ngẫu nhiên ID từ bảng wards dựa trên district_id đã chọn
        $wardId = DB::table('wards')
            ->where('district_id', $districtId)
            ->inRandomOrder()
            ->value('id');

        DB::table('addresses')->insert([
            [
                'street' => '123 Main St',
                'ward_id' => $wardId,
                'district_id' => $districtId,
                'province_id' => $provinceId,
                'country' => 'Country 1',
                'latitude' => 12.345678,
                'longitude' => 98.765432,
            ],
            [
                'street' => '456 Elm St',
                'ward_id' => $wardId,
                'district_id' => $districtId,
                'province_id' => $provinceId,
                'country' => 'Country 2',
                'latitude' => 23.456789,
                'longitude' => 87.654321,
            ],
            [
                'street' => 'Hẻm 51',
                'ward_id' => 31149,
                'district_id' => 916,
                'province_id' => 92,
                'country' => 'Việt Nam',
                'latitude' => 10.045162,
                'longitude' => 105.746857,
            ],
            [
                'street' => 'Hẻm 51',
                'ward_id' => 31149,
                'district_id' => 916,
                'province_id' => 92,
                'country' => 'Việt Nam',
                'latitude' => 10.045162,
                'longitude' => 105.746857,
            ],
            [
                'street' => 'Hẻm 51',
                'ward_id' => 31149,
                'district_id' => 916,
                'province_id' => 92,
                'country' => 'Việt Nam',
                'latitude' => 10.045162,
                'longitude' => 105.746857,
            ],
            [
                'street' => 'Hẻm 51',
                'ward_id' => 31149,
                'district_id' => 916,
                'province_id' => 92,
                'country' => 'Việt Nam',
                'latitude' => 10.045162,
                'longitude' => 105.746857,
            ],
            [
                'street' => 'Hẻm 51',
                'ward_id' => 31149,
                'district_id' => 916,
                'province_id' => 92,
                'country' => 'Việt Nam',
                'latitude' => 10.045162,
                'longitude' => 105.746857,
            ],
            [
                'street' => 'Hẻm 51',
                'ward_id' => 31149,
                'district_id' => 916,
                'province_id' => 92,
                'country' => 'Việt Nam',
                'latitude' => 10.045162,
                'longitude' => 105.746857,
            ],
        ]);
    }
}
