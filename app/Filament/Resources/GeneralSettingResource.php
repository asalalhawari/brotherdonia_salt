<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralSettingResource\Pages;
use App\Models\GeneralSetting;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GeneralSettingResource extends Resource
{
    protected static ?string $model = GeneralSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'General Settings';
    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 20;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Currency')
                    ->label('Currency')
                    ->required(),


                Forms\Components\TextInput::make('about')
                    ->label('About')
                    ->required(),

                SpatieMediaLibraryFileUpload::make('about1')
                    ->label('About Image 1')
                    ->multiple()
                    ->collection('about_image_one'),

                SpatieMediaLibraryFileUpload::make('about2')
                    ->label('About Image 2')
                    ->multiple()
                    ->collection('about_image_tow'),
                    SpatieMediaLibraryFileUpload::make('about3')
                    ->label('About Image 3')
                    ->multiple()
                    ->collection('about_image_three'),
                    SpatieMediaLibraryFileUpload::make('about4')
                    ->label('About Image 4')
                    ->multiple()
                    ->collection('about_image_four'),
                    

                Forms\Components\TextInput::make('WhatsApp')
                    ->label('WhatsApp Number')
                    ->tel(),
                Forms\Components\Toggle::make('Coupon')
                    ->label('Enable Coupon')
                    ->required(),
                Forms\Components\Toggle::make('DeliveryFirstOrder')
                    ->label('Free Delivery on First Order')
                    ->required(),

                Forms\Components\Textarea::make('OrderMessage')
                    ->label('Order Message (Arabic)')
                    ->required(),
                Forms\Components\Textarea::make('OrderMessageEN')
                    ->label('Order Message (English)')
                    ->required(),
                Forms\Components\Textarea::make('Thanks')
                    ->label('Thank You Message (Arabic)')
                    ->required(),
                Forms\Components\Textarea::make('ThanksEN')
                    ->label('Thank You Message (English)')
                    ->required(),
                Forms\Components\TextInput::make('AppVersion')
                    ->label('Application Version')
                    ->required(),

                    Forms\Components\TextInput::make('title1')
                    ->label('Title 1')
                    ->required(),
                    Forms\Components\TextInput::make('des1')
                    ->label('Description 1')
                    ->required(),


                    Forms\Components\TextInput::make('title2')
                    ->label('Title 2')
                    ->required(),
                    Forms\Components\TextInput::make('des2')
                    ->label('Description 2')
                    ->required(),

                    Forms\Components\TextInput::make('title3')
                    ->label('Title 3')
                    ->required(),
                    Forms\Components\TextInput::make('des3')
                    ->label('Description 3')
                    ->required(),

                    Forms\Components\TextInput::make('facebook')
                    ->columnSpan(2)
                    ->required(),
                    Forms\Components\TextInput::make('tiktok')

                    ->columnSpan(2)
                    ->required(),
                    Forms\Components\TextInput::make('instagram')
                    ->columnSpan(2)
                    ->required(),
                    Forms\Components\TextInput::make('address')
                    ->columnSpan(2)
                    ->required(),
                    Forms\Components\TextInput::make('email')
                    ->columnSpan(2)
                    ->required(),
                    Forms\Components\TextInput::make('phone_number')
                    ->columnSpan(2)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Currency')->label('Currency'),
                Tables\Columns\TextColumn::make('Visitors')->label('Visitors'),
                Tables\Columns\TextColumn::make('WhatsApp')->label('WhatsApp Number'),
                Tables\Columns\IconColumn::make('Coupon')
                    ->label('Coupon Enabled')
                    ->boolean(),
                Tables\Columns\IconColumn::make('DeliveryFirstOrder')
                    ->label('Free Delivery on First Order')
                    ->boolean(),
                Tables\Columns\TextColumn::make('OrderTime')->label('Order Time'),
                Tables\Columns\TextColumn::make('AppVersion')->label('App Version'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // يمكنك إضافة علاقات أخرى هنا إذا كانت موجودة
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeneralSettings::route('/'),
            'create' => Pages\CreateGeneralSetting::route('/create'),
            'edit' => Pages\EditGeneralSetting::route('/{record}/edit'),
        ];
    }
}
