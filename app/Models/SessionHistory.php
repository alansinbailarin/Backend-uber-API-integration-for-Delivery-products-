<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'browser',
        'platform',
        'device',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
