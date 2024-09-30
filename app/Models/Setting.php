<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [
        'about_image',
        'blog_single_image',
        'blog_image',
        'car_single_image',
        'car_image',
        'contact_image',
        'index_image',
        'pricing_image',
        'services_image',
        'phone_number',
        'about_us',
        'place',
        'description',
        'name',
        'logo',
        'site_title',
        'favicon',
        'preloader',
        'google_recaptcha_site_key',
        'google_recaptcha_status',
        'paypal_client_id',
        'paypal_client_secret',
        'paypal_mode',
        'email',
        'address'
    ];
}
