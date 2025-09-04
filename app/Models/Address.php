<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Addresse extends Model
{
    protected $fillable = ['user_id', 'label', 'details', 'title', 'address', 'city', 'area', 'lat', 'lng', 'is_default'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
