<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomRequest extends Model
{
    protected $fillable = ['user_id', 'category_id', 'request_text', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
}
