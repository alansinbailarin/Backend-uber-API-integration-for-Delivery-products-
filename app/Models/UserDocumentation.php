<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocumentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'file',
        'verified',
        'verified_by',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
