<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'zip_code',
        'total_price',
        'status'
    ];

    // Relationship to Items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // *** NEW: Relationship to User (This fixes the error) ***
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}