<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vendor_id', 'note'];

    public function user() { return $this->belongsTo(User::class); }

    public function vendor() { return $this->belongsTo(Vendor::class); }
}
