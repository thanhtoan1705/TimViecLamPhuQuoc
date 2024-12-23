<?php

namespace App\Filament\Resources\Admin\Founder;

use App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\CreateCandidate;
use App\Filament\Resources\Admin\Founder\FounderResource\Pages;
use App\Models\Degree;
use App\Models\District;
use App\Models\Experience;
use App\Models\Founder;
use App\Models\Major;
use App\Models\Province;
use App\Models\Salary;
use App\Models\Ward;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FounderResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Founder::class;

    protected static ?string $slug = 'founders';
    protected static ?string $modelLabel = 'Nhà sáng lập';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Nhà sáng lập';
    protected static ?string $navigationGroup = 'Cấu hình chung';
    protected static ?int $navigationSort = 2;

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)
                            ->schema([

                                Section::make('Thông tin tài khoản')
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(100)
                                            ->label('Họ và tên'),

                                        TextInput::make('position')
                                            ->required()
                                            ->maxLength(100)
                                            ->label('Chức vụ'),

                                        TextInput::make('address')
                                            ->required()
                                            ->maxLength(20)
                                            ->label('Địa chỉ'),

                                        RichEditor::make('bio')
                                            ->label('Giới thiệu'),


                                        TextInput::make('github')
                                            ->label('Github')
                                            ->maxLength(100),

                                        TextInput::make('linkedin')
                                            ->label('Linkedin')
                                            ->maxLength(100),

                                        TextInput::make('facebook')
                                            ->label('Facebook')
                                            ->maxLength(100),
                                        TextInput::make('instagram')
                                            ->label('Instagram')
                                            ->maxLength(100),

                                        TextInput::make('twitter')
                                            ->label('Twitter - X')
                                            ->maxLength(100),

                                        TextInput::make('tiktok')
                                            ->label('Tiktok')
                                            ->maxLength(100),


                                    ]),


                            ])->columnSpan(2),

                        Grid::make(1)
                            ->schema([

                                Section::make('Hình ảnh đại diện')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Chọn ảnh định dang png, jpg, jpeg')
                                            ->image()
                                            ->required()
                                            ->disk('public')
                                            ->directory('images/founders')
                                            ->reorderable()
                                            ->preserveFilenames()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, $record, callable $get): string {
                                                // Lấy giá trị của `title` từ form, mặc định là 'du-an' nếu không có
                                                $title = $get('name') ?? 'founder';
                                                $slug = Str::slug($title);

                                                // Đổi tên file với tiền tố slug và chuỗi ngẫu nhiên
                                                return $slug . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                                            })
                                            // Xóa ảnh sau khi xóa sản phẩm
                                            ->deleteUploadedFileUsing(function ($file) {
                                                if ($file instanceof TemporaryUploadedFile) {
                                                    Storage::disk('public')->delete($file->getPathname());
                                                } elseif (is_string($file)) {
                                                    Storage::disk('public')->delete($file);
                                                }
                                            }),

                                    ]),

                                Section::make('Hiển thị')
                                    ->schema([
                                        Toggle::make('status')
                                            ->label('Kích hoạt'),
                                    ]),

                                Section::make('Thời gian')
                                    ->schema([
                                        Placeholder::make('created_at')
                                            ->label('Thời gian tạo')
                                            ->content(fn($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),

                                        Placeholder::make('updated_at')
                                            ->label('Thời gian cập nhật mới nhất')
                                            ->content(fn($record) => $record ? $record->updated_at->format('d/m/Y H:i:s') : '-'),

                                    ]),




                            ])->columnSpan(1),

                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->defaultImageUrl(asset('default/user.png'))
                    ->label('Avatar'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Họ tên')->limit(20),
                Tables\Columns\TextColumn::make('position')
                    ->label('Chức vụ')->limit(20),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFounders::route('/'),
            'create' => Pages\CreateFounder::route('/create'),
            'edit' => Pages\EditFounder::route('/{record}/edit'),
        ];
    }
}
