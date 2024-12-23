<?php

namespace App\Console\Commands;

use App\Models\Token;
use Illuminate\Console\Command;
use Carbon\Carbon;

class SaveInitialZaloToken extends Command
{
    protected $signature = 'zalo:save-initial-token';
    protected $description = 'Save initial Zalo token to database';

    public function handle()
    {
        try {
            // Kiểm tra xem đã có token chưa
            $token = Token::first();

            $tokenData = [
                'access_token' => 'bkJPNGLdFNYRvjzL2MOyTfVYtLOCUqeXuQx1SpXEU53VlUSe0sziJFcny09hFb1lylYm3M4z92sw_9L_U3mj6f2_p4XCFqXlbFdKDqK_T5NSsUGd1Xy2LvxWlXPs50KmaUoHJr8g92-q-BDoJteLIzEQ_nmt51i-oPIlN2rF4ttydP8v7dyiTVE0kWuvVWLYqxE693zy4GNxvfX3QI0Z6PBnlq9Z305bYjVW474QL53iryue055BK-c5xm89OKWZmAIjNXj14oZJi_bc4LLSBOYLndTiQ58IjQtZLb9G0oEOgU56NovN2xVXoYnk7LvYgeVO0bjAE7ktn8uxQYCeJONnjJz54mXAcSADEdqX1rVxmfSq1nTrRVNPtZylGsbd_eVeC0fLJHV2gDKs7qy_I8AwcGLmE7ztI6EhjzCK2NqxVm',
                'refresh_token' => 'AXHhAa-1cX8d5cqYGu2R72iIRo56dPfxBsue8HQ1tsy3KsDMRPpCAWHfFauzhxaX0puKHpZOdMDL5ZqyOu7A06qMQMH3clOOMNzZ96YVvtnMTa17H82p9sn8075yZluWPMj1OqYFtIvMG29AIPAW459f7tPOa9ikDMawPYQulGmHMXXg1Rca86r9AcC7YgKeTneK4MRhuqi2VbSqQ82ZUaDc2n5RbgeXId8YHo2HeobAUHri9eZj40eQN6mMtzWh03nzGM_do6L-3rWYK-tRJceuV3S6w8j6430fTpxBhXqa40rbIOYbMcL753rxZk45IXPrRaNZXmfG9tHvNlI31N8ZT3jdwD51VGXaUtV-xKPIRdaNO87sR6rFTZ41cE5v5rTXDnsLdbiiR2rd1gED0KjENQ762KERd1K',
                'expires_at' => now()->addSeconds(90000),
            ];

            if ($token) {
                // Nếu đã có token thì cập nhật
                $token->update($tokenData);
                $this->info('Zalo token updated successfully!');
            } else {
                // Nếu chưa có token thì tạo mới
                Token::create($tokenData);
                $this->info('Initial Zalo token saved successfully!');
            }
        } catch (\Exception $e) {
            $this->error('Error saving token: ' . $e->getMessage());
        }
    }
}
