<?php

namespace App\Filament\Auth;

use Filament\Pages\Auth\Login;
use Illuminate\Contracts\Support\Htmlable;

class EmployerLogin extends Login
{
    public function getHeading(): string|Htmlable
    {
        return __('Đăng nhập nhà tuyển dụng');
    }
}
