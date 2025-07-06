<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'name', 'description', 'price', 'image', 'available'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
