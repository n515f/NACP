<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // جلب المنتجات حسب رقم المتجر
    public function index(Request $request)
    {
        $vendorId = $request->query('vendor_id');

        if (!$vendorId) {
            return response()->json([
                'success' => false,
                'message' => 'يجب تمرير vendor_id'
            ], 400);
        }

        $products = Product::where('vendor_id', $vendorId)->get();

        return response()->json([
            'success' => true,
            'products' => $products
        ]);
    }
}
