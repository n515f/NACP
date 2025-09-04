<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'driver_id', 'title', 'body', 'type', 'data', 'read_at', 'message', 'is_read'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
