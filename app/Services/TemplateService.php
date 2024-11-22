<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class TemplateService
{
    public static function getAvailableTemplates(): array
    {
        $templatesPath = resource_path('js/components/templates');
        $templates = [];

        // Quét thư mục templates
        if (File::isDirectory($templatesPath)) {
            $directories = File::directories($templatesPath);

            foreach ($directories as $directory) {
                $templateName = basename($directory);
                if (preg_match('/Template(\d+)/', $templateName, $matches)) {
                    $templateId = $matches[1];
                    // Đọc tên template từ file hoặc sử dụng tên mặc định
                    $templates[$templateId] = "Template {$templateId} - " . self::getTemplateName($templateId);
                }
            }
        }

        return $templates;
    }

    private static function getTemplateName(string $templateId): string
    {
        return match($templateId) {
            '1' => 'Professional',
            '2' => 'Creative',
            default => 'Custom Template'
        };
    }
} 
