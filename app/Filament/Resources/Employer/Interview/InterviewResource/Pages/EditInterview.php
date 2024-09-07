<?php

namespace App\Filament\Resources\Employer\Interview\InterviewResource\Pages;

use App\Filament\Resources\Employer\Interview\InterviewResource;
use App\Models\Interview;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterview extends EditRecord
{
    protected static string $resource = InterviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ReplicateAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

//    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
//    {
//        $data = $this->form->getState();
//
//        // Lưu thông tin vào bảng interviews
//        $interview = Interview::updateOrCreate(
//            ['id' => $data['id'] ?? null],
//            array_merge($data, [
//                'job_post_candidates' => $data['job_post_candidates'] ?? [],
//            ])
//        );
//
//        // Lưu thông tin vào bảng candidate_interview
//        $interview->candidates()->sync($data['job_post_candidates'] ?? []);
//
//        // Gọi phương thức save() của lớp cha với các tham số
//        parent::save($shouldRedirect, $shouldSendSavedNotification);
//    }

//    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
//    {
//        $data = $this->form->getState();
//
//        // Lưu thông tin vào bảng interviews
//        $interview = Interview::updateOrCreate(
//            ['id' => $data['id'] ?? null],
//            array_merge($data, [
//                'job_post_candidates' => $data['job_post_candidates'] ?? [],
//            ])
//        );
//
//        // Lưu thông tin vào bảng candidate_interview
//        // Đảm bảo rằng $data['job_post_candidates'] chỉ chứa các giá trị integer
//        $interview->candidates()->sync(array_map('intval', $data['job_post_candidates'] ?? []));
//
//        // Gọi phương thức save() của lớp cha với các tham số
//        parent::save($shouldRedirect, $shouldSendSavedNotification);
//    }

//    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
//    {
//        $data = $this->form->getState();
//
//        // Chuyển đổi job_post_candidates từ JSON thành mảng số nguyên
//        $candidates = array_map('intval', $data['job_post_candidates'] ?? []);
//
//        // Lưu thông tin vào bảng interviews
//        $interview = Interview::updateOrCreate(
//            ['id' => $data['id'] ?? null],
//            array_merge($data, [
//                'job_post_candidates' => $candidates, // Lưu mảng các ứng viên dưới dạng JSON
//            ])
//        );
//
//        // Lưu thông tin vào bảng candidate_interview
//        $interview->candidates()->sync($candidates);
//
//        // Gọi phương thức save() của lớp cha với các tham số
//        parent::save($shouldRedirect, $shouldSendSavedNotification);
//    }

//    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
//    {
//        $data = $this->form->getState();
//
//        // Log the job_post_candidates to check its content
//        \Log::info('Job Post Candidates:', ['candidates' => $data['job_post_candidates']]);
//
//        // Chuyển đổi job_post_candidates từ JSON thành mảng số nguyên
//        $candidates = array_map('intval', $data['job_post_candidates'] ?? []);
//
//        // Lưu thông tin vào bảng interviews
//        $interview = Interview::updateOrCreate(
//            ['id' => $data['id'] ?? null],
//            array_merge($data, [
//                'job_post_candidates' => $candidates, // Lưu mảng các ứng viên dưới dạng JSON
//            ])
//        );
//
//        // Lưu thông tin vào bảng candidate_interview
//        $interview->candidates()->sync($candidates);
//
//        // Gọi phương thức save() của lớp cha với các tham số
//        parent::save($shouldRedirect, $shouldSendSavedNotification);
//    }



}
