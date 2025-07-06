<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'status'];

    public function orders() { return $this->hasMany(Order::class); }

    public function location() { return $this->hasOne(DriverLocation::class); }
}
