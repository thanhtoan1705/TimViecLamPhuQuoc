<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidateStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $record;

    public function __construct($record)
    {
        $this->record = $record;
    }

    public function build()
    {
        return $this->subject('Cập nhật tình trạng hồ sơ')
            ->view('emails.candidate_status')
            ->with([
                'candidateName' => $this->record->candidate->user->name,
                'status' => $this->getStatusLabel(),
                'employerName' => $this->record->jobpost->employer->user->name ?? '',
                'companyName' => $this->record->jobpost->employer->company_name ?? '',
                'companyAddress' => $this->record->jobpost->address->street ?? '',
                'companyEmail' => $this->record->jobpost->employer->user->email ?? '',
                'jobPosition' => $this->record->jobpost->title ?? '',
            ]);
    }

    private function getStatusLabel()
    {
        $statusOptions = [
            '1' => 'Phỏng vấn',
            '2' => 'Trúng tuyển',
            '3' => 'Từ chối',
        ];

        return $statusOptions[$this->record->status] ?? 'Chưa xác định';
    }
}
