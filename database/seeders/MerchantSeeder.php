<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Merchant::create([
            'name' => 'Công ty A',
            'email' => 'contact@companyA.com',
            'phone_number' => '0912345678',
            'balance' => 10000.00,
        ]);

        Merchant::create([
            'name' => 'Công ty B',
            'email' => 'contact@companyB.com',
            'phone_number' => '0987654321',
            'balance' => 50000.00,
        ]);
    }
}
