<?php

namespace App\Filament\Resources\Employer\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Employer\JobPost\JobPostResource;
use App\Models\BenefitJob;
use App\Models\JobPost;
use App\Models\UserJobPackage;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Support\Enums\IconPosition;
use Filament\Actions;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;


    // Tạo slug
    public function mutateFormDataBeforeCreate(array $data): array
    {


        $employer = Auth::user()->employer;


        // Kiểm tra nếu không phải nhà tuyển dụng
        if (!$employer) {
            abort(403, 'Bạn không phải nhà tuyển dụng.');
        }

        // Gọi hàm kiểm tra và xử lý lượt đăng bài
        $this->handleJobPostQuota($employer);



        $companyName = Auth::user()->employer->company_name;

        //Id của jobpost
        $maxId = JobPost::max('id');
        $id = $maxId + 1;

        // Tạo slug trước khi tạo bản ghi mới
        $data['slug'] = Str::slug($companyName . '-tuyen-dung-' . $data['title']. '-'. $id);

        //SEO
        $data['meta_title'] = $data['title'];
        $data['meta_keyword'] = limit_text($data['description'], 200);
        $data['meta_description'] = limit_text($data['description'], 200);

        // Chế độ phúc lợi

            $benefitJob = BenefitJob::create([
                'insurance' => $data['benefitJob']['insurance'],
                'annual_leave' => $data['benefitJob']['annual_leave'],
                'uniform' => $data['benefitJob']['uniform'],
                'salary_increase' => $data['benefitJob']['salary_increase'],
                'bonus' => $data['benefitJob']['bonus'],
                'training' => $data['benefitJob']['training'],
                'allowance' => $data['benefitJob']['allowance'] ?? false,
                'laptop' => $data['benefitJob']['laptop'] ?? false,
                'business_trip' => $data['benefitJob']['business_trip'] ?? false,
                'travel' => $data['benefitJob']['travel'] ?? false,
                'seniority_allowance' => $data['benefitJob']['seniority_allowance'] ?? false,
                'healthcare' => $data['benefitJob']['healthcare'] ?? false,
                'shuttle_bus' => $data['benefitJob']['shuttle_bus'] ?? false,
                'sports_club' => $data['benefitJob']['sports_club'] ?? false,
                'international_travel' => $data['benefitJob']['international_travel'] ?? false,
                'description' => $data['benefitJob']['description'] ?? null,

            ]);

        $data['benefit_job_id'] = $benefitJob->id;



        return $data;
    }


    /**
     * Kiểm tra và xử lý lượt đăng bài.
     *
     * @param Employer $employer
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    protected function handleJobPostQuota($employer)
    {
        // Kiểm tra lượt đăng miễn phí hôm nay
        $today = now()->toDateString();
        $freePostToday = JobPost::where('employer_id', $employer->id)
            ->whereDate('created_at', $today)
            ->exists();

        // Nếu không sử dụng lượt miễn phí hôm nay
        if ($freePostToday) {
            // Lấy tất cả các gói hợp lệ
            $jobPackages = UserJobPackage::where('employer_id', $employer->id)
                ->where('expires_at', '>=', now())
                ->where('remaining_posts', '>', 0)
                ->get();

            // Tìm gói có số bài đăng còn lại nhiều nhất
            $availablePackage = $jobPackages->sortByDesc('remaining_posts')->first();

            // Nếu có gói hợp lệ, trừ remaining_posts
            if ($availablePackage) {
                $availablePackage->remaining_posts -= 1;
                $availablePackage->save();
            } else {
                // Nếu không còn gói hợp lệ và không có lượt miễn phí, báo lỗi

                abort(403, 'Bạn đã sử dụng hết lượt đăng tin miễn phí hôm nay và không còn gói hợp lệ.');
            }
        }
    }

    /**
     * Kiểm tra trạng thái lượt đăng tin miễn phí và gói đăng tin
     *
     * Hàm này kiểm tra xem nhà tuyển dụng có thể tạo bài đăng hay không,
     * dựa trên các điều kiện:
     * - Nhà tuyển dụng còn gói đăng tin hợp lệ (còn hạn và số lượt đăng > 0).
     * - Nhà tuyển dụng chưa sử dụng lượt đăng tin miễn phí trong ngày hôm nay.
     *
     * @return bool
     */
    protected function canCreatePost(): bool
    {
        $user = Auth::user();
        $employer = $user->employer;

        // Lấy tất cả các gói còn hạn và có remaining_posts > 0
        $jobPackages = UserJobPackage::where('employer_id', $employer->id)
            ->where('expires_at', '>=', now())
            ->where('remaining_posts', '>', 0)
            ->exists();

        // Kiểm tra lượt đăng miễn phí trong ngày
        $today = now()->toDateString();
        $freePostToday = JobPost::where('employer_id', $employer->id)
            ->whereDate('created_at', $today)
            ->exists();

        // Có gói hợp lệ hoặc chưa dùng bài đăng miễn phí hôm nay
        return $jobPackages || !$freePostToday;
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Tạo bài đăng')
            ->icon('heroicon-o-folder-plus')
            ->iconPosition(IconPosition::Before)
            ->hidden(!$this->canCreatePost());
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->icon('heroicon-o-plus-circle')
            ->iconPosition(IconPosition::Before)
            ->hidden(!$this->canCreatePost());
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->icon('heroicon-o-arrow-left')
            ->hidden(!$this->canCreatePost());
    }


    /**
     * Kiểm tra trang thái lượt đăng  tin miễn phí và gói đăng tin
     *
     */
//    protected function getCreateFormAction(): Action
//    {
//        $user = Auth::user();
//        $employer = $user->employer;
//
//        // Lấy tất cả các gói còn hạn và có remaining_posts > 0
//        $jobPackages = UserJobPackage::where('employer_id', $employer->id)
//            ->where('expires_at', '>=', now())
//            ->where('remaining_posts', '>', 0)
//            ->get();
//
//        // Kiểm tra lượt đăng miễn phí trong ngày
//        $today = now()->toDateString();
//        $freePostToday = JobPost::where('employer_id', $employer->id)
//            ->whereDate('created_at', $today)
//            ->exists();
//
//
//        // Kiểm tra nếu có ít nhất một gói hợp lệ
//        if ($jobPackages->isNotEmpty()) {
//            // Tìm gói có số bài đăng còn lại nhiều nhất
//            $availablePackage = $jobPackages->sortByDesc('remaining_posts')->first();
//
//            // Nếu có gói và còn bài đăng trong gói, hiển thị form tạo bài đăng
//            if ($availablePackage && $availablePackage->remaining_posts > 0) {
//                return parent::getCreateFormAction()
//                    ->label('Tạo bài đăng')
//                    ->icon('heroicon-o-folder-plus')
//                    ->iconPosition(IconPosition::Before);
//            }
//        }
//
//        // Nếu không còn gói hợp lệ và chưa sử dụng bài đăng miễn phí hôm nay
//        if (!$freePostToday) {
//            return parent::getCreateFormAction()
//                ->label('Tạo bài đăng')
//                ->icon('heroicon-o-folder-plus')
//                ->iconPosition(IconPosition::Before);
//        } else {
//            // Nếu không còn lượt đăng miễn phí và chưa có gói, yêu cầu mua gói
//            return parent::getCreateFormAction()
//                ->label('Tạo bài đăng')
//                ->icon('heroicon-o-folder-plus')
//                ->iconPosition(IconPosition::Before)->hidden();
//        }
//    }
//
//
//    protected function getCreateAnotherFormAction(): Action
//    {
//        $user = Auth::user();
//        $employer = $user->employer;
//
//        // Lấy tất cả các gói còn hạn và có remaining_posts > 0
//        $jobPackages = UserJobPackage::where('employer_id', $employer->id)
//            ->where('expires_at', '>=', now())
//            ->where('remaining_posts', '>', 0)
//            ->get();
//
//        // Kiểm tra lượt đăng miễn phí trong ngày
//        $today = now()->toDateString();
//        $freePostToday = JobPost::where('employer_id', $employer->id)
//            ->whereDate('created_at', $today)
//            ->exists();
//
//
//        // Kiểm tra nếu có ít nhất một gói hợp lệ
//        if ($jobPackages->isNotEmpty()) {
//            // Tìm gói có số bài đăng còn lại nhiều nhất
//            $availablePackage = $jobPackages->sortByDesc('remaining_posts')->first();
//
//            // Nếu có gói và còn bài đăng trong gói, hiển thị form tạo bài đăng
//            if ($availablePackage && $availablePackage->remaining_posts > 0) {
//                return parent::getCreateAnotherFormAction()
//                    ->icon('heroicon-o-plus-circle')
//                    ->iconPosition(IconPosition::Before);
//            }
//        }
//
//        // Nếu không còn gói hợp lệ và chưa sử dụng bài đăng miễn phí hôm nay
//        if (!$freePostToday) {
//            return parent::getCreateAnotherFormAction()
//                ->icon('heroicon-o-plus-circle')
//                ->iconPosition(IconPosition::Before);
//        } else {
//            // Nếu không còn lượt đăng miễn phí và chưa có gói, yêu cầu mua gói
//            return parent::getCreateAnotherFormAction()
//                ->icon('heroicon-o-plus-circle')
//                ->iconPosition(IconPosition::Before)->hidden();
//        }
//    }




    // Customise the "Create & Create Another" button
//    protected function getCreateAnotherFormAction(): Action
//    {
//        return parent::getCreateAnotherFormAction()
//            ->icon('heroicon-o-plus-circle')
//            ->iconPosition(IconPosition::Before);
//    }

    // Customise the "Cancel" button
//    protected function getCancelFormAction(): Action
//    {
//        return parent::getCancelFormAction()
//            ->icon('heroicon-o-arrow-left');
//    }

}
