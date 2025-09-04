<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

  protected $fillable = ['name', 'phone', 'vehicle_type', 'license_number', 'lat', 'lng', 'status'];

    public function orders() {
        return $this->hasMany(Order::class, 'driver_id');
    }
}