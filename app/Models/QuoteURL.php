<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteURL extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_uuid',
        'access_token',
        'expires_at',
        'expires_at_local'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
