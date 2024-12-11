<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ZaloService
{
    protected $tokenService;
    protected $apiUrl = 'https://business.openapi.zalo.me/message/template';

    public function __construct(ZaloTokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function sendMessage($phone, $data, $isOnline = false)
    {
        try {
            $accessToken = $this->tokenService->getValidAccessToken();

            // Log chi tiết
            // Log::info('Zalo Request Details', [
            //     'access_token' => $accessToken,
            //     'phone' => $phone,
            //     'template_id' => $isOnline ? config('zalo.online_template_id') : config('zalo.offline_template_id'),
            //     'data' => $data,
            //     'is_online' => $isOnline
            // ]);

            // Chọn template ID dựa vào loại phỏng vấn
            $templateId = $isOnline ? config('zalo.online_template_id') : config('zalo.offline_template_id');

            // Chuẩn hóa số điện thoại
            $phone = preg_replace('/^\+?84/', '84', $phone);

            $requestData = [
                'phone' => $phone,
                'template_id' => $templateId,
                'template_data' => $data,
                'tracking_id' => uniqid('interview_', true)
            ];

            $response = Http::timeout(30)
                ->retry(3, 1000)
                ->withHeaders([
                    'access_token' => $accessToken,
                    'Content-Type' => 'application/json'
                ])->post($this->apiUrl, $requestData);

            // Log response chi tiết
            // Log::info('Zalo Response Details', [
            //     'status' => $response->status(),
            //     'body' => $response->json(),
            //     'headers' => $response->headers()
            // ]);

            $responseData = $response->json();

            if ($response->successful() && isset($responseData['error']) && $responseData['error'] === 0) {
                return true;
            }

            throw new \Exception('Zalo API Error: ' . ($responseData['message'] ?? 'Unknown error'));
        } catch (\Exception $e) {
            Log::error('ZNS sending exception', [
                'error' => $e->getMessage(),
                'phone' => $phone,
                'data' => $data,
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }
}
