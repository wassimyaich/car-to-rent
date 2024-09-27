<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\Setting;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Grid;

class SettingsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Setting';
    protected static ?string $title = 'System Settings';
    protected static ?string $slug = 'setting';
    protected static string $view = 'filament.pages.settings-page';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::first();
        $this->form->fill($settings ? $settings->toArray() : []);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Settings')
                    ->description('Manage your application\'s general settings.')
                    ->icon('heroicon-o-cog')
                    ->schema([
                        Tabs::make('Settings')
                            ->tabs([
                                Tabs\Tab::make('Image Settings')
                                    ->icon('heroicon-o-photo')
                                    ->schema($this->getImageSettings()),
                                Tabs\Tab::make('Footer Settings')
                                    ->icon('heroicon-o-document-text')
                                    ->schema($this->getFooterSettings()),
                                Tabs\Tab::make('Header Settings')
                                    ->icon('heroicon-o-document')
                                    ->schema($this->getHeaderSettings()),
                                Tabs\Tab::make('Payment Settings')
                                    ->icon('heroicon-o-credit-card')
                                    ->schema($this->getPaymentSettings()),
                                Tabs\Tab::make('Google reCAPTCHA')
                                    ->icon('heroicon-o-shield-check')
                                    ->schema($this->getRecaptchaSettings()),
                            ])->columnSpanFull(),
                    ])
            ])
            ->statePath('data');
    }

    protected function getImageSettings(): array
    {
        return [
            Grid::make(2)->schema([
                Forms\Components\FileUpload::make('about_image')->label('About Image')->disk('frontend'),
                Forms\Components\FileUpload::make('blog_single_image')->label('Blog Single Image')->disk('frontend'),
                Forms\Components\FileUpload::make('blog_image')->label('Blog Image')->disk('frontend'),
                Forms\Components\FileUpload::make('car_single_image')->label('Car Single Image')->disk('frontend'),
                Forms\Components\FileUpload::make('car_image')->label('Car Image')->disk('frontend'),
                Forms\Components\FileUpload::make('contact_image')->label('Contact Image')->disk('frontend'),
                Forms\Components\FileUpload::make('index_image')->label('Index Image')->disk('frontend'),
                Forms\Components\FileUpload::make('pricing_image')->label('Pricing Image')->disk('frontend'),
                Forms\Components\FileUpload::make('services_image')->label('Services Image')->disk('frontend'),
            ]),
        ];
    }

    protected function getFooterSettings(): array
    {
        return [
            Forms\Components\TextInput::make('phone_number')->label('Phone Number')->tel(),
            Forms\Components\Textarea::make('about_us')->label('About Us')->rows(3),
            Forms\Components\TextInput::make('place')->label('Place'),
            Forms\Components\Textarea::make('description')->label('Description')->rows(3),
            Forms\Components\TextInput::make('name')->label('Name'),
        ];
    }

    protected function getHeaderSettings(): array
    {
        return [
            Forms\Components\FileUpload::make('logo')->label('Logo')->disk('frontend'),
            Forms\Components\TextInput::make('site_title')->label('Site Title'),
            Forms\Components\FileUpload::make('favicon')->label('Favicon')->disk('frontend'),
        ];
    }

    protected function getPaymentSettings(): array
    {
        return [
            Forms\Components\TextInput::make('paypal_client_id')->label('PayPal Client ID'),
            Forms\Components\TextInput::make('paypal_client_secret')->label('PayPal Client Secret')->password(),
            Forms\Components\Select::make('paypal_mode')
                ->options([
                    'sandbox' => 'Sandbox',
                    'live' => 'Live',
                ])->default('sandbox')->label('PayPal Mode'),
        ];
    }

    protected function getRecaptchaSettings(): array
    {
        return [
            Forms\Components\TextInput::make('google_recaptcha_site_key')->label('Site Key'),
            Forms\Components\Toggle::make('google_recaptcha_status')->label('Enable reCAPTCHA'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $setting = Setting::firstOrCreate();
        $setting->fill($data)->save();

        Notification::make()
            ->title('Success')
            ->body('Settings updated successfully!')
            ->success()
            ->send();
    }
}