<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'amount',
        'payment_status',
        'delivery_status',
        'tracking_url',
        'pickup_address',
        'pickup_name',
        'pickup_phone_number',
        'pickup_latitude',
        'pickup_longitude',
        'dropoff_address',
        'dropoff_name',
        'dropoff_phone_number',
        'dropoff_latitude',
        'dropoff_longitude',
        'confirmation_image',
        'confirmation_buyer',
        'confirmation_seller',
        'buyer_id',
        'seller_id',
        'item_id',
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
}
