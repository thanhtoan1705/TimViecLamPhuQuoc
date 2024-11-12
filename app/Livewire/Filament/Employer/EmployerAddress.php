<?php

namespace App\Livewire\Filament\Employer;

use App\Models\District;
use App\Models\Employer;
use App\Models\Province;
use App\Models\Ward;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;


class EmployerAddress extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Model $employer;
    public ?array $address = null;

    protected static int $sort = 20;

    public static function getSort()
    {
        return static::$sort;
    }

    public function mount(): void
    {
        // Load employer and address
        $this->employer = Employer::with('address')->find(auth()->user()->employer->id);

        if ($this->employer->address) {
            $this->address = $this->employer->address->toArray();
        }

        // Fill form with employer and address data
        $this->form->fill(array_merge(
            $this->employer->toArray(),
            $this->address ?? []
        ));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông tin địa chỉ công ty')
                    ->aside()
                    ->description('Vui lòng cập nhật thông tin địa chỉ công ty')
                    ->schema([

                        Select::make('province_id')
                            ->label('Tỉnh/Thành phố')
                            ->options(Province::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $districts = District::where('province_id', $state)->pluck('name', 'id')->toArray();
                                $set('district_id', null);
                                $set('ward_id', null);
                                $set('district_options', $districts);
                            })
                            ->default($this->address['province_id'] ?? null),

                        Select::make('district_id')
                            ->label('Quận/Huyện')
                            ->options(fn($get) => District::where('province_id', $get('province_id'))->pluck('name', 'id')->toArray())
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $wards = Ward::where('district_id', $state)->pluck('name', 'id')->toArray();
                                $set('ward_id', null);
                                $set('ward_options', $wards);
                            })
                            ->default($this->address['district_id'] ?? null),

                        Select::make('ward_id')
                            ->label('Xã/Phường')
                            ->options(fn($get) => Ward::where('district_id', $get('district_id'))->pluck('name', 'id')->toArray())
                            ->required()
                            ->default($this->address['ward_id'] ?? null),

                        TextInput::make('street')
                            ->label('Địa chỉ')
                            ->maxLength(255)
                            ->default($this->address['street'] ?? ''),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('latitude')
                                    ->label('Vĩ độ')
                                    ->default($this->address['latitude'] ?? ''),
                                TextInput::make('longitude')
                                    ->label('Kinh độ')
                                    ->default($this->address['longitude'] ?? ''),
                            ]),

                        Placeholder::make('map')
                            ->label('Bản đồ')
                            ->view('livewire.admin.employer.map-component')
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Update employer address
        if ($this->employer->address) {
            $this->employer->address->update($data);
        } else {
            $this->employer->address()->create($data);
        }

        Notification::make()
            ->success()
            ->title('Cập nhật thông tin địa chỉ thành công')
            ->send();
    }

    public function render(): View
    {
        return view('livewire.filament.employer.employer-address');
    }




}
