<?php

namespace App\Filament\Resources\Admin\CV;

use App\Filament\Resources\Admin\CV\TemplateCVResource\Pages;
use App\Filament\Resources\Admin\CV\TemplateCVResource\RelationManagers;
use App\Models\CV\TemplateCV;
use App\Models\CvTemplate;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Services\TemplateService;

class TemplateCVResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = CvTemplate::class;
    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'CV Management';
    protected static ?string $navigationLabel = 'Mẫu CV';
    protected static ?string $slug = 'cv';

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
                Forms\Components\Section::make('Thông tin mẫu CV')
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

                        Forms\Components\Select::make('template_content')
                            ->label('Chọn mẫu')
                            ->options(function() {
                                return TemplateService::getAvailableTemplates();
                            })
                            ->required(),
                    ])->columns(2)
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

                Tables\Columns\TextColumn::make('template_id')
                    ->label('Loại mẫu')
                    ->formatStateUsing(fn (string $state): string =>
                        $state === '1' ? 'Template 1 - Professional' : 'Template 2 - Creative'
                    ),

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
