<?php

namespace App\Services;

use App\Models\Token;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ZaloTokenService
{
    public function getValidAccessToken()
    {
        $token = Token::latest('created_at')->first();

        if (!$token) {
            Log::error('Không tìm thấy token trong database');
            throw new \Exception('Token không tồn tại trong hệ thống.');
        }

        $expiresAt = Carbon::parse($token->expires_at);

        if ($expiresAt->isPast()) {
            try {
                return $this->refreshAccessToken($token);
            } catch (\Exception $e) {
                Log::error('Error refreshing token: ' . $e->getMessage());
                throw new \Exception('Không thể làm mới Access Token.');
            }
        }

        return $token->access_token;
    }

    protected function refreshAccessToken($token)
    {
        if (!$token || !$token->refresh_token) {
            Log::error('Không tìm thấy Refresh Token');
            throw new \Exception('Refresh Token không tồn tại.');
        }

        $response = Http::asForm()->post('https://oauth.zaloapp.com/v4/oa/access_token', [
            'refresh_token' => $token->refresh_token,
            'app_id' => config('services.zalo.app_id'),
            'grant_type' => 'refresh_token',
            'secret_key' => config('services.zalo.secret_key'),
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if (!isset($data['access_token'])) {
                Log::error('API response không chứa access token', ['response' => $data]);
                throw new \Exception('Invalid API response');
            }

            // Cập nhật token trong database
            $token->update([
                'access_token' => $data['access_token'],
                'refresh_token' => $data['refresh_token'] ?? $token->refresh_token,
                'expires_at' => now()->addSeconds($data['expires_in'] ?? 86400),
            ]);

            return $data['access_token'];
        }

        Log::error('Zalo API Error', ['response' => $response->body()]);
        throw new \Exception('Không thể làm mới access token: ' . $response->body());
    }
}
