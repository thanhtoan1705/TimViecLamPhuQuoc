<?php

namespace App\Filament\Resources\Admin\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Admin\JobPost\JobPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;
}
