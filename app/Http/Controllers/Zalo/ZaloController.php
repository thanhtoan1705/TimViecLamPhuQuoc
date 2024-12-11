<?php

namespace App\Http\Controllers\Zalo;

use App\Http\Controllers\Controller;
use App\Services\ZaloService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ZaloController extends Controller
{
    protected $zaloService;

    public function __construct(ZaloService $zaloService)
    {
        $this->zaloService = $zaloService;
    }

    public function redirect()
    {
        return redirect($this->zaloService->getAuthUrl());
    }

    public function callback(Request $request)
    {
        try {
            if ($request->has('error')) {
                Log::error('Zalo Auth Error', $request->all());
                return redirect()->route('client')
                    ->with('error', 'Zalo authentication failed: ' . $request->error_description);
            }

            $tokens = $this->zaloService->getAccessToken($request->code);

            // Lưu tokens vào database hoặc session tùy use case
            session([
                'zalo_access_token' => $tokens['access_token'],
                'zalo_refresh_token' => $tokens['refresh_token'] ?? null
            ]);

            return redirect()->route('client')->with('success', 'Zalo connected successfully');
        } catch (\Exception $e) {
            Log::error('Zalo Callback Error: ' . $e->getMessage());
            return redirect()->route('client')->with('error', 'Failed to connect Zalo');
        }
    }
}
