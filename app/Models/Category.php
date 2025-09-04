<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    protected $fillable = ['name', 'slug', 'icon_path', 'image_path', 'is_active', 'icon'];

    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
