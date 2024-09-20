<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'employer_id' => 1,
                'packages_id' => 1,
                'promotion_id' => 1,
                'payment_method_id' => 1,
                'transaction_id' => 1,
                'amount' => 100000,
                'payment_date' => now(),
                'expiration_date' => now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 2,
                'packages_id' => 2,
                'promotion_id' => 1,
                'payment_method_id' => 1,
                'transaction_id' => 1,
                'amount' => 200000,
                'payment_date' => now(),
                'expiration_date' => now()->addDays(60),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
