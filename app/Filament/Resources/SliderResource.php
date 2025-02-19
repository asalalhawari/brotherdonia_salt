<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slide;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class SliderResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationLabel = 'Sliders';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 22;

    public static function form(Form $form): Form
    {   
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required(),
            Forms\Components\TextInput::make('url')
                ->label('Text')
                ->nullable(),
            Forms\Components\TextInput::make('index')
                ->label('Order Index')
                ->numeric()
                ->default(0)
                ->required(),
            SpatieMediaLibraryFileUpload::make('image')
                ->collection('slider')
                ->multiple() // السماح برفع أكثر من صورة
                ->enableReordering() // تمكين إعادة الترتيب
                ->preserveFilenames() // الحفاظ على أسماء الملفات الأصلية
                ->enableOpen() // تمكين عرض الصورة عند النقر عليها
                ->enableDownload() // تمكين تحميل الصور
                ->imageEditor() // تمكين تعديل الصور داخل Filament
                ->label('Slider Images')
                ->afterStateUpdated(function ($state, $set) {
                    // إضافة تحويلات عند تحميل الصورة
                    if ($state) {
                        $state->each(function ($file) {
                            $file->addMediaConversion('full')
                                ->width(1920)  // تحديد العرض
                                ->height(1080) // تحديد الارتفاع
                                ->sharpen(10)  // تعيين الحدة
                                ->performOnCollections('slider');
                        });
                    }
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title')->searchable(),
                Tables\Columns\TextColumn::make('url')->label('URL'),
                Tables\Columns\TextColumn::make('index')->label('Order Index')->sortable(),
                SpatieMediaLibraryImageColumn::make('image')->collection('slider'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
