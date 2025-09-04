<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryZone extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'delivery_fee', 'coordinates'];
}
