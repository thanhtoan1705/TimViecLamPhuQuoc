<?php

namespace App\Filament\Resources\Admin\CV;

use App\Filament\Resources\Admin\CV\TemplateCVResource\Pages;
use App\Filament\Resources\Admin\CV\TemplateCVResource\RelationManagers;
use App\Models\CV\TemplateCV;
use App\Models\CvTemplate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TemplateCVResource extends Resource
{
    protected static ?string $model = CvTemplate::class;
    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'CV Management';
    protected static ?string $navigationLabel = 'Mẫu CV';
    protected static ?string $slug = 'cv';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Template CV')
                    ->tabs([
                        // Tab Thông tin cơ bản
                        Forms\Components\Tabs\Tab::make('Thông tin cơ bản')
                            ->schema([
                                Forms\Components\TextInput::make('template_name')
                                    ->label('Tên mẫu CV')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\FileUpload::make('template_image')
                                    ->label('Hình ảnh mẫu')
                                    ->image()
                                    ->directory('templates')
                                    ->required(),

                                Forms\Components\RichEditor::make('template_description')
                                    ->label('Mô tả')
                                    ->required(),

                                Forms\Components\Select::make('layout')
                                    ->label('Loại mẫu')
                                    ->options([
                                        'template1' => 'Template 1 - Professional',
                                        'template2' => 'Template 2 - Creative',
                                    ])
                                    ->required(),
                            ])->columns(2),

                        // Tab Cấu trúc CV
                        Forms\Components\Tabs\Tab::make('Cấu trúc CV')
                            ->schema([
                                Forms\Components\Repeater::make('sections')
                                    ->label('Các phần của CV')
                                    ->schema([
                                        Forms\Components\Grid::make(3)
                                            ->schema([
                                                Forms\Components\Select::make('id')
                                                    ->label('Phần')
                                                    ->options([
                                                        'personalInfo' => 'Thông tin cá nhân',
                                                        'careerObjective' => 'Mục tiêu nghề nghiệp',
                                                        'experience' => 'Kinh nghiệm làm việc',
                                                        'education' => 'Học vấn',
                                                        'skills' => 'Kỹ năng',
                                                        'projects' => 'Dự án',
                                                        'certificates' => 'Chứng chỉ',
                                                        'languages' => 'Ngoại ngữ',
                                                        'awards' => 'Giải thưởng',
                                                        'references' => 'Người tham chiếu',
                                                        'hobbies' => 'Sở thích',
                                                        'achievements' => 'Thành tích'
                                                    ])
                                                    ->required(),

                                                Forms\Components\Select::make('column')
                                                    ->label('Vị trí hiển thị')
                                                    ->options([
                                                        'header' => 'Phần đầu',
                                                        'sidebar' => 'Cột bên trái',
                                                        'main' => 'Cột chính',
                                                        'footer' => 'Phần cuối'
                                                    ])
                                                    ->required(),

                                                Forms\Components\TextInput::make('order')
                                                    ->label('Thứ tự')
                                                    ->numeric()
                                                    ->required(),
                                            ]),

                                        Forms\Components\Toggle::make('is_visible')
                                            ->label('Hiển thị')
                                            ->default(true),
                                    ])
                                    ->defaultItems(3)
                                    ->reorderable()
                                    ->collapsible(),
                            ]),

                        // Tab Trường thông tin
                        Forms\Components\Tabs\Tab::make('Trường thông tin')
                            ->schema([
                                Forms\Components\Repeater::make('fields')
                                    ->label('Các trường thông tin')
                                    ->relationship('fields')
                                    ->schema([
                                        Forms\Components\Grid::make(3)
                                            ->schema([
                                                Forms\Components\TextInput::make('fields_name')
                                                    ->label('Tên trường')
                                                    ->required(),

                                                Forms\Components\Select::make('fields_type')
                                                    ->label('Loại trường')
                                                    ->options([
                                                        'text' => 'Text ngắn',
                                                        'textarea' => 'Text dài',
                                                        'email' => 'Email',
                                                        'phone' => 'Số điện thoại',
                                                        'date' => 'Ngày tháng',
                                                        'url' => 'Link/URL',
                                                        'file' => 'File đính kèm',
                                                        'image' => 'Hình ảnh',
                                                        'select' => 'Lựa chọn',
                                                        'multiselect' => 'Nhiều lựa chọn'
                                                    ])
                                                    ->required(),

                                                Forms\Components\TextInput::make('order')
                                                    ->label('Thứ tự')
                                                    ->numeric()
                                                    ->required(),
                                            ]),

                                        Forms\Components\Grid::make(2)
                                            ->schema([
                                                Forms\Components\Toggle::make('is_required')
                                                    ->label('Bắt buộc')
                                                    ->default(true),

                                                Forms\Components\Toggle::make('is_visible')
                                                    ->label('Hiển thị')
                                                    ->default(true),
                                            ]),

                                        Forms\Components\Textarea::make('placeholder')
                                            ->label('Gợi ý nhập')
                                            ->rows(2),

                                        Forms\Components\Textarea::make('validation_rules')
                                            ->label('Quy tắc kiểm tra')
                                            ->placeholder('Ví dụ: required|min:3|max:255')
                                            ->rows(2),
                                    ])
                                    ->defaultItems(5)
                                    ->reorderable()
                                    ->collapsible(),
                            ]),

                        // Tab Tùy chỉnh giao diện
                        Forms\Components\Tabs\Tab::make('Tùy chỉnh giao diện')
                            ->schema([
                                Forms\Components\ColorPicker::make('primary_color')
                                    ->label('Màu chủ đạo'),

                                Forms\Components\ColorPicker::make('secondary_color')
                                    ->label('Màu phụ'),

                                Forms\Components\Select::make('font_family')
                                    ->label('Font chữ')
                                    ->options([
                                        'arial' => 'Arial',
                                        'roboto' => 'Roboto',
                                        'opensans' => 'Open Sans',
                                        'montserrat' => 'Montserrat'
                                    ]),

                                Forms\Components\Select::make('font_size')
                                    ->label('Cỡ chữ')
                                    ->options([
                                        'small' => 'Nhỏ',
                                        'medium' => 'Vừa',
                                        'large' => 'Lớn'
                                    ]),
                            ])->columns(2),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('template_image')
                    ->label('Hình ảnh'),

                Tables\Columns\TextColumn::make('template_name')
                    ->label('Tên mẫu')
                    ->searchable(),

                Tables\Columns\TextColumn::make('layout')
                    ->label('Loại mẫu'),

                Tables\Columns\TextColumn::make('fields_count')
                    ->label('Số trường')
                    ->counts('fields'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplateCVs::route('/'),
            'create' => Pages\CreateTemplateCV::route('/create'),
            'edit' => Pages\EditTemplateCV::route('/{record}/edit'),
        ];
    }
}
