<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 25;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->rule(fn($get) => $get('id') == null ? 'unique:users,email' : '')
                    ->label('Email'),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->rule(fn($get) => $get('id') == null ? 'unique:users,phone' : '')
                    ->label('Phone'),
                Forms\Components\Select::make('gender')
                    ->options([
                        0 => 'Male',
                        1 => 'Female',
                    ])
                    ->required()
                    ->label('Gender'),
                // Using Select Component for roles
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                Forms\Components\DatePicker::make('BirthDate')
                    ->label('Birth Date'),
                SpatieMediaLibraryFileUpload::make('avatar')
                    ->collection('avatar'),
                Forms\Components\DateTimePicker::make('LastSeenAt')
                    ->label('Last Seen At')
                    ->disabled(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => !empty($state)) 
                    ->placeholder('Leave empty to unchange password')
                    ->label('Password'),
                Forms\Components\Hidden::make('CustomerID')
                    ->default(null),
                Forms\Components\Hidden::make('ZoneID')
                    ->default(null),
                // Adding Country field
                Forms\Components\Select::make('country')
                    ->options([
                        'EG' => 'مصر',
                        'US' => 'الولايات المتحدة',
                        'SA' => 'السعودية',
                        'AE' => 'الإمارات',
                        'JO' => 'الأردن',
                    ])
                    ->required()
                    ->label('Country'),
                // Adding Currency field
                Forms\Components\Select::make('currency')
                    ->options([
                        'EGP' => 'جنيه مصري',
                        'USD' => 'دولار أمريكي',
                        'SAR' => 'ريال سعودي',
                        'AED' => 'درهم إماراتي',
                        'JOD' => 'دينار أردني',
                    ])
                    ->required()
                    ->label('Currency'),
                // Adding Branch ID field
                Select::make('branch_id')
                    ->relationship('branch', 'AddresAr'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('avatar')->collection('avatar'),
                Tables\Columns\TextColumn::make('name')->label('Name')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Phone')->searchable(),
                Tables\Columns\TextColumn::make('gender')->label('Gender'),
            ])
            ->filters([/* your filters */])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [ /* your relations */ ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
