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
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Forms\Components\JsonEditor;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Create Car';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        // return $form
        //     ->schema([
        //         Forms\Components\TextInput::make('name')
        //         ->required(),
        //         Forms\Components\Select::make('brand_id')
        //             ->relationship('brand', 'name')
        //             ->required(),
        //         // ->maxLength(255),
        //         Forms\Components\Select::make('category_id')
        //             ->relationship('category', 'name')

        //             ->required(),
        //         Forms\Components\Select::make('type_id')
        //             ->relationship('type', 'name')
        //             ->required(),
        //         Forms\Components\Select::make('country_id')
        //             ->relationship(name: 'country', titleAttribute: 'name')
        //             ->searchable()
        //             ->preload()
        //             ->live()
        //             ->afterStateUpdated(function (Set $set) {
        //                 $set('state_id', null);
        //                 $set('city_id', null);
        //             })
        //             ->required(),
        //         Forms\Components\Select::make('state_id')
        //             ->options(fn(Get $get): Collection => State::query()
        //                 ->where('country_id', $get('country_id'))
        //                 ->pluck('name', 'id'))
        //             ->searchable()
        //             ->preload()
        //             ->live()
        //             // ->afterStateUpdated(fn(Set $set) => $set('city_id', null))
        //             ->required(),
        //         // Forms\Components\Select::make('city_id')
        //         //     ->options(fn(Get $get): Collection => City::query()
        //         //         ->where('state_id', $get('state_id'))
        //         //         ->pluck('name', 'id'))
        //         //     ->searchable()
        //         //     ->preload()
        //         //     ,
        //         Forms\Components\TextInput::make('year')
        //             ->required()
        //             ->numeric(),
        //             Forms\Components\DateTimePicker::make('technical_inspection')
        //             ->required()
        //             ->default(now()) // Default to today's date
        //             ->reactive() // To trigger validation dynamically when start date changes
        //             ->extraAttributes(['readonly' => true]) ,// Prevent manual input

        //         Forms\Components\TextInput::make('license_plate')
        //             ->required()
        //             ->unique(ignorable: fn($record) => $record),
        //         Forms\Components\TextInput::make('daily_rate')
        //             ->required()
        //             ->numeric(),
        //         Forms\Components\Textarea::make('description')
        //             ->columnSpanFull(),
        //         Forms\Components\Toggle::make('is_available')
        //             ->required(),
        //         Forms\Components\Toggle::make('show_on_website')
        //             ->required(),
        //             // Forms\Components\FileUpload::make('image_path')
        //             // ->image()
        //             // ->storeFileNamesIn('storage')
        //             // ->required(),

        //             Forms\Components\FileUpload::make('image_path')
        //             ->columns(1)
        //             ->label('Car Images')
        //             ->multiple()
        //             ->minFiles(1)
        //             ->maxFiles(4)
        //             ->enableReordering()
        //             // ->sortable() // Allow reordering
        //             ->image() // Ensure it's an image
        //             ->directory('car-images') // Where to store the images
        //             ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
        //                 return (string) str()->uuid() . "." . $file->extension();
        //             })

        //             ->required(),

        //     ]);

        //
        return $form
            ->schema([
                // Basic Information Section
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Car Name'),

                        Forms\Components\Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->required()
                            ->label('Brand'),

                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->label('Category'),

                        Forms\Components\Select::make('type_id')
                            ->relationship('type', 'name')
                            ->required()
                            ->label('Type'),
                        Forms\Components\TextInput::make('slug')
                            ->unique()
                            ->nullable()
                            ->label('Slug') // URL-friendly version of the car name
                            ->placeholder('Enter a slug'),

                            Forms\Components\Textarea::make('keywords')
                            ->nullable()
                                    ->label("Keywords")
                            -> placeholder("Enter keywords for SEO, separated by commas..."),
                    ])->columns(2),

                // Location Details Section
                Forms\Components\Section::make('Location Details')
                    ->schema([
                        Forms\Components\Select::make('country_id')
                            ->relationship(name: 'country', titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required()
                            ->label('Country'),

                        Forms\Components\Select::make('state_id')
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->label('State'),
                    ])->columns(2),

                // Car Specifications Section
                Forms\Components\Section::make('Car Specifications')
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->numeric()
                            ->label('Year'),

                        Forms\Components\DateTimePicker::make('technical_inspection')
                            ->required()
                            ->default(now()) // Default to today's date
                            ->reactive() // Trigger validation dynamically when start date changes
                            ->extraAttributes(['readonly' => true]) // Prevent manual input
                            ->label('Technical Inspection Date'),

                        Forms\Components\TextInput::make('license_plate')
                            ->required()
                            ->unique(ignorable: fn($record) => $record)
                            ->label('License Plate'),

                        Forms\Components\TextInput::make('daily_rate')
                            ->required()
                            ->numeric()
                            ->label('Daily Rate'),
                    ])->columns(2),

                // Availability Section
                Forms\Components\Section::make('Availability')
                    ->schema([
                        Forms\Components\Toggle::make('is_available')
                            ->required()
                            ->label('Is Available?'),

                        Forms\Components\Toggle::make('show_on_website')
                            ->required()
                            ->label('Show on Website?'),
                    ])->columns(2),

                // Images & Features Section
                Forms\Components\Section::make('Images & Features')
                    ->schema([
                //         Forms\Components\FileUpload::make('image_path')
                //             ->columns(1)
                //             ->label('Car Images')
                //             ->multiple()
                //             ->minFiles(1)
                //             ->maxFiles(4)
                //             ->enableReordering() // Allow reordering of images
                //             ->image() // Ensure it's an image
                //             ->directory('car-images') // Where to store the images
                //             ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                //                 return (string) str()->uuid() . "." . $file->extension();
                //             })
                            
                //             ->required(),

                            Forms\Components\FileUpload::make('image_path')
                            ->columns(2)
                            ->image()
                            ->storeFileNamesIn('storage')
                            ->multiple()
                            ->minFiles(1)
                            ->maxFiles(4)
                            ->enableReordering() 
                            ->image()
                            ->directory('car-images')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string) str()->uuid() . "." . $file->extension();
                                            })
                            ->required(),

                        // Features JSON Field (Newly Added)
                        Forms\Components\Textarea::make('features') // Changed from JsonEditor to Textarea
                            ->nullable()
                            ->label("Car Features")
                            ->placeholder("Enter car features separated by commas..."),

                        // Insurance Status Toggle (Newly Added)
                        Forms\Components\Toggle::make('is_insured')
                            ->default(true) // Default to true, indicating the car is insured.
                            ->label("Is Insured?"),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable(),
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
                // Tables\Columns\ImageColumn::make('image_path')
                // ->url(function (Car $record) {
                //     return asset(Storage::url("car-images/{$record->image_path}"));
                // })
                // ->label('Image')
                // ->circular(),
                ImageColumn::make('image_path')
                    ->url(function (Car $record) {
                        Log::info('Image path: ' . print_r($record->image_path, true));

                        
                        // $imagePaths = json_decode($record->image_path, true);
                        $imagePaths = $record->image_path;

                        // Log::info('Image paths: ' . print_r($imagePaths, true));

                        // Return the first image URL or a placeholder if none exists
                        return isset($imagePaths[0]) ? asset('storage/' . $imagePaths[0]) : null;
                    })
                    ->label('Image')
                    ->circular()
                    ->stacked()
                  
                    ->size(64),
                //         Tables\Columns\ImageColumn::make('image_path')
                // ->url(function (Car $record) {
                //     Log::info('Image path: ' . $record->image_path);

                //     // Decode the JSON string to get an array
                //     $imagePaths = json_decode($record->image_path);
                //     Log::info('Decoded image paths: ' . print_r($imagePaths, true));

                //     // Return the first image URL or a placeholder if none exists
                //     return isset($imagePaths[0]) ? asset('storage/' . $imagePaths[0]) : null;
                // })
                // ->label('Image')
                // ->circular(),


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
