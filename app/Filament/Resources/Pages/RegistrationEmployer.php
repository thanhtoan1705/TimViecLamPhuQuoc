<?php

namespace App\Filament\Resources\Pages;

use Database\Seeders\AssignEmployerPermissionsSeeder;
use Database\Seeders\RegisterEmployerPermissionsSeeder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class RegistrationEmployer extends Register
{
    protected ?string $maxWidth = '2xl';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Tài khoản')
                        ->schema([
                            $this->getNameFormComponent(),
                            $this->getEmailFormComponent(),
                        ]),
                    Wizard\Step::make('Công ty')
                        ->schema([
                            $this->getCompanyNameFormComponent(),
                            $this->getCompanyPhoneFormComponent(),
                            $this->getTaxCodeFormComponent(),
                            $this->getCompanyLogoFormComponent(),
                        ]),
                    Wizard\Step::make('Mật khẩu')
                        ->schema([
                            $this->getPasswordFormComponent(),
                            $this->getPasswordConfirmationFormComponent(),
                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                        wire:submit="register"
                    >
                        Đăng ký
                    </x-filament::button>
                    BLADE))),
            ]);
    }

    public function register(): ?RegistrationResponse
    {
        $data = $this->form->getState();

        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'employer', // Assign the employer role
        ]);

        // Handle the company logo upload
        $companyLogoPath = $data['employers']['company_logo'];
        if ($companyLogoPath instanceof \Illuminate\Http\UploadedFile) {
            $companyLogoPath = $companyLogoPath->store('images/employer', 'public'); // Store the file and get the path
        }

        $slugEmployer = $data['employers']['company_name'] .' '.$user->id;
        // Create the associated employer record
        Employer::create([
            'user_id' => $user->id,
            'company_name' => $data['employers']['company_name'],
            'company_logo' => $companyLogoPath,
            'slug' => Str::slug($slugEmployer),
            'tax_code' => $data['employers']['tax_code'],
            'company_phone' => $data['employers']['company_phone'],
        ]);

        auth()->login($user);

        // Chạy seeder AssignEmployerPermissionsSeeder
        // Phân quyền Employer cho người dùng vừa đăng ký
        (new RegisterEmployerPermissionsSeeder())->run($user->id);

        return app(RegistrationResponse::class);
    }

    protected function getFormActions(): array
    {
        return [];
    }

    protected function getCompanyNameFormComponent(): Component
    {
        return TextInput::make('employers.company_name')
            ->label(__('Tên công ty'))
            ->required()
            ->maxLength(255);
    }

    protected function getCompanyLogoFormComponent(): Component
    {
        return FileUpload::make('employers.company_logo')
            ->label(__('Logo công ty'))
            ->imageEditor()
            ->disk('public')
//            ->required()
            ->directory('images/employer')
            ->image();
    }

    protected function getTaxCodeFormComponent(): Component
    {
        return TextInput::make('employers.tax_code')
            ->label(__('Mã số thuế'))
            ->maxLength(255)
            ->required();
    }

    protected function getCompanyPhoneFormComponent(): Component
    {
        return TextInput::make('employers.company_phone')
            ->label(__('Số diện thoại'))
            ->maxLength(255)
            ->required();
    }
}

