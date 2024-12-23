<?php

namespace App\Console\Commands;

use App\Models\Interview;
use App\Mail\InterviewReminder;
use App\Mail\EmployerInterviewReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Services\ZaloService;

class SendInterviewReminders extends Command
{
    protected $signature = 'interviews:send-reminders';
    protected $description = 'Send interview reminders via email and Zalo';

    protected $zaloService;

    public function __construct(ZaloService $zaloService)
    {
        parent::__construct();
        $this->zaloService = $zaloService;
    }

    private function formatPhone($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '84' . substr($phone, 1);
        }

        if (substr($phone, 0, 2) !== '84') {
            $phone = '84' . $phone;
        }

        return $phone;
    }

    public function handle()
    {
        try {
            Log::info('Starting interview reminders...');

            $upcomingInterviews = Interview::with(['candidates.user', 'employer.user'])
                ->whereHas('candidates')
                ->where('start_time', '>', Carbon::now())
                ->where('reminder_sent', false)
                ->get();

            if ($upcomingInterviews->isEmpty()) {
                $this->info("No upcoming interviews found!");
                return;
            }

            foreach ($upcomingInterviews as $interview) {
                $this->info("Processing interview ID: " . $interview->id);

                // Gửi thông báo cho ứng viên
                foreach ($interview->candidates as $candidate) {
                    if ($candidate->user->phone) {
                        $formattedPhone = $this->formatPhone($candidate->user->phone);

                        $zaloData = [
                            'customer_name' => $candidate->user->name,
                            'title_interview' => $interview->title,
                            'time_interview' => $interview->start_time->format('H:i d/m/Y'),
                            'type_interview' => $interview->interview_type === 'online' ? 'Phỏng vấn online' : 'Phỏng vấn trực tiếp',
                            'code_interview' => (string)$interview->id
                        ];

                        if ($interview->interview_type === 'offline' && $interview->location) {
                            $zaloData['address_intervew'] = $interview->location;
                        }

                        $isOnline = $interview->interview_type === 'online';

                        $result = $this->zaloService->sendMessage(
                            $formattedPhone,
                            $zaloData,
                            $isOnline
                        );

                        $this->info("Sending Zalo message to candidate phone: " . $formattedPhone);
                    }
                }

                // Gửi thông báo cho nhà tuyển dụng
                if ($interview->employer && $interview->employer->user && $interview->employer->user->phone) {
                    $formattedPhone = $this->formatPhone($interview->employer->user->phone);

                    $zaloData = [
                        'customer_name' => $interview->employer->user->name,
                        'title_interview' => $interview->title,
                        'time_interview' => $interview->start_time->format('H:i d/m/Y'),
                        'type_interview' => $interview->interview_type === 'online' ? 'Phỏng vấn online' : 'Phỏng vấn trực tiếp',
                        'code_interview' => (string)$interview->id
                    ];

                    if ($interview->interview_type === 'offline' && $interview->location) {
                        $zaloData['address_intervew'] = $interview->location;
                    }

                    $isOnline = $interview->interview_type === 'online';

                    $result = $this->zaloService->sendMessage(
                        $formattedPhone,
                        $zaloData,
                        $isOnline
                    );

                    $this->info("Sending Zalo message to employer phone: " . $formattedPhone);
                }

                $interview->update(['reminder_sent' => true]);
            }

            $this->info("Interview reminders sent successfully!");

        } catch (\Exception $e) {
            Log::error('Error in SendInterviewReminders: ' . $e->getMessage());
            $this->error($e->getMessage());
            $this->error($e->getTraceAsString());
        }
    }
}
