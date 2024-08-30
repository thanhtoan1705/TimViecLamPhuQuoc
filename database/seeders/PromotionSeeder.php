<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::create([
            'code' => 'PROMO2024',
            'discount' => 10000,
            'number_use' => 100,
            'start_time' => now(),
            'end_time' => now()->addDays(30),
            'describe' => 'Giảm giá mùa hè 2024',
            'status' => 1,
        ]);

        Promotion::create([
            'code' => 'WINTER2024',
            'discount' => 20000,
            'number_use' => 50,
            'start_time' => now()->addMonths(3),
            'end_time' => now()->addMonths(4),
            'describe' => 'Giảm giá mùa đông 2024',
            'status' => 1,
        ]);
    }
}

;
