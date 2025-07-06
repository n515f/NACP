<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driver_id',
        'total',
        'status',
        'payment_method',
    ];

    public function user() { return $this->belongsTo(User::class); }

    public function driver() { return $this->belongsTo(Driver::class); }

    public function items() { return $this->hasMany(OrderItem::class); }

    public function payment() { return $this->hasOne(Payment::class); }
}
