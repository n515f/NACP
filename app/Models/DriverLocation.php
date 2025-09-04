<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverLocation extends Model
{
    protected $fillable = ['driver_id', 'lat', 'lng'];

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
