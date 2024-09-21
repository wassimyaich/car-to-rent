<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\CarImage;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarImageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarImageResource\RelationManagers;

class CarImageResource extends Resource
{
    protected static ?string $model = CarImage::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Create Car';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('car_id')
                ->relationship('car', 'license_plate')
                ->required(),
            Forms\Components\FileUpload::make('image_path')
                ->image()
                ->storeFileNamesIn('storage')
                ->required(),
            Forms\Components\Toggle::make('is_primary')
                ->label('Primary Image')
                ->required()
                ->afterStateUpdated(function ($state, callable $set, $get) {
                    $carId = $get('car_id'); // Retrieve the car_id from the form state

                    if ($state === true) { // Check if the toggle is set to true
                        $existingPrimary = CarImage::where('car_id', $carId)
                            ->where('is_primary', true)
                            ->exists();

                        if ($existingPrimary) {
                            $set('is_primary', false);

                            Notification::make()
                                ->title('Primary Image Error')
                                ->body('This car already has a primary image.')
                                ->danger()
                                ->send();
                        }
                    }
                }),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('car.license_plate')
                ->label('Car License')
                ->searchable(),
            Tables\Columns\ImageColumn::make('image_path')
                ->url(function (CarImage $record) {
                    return asset(Storage::url($record->image_path));
                })
                ->label('Image')
                ->circular(),

            Tables\Columns\BooleanColumn::make('is_primary'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarImages::route('/'),
            'create' => Pages\CreateCarImage::route('/create'),
            'view' => Pages\ViewCarImage::route('/{record}'),
            'edit' => Pages\EditCarImage::route('/{record}/edit'),
        ];
    }
}
