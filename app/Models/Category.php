<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon'];

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'vendor_categories');
    }
}
