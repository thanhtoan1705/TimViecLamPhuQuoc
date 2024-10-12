<?php

namespace Database\Seeders;

use App\Models\UserCv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCv::create([
            'user_id' => 1, // Giả sử có người dùng với ID 1
            'template_id' => 1, // Sử dụng template CV 1
            'cv_content' => json_encode(['field_1' => 'Nguyễn Văn A', 'field_2' => 'example@gmail.com']),
        ]);

        UserCv::create([
            'user_id' => 2, // Giả sử có người dùng với ID 2
            'template_id' => 2, // Sử dụng template CV 2
            'cv_content' => json_encode(['field_1' => 'Trần B', 'field_2' => 'Nhiều năm kinh nghiệm lập trình']),
        ]);
    }
}
