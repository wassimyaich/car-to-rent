<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Reservation and Payment';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\Select::make('car_id')
                ->relationship('car', 'license_plate')
                ->required(),
            Forms\Components\DateTimePicker::make('start_date')
                ->required()
                ->minDate(now()) // Ensure the start date is today or later
                ->default(now()) // Default to today's date
                ->reactive() // To trigger validation dynamically when start date changes
                ->extraAttributes(['readonly' => true]) // Prevent manual input

                ->afterStateUpdated(function ($state, callable $set) {
                    $set('end_date', null); // Reset the end date when start date changes
                }),

            Forms\Components\DateTimePicker::make('end_date')
                ->required()
                ->after('start_date') // Ensure end date is after or equal to start date
                ->minDate(function (callable $get) {
                    return $get('start_date'); // Set min date for end date to be after start date
                }),
                Forms\Components\TextInput::make('phone')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('total_cost')
                ->required()
                ->numeric(),
                Forms\Components\TextInput::make('start_state')
                ->required(),
                Forms\Components\TextInput::make('end_state')
                ->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'reserved' => 'Reserved',
                    'active' => 'Active',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->required(),
            Forms\Components\Textarea::make('cancellation_reason')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user_id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('car_id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('start_date')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('end_date')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('total_cost')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->colors([
                    'warning' => 'reserved',
                    'primary' => 'active',
                    'success' => 'completed',
                    'danger' => 'cancelled',
                ]),

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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'view' => Pages\ViewReservation::route('/{record}'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
