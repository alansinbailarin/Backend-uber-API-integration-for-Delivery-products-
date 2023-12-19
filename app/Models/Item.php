<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'quantity',
        'weight',
        'dimension_length',
        'dimension_height',
        'dimension_deph',
        'url_image',
        'price',
        'transaction_id'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
