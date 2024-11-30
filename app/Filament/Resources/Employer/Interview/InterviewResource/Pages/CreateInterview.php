<?php

namespace App\Filament\Resources\Employer\Interview\InterviewResource\Pages;

use App\Filament\Resources\Employer\Interview\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Interview;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewInvitation;
use App\Services\ZoomService;

class CreateInterview extends CreateRecord
{
    protected static string $resource = InterviewResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['employer_id'] = auth()->user()->employer->id;

        if ($data['interview_type'] === 'online') {
            $zoomService = app(ZoomService::class);

            try {
                $meetingData = [
                    'topic' => $data['title'],
                    'type' => 2,
                    'start_time' => $data['start_time'],
                    'duration' => $data['duration'],
                    'timezone' => 'Asia/Ho_Chi_Minh',
                ];

                $zoomMeeting = $zoomService->createMeeting($meetingData);

                $data['zoom_meeting_id'] = $zoomMeeting['id'];
                $data['zoom_password'] = $zoomMeeting['password'];
                $data['zoom_join_url'] = $zoomMeeting['join_url'];
                $data['zoom_start_url'] = $zoomMeeting['start_url'];
            } catch (\Exception $e) {
                \Log::error('Zoom Meeting Creation Error: ' . $e->getMessage());
            }
        }

        \Log::info('Interview Create Data:', $data);

        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;

        if (!$record->employer_id) {
            $record->employer_id = auth()->user()->employer->id;
            $record->save();
        }

        if (isset($this->data['job_post_candidates'])) {
            $record->candidates()->sync($this->data['job_post_candidates']);
        }

        if ($record->interview_type === 'online') {
            foreach ($record->candidates as $candidate) {
                Mail::to($candidate->user->email)->send(new InterviewInvitation($record));
            }
        }
    }
}
