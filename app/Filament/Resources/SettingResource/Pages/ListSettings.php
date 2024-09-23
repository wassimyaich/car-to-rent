<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
        //     Tab::make('Image Settings')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('about_image')
        //                                                     ->orWhereNotNull('blog_single_image')
        //                                                     ->orWhereNotNull('blog_image')
        //                                                     ->orWhereNotNull('car_single_image')
        //                                                     ->orWhereNotNull('car_image')
        //                                                     ->orWhereNotNull('contact_image')
        //                                                     ->orWhereNotNull('index_image')
        //                                                     ->orWhereNotNull('pricing_image')
        //                                                     ->orWhereNotNull('services_image')),
        //     Tab::make('Footer Settings')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('phone_number')
        //                                                     ->orWhereNotNull('about_us')
        //                                                     ->orWhereNotNull('place')
        //                                                     ->orWhereNotNull('description')
        //                                                     ->orWhereNotNull('name')),
        //     Tab::make('Header Settings')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('logo')
        //                                                     ->orWhereNotNull('site_title')
        //                                                     ->orWhereNotNull('favicon')),
        //     Tab::make('SEO Settings')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('meta_description')
        //                                                     ->orWhereNotNull('meta_keywords')),
        //     Tab::make('Social Media')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('facebook_link')
        //                                                     ->orWhereNotNull('twitter_link')
        //                                                     ->orWhereNotNull('instagram_link')
        //                                                     ->orWhereNotNull('linkedin_link')),
        //     Tab::make('Contact Info')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('email')
        //                                                     ->orWhereNotNull('address')),
        //     Tab::make('Analytics')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('google_analytics_id')),
        //     Tab::make('Theme Settings')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('primary_color')
        //                                                     ->orWhereNotNull('secondary_color')
        //                                                     ->orWhereNotNull('font_family')),
        //     Tab::make('Other Settings')
        //         ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('preloader')
        //                                                     ->orWhereNotNull('google_recaptcha_site_key')
        //                                                     ->orWhereNotNull('google_recaptcha_status')
        //                                                     ->orWhereNotNull('paypal_client_id')
        //                                                     ->orWhereNotNull('paypal_client_secret')
        //                                                     ->orWhereNotNull('paypal_mode')
        //                                                     ->orWhereNotNull('maintenance_mode')
        //                                                     ->orWhereNotNull('maintenance_message')
        //                                                     ->orWhereNotNull('custom_css')
        //                                                     ->orWhereNotNull('custom_js'),
        //     ),
        // ];
        'all' => Tab::make('All'),
        'image_settings' => Tab::make('Image Settings')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('about_image')
                ->orWhereNotNull('blog_single_image')
                ->orWhereNotNull('blog_image')
                ->orWhereNotNull('car_single_image')
                ->orWhereNotNull('car_image')
                ->orWhereNotNull('contact_image')
                ->orWhereNotNull('index_image')
                ->orWhereNotNull('pricing_image')
                ->orWhereNotNull('services_image')),
        'footer_settings' => Tab::make('Footer Settings')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('phone_number')
                ->orWhereNotNull('about_us')
                ->orWhereNotNull('place')
                ->orWhereNotNull('description')
                ->orWhereNotNull('name')),
        'header_settings' => Tab::make('Header Settings')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('logo')
                ->orWhereNotNull('site_title')
                ->orWhereNotNull('favicon')),
        'seo_settings' => Tab::make('SEO Settings')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('meta_description')
                ->orWhereNotNull('meta_keywords')),
        'social_media' => Tab::make('Social Media')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('facebook_link')
                ->orWhereNotNull('twitter_link')
                ->orWhereNotNull('instagram_link')
                ->orWhereNotNull('linkedin_link')),
        'other_settings' => Tab::make('Other Settings')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('google_analytics_id')
                ->orWhereNotNull('primary_color')
                ->orWhereNotNull('secondary_color')
                ->orWhereNotNull('font_family')
                ->orWhereNotNull('google_recaptcha_site_key')
                ->orWhereNotNull('paypal_client_id')
                ->orWhereNotNull('custom_css')
                ->orWhereNotNull('custom_js')),
    ];
    }
}
