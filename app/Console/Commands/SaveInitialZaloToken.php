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
                'access_token' => 'vRcKK2EBj5lekv9OBugrLUI_a5igbyXLxUAf5KAoZbtpviqKUQAoRURsuXfGbhnXwyRIQLwDy33Ix9rm7zwvVD2Hx71n_vCPuhYrJ5ZyyGwKhfHi4ENHOhQEj2uukPDryztFF7MHhNxwrV5rN9wsDyslq4KBx88qXyVjTp-6pZxuofPdQhZrDjV9grHgdeiRy-BsQ6VTg3FEgTXOGvh-K8MgenuYv-vEw8_9GqAya474uF0OQgYbRiJYr119dfDXuwkm35pCpLF4hUrQVPxBLVUrlWqxz-y5jAA-R1-TuGJLtRvCUBJp3_E6acLLpxKotl7RHaURZHt8qljHMPcc8fBiXdfVk-Cwwi_6T76ibplU__5mIihN4FUUgKnzqOWynxpTJaxRioNLZEPuHSQV8UAh_r94DVu65pelaR9S',
                'refresh_token' => 'dK7VGtfMOoEGGzbBTbTYBPn7sqXpIXLUw3Z6ELLX926_SEiHLZPKB-9pcoHCDK4Ceq7-3GeGEJFiG-rNMWaFCRr5r2iWF1uLqcdU2NHp1nxiFiWvO2i1B-ThvXnhV0a7ZIl69MHyU4Fg3ijLM5GHHUKceq9fF6vRtrowPMqLRaNOVj9xIJeM6-9Cgdbr3XbuvLkdTaWqUbRXKvP9UHTkASz6gJCdI1KMgJpKTpui4NMFMAXr9arnIReucMmNB7fGa6otMoWuU6Z4URT8J3DgTQ9wrcjCDcvOrtgGE6qHSIVg0An464z0SOm1Xre0SNvXaWB2V0LA9c-zFzu7E2u17xX_yZWf5HCvnrgi9rPAS0F0AwDaRJzGSVnuWqPrAbbVuqMrM6uFSq3-Ug5PQW0UJyPhradV8ujHTanb90',
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
