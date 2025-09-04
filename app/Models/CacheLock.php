namespace App\Models;
<?php

use Illuminate\Database\Eloquent\Model;

class CacheLock extends Model
{
    protected $fillable = [
        'key', 'owner', 'expiration'
    ];
    public $timestamps = false;
    protected $primaryKey = 'key';
    public $incrementing = false;
}
