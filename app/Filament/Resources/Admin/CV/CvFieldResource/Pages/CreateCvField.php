<?php

namespace App\Filament\Resources\Admin\CV\CvFieldResource\Pages;

use App\Filament\Resources\Admin\CV\CvFieldResource;
use App\Models\CvField;
use Filament\Resources\Pages\CreateRecord;
use Flasher\Prime\FlasherInterface; // Thay đổi lớp này

class CreateCvField extends CreateRecord
{
    protected static string $resource = CvFieldResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    public function create(bool $another = false): void
    {
        // Lấy dữ liệu từ form
        $data = $this->data;

        // Tạo bản ghi CvField mới với template_id
        foreach ($data['cv_fields'] as $field) {
            if (!empty($field['fields_name']) && !empty($field['fields_type'])) {
                CvField::create([
                    'fields_name' => $field['fields_name'],
                    'fields_type' => $field['fields_type'],
                    'template_id' => $data['template_id'],
                ]);
            }
        }

        // Hiển thị thông báo thành công
        app(FlasherInterface::class)->addSuccess('Thêm thành công');

        // Chuyển hướng về trang danh sách
        $this->redirect(CvFieldResource::getUrl('index'));
    }
}
