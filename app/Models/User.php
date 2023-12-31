<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'last_name',
        'avatar',
        'date_of_birth',
        'phone',
        'email',
        'alternative_email',
        'password',
        'timezone',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_documentations()
    {
        return $this->hasMany(UserDocumentation::class);
    }

    public function session_histories()
    {
        return $this->hasMany(SessionHistory::class);
    }

    public function user_activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function user_locations()
    {
        return $this->hasMany(UserLocation::class);
    }

    public function quoteURLs()
    {
        return $this->hasMany(QuoteURL::class);
    }

    public function parcel_participants()
    {
        return $this->hasMany(ParcelParticipant::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
