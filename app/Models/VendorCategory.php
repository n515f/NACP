<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class VendorCategory extends Pivot
{
    protected $table = 'vendor_categories';
    public $timestamps = false;
}
