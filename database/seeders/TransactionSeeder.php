<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
                'trans_id' => 'trans_id',
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employer_id' => 2,
                'merchant_id' => 2,
                'amount' => 50000,
                'transaction_type' => 'refund',
                'trans_id' => 'trans_id',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
