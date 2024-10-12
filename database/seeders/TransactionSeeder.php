<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'employer_id' => 1,
                'merchant_id' => 1,
                'amount' => 100000,
                'transaction_type' => 'payment',
                'trans_id' => '1666666',
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employer_id' => 2,
                'merchant_id' => 2,
                'amount' => 50000,
                'transaction_type' => 'refund',
                'trans_id' => '1233456',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
