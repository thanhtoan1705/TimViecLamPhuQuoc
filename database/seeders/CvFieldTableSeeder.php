<?php

namespace Database\Seeders;

use App\Models\CvField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvFieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CvField::create(['fields_name' => 'Họ và tên', 'fields_type' => 'text', 'template_id' => 1, 'order' => 0]);
        CvField::create(['fields_name' => 'Email', 'fields_type' => 'email', 'template_id' => 1, 'order' => 1]);
        CvField::create(['fields_name' => 'Số điện thoại', 'fields_type' => 'text', 'template_id' => 1, 'order' => 2]);

        // Các trường cho Template 2
        CvField::create(['fields_name' => 'Họ và tên', 'fields_type' => 'text', 'template_id' => 2, 'order' => 0]);
        CvField::create(['fields_name' => 'Kinh nghiệm làm việc', 'fields_type' => 'textarea', 'template_id' => 2, 'order' => 1]);
        CvField::create(['fields_name' => 'Kỹ năng', 'fields_type' => 'textarea', 'template_id' => 2, 'order' => 2]);
    }
}
