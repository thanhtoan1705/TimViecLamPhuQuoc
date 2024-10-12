<?php

namespace Database\Seeders;

use App\Models\UserCvData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCvDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCvData::create([
            'template_id' => 1,
            'fields_id' => 1, // Họ và tên
            'fields_value' => 'Nguyễn Văn A',
        ]);
        UserCvData::create([
            'template_id' => 1,
            'fields_id' => 2, // Email
            'fields_value' => 'example@gmail.com',
        ]);

        // Dữ liệu của CV của User ID 2
        UserCvData::create([
            'template_id' => 2,
            'fields_id' => 1, // Họ và tên
            'fields_value' => 'Trần B',
        ]);
        UserCvData::create([
            'template_id' => 2,
            'fields_id' => 2, // Kinh nghiệm làm việc
            'fields_value' => 'Nhiều năm kinh nghiệm lập trình',
        ]);
    }
}
