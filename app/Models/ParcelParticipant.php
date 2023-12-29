<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'full_name',
        'date_of_birth',
        'age',
        'address',
        'email',
        'phone_number',
        'parcel_id',
    ];

    // relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
