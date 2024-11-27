<?php
//
//namespace App\Filament\Resources\Admin\CV;
//
//use App\Filament\Components\ImageUploadComponent;
//use App\Filament\Resources\Admin\CV\CvTemplateResource\Pages;
//use App\Filament\Resources\Admin\CV\CvTemplateResource\RelationManagers;
//use App\Models\CvTemplate;
//use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
//use Filament\Forms;
//use Filament\Forms\Components\Hidden;
//use Filament\Forms\Form;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Table;
//use FilamentTiptapEditor\TiptapEditor;
//
//
//class CvTemplateResource extends Resource implements HasShieldPermissions
//{
//    protected static ?string $model = CvTemplate::class;
//
//    protected static ?string $slug = 'cv-templates';
//
//    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
//
//    protected static ?string $navigationLabel = 'Mẫu CV';
//
//    protected static ?string $modelLabel = 'Mẫu CV';
//
//    protected static ?string $navigationGroup = 'CV';
//
//    public static function getPermissionPrefixes(): array
//    {
//        return [
//            'view',
//            'view_any',
//            'create',
//            'update',
//            'delete',
//            'delete_any',
//        ];
//    }
//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                Forms\Components\Card::make()
//                ->schema([
//                    Forms\Components\Grid::make(2)
//                    ->schema([
//                        Forms\Components\TextInput::make('template_name')
//                            ->required()
//                            ->maxLength(220)
//                            ->label('Tên mẫu CV')
//                            ->columnSpan(2),
//
//
//                        ImageUploadComponent::make(
//                            'template_image',
//                            'template_name',
//                            'cv',
//                            'images/cv',
//                            'Hình ảnh mẫu CV'
//                        )->required()
//                        ->columnSpan(1),
//
//                        Forms\Components\Textarea::make('template_description')
//                            ->label('Mô tả mẫu CV')
//                            ->rows(3)
//                            ->columnSpan(1),
//                    ]),
//
//                    Forms\Components\Grid::make(1)
//                    ->schema([
//                        TiptapEditor::make('template_content_display')
//                            ->label('Nội dung mẫu CV')
//                            ->profile('default')
//                            ->tools([
//                                'bold',
//                                'italic',
//                                'strike',
//                                'underline',
//                                'link',
//                            ])
//                            ->hint('Bạn có thể sử dụng các công cụ định dạng để tạo CV chuyên nghiệp.')
//                            ->required(),
//                        Hidden::make('template_content'),
//                    ]),
//                ])
//                    ->columnSpan(2)
//            ])
//            ->columns(2);
//    }
//
//    public static function table(Table $table): Table
//    {
//        return $table
//            ->columns([
//                Tables\Columns\TextColumn::make('template_name')->label('Tên mẫu CV'),
//                Tables\Columns\ImageColumn::make('template_image')->label('Hình ảnh')->size(50),
//                Tables\Columns\TextColumn::make('template_description')->label('Mô tả'),
//                Tables\Columns\TextColumn::make('created_at')->label('Ngày tạo')->dateTime(),
//            ])
//            ->filters([
//                //
//            ])
//            ->actions([
//                Tables\Actions\ActionGroup::make([
//                    Tables\Actions\EditAction::make(),
//                    Tables\Actions\DeleteAction::make(),
//                    // Tables\Actions\Action::make('preview')
//                    //     ->label('Xem trước')
//                    //     ->url(fn ($record) => route('client.cv.preview', ['cvTemplate' => $record->id]))
//                    //     ->openUrlInNewTab(),
//                ])
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ]);
//    }
//
//    public static function getRelations(): array
//    {
//        return [
//            //
//        ];
//    }
//
//    public static function getPages(): array
//    {
//        return [
//            'index' => Pages\ListCvTemplates::route('/'),
//            'create' => Pages\CreateCvTemplate::route('/create'),
//            'edit' => Pages\EditCvTemplate::route('/{record}/edit'),
//        ];
//    }
//}
