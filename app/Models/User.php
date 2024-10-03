<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Filament\Panel;
use Illuminate\Support\Facades\Log;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[ObservedBy(UserObserver::class)]
class User extends Authenticatable  implements FilamentUser,HasAvatar
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin == 1 ;
    }
    public function isAdmin(): bool
    {
        Log::info('User ID: ' . $this->id . ' - is_admin: ' . $this->is_admin);
        return $this->is_admin == 1;
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }



    //////////////////////////////////////
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
