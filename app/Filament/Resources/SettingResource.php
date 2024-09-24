<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\Column;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;

class SettingResource extends Resource
{
    
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Modify images')
                    ->tabs([
                        Tab::make('Image Settings')
                            ->schema([
                                Forms\Components\FileUpload::make('about_image')->label('About Image')
                                    ->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('blog_single_image')->label('Blog Single Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('blog_image')->label('Blog Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('car_single_image')->label('Car Single Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('car_image')->label('Car Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('contact_image')->label('Contact Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('index_image')->label('Index Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('pricing_image')->label('Pricing Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                                Forms\Components\FileUpload::make('services_image')->label('Services Image')->image()
                                    // ->storeFileNamesIn('storage/frontend/PagesImages')
                                    ->disk('frontend'),
                            ]),
                        Tab::make('Footer Settings')
                            ->schema([
                                Forms\Components\TextInput::make('phone_number')->label('Phone Number'),
                                Forms\Components\Textarea::make('about_us')->label('About Us'),
                                Forms\Components\TextInput::make('place')->label('Place'),
                                Forms\Components\Textarea::make('description')->label('Description'),
                                Forms\Components\TextInput::make('name')->label('Name'),
                            ]),
                        Tab::make('Header Settings')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')->label('Logo'),
                                Forms\Components\TextInput::make('site_title')->label('Site Title'),
                                Forms\Components\FileUpload::make('favicon')->label('Favicon'),
                            ]),
                        Tab::make('Payment Settings')
                            ->schema([
                                Forms\Components\TextInput::make('paypal_client_id')->label('PayPal Client ID'),
                                Forms\Components\TextInput::make('paypal_client_secret')->label('PayPal Client Secret'),
                                Forms\Components\Select::make('paypal_mode')
                                    ->options([
                                        'sandbox' => 'Sandbox',
                                        'live' => 'Live',
                                    ])->default('sandbox')->label('PayPal Mode'),
                            ]),
                        Tab::make('Google reCAPTCHA')
                            ->schema([
                                Forms\Components\TextInput::make('google_recaptcha_site_key')->label('Site Key'),
                                Forms\Components\Toggle::make('google_recaptcha_status')->label('Enable reCAPTCHA'),
                            ]),
                        // Add more tabs as needed
                    ]),
            ])->columns(1);
    }


    public static function table(Table $table): Table
    {
        function getImageUrl($imagePath) {
            return Storage::disk('frontend')->url($imagePath);
        }
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\ImageColumn::make('logo')
                    ->visible(fn($livewire) => $livewire->activeTab === 'header_settings'),
                Tables\Columns\TextColumn::make('site_title')
                    ->visible(fn($livewire) => $livewire->activeTab === 'header_settings' || $livewire->activeTab === 'all'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->visible(fn($livewire) => $livewire->activeTab === 'footer_settings' || $livewire->activeTab === 'all'),
                Tables\Columns\TextColumn::make('email')
                    ->visible(fn($livewire) => $livewire->activeTab === 'footer_settings' || $livewire->activeTab === 'all'),
                Tables\Columns\TextColumn::make('meta_description')
                    ->visible(fn($livewire) => $livewire->activeTab === 'seo_settings')
                    ->limit(50),
                Tables\Columns\TextColumn::make('meta_keywords')
                    ->visible(fn($livewire) => $livewire->activeTab === 'seo_settings')
                    ->limit(50),
                Tables\Columns\TextColumn::make('facebook_link')
                    ->visible(fn($livewire) => $livewire->activeTab === 'social_media')
                    ->limit(30),
                Tables\Columns\TextColumn::make('twitter_link')
                    ->visible(fn($livewire) => $livewire->activeTab === 'social_media')
                    ->limit(30),
                Tables\Columns\TextColumn::make('instagram_link')
                    ->visible(fn($livewire) => $livewire->activeTab === 'social_media')
                    ->limit(30),
                Tables\Columns\TextColumn::make('linkedin_link')
                    ->visible(fn($livewire) => $livewire->activeTab === 'social_media')
                    ->limit(30),
                Tables\Columns\ImageColumn::make('about_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->about_image));
                        return getImageUrl($record->about_image);
                        // return Storage::disk('frontend')->url($record->car_image ?? 'default.jpg');
                        // asset(Storage::url($record->about_image));
                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings')
                    ,

                Tables\Columns\ImageColumn::make('blog_single_image')
                    ->url(function (Setting $record) { 
                        // return asset(Storage::disk('frontend')->url($record->blog_single_image));
                        return getImageUrl($record->blog_single_image);
                        
                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('blog_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->blog_image));
                        return getImageUrl($record->blog_image);

                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('car_single_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->car_single_image));
                        return getImageUrl($record->car_single_image);

                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('car_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->car_image));
                        // return Storage::disk('frontend')->url($record->car_image ?? 'default.jpg');
                        return getImageUrl($record->car_image);

                        
                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('contact_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->contact_image));
                        return getImageUrl($record->contact_image);

                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('index_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->index_image));
                        return getImageUrl($record->index_image);

                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('pricing_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->pricing_image));
                        return getImageUrl($record->pricing_image);

                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),

                Tables\Columns\ImageColumn::make('services_image')
                    ->url(function (Setting $record) {
                        // return asset(Storage::disk('frontend')->url($record->services_image));
                        return getImageUrl($record->services_image);

                    })
                    ->circular()
                    ->visible(fn($livewire) => $livewire->activeTab === 'image_settings'),
                Tables\Columns\TextColumn::make('primary_color')
                    ->visible(fn($livewire) => $livewire->activeTab === 'other_settings'),
                Tables\Columns\TextColumn::make('secondary_color')
                    ->visible(fn($livewire) => $livewire->activeTab === 'other_settings'),
                Tables\Columns\TextColumn::make('google_analytics_id')
                    ->visible(fn($livewire) => $livewire->activeTab === 'other_settings'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()
                    ->visible(fn($livewire) => $livewire->activeTab === 'all'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()
                    ->visible(fn($livewire) => $livewire->activeTab === 'all'),
            ])
            ->filters([])
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
            'index' => Pages\ListSettings::route('/'),
            //   'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
