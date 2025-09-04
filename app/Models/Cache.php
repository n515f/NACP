<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    protected $fillable = [
        'key', 'value', 'expiration'
    ];
    public $timestamps = false;
    protected $primaryKey = 'key';
    public $incrementing = false;
}
