<?php

namespace App\Filament\Resources\Admin\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Admin\JobPost\JobPostResource;
use App\Models\BenefitJob;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EditJobPost extends EditRecord
{
    protected static string $resource = JobPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make('view_live')
                ->label('Xem thực tế')
                ->url(fn ($record) => route('client.job.single', ['jobSlug' => $record->slug])) // Tạo URL dựa vào slug của công việc
                ->icon('heroicon-o-link')
                ->openUrlInNewTab()
                ->color('primary'),
        ];
    }

    public function mutateFormDataBeforeSave(array $data): array
    {

        // Lấy thông tin JobPost (nếu có)
        $jobPost = $this->record;

        // Kiểm tra xem JobPost có đang liên kết với một BenefitJob không
        $benefitJob = $jobPost->benefitJob ?? new BenefitJob();

        // Danh sách các trường boolean cần cập nhật
        $booleanFields = [
            'insurance', 'annual_leave', 'uniform', 'salary_increase', 'bonus',
            'training', 'allowance', 'laptop', 'business_trip', 'travel',
            'seniority_allowance', 'healthcare', 'shuttle_bus', 'sports_club', 'international_travel'
        ];

        // Cập nhật các trường boolean
        foreach ($booleanFields as $field) {
            $benefitJob->{$field} = (bool) ($data['benefitJob'][$field] ?? false);
        }

        // Cập nhật trường mô tả dưới dạng TEXT
        $benefitJob->description = (string) ($data['benefitJob']['description'] ?? null);

        // Lưu BenefitJob (Nếu là bản ghi mới thì tạo mới, nếu không thì cập nhật)
        $benefitJob->save();

        // Cập nhật benefit_job_id cho JobPost
        $jobPost->benefit_job_id = $benefitJob->id;
        $jobPost->save();

        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Lấy đối tượng BenefitJob từ JobPost (hoặc mô hình hiện tại)
        $benefitJob = $this->record->benefitJob;

        // Các trường boolean cần xử lý
        $booleanFields = [
            'insurance', 'annual_leave', 'uniform', 'salary_increase', 'bonus',
            'training', 'allowance', 'laptop', 'business_trip', 'travel',
            'seniority_allowance', 'healthcare', 'shuttle_bus', 'sports_club', 'international_travel'
        ];

        // Kiểm tra xem benefitJob có tồn tại không
        if ($benefitJob) {
            foreach ($booleanFields as $field) {
                $data['benefitJob'][$field] = (bool) $benefitJob->{$field}; // Kiểu boolean
            }

            // Trường description là kiểu TEXT
            $data['benefitJob']['description'] = (string) $benefitJob->description; // Kiểu TEXT
        } else {
            // Nếu benefitJob không tồn tại, gán giá trị mặc định
            $data['benefitJob'] = array_fill_keys($booleanFields, false); // Gán tất cả các trường boolean là false
            $data['benefitJob']['description'] = ''; // Trường description là chuỗi rỗng
        }

        return $data;
    }
}
