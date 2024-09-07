<?php

namespace App\Filament\Resources\Employer\Interview\InterviewResource\Pages;

use App\Filament\Resources\Employer\Interview\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Interview;

class CreateInterview extends CreateRecord
{
    protected static string $resource = InterviewResource::class;


    protected function save(): void
    {
        $data = $this->form->getState();

        // Lưu thông tin vào bảng interviews
        $interview = Interview::updateOrCreate(
            ['id' => $data['id'] ?? null],
            array_merge($data, [
                'job_post_candidates' => $data['job_post_candidates'] ?? [],
            ])
        );

        // Lưu thông tin vào bảng candidate_interview
        $interview->candidates()->sync($data['job_post_candidates'] ?? []);

        parent::save(); // Gọi phương thức save() của lớp cha nếu cần thiết
    }
}
