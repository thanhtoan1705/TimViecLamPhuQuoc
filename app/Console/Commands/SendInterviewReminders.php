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
                    $this->info("Sending reminder to candidate: " . $candidate->user->email);

                    // Gửi email
                    Mail::to($candidate->user->email)
                        ->send(new InterviewReminder($interview, $candidate));

                    // Format dữ liệu cho Zalo
                    $zaloData = [
                        'customer_name' => $candidate->user->name,
                        'title_interview' => $interview->title,
                        'time_interview' => $interview->start_time->format('H:i d/m/Y'),
                        'type_interview' => $interview->interview_type === 'online' ? 'Phỏng vấn online' : 'Phỏng vấn trực tiếp',
                        'code_interview' => (string)$interview->id
                    ];

                    // Thêm địa chỉ nếu là phỏng vấn offline
                    if ($interview->interview_type === 'offline' && $interview->location) {
                        $zaloData['address_intervew'] = $interview->location;
                    }

                    $isOnline = $interview->interview_type === 'online';

                    // Gửi tin nhắn
                    $result = $this->zaloService->sendMessage(
                        '84932995604',
                        $zaloData,
                        $isOnline
                    );

                    if ($result) {
                        $this->info("Zalo message sent successfully!");
                    } else {
                        $this->error("Failed to send Zalo message!");
                    }

                    Log::info('Sent reminders to candidate: ' . $candidate->user->email);
                    sleep(1);
                }

                // Gửi thông báo cho nhà tuyển dụng
                if ($interview->employer && $interview->employer->user) {
                    $this->info("Sending reminder to employer: " . $interview->employer->user->email);

                    Mail::to($interview->employer->user->email)
                        ->send(new EmployerInterviewReminder($interview));

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
                        '84932995604',
                        $zaloData,
                        $isOnline
                    );

                    if ($result) {
                        $this->info("Zalo message to employer sent successfully!");
                    } else {
                        $this->error("Failed to send Zalo message to employer!");
                    }
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
