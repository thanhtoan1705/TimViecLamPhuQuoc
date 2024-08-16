<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'street' => '123 Main St',
                'ward' => 'Ward 1',
                'district' => 'District 1',
                'province' => 'Province 1',
                'country' => 'Country 1',
                'latitude' => 12.345678,
                'longitude' => 98.765432,
            ],
            [
                'street' => '456 Elm St',
                'ward' => 'Ward 2',
                'district' => 'District 2',
                'province' => 'Province 2',
                'country' => 'Country 2',
                'latitude' => 23.456789,
                'longitude' => 87.654321,
            ],
        ]);
    }
}
