<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'country_id'
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
