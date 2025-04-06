<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OccasionsResource\Pages; // تم إضافة الفاصلة المنقوطة هنا
use App\Models\Occasions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OccasionsResource extends Resource
{
    protected static ?string $model = Occasions::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'المناسبات';

    protected static ?string $navigationGroup = 'إدارة المحتوى';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('الاسم')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('address')
                            ->label('العنوان')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('event_type')
                            ->label('نوع المناسبة')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('phone')
                            ->label('رقم الموبايل')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\DatePicker::make('event_date')
                            ->label('تاريخ المناسبة')
                            ->required(),
                        
                        Forms\Components\TextInput::make('guest_count')
                            ->label('عدد الضيوف التقريبي')
                            ->numeric()
                            ->nullable(),
                        
                        Forms\Components\Textarea::make('notes')
                            ->label('ملاحظات')
                            ->nullable()
                            ->columnSpan('full'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('event_type')
                    ->label('نوع المناسبة')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('phone')
                    ->label('رقم الموبايل')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('event_date')
                    ->label('تاريخ المناسبة')
                    ->date('d/m/Y')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('guest_count')
                    ->label('عدد الضيوف')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('event_date')
                    ->form([
                        Forms\Components\DatePicker::make('event_date_from')
                            ->label('من تاريخ'),
                        Forms\Components\DatePicker::make('event_date_to')
                            ->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['event_date_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('event_date', '>=', $date),
                            )
                            ->when(
                                $data['event_date_to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('event_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        
                        if ($data['event_date_from'] ?? null) {
                            $indicators['event_date_from'] = 'من تاريخ: ' . $data['event_date_from'];
                        }
                        
                        if ($data['event_date_to'] ?? null) {
                            $indicators['event_date_to'] = 'إلى تاريخ: ' . $data['event_date_to'];
                        }
                        
                        return $indicators;
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOccasions::route('/'),
            'create' => Pages\CreateOccasions::route('/create'),
            'edit' => Pages\EditOccasions::route('/{record}/edit'),
        ];
    }
}