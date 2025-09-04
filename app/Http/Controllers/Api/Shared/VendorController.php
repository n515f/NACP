<?php

namespace App\Http\Controllers\Api\Shared;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // إرجاع جميع المتاجر أو المتاجر حسب التصنيف
    public function index(Request $request)
    {
        if ($request->has('category_id')) {
            return Vendor::where('category_id', $request->category_id)->get();
        }

        return Vendor::all();
    }
}
