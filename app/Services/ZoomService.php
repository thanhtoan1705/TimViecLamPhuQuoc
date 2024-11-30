<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    protected $accountId;
    protected $clientId;
    protected $clientSecret;
    protected $baseUrl = 'https://api.zoom.us/v2/';
    protected $accessToken;

    public function __construct()
    {
        $this->accountId = config('services.zoom.account_id');
        $this->clientId = config('services.zoom.client_id');
        $this->clientSecret = config('services.zoom.client_secret');
        $this->getAccessToken();
    }

    private function getAccessToken()
    {
        try {
            $response = Http::asForm()
                ->withBasicAuth($this->clientId, $this->clientSecret)
                ->post('https://zoom.us/oauth/token', [
                    'grant_type' => 'account_credentials',
                    'account_id' => $this->accountId,
                ]);

            if (!$response->successful()) {
                throw new \Exception('Failed to get access token. Status: ' . $response->status() . ' Response: ' . $response->body());
            }

            $responseData = $response->json();
            $this->accessToken = $responseData['access_token'];
        } catch (\Exception $e) {
            throw new \Exception('Zoom authentication error: ' . $e->getMessage());
        }
    }

    public function createMeeting(array $data)
    {
        try {
            $meetingData = [
                'topic' => $data['topic'],
                'type' => 2, // Scheduled meeting
                'start_time' => $data['start_time'],
                'duration' => $data['duration'],
                'timezone' => $data['timezone'] ?? 'Asia/Ho_Chi_Minh',
                'settings' => [
                    'host_video' => true,
                    'participant_video' => true,
                    'join_before_host' => true, // Cho phép join trước khi host vào
                    'waiting_room' => false,    // Tắt waiting room
                    'auto_recording' => 'none',
                    'alternative_hosts' => "",
                    'registrants_email_notification' => false,
                    'meeting_authentication' => false, // Tắt xác thực để dễ vào
                ]
            ];

            $response = Http::withToken($this->accessToken)
                ->post($this->baseUrl . 'users/me/meetings', $meetingData);

            if (!$response->successful()) {
                \Log::error('Zoom API Error:', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                throw new \Exception('Failed to create meeting: ' . $response->body());
            }

            return $response->json();
        } catch (\Exception $e) {
            throw new \Exception('Error creating Zoom meeting: ' . $e->getMessage());
        }
    }

    public function listMeetings()
    {
        try {
            $response = Http::withToken($this->accessToken)
                ->get($this->baseUrl . 'users/me/meetings');

            if (!$response->successful()) {
                throw new \Exception('Failed to list meetings: ' . $response->body());
            }

            return $response->json();
        } catch (\Exception $e) {
            throw new \Exception('Error listing Zoom meetings: ' . $e->getMessage());
        }
    }
}
