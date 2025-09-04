<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'vendor_id', 'address_id', 'driver_id', 'total', 'notes', 'status', 'payment_method', 'payment_status', 'subtotal', 'delivery_fee', 'discount'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function address() {
        return $this->belongsTo(Addresse::class, 'address_id');
    }

    public function items() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'order_id');
    }
}
