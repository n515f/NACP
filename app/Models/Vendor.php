<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'address', 'phone', 'status', 'type'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'vendor_categories');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
