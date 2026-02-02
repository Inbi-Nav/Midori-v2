<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public const STATUSES = [
        'pending',
        'paid',
        'shipped',
        'delivered',
        'cancelled',
    ];

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function calculateTotal(): float {
        return $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }
}