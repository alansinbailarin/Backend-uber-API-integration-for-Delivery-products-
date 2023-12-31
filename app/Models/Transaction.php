<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'transaction_status',
        'transaction_code',
        'user_id',
        'parcel_participants_id',
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function parcelParticipant()
    {
        return $this->belongsTo(ParcelParticipant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
