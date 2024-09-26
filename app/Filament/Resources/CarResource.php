<?php

namespace App\Filament\Resources;

use App\Models\Car;
use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\State;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarResource\RelationManagers;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Create Car';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),
                // ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')

                    ->required(),
                Forms\Components\Select::make('type_id')
                    ->relationship('type', 'name')
                    ->required(),
                Forms\Components\Select::make('country_id')
                    ->relationship(name: 'country', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('state_id', null);
                        $set('city_id', null);
                    })
                    ->required(),
                Forms\Components\Select::make('state_id')
                    ->options(fn(Get $get): Collection => State::query()
                        ->where('country_id', $get('country_id'))
                        ->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn(Set $set) => $set('city_id', null))
                    ->required(),
                // Forms\Components\Select::make('city_id')
                //     ->options(fn(Get $get): Collection => City::query()
                //         ->where('state_id', $get('state_id'))
                //         ->pluck('name', 'id'))
                //     ->searchable()
                //     ->preload()
                //     ,
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('license_plate')
                    ->required()
                    ->unique(ignorable: fn($record) => $record),
                Forms\Components\TextInput::make('daily_rate')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_available')
                    ->required(),
                Forms\Components\Toggle::make('show_on_website')
                    ->required(),
                    Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->storeFileNamesIn('storage')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('daily_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
                Tables\Columns\IconColumn::make('show_on_website')
                    ->boolean(),
                    Tables\Columns\ImageColumn::make('image_path')
                    ->url(function (Car $record) {
                        return asset(Storage::url($record->image_path));
                    })
                    ->label('Image')
                    ->circular(),
    
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'view' => Pages\ViewCar::route('/{record}'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
