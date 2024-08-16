<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education')->insert([
            [
                'major_id' => 1,
                'name' => 'Khoa học Máy tính',
                'slug' => Str::slug('Khoa học Máy tính'),
                'description' => 'Chương trình toàn diện về Khoa học Máy tính.',
                'start_date' => now(),
                'end_date' => now()->addYears(4),
                'institution' => 'Đại học Ví Dụ',
                'country' => 'Hoa Kỳ',
                'address' => '123 Đường Ví Dụ, Thành phố Ví Dụ, Hoa Kỳ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 2,
                'name' => 'Quản trị Kinh doanh',
                'slug' => Str::slug('Quản trị Kinh doanh'),
                'description' => 'Chương trình chuyên sâu về quản lý và vận hành kinh doanh.',
                'start_date' => now(),
                'end_date' => now()->addYears(3),
                'institution' => 'Trường Kinh doanh Ví Dụ',
                'country' => 'Anh',
                'address' => '456 Đường Kinh Doanh, Thị trấn Ví Dụ, Anh',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }

}
