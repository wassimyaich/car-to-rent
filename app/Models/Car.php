<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'technical_inspection',
        'brand_id',
        'category_id',
        'type_id',
        'year',
        'license_plate',
        'daily_rate',
        'description',
        'is_available',
        'country_id',
        'state_id',
        'city_id',
        'slug',
        'keywords',
        'image_path',
        'features',
        'is_insured',
    ];


    protected $casts = [
        'image_path'=> 'array',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isAvailable()
    {
        return $this->is_available == 1;
    }

    public function isNotAvailable()
    {
        return $this->is_available == 0;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
