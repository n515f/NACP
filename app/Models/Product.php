<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['vendor_category_id', 'name', 'slug', 'description', 'price', 'sale_price', 'stock', 'unit', 'image_main', 'images_count', 'is_active', 'image', 'available', 'vendor_id', 'category_id'];

    public function category() {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
